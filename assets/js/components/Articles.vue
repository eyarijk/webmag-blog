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
                JWT: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTQ2NjU0MDIsImV4cCI6MTU1NDY3MjYwMiwicm9sZXMiOlsiUk9MRV9TVVBFUl9BRE1JTiIsIlJPTEVfVVNFUiJdLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSJ9.n7b95R6AMrbs2wiQfslCh-hnTkgZMP4TIFI2MFLruuMxuhONWvwrMmS1gYyaf7jAKs4dCxhE_zNib6Bi1AOIJ1h7RzoU0pQ7tBrwYbij0DMOV-8VI_yaKHla4Uc5d72JE4KWIpaXvkZBIPqUQfd31ZTTUQcKynljN_iuAfniS_wZAFgJNqTwAe1oS34hUimw3thheFa3CMf9N_bTKQ2-eJyRGwzUFJP7kZsS5rSgHm4s9rP8aXZLKBDyx0xtPIwzcnPOMS-mBSdm6vnHnjwdfttj-_iwri3lMl3ozK67NZSMbXW3tNAVGxJRRFZ-z86gEXYzGDYYThMD2BbvYuGPKIb5C_ma8xdWFaVIMwi9z2S_OtxeXbdrN-iLPufvY61X7KuQ9R3l_hxkXVkN7D9CEmdFja4p3BlVjlTrXucffRv47cfxIqF1e8KsiC0cyWioZMUZgDsI1BldY-GgIl-Qbim_cu9X80jD209sQX9l3QofcKPv0f2DQqRhPYXKZqI0Ol9I__9VfXh5ntjRCzXdiUIIblf7nDS-dlIu49qg5gQR7ktPIftvEQUyVT5X3N_QR9Sj0fGvuxzsLRVpaKTfdLhNQ2vaSaZJ3O8WXXhNbd2b1uf3-L0jYhXa6XL3yuz8-VFkeIpB6aKx45GiKdaf7y07P-UmCoXnnwAzRkSPEjY',
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
