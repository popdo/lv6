/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// import postEditBar from './components/post/_edit_btn.vue';
Vue.component('post-edit-bar', require('./components/post/_edit_btn.vue').default);
// import msgBox from './components/msg/msg.vue';

// const app = new Vue({
//     el: '#app',
//     name:'app',
//     components:{
//         'msg-box':msgBox,
//         'post-edit-bar':postEditBar
//     },
// });

// 代码高亮 --------------------------------

// 基础库
// import hljs from 'highlight.js/lib/highlight';

// // javascript
// import javascript from 'highlight.js/lib/languages/javascript';
// hljs.registerLanguage('javascript', javascript);
// // php
// import php from 'highlight.js/lib/languages/php';
// hljs.registerLanguage('php', php);
// // css
// import css from 'highlight.js/lib/languages/css';
// hljs.registerLanguage('css', css);
// // html、xml
// import xml from 'highlight.js/lib/languages/xml';
// hljs.registerLanguage('xml', xml);
// // 风格样式库
// import 'highlight.js/styles/agate.css';
// // 初始化
// hljs.initHighlightingOnLoad();

require('./prism');
import './prism.css';