/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

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

function searchCEP(ev){
    console.log(ev)
    console.log(`https://viacep.com.br/ws/${ev.value}/json`)
    axios.get(`https://viacep.com.br/ws/${ev.value}/json`).then(end=>{
        document.querySelector('#rua').value = end.data.logradouro
        console.log(end)
    }).catch(error=>
        console.log(error))
};
function alterarProduto(nome,tipo){
    const input = document.querySelector(`#${tipo}-${nome}`);
    input.removeAttribute('readonly');
    input.focus(); 
    input.addEventListener('blur',()=>{
        input.setAttribute('readonly','readonly');
        }
    )

}
function confirmarProduto(nome,tipo){
    const input = document.querySelector(`#${tipo}-${nome}`);
    input.removeAttribute('readonly');

}
function cancelarProduto(nome,value,tipo){
    const input = document.querySelector(`#${tipo}-${nome}`);
    input.value=value
}
window.alterarProduto = alterarProduto;
window.confirmarProduto = confirmarProduto;
window.cancelarProduto = cancelarProduto;
window.searchCEP = searchCEP;