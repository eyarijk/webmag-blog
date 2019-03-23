<template>
   <div>
       <h1>{{ article.title }}</h1>
       <form @submit.prevent="persistUpdate" enctype="multipart/form-data">
           <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" v-model="article.title" id="title" placeholder="Title">
           </div>
           <div class="form-group">
               <label for="category">Category</label>
               <multiselect id="category" :multiple="false" track-by="title" label="title" v-model="article.category" :options="categories"></multiselect>
           </div>
           <div class="form-group">
               <label for="tags_list">Tags</label>
               <multiselect id="tags_list" track-by="title" label="title" v-model="article.tags" :multiple="true" :taggable="true" :options="tags"></multiselect>
           </div>
           <div class="form-group">
               <label for="shortDescription">Short Description</label>
               <textarea name="shortDescription" class="form-control" id="shortDescription" v-model="article.shortDescription" placeholder="Short Description" rows="3"></textarea>
           </div>
           <div class="form-group">
               <label for="shortDescription">Description</label>
               <wysiwyg v-model="article.description"></wysiwyg>
           </div>
           <div class="form-check">
               <input class="form-check-input" type="checkbox" id="isMain" v-model="article.isMain">
               <label class="form-check-label" for="isMain">
                   Is Main
               </label>
           </div>
           <div class="form-check">
               <input class="form-check-input" type="checkbox" id="isEnabled" v-model="article.isEnabled">
               <label class="form-check-label" for="isEnabled">
                   Is Enabled
               </label>
           </div>
           <div class="section-images">
               <div class="images-block">
                   <h3 class="block-title">Main Image</h3>
                   <div class="images-create" v-if="article.mainImage">
                       <div class="image-holder">
                           <img :src="uploadImagePath + '/' + article.mainImage.name" :alt="article.mainImage.name">
                           <p class="remove-image">
                               <span @click="article.mainImage = null">Delete</span>
                           </p>
                       </div>
                   </div>
                   <div v-else>This article does not have main images.</div>
                   <label for="mainImage">Add image</label>
                   <input type="file" id="mainImage" @change="uploadFileMainImage" accept="image/*">
               </div>
               <div class="images-block">
                   <h3 class="block-title">Header Image</h3>
                   <div class="images-create" v-if="article.headerImage">
                       <div class="image-holder">
                           <img :src="uploadImagePath + '/' + article.headerImage.name" :alt="article.headerImage.name">
                           <p class="remove-image">
                               <span @click="article.headerImage = null">Delete</span>
                           </p>
                       </div>
                   </div>
                   <div v-else>This article does not have header images.</div>
                   <label for="headerImage">Add header image</label>
                   <input type="file" id="headerImage" @change="uploadFileHeaderImage" accept="image/*">
               </div>
           </div>
           <button type="submit" class="btn btn-default">Submit</button>
       </form>
   </div>
</template>

<script>

    export default {
        name: "CreateEditArticle",
        data () {
            return {
                categories: [],
                tags: [],
                article: {
                    title: null,
                    category: null,
                    tags:[],
                    isEnabled: false,
                    isMain: false,
                    description: null,
                    shortDescription: null,
                    mainImage: null,
                    headerImage: null,
                },
                uploadImagePath: '',
                preloader: false,
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
                this.$http.post('/api/v1/articles/persist-update',{ article:this.article }).then(response => {
                    console.log(response);
                });
            },
            uploadFile ($event,key) {
                let formData = new FormData();

                formData.append('image', $event.target.files[0]);

                this.$http.post('/api/v1/articles/image-upload', formData).then(response => {
                    this.article[key] = response.body.data.article_image;
                    this.uploadImagePath = response.body.data.prefix_url;
                });
            },
            uploadFileMainImage ($event) {
                this.uploadFile($event, 'mainImage');
            },
            uploadFileHeaderImage ($event) {
                this.uploadFile($event, 'headerImage');
            },
        }
    }
</script>

