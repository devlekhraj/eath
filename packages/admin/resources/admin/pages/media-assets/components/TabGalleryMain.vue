<template>
  <div>
    <v-row>
      <v-col
        v-for="(gallery, index) in images"
        :key="gallery?.id || index"
        cols="2"
        md="1"
        class="d-flex justify-center"
      >
        <v-tooltip location="top">
          <template #activator="{ props }">
            <div class="image-wrapper" v-bind="props">
              <v-img
                :lazy-src="gallery.url"
                :src="gallery.url"
                aspect-ratio="1"
                class="bg-grey-lighten-2"
                contain
              >
                <template #placeholder>
                  <v-row align="center" class="fill-height ma-0" justify="center">
                    <v-progress-circular color="grey lighten-5" indeterminate />
                  </v-row>
                </template>
              </v-img>

              <div class="hover-actions">
                <v-tooltip location="top">
                  <template #activator="{ on, attrs }">
                    <v-btn v-bind="attrs" v-on="on" icon variant="text" color="blue" size="x-small" @click.stop="onView(gallery, index)">
                      <v-icon>mdi-eye</v-icon>
                    </v-btn>
                  </template>
                  <span>View Image</span>
                </v-tooltip>

                <v-tooltip location="top">
                  <template #activator="{ on, attrs }">
                    <v-btn v-bind="attrs" v-on="on" icon color="red" variant="text" size="x-small" @click.stop="onDelete(gallery, index)">
                      <v-icon>mdi-delete</v-icon>
                    </v-btn>
                  </template>
                  <span>Delete Image</span>
                </v-tooltip>
              </div>
            </div>
          </template>

          <div class="pa-2" min-width="180">
            <v-row dense>
              <v-col cols="12">
                <strong>{{ gallery?.filename }}</strong>
              </v-col>
              <v-col cols="12">
                <small>{{ gallery?.description || "" }}</small>
              </v-col>
            </v-row>
          </div>
        </v-tooltip>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: "GalleryImagesTab",
  props: {
    images: {
      type: Array,
      default: () => [],
    },
  },
  methods: {
    onView(image, index) {
      this.$emit("view", { image, index });
    },
    onDelete(image, index) {
      this.$emit("delete", { image, index });
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
