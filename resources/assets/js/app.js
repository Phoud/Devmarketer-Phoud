

require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy'
window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

Vue.use(Buefy);

require ('./manage')

Vue.component('slugWidget', require('./components/slugWidget.vue'));

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


