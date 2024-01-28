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

import ProxiList from "./components/proxies/ProxiList.vue";
import ProxiCreate from "./components/proxies/ProxiCreate.vue";
import ProxiEdit from "./components/proxies/ProxiEdit.vue";

import ActiveList from "./components/actives/ActiveList.vue";
import ActiveCreate from "./components/actives/ActiveCreate.vue";
import ActiveEdit from "./components/actives/ActiveEdit.vue";

import DealList from "./components/deals/DealList.vue";
import DealCreate from "./components/deals/DealCreate.vue";
import DealEdit from "./components/deals/DealEdit.vue";

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
        },
        {
            name: 'listProxi',
            path: '/proxies',
            component: ProxiList
        },
        {
            name: 'createProxi',
            path: '/proxies/create',
            component: ProxiCreate
        },
        {
            name: 'updateProxi',
            path: '/proxies/:id',
            component: ProxiEdit
        },
        {
            name: 'listActive',
            path: '/actives',
            component: ActiveList
        },
        {
            name: 'createActive',
            path: '/actives/create',
            component: ActiveCreate
        },
        {
            name: 'updateActive',
            path: '/actives/:id',
            component: ActiveEdit
        },
        {
            name: 'listDeal',
            path: '/deals',
            component: DealList
        },
        {
            name: 'createDeal',
            path: '/deals/create',
            component: DealCreate
        },
        {
            name: 'updateDeal',
            path: '/deals/:id',
            component: DealEdit
        }
    ],

    linkActiveClass: 'bg-gray-200'
})

createApp(App).use(router).mount('#app')
