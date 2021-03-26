import Vue from 'vue';
import RouterVue from 'vue-router';
import Vuex from 'vuex';
import Vuelidate from 'vuelidate';
import App from './App';
import HomePage from './pages/HomePage';
import ProductPage from './pages/ProductPage';
import Checkout from './pages/Checkout';
import CheckoutSuccess from './pages/CheckoutSuccess';
import CheckoutFailure from './pages/CheckoutFailure';
import axios from 'axios';

Vue.use(Vuelidate);
Vue.use(RouterVue);
Vue.use(Vuex);
const routes = [
    {
        name: 'home',
        path: '/',
        component: HomePage
    },
    {
        name: 'product-details',
        path: '/product/:slug',
        component: ProductPage
    },
    {
        name: 'checkout',
        path: '/checkout/:slug',
        component: Checkout
    },
    {
        name: 'checkout-success',
        path: '/checkout/success',
        component: CheckoutSuccess
    }, 
    {
        name: 'checkout-failure',
        path: '/checkout/failure',
        component: CheckoutFailure
    }
]

const router = new RouterVue({
    mode:   'history',
    base:   '/',
    fallback:   true,
    routes
});

const store = new Vuex.Store({
    state: {
        products: []
    },
    mutations: {
        SET_PRODUCTS(state, products){
        state.products = products;
        }
    },
    getters: {
        getProductBySlug(state){
            return(slug)=>{
             return   state.products.filter((product)=> product.slug===slug);
            }
        }
    },
    actions: {
      async loadProduct({commit}){
        const response = await axios.get('http://localhost:8000/api/products');
        const dbProducts = response.data.result;
        commit('SET_PRODUCTS', dbProducts);
       } 
    }
});

const app = new Vue({
    router,
    store,
    el:'#app',
    render: h=>h(App)
});