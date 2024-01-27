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

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="proxi of proxies" :key=proxi.id tabindex="0"
                        @click="navigateToProxi(proxi.id)"
                        class="focus:outline-none h-16 border border-gray-100 rounded cursor-pointer hover:bg-blue-100">
                        <td class="">
                            <div class="flex items-center pl-5">
<!--                                <p class="text-sm font-medium leading-none text-gray-700 mr-2">{{ proxi.delegate.name }}</p>-->
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxi.owner.name }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxi.number }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxi.valid_until }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ proxi.issued_by }}</p>
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
        navigateToProxi (id){
            this.$router.push({path: '/proxies/' + id})
        },
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

