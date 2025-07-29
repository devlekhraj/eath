<template>
  <v-container>
    <div class="pb-6 text-right">
      <v-btn size="large" rounded color="primary">
        <v-icon>mdi-upload</v-icon> Upload Image
      </v-btn>
    </div>
    <div>
      <v-row>
        <v-col v-for="(gallery,index) in galleries" :key="index" cols="2" md="1" class="d-flex justify-center">
          <v-tooltip location="top">
            <template #activator="{ props }">
              <div class="image-wrapper" v-bind="props">
                <v-img :lazy-src="galleries.url"
                  :src="gallery.url" aspect-ratio="1" class="bg-grey-lighten-2"
                  contain>
                  <template #placeholder>
                    <v-row align="center" class="fill-height ma-0" justify="center">
                      <v-progress-circular color="grey lighten-5" indeterminate />
                    </v-row>
                  </template>
                </v-img>

                <div class="hover-actions">
                  <!-- View Button -->
                  <v-tooltip location="top">
                    <template #activator="{ on, attrs }">
                      <v-btn v-bind="attrs" v-on="on" icon variant="text" color="blue" size="x-small" @click.stop="viewImage(n)">
                        <v-icon>mdi-eye</v-icon>
                      </v-btn>
                    </template>
                    <span>View Image</span>
                  </v-tooltip>

                  <!-- Delete Button -->
                  <v-tooltip location="top">
                    <template #activator="{ on, attrs }">
                      <v-btn v-bind="attrs" v-on="on" icon color="red" variant="text" size="x-small" @click.stop="deleteImage(n)">
                        <v-icon>mdi-delete</v-icon>
                      </v-btn>
                    </template>
                    <span>Delete Image</span>
                  </v-tooltip>
                </div>
              </div>
            </template>

            <!-- Tooltip Content -->
            <div class="pa-2" min-width="180">
              <v-row dense>
                <v-col cols="12">
                  <strong>{{ gallery?.filename}}</strong>
                </v-col>
                <v-col cols="12">
                  <small>adfsfas</small>
                </v-col>
              </v-row>
            </div>
          </v-tooltip>
        </v-col>
      </v-row>
    </div>
  </v-container>
</template>

<script>
export default {
  name: "ImageGallery",
  data() {
    return {
      galleries: [],
    };
  },

  mounted() {
    this.fetchGallery();
  },
  methods: {
    async fetchGallery() {
      const resp = await axios.get('/admin/galleries');
      console.log({ resp });
      this.galleries = resp.data;
    },

    viewImage(n) {
      alert(`Viewing image #${n}`);
    },
    deleteImage(n) {
      alert(`Deleting image #${n}`);
    },
    getFileName(n) {
    indexreturn `image_${n}.jpg`;
    },
    getFileSize(n) {
      return `${(n * 2.3).toFixed(1)} MB`;
    },
  },
};
</script>

<style scoped>
.image-wrapper {
  position: relative;
  width: 100%;
}

.hover-actions {
  position: absolute;
  top: 8px;
  right: 8px;
  display: flex;
  gap: 8px;
  z-index: 10;
}
</style>
