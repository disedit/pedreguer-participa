require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import ContentfulVue from 'contentful-vue';
 
import PostList from './components/pmus/PostList';
import PostSingle from './components/pmus/PostSingle';

Vue.use(VueRouter);
Vue.use(ContentfulVue, {
  space: process.env.MIX_CONTENTFUL_SPACE_ID,
  accessToken: process.env.MIX_CONTENTFUL_ACCESS_TOKEN
});

const router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/pmus', component: PostList },
    { path: '/pmus/:slug', component: PostSingle },
  ],
});

const app = new Vue({
  el: '#posts',
  router,
  template: '<router-view />',
});
