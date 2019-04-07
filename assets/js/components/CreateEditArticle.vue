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
                    'Authorization': `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTQ2NjU0MDIsImV4cCI6MTU1NDY3MjYwMiwicm9sZXMiOlsiUk9MRV9TVVBFUl9BRE1JTiIsIlJPTEVfVVNFUiJdLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSJ9.n7b95R6AMrbs2wiQfslCh-hnTkgZMP4TIFI2MFLruuMxuhONWvwrMmS1gYyaf7jAKs4dCxhE_zNib6Bi1AOIJ1h7RzoU0pQ7tBrwYbij0DMOV-8VI_yaKHla4Uc5d72JE4KWIpaXvkZBIPqUQfd31ZTTUQcKynljN_iuAfniS_wZAFgJNqTwAe1oS34hUimw3thheFa3CMf9N_bTKQ2-eJyRGwzUFJP7kZsS5rSgHm4s9rP8aXZLKBDyx0xtPIwzcnPOMS-mBSdm6vnHnjwdfttj-_iwri3lMl3ozK67NZSMbXW3tNAVGxJRRFZ-z86gEXYzGDYYThMD2BbvYuGPKIb5C_ma8xdWFaVIMwi9z2S_OtxeXbdrN-iLPufvY61X7KuQ9R3l_hxkXVkN7D9CEmdFja4p3BlVjlTrXucffRv47cfxIqF1e8KsiC0cyWioZMUZgDsI1BldY-GgIl-Qbim_cu9X80jD209sQX9l3QofcKPv0f2DQqRhPYXKZqI0Ol9I__9VfXh5ntjRCzXdiUIIblf7nDS-dlIu49qg5gQR7ktPIftvEQUyVT5X3N_QR9Sj0fGvuxzsLRVpaKTfdLhNQ2vaSaZJ3O8WXXhNbd2b1uf3-L0jYhXa6XL3yuz8-VFkeIpB6aKx45GiKdaf7y07P-UmCoXnnwAzRkSPEjY`
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
                this.$http.post('/api/articles', this.article, { headers:this.headersForResource }).then(response => {
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

