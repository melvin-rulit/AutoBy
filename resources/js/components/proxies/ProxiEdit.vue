<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Редактирование доверенности</h3>
            <Success :message="message"/>
            <Error :errors="errors"/>

            <form @submit="update">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="ФИО представителя" v-model:value="proxi.delegate.id" :values="delegates"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="ФИО собственника" v-model:value="proxi.owner.id" :values="owners"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Номер" v-model:value="proxi.number" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <DataInput title="Дата действия доверенности" v-model:value="proxi.valid_until" type="date"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Кем выдана доверенность" v-model:value="proxi.issued_by" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Зарегистрированной в реестре" v-model:value="proxi.issued_number" type="text"/>
                    </div>
                </div>


                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <router-link to="/proxies" type="button"
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
import {ProxiService} from "../../services/ProxiService";
import {UserService} from "../../services/UserService";
import TextInput from "../instruments/TextInput.vue";
import Error from "../instruments/Error.vue";
import Success from "../instruments/Success.vue";
import DataInput from "../instruments/DataInput.vue";
import Select from "../instruments/Select.vue";

export default {
    name: "ProxiEdit",
    components:{TextInput, Error, Success, DataInput, Select},

    data: function (){
        return {

            proxi: {
                id: this.$route.params.id,
                delegate: {
                    id: null
                },
                owner: {
                    id: null
                },
                number: null,
                valid_until: null,
                issued_by: null,
                issued_number: null,
            },
            delegates: [],
            owners: [],
            message: null,
            errors: null,

        }
    },
    mounted() {
        UserService.getManagersList()
            .then(response => this.delegates = response.data.managers)
        UserService.getAdminsList()
            .then(response => this.owners = response.data.admins)
        ProxiService.getById(this.proxi.id)
            .then(response => this.proxi = response.data.proxi)
    },
    methods: {
        update: async function (event) {
            event.preventDefault()
            this.errors = null
            ProxiService.update(this.proxi)
                .then(response => {
                    this.proxi = response.data.proxi
                    this.message = 'Доверенность обновлена'
                })
                .catch(error => {
                    this.errors = error.response.data.message
                })
        }
    }
}
</script>


