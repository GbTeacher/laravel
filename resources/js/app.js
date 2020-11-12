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
    el: '#app',
});

let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let deleteButtons = document.querySelectorAll('.delete-button');

for (let deleteButton of deleteButtons) {
    deleteButton.addEventListener('click', deleteHandler);
}

async function deleteHandler(event) {
    event.preventDefault();

    let answer = confirm("Вы точно хотите удалить сущность?");

    if (answer) {
        let response = await fetch('/admin/' + this.dataset.type + '/' + this.dataset.id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        });

        let result = await response.json();

        if (result.status) {
            location.reload();
        }
    }
}
