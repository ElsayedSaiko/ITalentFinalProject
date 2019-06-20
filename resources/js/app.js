
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

const app = new Vue({
    el: '#app'
});

// var postId = 0;
//         var postBodyElement = null;
//        $('.like').on('click', function(event){
//             event.preventDefault();
//             postId = event.target.parentNode.parentNode.dataset['postid'];
//             var isLike = event.target.previousElementSibling = null;
//             $.ajax({
//                 method : 'POST',
//                 url : urlLike,
//                 data: {isLike : isLike, postId: postId, urlLike, _token: token}
//             }).done(function(){
//                 event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
//             if (isLike) {
//                 event.target.nextElementSibling.innerText = 'Dislike';
//             } else {
//                 event.target.previousElementSibling.innerText = 'Like';
//             }
//             });
//         });
