<template>
    <Error :errors="error"/>
    <Success :message="message"/>
    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <h3 class="text-4xl font-extrabold dark:text-white">Доверенности</h3>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-100 border">
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base leading-none text-gray-700 mr-2">ФИО представителя</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base leading-none text-gray-600 ml-2">ФИО собственника</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base leading-none text-gray-600 ml-2">Номер доверенности</p>
                            </div>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Дата действия доверенности</p>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Кем выдана доверенность</p>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5"></p>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="proxy of proxies" :key=proxy.id tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm font-medium leading-none text-gray-700 mr-2">{{ proxy.delegate.name }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxy.owner.name }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxy.number }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxy.validUntil }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxy.issuedBy }}</p>
                            </div>
                        </td>
                        <td class="pl-4">
                            <div class="flex">
                                <router-link :to="{path: '/proxies/' + proxy.id}" class="text-grey-700 focus:ring-2 focus:ring-offset-2 focus:ring-grey-300 text-sm leading-none py-2 px-2 rounded hover:bg-grey-200 focus:outline-none flex items-center">
                                    <svg fill="none" height="25" width=25 stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path>
                                    </svg>
                                </router-link>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="sm:flex items-center justify-between">
                <router-link to="/proxies/create" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Добавить доверенность</p>
                </router-link>
            </div>
        </div>
    </div>

</template>

<script>
import {ProxiService} from "../../services/ProxiService";
import Spinner from "../instruments/Spinner.vue";
import Success from "../instruments/Success.vue";
import Error from "../instruments/Error.vue";

export default {
    name: "ProxiList",
    components: {Spinner, Success, Error},

    data: function () {
      return {
          proxies: [],
          message: null,
          error: null,
      }
    },
    created: async function () {
        this.update()
    },
    methods: {
        update: function () {
            this.loading = true;
            ProxiService.getProxies(this.query)
                .then(response => this.proxies = response.data.proxies)
                .catch(error => this.error = error)
                .finally(() => this.loading = false)
        }
    },
}

</script>

