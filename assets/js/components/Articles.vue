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
                JWT: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTQ2NDE1OTAsImV4cCI6MTU1NDY0ODc5MCwicm9sZXMiOlsiUk9MRV9TVVBFUl9BRE1JTiIsIlJPTEVfVVNFUiJdLCJlbWFpbCI6ImFkbWluQGFkbWluLmNvbSJ9.aI-TL2fDI_rRShbuxHB2uNt38y--Quw495RONa4ESvExNJkRzDEj_EyA31LjKwLCLCIrks2QrYpS0Xhn3EAMnS5pgpj0VVhglks2NcIP3E_AatYiPPMeW_ZY3cng8p_kB51rBRs9D5yGXM7X0RKlBiIQ577T-MLNZwkdGmmEQjiagu8EQa1qUIofCWMh95D7BJ14mjyi5Ev7hyrN27ylJnqrf8tcsCA0StIQZPJaQGtSnDSONYIvIhVGxemw_tAKn5jMqMQhULhGO1XJNxs0DnPqlbhfWLJ4U78iErjOS4YOJPKVtZO8RmhE49b4sqAQE9P04ybAAeuNijNaB79MxMcWLCmNHD05H3w38ZtjsncEEL2sHZ2-ECPJohoOm6VLwTGI8Jnk3VhrM3M_jJgbiYa2cOmeyiWKE9-YPC5paZn_N8vJ62wnn0NVSGKeWh9TC4gx6TE2qnN3Dv56N0r_Ts5lg6kguyiremUMx6wq9RnYv16sGnhOOU-vW2wZiQdqiaBMJdTDav0tra3ojP0zLRONCmGUY65j9Tjt2EpQnwOI71rSqCq8sukApBbmcK2MU1T_aQMKRNuz6NzBw0G7cPMXjbpcUc2brAkoJjEDewLrODr-MzNpPVX8ZvMapqfnQoN-kOgYAkVSjk04eSJhLtWaoSBvF3AupS2-_n7N7Gc',
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
