import './bootstrap';
import 'flowbite';

import {createApp} from 'vue'
import {createRouter, createWebHashHistory} from 'vue-router'

import App from "./components/App.vue";
import UserList from "./components/users/UserList.vue";
import BranchList from "./components/branches/BranchesList.vue"
import BranchCreate from "./components/branches/BranchCreate.vue"

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
            name: 'listBranches',
            path: '/branches',
            component: BranchList
        },
        {
            name: 'createBranch',
            path: '/branches/create',
            component: BranchCreate
        }
    ],

    linkActiveClass: 'bg-gray-200'
})

createApp(App).use(router).mount('#app')
