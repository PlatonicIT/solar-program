
require('./bootstrap');
window.Vue = require('vue');


const app = new Vue({
    el: '#app',
	  data(){
        return{
            txt:'this is test'
        }
    }

});
