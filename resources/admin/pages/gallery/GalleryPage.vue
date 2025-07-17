<template>
  <v-row>
    <v-col
      v-for="n in 6"
      :key="n"
      cols="4"
      md="2"
      class="d-flex justify-center"
    >
      <v-tooltip location="top">
        <template #activator="{ props }">
          <div class="image-wrapper" v-bind="props">
            <v-img
              :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
              :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
              aspect-ratio="1"
              class="bg-grey-lighten-2"
              cover
            >
              <template #placeholder>
                <v-row
                  align="center"
                  class="fill-height ma-0"
                  justify="center"
                >
                  <v-progress-circular
                    color="grey lighten-5"
                    indeterminate
                  />
                </v-row>
              </template>
            </v-img>

            <div class="hover-actions">
              <!-- View Button -->
              <v-tooltip location="top">
                <template #activator="{ on, attrs }">
                  <v-btn
                    v-bind="attrs"
                    v-on="on"
                    icon
                    color="blue"
                    size="small"
                    @click.stop="viewImage(n)"
                  >
                    <v-icon>mdi-eye</v-icon>
                  </v-btn>
                </template>
                <span>View Image</span>
              </v-tooltip>

              <!-- Delete Button -->
              <v-tooltip location="top">
                <template #activator="{ on, attrs }">
                  <v-btn
                    v-bind="attrs"
                    v-on="on"
                    icon
                    color="red"
                    size="small"
                    @click.stop="deleteImage(n)"
                  >
                    <v-icon>mdi-delete</v-icon>
                  </v-btn>
                </template>
                <span>Delete Image</span>
              </v-tooltip>
            </div>
          </div>
        </template>

        <!-- Tooltip Content: File Info -->
        <div class="pa-2" min-width="180">
          <v-row dense>
            <v-col cols="12">
              <strong>{{ getFileName(n) }}</strong>
            </v-col>
            <v-col cols="12">
              <small>{{ getFileSize(n) }}</small>
            </v-col>
          </v-row>
        </div>
      </v-tooltip>
    </v-col>
  </v-row>
</template>

<script setup>
function viewImage(n) {
  alert(`Viewing image #${n}`);
}

function deleteImage(n) {
  alert(`Deleting image #${n}`);
}

function getFileName(n) {
  return `image_${n}.jpg`;
}

function getFileSize(n) {
  return `${(n * 2.3).toFixed(1)} MB`;
}
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
