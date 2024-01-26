import './bootstrap';
import 'flowbite';

import {createApp} from 'vue'
import {createRouter, createWebHashHistory} from 'vue-router'

import App from "./components/App.vue";
import UserList from "./components/users/UserList.vue";
import UserCreate from "./components/users/UserCreate.vue";
import UserEdit from "./components/users/UserEdit.vue";
import BranchList from "./components/branches/BranchesList.vue";
import BranchCreate from "./components/branches/BranchCreate.vue";
import BranchEdit from "./components/branches/BranchEdit.vue";
import ClientList from "./components/clients/ClientList.vue";
import ClientCreate from "./components/clients/ClientCreate.vue";
import ClientEdit from "./components/clients/ClientEdit.vue";

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/',
            component: UserList
        },
        {
            name: 'listUsers',
            path: '/users',
            component: UserList
        },
        {
            name: 'createUsers',
            path: '/users/create',
            component: UserCreate
        },
        {
            name: 'updateUser',
            path: '/users/:id',
            component: UserEdit
        },
        {
            name: 'listBranches',
            path: '/branches',
            component: BranchList
        },
        {
            name: 'createBranch',
            path: '/branches/create',
            component: BranchCreate
        },
        {
            name: 'updateBranch',
            path: '/branches/:id',
            component: BranchEdit
        },
        {
            name: 'listClient',
            path: '/clients',
            component: ClientList
        },
        {
            name: 'createClient',
            path: '/clients/create',
            component: ClientCreate
        },
        {
            name: 'updateClient',
            path: '/clients/:id',
            component: ClientEdit
        }
    ],

    linkActiveClass: 'bg-gray-200'
})

createApp(App).use(router).mount('#app')
