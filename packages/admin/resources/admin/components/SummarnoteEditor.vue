<template>
  <div class="summernote-shell">
    <div ref="editor" class="summernote-editor"></div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount, watch, nextTick } from "vue";
import $ from "jquery";
import "summernote/dist/summernote-lite.css";
import "summernote/dist/summernote-lite.js";

const FONT_NAMES = [
  "Arial",
  "Arial Black",
  "Comic Sans MS",
  "Courier New",
  "Helvetica Neue",
  "Helvetica",
  "Impact",
  "Lucida Grande",
  "Merriweather",
  "Tahoma",
  "Times New Roman",
  "Verdana",
];

const props = defineProps({
  modelValue: String,
});

const emit = defineEmits(["update:modelValue"]);

const editor = ref<HTMLElement | null>(null);
let isEditorReady = false;
let editableElement: HTMLElement | null = null;
let contentObserver: MutationObserver | null = null;
let heightRaf: number | null = null;

const getJQuery = () => {
  if (typeof window !== "undefined") {
    const w = window as any;
    w.$ = w.$ || $;
    w.jQuery = w.jQuery || $;
    return w.jQuery || w.$ || $;
  }
  return $;
};

const ensureSummernoteCompatibility = () => {
  const jq = getJQuery() as typeof $ & {
    now?: () => number;
    nodeName?: (element: Element | Node | null | undefined, name: string) => boolean;
    summernote?: unknown;
  };
  const globalWindow = window as Window & {
    $?: typeof jq;
    jQuery?: typeof jq;
  };

  if (typeof jq.now !== "function") {
    jq.now = () => Date.now();
  }

  if (typeof jq.nodeName !== "function") {
    jq.nodeName = (element: Element | Node | null | undefined, name: string) => {
      return Boolean(
        element &&
          "nodeName" in element &&
          typeof element.nodeName === "string" &&
          element.nodeName.toLowerCase() === name.toLowerCase()
      );
    };
  }

  globalWindow.$ = jq;
  globalWindow.jQuery = jq;
};

const syncEditorHeight = () => {
  if (!editableElement) {
    return;
  }

  editableElement.style.height = "auto";
  editableElement.style.minHeight = "400px";
  editableElement.style.overflowY = "hidden";

  const contentHeight = Math.max(editableElement.scrollHeight, 0);
  editableElement.style.height = `${contentHeight}px`;

  const jq = getJQuery();
  const $noteEditor = jq(editableElement).closest(".summernote-shell .note-editor");
  const $editingArea = $noteEditor.find(".note-editing-area");
  const $editingFrame = $noteEditor.find(".note-editing-area, .note-editable");

  $noteEditor.css("height", "auto");
  $editingArea.css("height", "auto");
  $editingFrame.css("min-height", "400px");
};

const scheduleSyncEditorHeight = () => {
  if (heightRaf !== null) {
    cancelAnimationFrame(heightRaf);
  }

  heightRaf = requestAnimationFrame(() => {
    heightRaf = null;
    syncEditorHeight();
  });
};

type SummernoteImageDialogInstance = {
  $dialog: any;
  ui: any;
  context: any;
};

type SummernoteImageDialogCtor = new (...args: any[]) => SummernoteImageDialogInstance;

const patchImageDialogBehavior = () => {
  const jq = getJQuery();
  const summernote = (jq as any).summernote;

  if (
    !summernote?.options?.modules?.imageDialog ||
    summernote.__customImageDialogPatched
  ) {
    return;
  }

  const BaseImageDialog = summernote.options.modules.imageDialog as SummernoteImageDialogCtor;

  summernote.options.modules.imageDialog = class extends BaseImageDialog {
    showImageDialog() {
      return jq.Deferred(
        (deferred: {
          resolve: (value?: unknown) => void;
          reject: () => void;
          state: () => string;
        }) => {
          let selectedFiles: FileList | null = null;
          const $imageInput = this.$dialog.find(".note-image-input");
          const $imageUrl = this.$dialog.find(".note-image-url");
          const $imageBtn = this.$dialog.find(".note-image-btn");

          this.ui.onDialogShown(this.$dialog, () => {
            this.context.triggerEvent("dialog.shown");

            const $freshInput = $imageInput.replaceWith(
              $imageInput
                .clone()
                .on("change", (event: Event) => {
                  const target = event.target as HTMLInputElement | null;
                  selectedFiles = target?.files ?? null;
                  this.ui.toggleBtn(
                    $imageBtn,
                    Boolean(selectedFiles?.length) || $imageUrl.val()
                  );
                })
                .val("")
            );

            $imageUrl
              .on("input paste propertychange", () => {
                this.ui.toggleBtn(
                  $imageBtn,
                  Boolean(selectedFiles?.length) || $imageUrl.val()
                );
              })
              .val("");

            if (!("ontouchstart" in window)) {
              $imageUrl.trigger("focus");
            }

            $imageBtn.on("click", (event: Event) => {
              event.preventDefault();
              if (selectedFiles?.length) {
                deferred.resolve(selectedFiles);
                return;
              }
              deferred.resolve($imageUrl.val());
            });

            $imageUrl.on("keypress", (event: Event & { keyCode?: number }) => {
              if (event.keyCode === 13) {
                event.preventDefault();
                $imageBtn.trigger("click");
              }
            });

            this.ui.toggleBtn($imageBtn, false);
            return $freshInput;
          });

          this.ui.onDialogHidden(this.$dialog, () => {
            this.$dialog.find(".note-image-input").off();
            $imageUrl.off();
            $imageBtn.off();

            if (deferred.state() === "pending") {
              deferred.reject();
            }
          });

          this.ui.showDialog(this.$dialog);
        }
      );
    }
  };

  summernote.__customImageDialogPatched = true;
};

onMounted(async () => {
  await nextTick();
  ensureSummernoteCompatibility();
  patchImageDialogBehavior();

  if (!editor.value) {
    return;
  }

  const jq = getJQuery();
  const $editor = jq(editor.value);

  if (typeof $editor.summernote !== "function") {
    console.error("summernote method not available on jQuery", jq);
    return;
  }

  $editor.summernote({
    height: null,
    minHeight: 400,
    maxHeight: null,
    disableResizeEditor: true,
    dialogsInBody: true,
    toolbar: [
      ["style", ["style"]],
      [
        "font",
        [
          "bold",
          "italic",
          "underline",
          "clear",
          "strikethrough",
          "superscript",
          "subscript",
        ],
      ],
      ["fontname", ["fontname"]],
      ["fontsize", ["fontsize", "fontsizeunit"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph", "height"]],
      ["table", ["table"]],
      ["insert", ["link", "picture", "video", "hr"]],
      ["view", ["undo", "redo", "codeview"]],
    ],
    fontNames: FONT_NAMES,
    fontNamesIgnoreCheck: [],
    fontSizes: [
      "8",
      "9",
      "10",
      "11",
      "12",
      "14",
      "16",
      "18",
      "20",
      "24",
      "28",
      "32",
      "36",
      "48",
    ],
    fontSizeUnits: ["px", "pt"],
    lineHeights: ["1.0", "1.2", "1.4", "1.5", "1.6", "1.8", "2.0", "3.0"],
    styleTags: [
      "p",
      {
        title: "Blockquote",
        tag: "blockquote",
        className: "blockquote",
        value: "blockquote",
      },
      {
        title: "Preformatted",
        tag: "pre",
        className: "pre",
        value: "pre",
      },
      "h1",
      "h2",
      "h3",
      "h4",
      "h5",
    ],
    callbacks: {
      onChange(contents: string) {
        emit("update:modelValue", contents);
        scheduleSyncEditorHeight();
      },
      onPaste(event: ClipboardEvent & { originalEvent?: ClipboardEvent }) {
        event.preventDefault();
        const clipboardData = (event.originalEvent || event).clipboardData;
        if (!clipboardData) {
          return;
        }
        const text = clipboardData.getData("text/plain");
        document.execCommand("insertText", false, text);
      },
    },
  });

  const $summernote = jq(editor.value);
  const $noteEditor = $summernote.next(".note-editor");
  const $toolbar = $noteEditor.find(".note-toolbar");
  const $editingArea = $noteEditor.find(".note-editing-area");
  const $editable = $noteEditor.find(".note-editable");
  const $codable = $noteEditor.find(".note-codable");
  editableElement = $editable.get(0) ?? null;

  if (editableElement) {
    contentObserver = new MutationObserver(() => {
      syncEditorHeight();
    });

    contentObserver.observe(editableElement, {
      childList: true,
      characterData: true,
      subtree: true,
    });
  }

  $noteEditor.css("background-color", "#ffffff");
  $toolbar.css("background-color", "#ffffff");
  $editingArea.css("background-color", "#ffffff");
  $editable.css("background-color", "#ffffff");
  $editable.css("min-height", "400px");
  $editable.css("height", "auto");
  $editable.css("overflow-y", "hidden");
  $codable.css({
    backgroundColor: "#111111",
    color: "#f3f4f6",
    fontSize: "12px",
  });
  $editable.css("font-size", "14px");
  $editable.css("font-family", "Poppins, sans-serif");
  $summernote.summernote("code", props.modelValue || '<p style="font-size: 14px;"></p>');
  scheduleSyncEditorHeight();
  isEditorReady = true;
});

watch(
  () => props.modelValue,
  (value) => {
    if (!editor.value || !isEditorReady) {
      return;
    }

    const jq = getJQuery();
    const $editor = jq(editor.value);
    if (typeof $editor.summernote === "function") {
      if (value !== $editor.summernote("code")) {
        $editor.summernote("code", value || "");
        scheduleSyncEditorHeight();
      }
    }
  }
);

onBeforeUnmount(() => {
  if (!editor.value || !isEditorReady) {
    return;
  }

  contentObserver?.disconnect();
  contentObserver = null;
  if (heightRaf !== null) {
    cancelAnimationFrame(heightRaf);
    heightRaf = null;
  }

  const jq = getJQuery();
  const $editor = jq(editor.value);
  if (typeof $editor.summernote === "function") {
    $editor.summernote("destroy");
  }
  editableElement = null;
  isEditorReady = false;
});
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap");

.note-modal-content {
  border: 0 !important;
  border-radius: 4px !important;
  box-shadow: none !important;
}

.note-modal-header {
  border-top-right-radius: 4px !important;
  border-top-left-radius: 4px !important;
}

.note-modal-footer {
  height: 50px !important;
}

.note-modal-footer .note-btn {
  float: none !important;
  border: 0 !important;
}
.note-modal-backdrop {
  z-index: 3000 !important;
  background: rgba(51, 51, 51, 0.563) !important;
  opacity: 1 !important;
}

.note-modal {
  z-index: 3010 !important;
}
</style>

<style scoped>
:deep(.summernote-shell .note-editor.codeview .note-codable) {
  background-color: #111111 !important;
  color: #f3f4f6 !important;
  font-size: 12px;
  caret-color: #f3f4f6;
}

:deep(.summernote-shell .note-editor.codeview .note-editing-area) {
  background-color: #111111 !important;
}

:deep(.summernote-shell .note-frame) {
  height: auto !important;
}

:deep(.summernote-shell .note-editor) {
  height: auto !important;
}

:deep(.summernote-shell .note-editing-area) {
  height: auto !important;
  min-height: 400px !important;
}

:deep(.summernote-shell .note-editable) {
  height: auto !important;
  min-height: 400px !important;
  overflow-y: hidden !important;
}

:deep(.summernote-shell .note-editable p:last-child) {
  margin-bottom: 0 !important;
}
:deep(.note-editing-area){
  padding: 20px 20px 100px 20px !important;
}
</style>
