<template>
    <div>
        <v-file-input prepend-icon="" v-model="selected_file" @change="handleUploadImage()" prepend-inner-icon="mdi-image" label="File input"></v-file-input>
    </div>
</template>
<script>
import http from '@/http.config'
export default {
    data() {
        return {
            selected_file: null,
        }
    },
    methods: {
        handleUploadImage() {

            const formData = new FormData();
            formData.append('image', this.selected_file);

            return http.post('/admin/gallery-upload', formData)
                .then(response => {
                    // return response;
                    if (response) {
                        return response; // must return URL string here!
                    }
                    return Promise.reject('Upload failed');
                })
                .catch(err => {
                    console.error('Upload error:', err);
                    return Promise.reject(err);
                });
        },
    }
}
</script>
