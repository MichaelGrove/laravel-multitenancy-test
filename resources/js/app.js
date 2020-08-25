import Vue from 'vue';
import router from './router';
import App from './App.vue'

console.log(router)

new Vue({
	router,
	render: h => h(App)
}).$mount('#app')
