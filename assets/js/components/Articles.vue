<template>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>Your Articles</h2>
                            </div>
                        </div>

                        <div class="col-md-12" v-for="article in articles">
                            <div class="post post-row">
                                <a class="post-img" :href="article.editLink">
                                    <img :src="article.mainImageUrl" :alt="article.title">
                                </a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category" :style="'background-color:' + article.category.color" href="#">{{ article.category.title }}</a>
                                        <span class="post-date">{{ article.publishedAt }}</span>
                                    </div>
                                    <h3 class="post-title">
                                        <a :href="article.editLink">{{ article.title }}</a>
                                    </h3>
                                    {{ article.shortDescription }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" v-if="paging.current < paging.last || paging.current > 1">
                            <div class="section-row user-articles-nav">
                                <button class="primary-button center-block" type="button" @click="prevPage" v-if="paging.current > 1">
                                    Prev
                                    <span class="countMore">({{ paging.previous * paging.currentItemCount }})</span>
                                </button>

                                <button class="primary-button center-block" type="button" @click="nextPage" v-if="paging.current < paging.last">
                                    NEXT
                                    <span class="countMore">({{ paging.totalCount - paging.lastItemNumber }})</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Articles',
        data () {
            return {
                articles: [],
                paging: {},
                page: 1,
                moreCount: 0,
                // In future use LOCAL STORAGE for JWT
                JWT: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTQwNTMzOTQsImV4cCI6MTU1NDA2MDU5NCwicm9sZXMiOlsiUk9MRV9TVVBFUl9BRE1JTiIsIlJPTEVfVVNFUiJdLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSJ9.eZWFOYqnwzyV08nFozL_SB6KksPY8uzg9cAQcm2YPCeuDmhfzSZw5dzDPpD8ao8D1H1axYz-OKtJEuvr7GEKsE9s43bNiAjgEn_ohV-aFDDMgf0GEj-QXbJaZBcvCrxKMIyn0ZbivAP9hTkq0mJFNAUEA6_8cla538OuKNiRayRN9kuHQMbOVUmJuoyWo1g7HNf4o4dfWrYeUUGqNGTLdRNFE6073wltSH06zevj5QfdlngXbr9uTgkLzdSpKPxF-C2EFihEjzRrHDA9DEHF7okmhybMUWorgtzWsot7KfeyEwQybx2U-WtbPruTOO7zMDHAQJ062NQd563BqOu40g3Jx1BXibeV-4qFQhgn4azj0pgQrKt7b_W85YEjmh1ClWnTotyttzEoytTIzL9udfY71WZmfpUY2tGS8J4MZaj3xtEqKA6G5T0J6Iz6yd04aJL1-gcxNzrGHoOS7ULkxGUE3NVk1apEZL0XKh-aTdUt6FbOcSCqP3PZl5ZdL5eOOvHUamzx8YEYCrI0eGtLOis8vaSM63hJXX3Isq6A4QL3EVUvy9RHH1IMDFmIsMEfGvc09HGv5sSAKIwu5TJQh0JXf8uPD7AAOyvUiBFm_pbfuM-u8QUDjmAT2nfXqqaTiy8i4OyBeES-kjjLSZOyyqdAbdo_ApiRjr0FSQ2Ky4c',
            }
        },
        mounted () {
            this.getArticles();
        },
        methods: {
            getArticles () {
                this.$http.post('/api/articles?page='+this.page, {}, {
                    headers: {
                        Authorization: `Bearer ${this.JWT}`
                    }
                }).then(response => {
                    this.articles = response.body.data.articles;
                    this.paging = response.body.data.paging;
                });
            },
            nextPage () {
                this.page++;
                this.getArticles();
            },
            prevPage () {
                this.page--;
                this.getArticles();
            }
        }
    }
</script>
