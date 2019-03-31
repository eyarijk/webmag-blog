import Vue from 'vue';
import VueResource from 'vue-resource';
import wysiwyg from "vue-wysiwyg";
import Multiselect from 'vue-multiselect'
import Spinner from 'vue-spinkit'

Vue.use(VueResource);
Vue.use(wysiwyg, {});
Vue.component('multiselect', Multiselect);
Vue.component('Spinner', Spinner);

import Articles from './components/Articles'
import CreateEditArticle from './components/CreateEditArticle'

new Vue({
    el: '#app',
    components: {
        Articles,
        CreateEditArticle,
    }
});
