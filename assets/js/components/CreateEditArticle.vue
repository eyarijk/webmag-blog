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
        name: 'CreateEditArticle',
        props: ['slug'],
        data () {
            return {
                categories: [],
                tags: [],
                article: {
                    title: null,
                    category: null,
                    tags: [],
                    isEnabled: false,
                    isMain: false,
                    description: null,
                    shortDescription: null,
                    mainImage: null,
                    headerImage: null,
                },
                uploadImagePath: '',
                preloader: false,
                // In future use LOCAL STORAGE for JWT
                headersForResource: {
                    'Authorization': `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTQwNTMzOTQsImV4cCI6MTU1NDA2MDU5NCwicm9sZXMiOlsiUk9MRV9TVVBFUl9BRE1JTiIsIlJPTEVfVVNFUiJdLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSJ9.eZWFOYqnwzyV08nFozL_SB6KksPY8uzg9cAQcm2YPCeuDmhfzSZw5dzDPpD8ao8D1H1axYz-OKtJEuvr7GEKsE9s43bNiAjgEn_ohV-aFDDMgf0GEj-QXbJaZBcvCrxKMIyn0ZbivAP9hTkq0mJFNAUEA6_8cla538OuKNiRayRN9kuHQMbOVUmJuoyWo1g7HNf4o4dfWrYeUUGqNGTLdRNFE6073wltSH06zevj5QfdlngXbr9uTgkLzdSpKPxF-C2EFihEjzRrHDA9DEHF7okmhybMUWorgtzWsot7KfeyEwQybx2U-WtbPruTOO7zMDHAQJ062NQd563BqOu40g3Jx1BXibeV-4qFQhgn4azj0pgQrKt7b_W85YEjmh1ClWnTotyttzEoytTIzL9udfY71WZmfpUY2tGS8J4MZaj3xtEqKA6G5T0J6Iz6yd04aJL1-gcxNzrGHoOS7ULkxGUE3NVk1apEZL0XKh-aTdUt6FbOcSCqP3PZl5ZdL5eOOvHUamzx8YEYCrI0eGtLOis8vaSM63hJXX3Isq6A4QL3EVUvy9RHH1IMDFmIsMEfGvc09HGv5sSAKIwu5TJQh0JXf8uPD7AAOyvUiBFm_pbfuM-u8QUDjmAT2nfXqqaTiy8i4OyBeES-kjjLSZOyyqdAbdo_ApiRjr0FSQ2Ky4c`
                },
            }
        },
        mounted () {
            this.$http.get('/api/tags/active', { headers:this.headersForResource }).then(response => {
                this.tags = response.body.data.tags;
            });

            this.$http.get('/api/categories/active', { headers:this.headersForResource }).then(response => {
                this.categories = response.body.data.categories;
            });

            if (this.slug !== null) {
                this.$http.get(`/api/articles/${this.slug}`, { headers:this.headersForResource }).then(response => {
                    this.article = response.body.data.article;
                    this.uploadImagePath = response.body.data.publicPath;
                });
            }
        },
        methods: {
            persistUpdate () {
                this.$http.post('/api/articles/persist-update', { article:this.article }).then(response => {
                    console.log(response);
                });
            },
            uploadFile ($event,key) {
                let formData = new FormData();

                formData.append('image', $event.target.files[0]);

                this.$http.post('/api/articles/image-upload', formData, { headers:this.headersForResource }).then(response => {
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

