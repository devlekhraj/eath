<template>
  <div class="quill-wrapper">
    <div ref="quillContainer" class="quill-editor" />
  </div>
</template>

<script>
import { ref, onMounted, watch, defineComponent } from 'vue'
import Quill from 'quill'

// Modules
import { ImageDrop } from 'quill-image-drop-module'
import ImageResize from 'quill-image-resize-vue'
import QuillBetterTable from 'quill-better-table'

// Register Quill modules
Quill.register('modules/imageDrop', ImageDrop)
Quill.register('modules/imageResize', ImageResize)
Quill.register('modules/better-table', QuillBetterTable)

// Quill theme and table styles
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill-better-table/dist/quill-better-table.css'

export default defineComponent({
  name: 'QuillEditor',
  props: {
    modelValue: String,
    placeholder: {
      type: String,
      default: 'Write something...'
    },
    readOnly: {
      type: Boolean,
      default: false
    }
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const quillContainer = ref(null)
    let quill = null

    onMounted(() => {
      quill = new Quill(quillContainer.value, {
        theme: 'snow',
        placeholder: props.placeholder,
        readOnly: props.readOnly,
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            [{ header: [1, 2, 3, false] }],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ align: [] }],
            ['link', 'image'],
            ['clean'],
            ['table'] // Button for inserting tables (you must add manually)
          ],
          imageDrop: true,
          imageResize: {
            parchment: Quill.import('parchment')
          },
          'better-table': {
            operationMenu: {
              items: {
                unmergeCells: {
                  text: 'Unmerge cells'
                }
              }
            }
          },
          keyboard: {
            bindings: QuillBetterTable.keyboardBindings
          }
        }
      })

      // Allow table insertion via toolbar button (optional)
      const toolbar = quill.getModule('toolbar')
      toolbar.addHandler('table', () => {
        const tableModule = quill.getModule('better-table')
        tableModule.insertTable(3, 3) // 3x3 table
      })

      if (props.modelValue) {
        quill.clipboard.dangerouslyPasteHTML(props.modelValue)
      }

      quill.on('text-change', () => {
        emit('update:modelValue', quill.root.innerHTML)
      })
    })

    watch(() => props.modelValue, (newVal) => {
      if (quill && newVal !== quill.root.innerHTML) {
        quill.root.innerHTML = newVal || ''
      }
    })

    return {
      quillContainer
    }
  }
})
</script>

<style scoped>
.quill-wrapper {
  border: 1px solid #ccc;
  border-radius: 6px;
  padding: 0.5rem;
}

.quill-editor {
  min-height: 200px;
}
</style>
