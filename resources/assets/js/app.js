
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('verify-human', require('./components/VerifyHuman.vue'));

const app = new Vue({
    el: '#app'
});

const toggleNavClass = e => { 
    const $navbar = $(".navbar")
    if($('.main-banner.main-banner__front').length > 0) { 
        if ($(window).scrollTop() > 100) { 
            $navbar.removeClass("bg-transparent")
            $navbar.removeClass("navbar-dark")
            $navbar.addClass("navbar-light")
        } else { 
            $navbar.addClass("bg-transparent")
            $navbar.removeClass("navbar-light")
            $navbar.addClass("navbar-dark")
        } 
    } 
}
(_ => {
    $(document).ready(toggleNavClass)
    $(window).on("scroll ready", toggleNavClass)

    window.addEventListener('DOMContentLoaded', e => {
        Prism.highlightAll()
        $('#app > .alert').not('.alert-important').delay(3000).fadeOut(350);
    })
})()