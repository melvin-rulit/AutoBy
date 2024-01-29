<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Добавление сделки</h3>

            <Error :errors="this.error"/>
            <Success :message="this.message"/>

            <form @submit="store">

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Арендополучатель" v-model:value="deal.client_id" :type="clients" :values="clients"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Гражданство арендополучателя" v-model:value="deal.citizenship" type="text"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Тип сделки" v-model:value="deal.type" :values="types"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <DataInput title="Дата/время договора" v-model:value="deal.created_at" type="datetime-local"/>
                    </div>
                </div>


                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Способ оформления сделки" v-model:value="deal.kind" :values="kinds"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Сумма основного долга" v-model:value="deal.remain" step="0.01"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Стоимость аренды" v-model:value="deal.cost_of_rent" step="0.01"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Стоимость выкупа" v-model:value="deal.cost_of_buyout" step="0.01"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <NumberInput title="Срок выкупа (мес)" v-model:value="deal.redemption_period" step="1"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Актив" v-model:value="deal.active_id" :values="activesList"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">

                    </div>

                    <div v-show="deal.kind === 'proxy'" class="relative z-0 w-full mb-6 group">
                        <Select title="Доверенность" v-model:value="deal.proxy_id" :values="proxies"/>
                    </div>
                    <div v-show="this.deal.type === 'credit'" class="relative z-0 w-full group">
                        <NumberInput title="Сумма первоначального взноса" v-model:value="deal.initial" min="0" step="0.01"/>
                    </div>

                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div v-show="deal.kind === 'owner'" class="relative z-0 w-full mb-6 group">
                        <Select title="Арендодатель" v-model:value="deal.owner_id" :values="owners"/>
                    </div>
                    <div v-if="currentUser.role_id === 1" class="relative z-0 w-full mb-6 group">
                        <Select title="Филиал" v-model:value="deal.branch_id" :values="branches"/>
                    </div>
                </div>


                <div class="relative z-0 w-full mb-6 group">
                    <Textarea title="Комментарий" v-model:value="deal.comment"/>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <router-link to="/deals" type="button"
                                 class="text-sm font-semibold leading-6 text-gray-900">Отмена
                    </router-link>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import {UserService} from "../../services/UserService";
import {ClientService} from "../../services/ClientService";
import {BranchService} from "../../services/BranchService";
import {ActiveService} from "../../services/ActiveService";
import {ProxiService} from "../../services/ProxiService";
import NumberInput from '../instruments/NumberInput.vue'
import DataInput from '../instruments/DataInput.vue'
import Textarea from '../instruments/Textarea.vue'
import TextInput from '../instruments/TextInput.vue'
import Select from '../instruments/Select.vue'
import Error from "../instruments/Error.vue";
import Success from "../instruments/Success.vue";

export default {
    name: "DealCreate",
    components:{NumberInput, DataInput, Textarea, TextInput, Select, Error, Success},

    data: function (){
        return {
            loading: false,
            currentUser: {
                role_id: null
            },
            deal: {
                type: null,
                kind: null,
                proxy_id: null,
                owner_id: null,
                branch_id: null,
                client_id: null,
                active_id: null,
                remain: null,
                // create_at: createdAt,
                valid_until: null,
                cost_of_rent: null,
                cost_of_buyout: null,
                initial: null,
                comment: null,
                redemption_period: null,
                citizenship: null,
            },
            types: [],
            branches: [],
            kinds: [],
            proxies: [],
            activesList: [],
            owners: [],
            clients: [],
            message: null,
            errors: null,
        }
    },
    mounted() {
        ClientService.getClients()
            .then(response => {
                const clients = response.data.clients
                let list = []
                clients.forEach(function (value, key) {
                    list.push({'id': Number(value.id), 'name': value.first_name + ' ' + value.last_name})
                })
                this.clients = list
            }).catch(error => this.errors = error)
        UserService.getAdminsList()
            .then(response => {
                const owners = response.data.admins
                let list = []
                owners.forEach(function (value, key) {
                    list.push({'id': Number(value.id), 'name': value.name})
                })
                this.owners = list
            })
            .catch(error => this.errors = error)
        BranchService.dict()
            .then(response => this.branches = response.data.branches)
            .catch(error => this.errors = error)
        ActiveService.getActives()
            .then(response => {
                const actives = response.data.actives
                this.actives = actives
                let list = []
                actives.forEach(function (value, key) {
                    list.push({'id': Number(value.id), 'name': value.name + ' ' + value.reg_number})
                })
                this.activesList = list
            })
            .catch(error => this.errors = error)
        ProxiService.dict()
            .then(response => this.proxies = response.data.proxies)
            .catch(error => this.errors = error)
    },
    methods: {
        store(){

        }
    }
}
</script>

