

require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy'

Vue.use(Buefy);


// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// var app = new Vue({
//     el: '#apphomehia',

// });
// Mouse Hover

$(document).ready(function(){
	$('button.dropdown').hover(function(e) {
		$(this).addClass('is-open');
	});
});
// Mouse Leave
$(document).ready(function(){
	$('button.dropdown').mouseleave(function(e) {
		$(this).removeClass('is-open');
	});
});


