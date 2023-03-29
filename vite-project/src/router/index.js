import {createRouter, createWebHistory} from 'vue-router'
import Main from '../views/Main.vue'

const routes = [
    {
        path: '/',
        name: 'Main',
        component: Main
    },
    {
        path: '/items/:id',
        name: 'ItemDetail',
        component: () => import('../views/ItemDetail.vue')
    },
    {
        path: '/cart',
        name: 'Cart',
        component: () => import('../views/Cart.vue')
    },
];
 
const router = createRouter({
    history: createWebHistory(),
    routes
});
 
export default router;