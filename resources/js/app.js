import './bootstrap';

import {createApp} from 'vue'
import {createRouter, createWebHashHistory} from 'vue-router'

import App from "./components/App.vue";
import UserList from "./components/users/UserList.vue";
import BranchList from "./components/branches/BranchesList.vue"

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
        }
    ]
})

createApp(App).use(router).mount('#app')
