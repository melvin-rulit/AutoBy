<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Добавление пользователя</h3>
            <Success :message="message"/>
            <Error :errors="errors"/>
            <form @submit="store">

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Имя" v-model:value="user.first_name" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-100 mb-6 group">
                            <DateInput title="Дата рождения" v-model:value="user.birthday" type="date"/>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Фамилия" v-model:value="user.middle_name" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Номер телефона" v-model:value="user.phone_number" type="text"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Отчество" v-model:value="user.last_name" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Email" v-model:value="user.email" type="email"/>
                    </div>
                </div>


                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Серия паспорта" v-model:value="user.passportSeries" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Номер паспорта" v-model:value="user.passportNumber" type="text"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Адрес регистрации" v-model:value="user.registrationAddress" type="text"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <TextInput title="Кем выдан паспорт" v-model:value="user.passportNotes" type="text"/>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <Select title="Роль" name="roleId" v-model:value="user.roleId" :values="roles"/>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <Select title="Филиал" name="branchId" v-model:value="user.branchId" :values="branches"/>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <TextInput title="Пароль" v-model:value="user.password" type="password"/>
                </div>

                <div class="relative z-0 w-full mb-6 group">
<!--                    <Textarea title="Комментарий" v-model:value="user.comment"/>-->
                </div>


                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <router-link to="/users" type="button"
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
import {BranchService} from "../../services/BranchService";
import TextInput from "../instruments/TextInput.vue";
import Error from "../instruments/Error.vue";
import Success from "../instruments/Success.vue";
import DateInput from "../instruments/DataInput.vue";
import Select from "../instruments/Select.vue";

export default {
    name: "UserCreate",
    components: {Select, DateInput, Success, Error, TextInput},

    data: function () {
        return {
            loading: false,
            user: {
                'first_name': '',
                'middle_name': '',
                'last_name': '',
                'passportSeries': '',
                'passportNumber': '',
                'passportNotes': '',
                'registrationAddress': '',
                'birthday': '',
                'password': '',
                'email': '',
                'comment': '',
                'phone_number': '',
                'roleId': '',
                'branchId': '',
            },
            roles: [],
            branches: [],
            errors: null,
            message: null,
        }
    },
    created() {
        UserService.getRoles().then(response => {this.roles = response.data.roles}).catch(error => {this.errors = error.response.data.message})
        BranchService.getBranches().then(response => {this.branches = response.data.branches}).catch(error => {this.errors = error.response.data.message})
    },
    methods: {
        store: async function (event) {
            event.preventDefault()
            this.errors = null
            UserService.store(this.user)
                .then(response => {
                    this.message = "Пользователь создан"
                    this.user = response.data.user
                    this.$router.push({name: 'listUsers'})
                })
                .catch(error => {
                    this.errors = error.response.data.message
                })
        }
    }
}
</script>
