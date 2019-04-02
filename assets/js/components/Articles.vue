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
                JWT: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTQyMzczNzYsImV4cCI6MTU1NDI0NDU3Niwicm9sZXMiOlsiUk9MRV9TVVBFUl9BRE1JTiIsIlJPTEVfVVNFUiJdLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSJ9.ZM3PDPFgMdW0zAaglIaHGSFmw97P5kX3RuLzfzkxMCvkES4XFDkUOSqzdkJYt5PFJDvxmAAHXLdxU7OHh8z8WldVK1n_J3x4pWAJRN81W2Zh7WdHqytzGhdO3YXLpdJ-LLa7NnBZoicPsWWhmlZVRvlB9I79vLkZN3l6gG1dsMFE-7_fSjduxAi5PWOoL59UcEZQ9cW_0kzkXyytLKN_o7Bx1JnuQmfz7g7AyixegWBul7coTAxymdnkX0A5JAvUYlqR8dN7bQKJKpYLMCJXj2iKIE5bfDerw1HKIDnZsLuWxf3Dr2b8_HjslfUB8v_kr05UKZLK1F9rCkOnMNSfG0lHQMDJhT_iVQGjTrLhK0H1YDvO1kspwsAGbzehnT4pOtYex0HK9-sAfZLwL35c3NwwO4R1xpF5ycsAuQ_UjcAjpmj4Q2xcqi52TqGbbgehlnK1HO9H-LUcx2FxY9gluHz3FHsHrdGFValtEu2gyV6idxT6RnKTl1zU_jTRyQ9BGOQWdWYt5XP4tgq4RyRjqxcTYIsaiq7l0WFcpPIgwOyLc46-C8rxUiJBTuequNXMen_V4OVwsQolfYUyVu6QMeaQTDF3JmcvkZypGyInE_RDcXSZjwcGNVtYckTXwYFezXCGbfLRrHc6pdCKbZsIor4hyKb9LGF8bVSne-maMjw',
            }
        },
        mounted () {
            this.getArticles();
        },
        methods: {
            getArticles () {
                this.$http.get(`/api/articles?page=${this.page}`, {
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
