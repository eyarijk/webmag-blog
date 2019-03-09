<template>
   <div>
       <div class="form-group">
           <label for="title">Title</label>
           <input type="text" class="form-control" id="title" placeholder="Title">
       </div>
       <div class="form-group">
           <label for="category">Category</label>
           <multiselect id="category" :multiple="false" track-by="title" label="title" v-model="formData.category" :options="categories"></multiselect>
       </div>
       <div class="form-group">
           <label for="tags_list">Tags</label>
           <multiselect id="tags_list" track-by="title" label="title" v-model="formData.tags" :multiple="true" :taggable="true" :options="tags"></multiselect>
       </div>
       <div class="form-check">
           <input class="form-check-input" type="checkbox" id="isEnabled" v-model="formData.isEnabled">
           <label class="form-check-label" for="isEnabled">
              Is Enabled
           </label>
       </div>
       <div class="form-check">
           <input class="form-check-input" type="checkbox" id="isMain" v-model="formData.isMain">
           <label class="form-check-label" for="isMain">
               Is Main
           </label>
       </div>
       <input type="file" @change="fileSelected">
       <button type="submit" class="btn btn-default" @click="persistUpdate">Submit</button>
   </div>
</template>

<script>

    export default {
        name: "example",
        components: {

        },
        data () {
            return {
                categories: [],
                tags: [],
                formData: {
                    category: null,
                    tags:[],
                    isEnabled: false,
                    isMain: false,
                    description: null,
                },
                uploadImage: null,
            }
        },
        mounted () {
            this.$http.get('/api/v1/tags/active').then(response => {
                this.tags = response.body.data.tags;
            });

            this.$http.get('/api/v1/categories/active').then(response => {
                this.categories = response.body.data.categories;
            });
        },
        methods: {
            persistUpdate () {
                console.log("Save");
            },
            uploadFile () {
                let formData = new FormData();

                formData.append('image', this.uploadImage);

                this.$http.post('/api/v1/uploadFile',formData).then(response => {
                    console.log(response);
                });
            },
            fileSelected: function($event) {
                this.uploadImage = $event.target.files[0]
            }
        }
    }
</script>

