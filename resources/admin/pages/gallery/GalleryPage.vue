<template>
  <div class="">
    <div class="pb-6 text-right">
      <v-btn size="large" rounded color="primary">
        <v-icon>mdi-upload</v-icon> Upload Image
      </v-btn>
    </div>

    <v-card elevation="0" class="mb-6">
      <v-tabs v-model="activeTab" color="primary">
        <v-tab value="all">
          <v-icon color="primary" start>mdi-image-multiple</v-icon>
          All Images
        </v-tab>
        <v-tab value="gallery">
          <v-icon color="primary" start>mdi-image</v-icon>
          Gallery Images
        </v-tab>
      </v-tabs>

      <v-divider></v-divider>

      <v-card-text>
        <component
          :is="currentTabComponent"
          :images="currentImages"
          @view="handleView"
          @delete="handleDelete"
        />
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
import { computed, defineAsyncComponent } from "vue";

export default {
  name: "ImageGallery",
  data() {
    return {
      activeTab: "all",
      allImages: [],
      galleryImages: [],
    };
  },
  computed: {
    currentImages() {
      return this.activeTab === "gallery" ? this.galleryImages : this.allImages;
    },
    currentTabComponent() {
      return this.tabComponents[this.activeTab] || this.tabComponents.all;
    },
  },

  mounted() {
    this.fetchGallery();
  },
  created() {
    this.tabComponents = {
      all: defineAsyncComponent(() => import("./components/TabGalleryAll.vue")),
      gallery: defineAsyncComponent(() => import("./components/TabGalleryMain.vue")),
    };
  },
  methods: {
    async fetchGallery() {
      const resp = await axios.get("/admin/galleries");
      this.galleryImages = resp.data;
      this.allImages = resp.data;
    },

    handleView({ image, index }) {
      const label = image?.filename || `Image #${index + 1}`;
      alert(`Viewing ${label}`);
    },
    handleDelete({ image, index }) {
      const label = image?.filename || `Image #${index + 1}`;
      alert(`Deleting ${label}`);
    },
  },
};
</script>
