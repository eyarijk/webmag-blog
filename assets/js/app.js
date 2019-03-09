import Vue from 'vue';
import VueResource from 'vue-resource';
import wysiwyg from "vue-wysiwyg";

import Multiselect from 'vue-multiselect'

Vue.use(VueResource);
Vue.use(wysiwyg, {});

Vue.component('multiselect', Multiselect);

import example from './components/Example'

new Vue({
    el: '#app',
    components: {
        example,
    }
});
