<template>

    <Error :errors="this.error"/>
    <Success :message="this.message"/>

    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <h3 class="text-4xl font-extrabold dark:text-white">Сделки</h3>
            <div class="mt-7 overflow-x-auto">

                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-100 border">
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Дата платежа</p>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Источник финансирования</p>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Актив</p>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base leading-none text-gray-600 ml-2">Клиент</p>
                            </div>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Остаток ОД</p>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Аренда</p>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Выкуп</p>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Дата окончания страховки</p>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base leading-none text-gray-600 ml-2">Дата заключения договора</p>
                            </div>
                        </td>
                        <td class="">
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5"></p>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="deal of deals" :key=deal.id tabindex="0"
                        class="focus:outline-none h-16 border border-gray-100 rounded cursor-pointer hover:bg-blue-100"
                      >
                        <td>
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ deal.nextPayday }}</p>
                            </div>
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
<!--                                <p class="text-sm leading-none text-gray-600 ml-2">{{ deal.active.investor.name }}</p>-->
                            </div>
                        </td>

                        <td class="">
<!--                            <div class="flex items-center pl-5">-->
<!--                                <p class="text-sm leading-none text-gray-600 ml-2">{{ deal.active.model }}-->
<!--                                    ({{ deal.active.regNumber }})</p>-->
<!--                            </div>-->
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
<!--                                <p v-if="deal.client" class="text-sm leading-none text-gray-600 ml-2">{{ deal.client.fullName }}</p>-->
<!--                                <p v-else class="text-sm leading-none text-gray-600 ml-2"> Удален </p>-->
                            </div>
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
<!--                                <p class="text-sm leading-none text-gray-600 ml-2">{{ realRemain(deal) }}</p>-->
                            </div>
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ deal.cost_of_rent}}</p>
                            </div>
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ deal.cost_of_buyout }}</p>
                            </div>
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
<!--                                <p class="text-sm leading-none text-gray-600 ml-2">{{ deal.active.osagoPrintable }}</p>-->
                            </div>
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
<!--                                <p class="text-sm leading-none text-gray-600 ml-2">{{ deal.createdAtPrintable }}</p>-->
                            </div>
                        </td>
                        <td class="pl-4">
                            <div class="flex">

                                <button @click="deleteDeal(deal.id)" class="text-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none py-2 px-2 rounded hover:bg-red-200 focus:outline-none">
                                    <svg fill="none" height="25" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                    </svg>
                                </button>

                                <button @click="archiveDeal(deal.id)"
                                        class="text-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700 text-sm leading-none py-2 px-2 rounded hover:bg-green-200 focus:outline-none">
                                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 2.5c.651 0 .977 0 1.241.083a1.8 1.8 0 0 1 1.176 1.176c.083.264.083.59.083 1.241v11.62c0 1.008 0 1.512-.196 1.897a1.8 1.8 0 0 1-.787.787c-.385.196-.889.196-1.897.196H6.38c-1.008 0-1.512 0-1.897-.196a1.8 1.8 0 0 1-.787-.787c-.196-.385-.196-.889-.196-1.897V5c0-.651 0-.977.083-1.241A1.8 1.8 0 0 1 4.76 2.583C5.023 2.5 5.349 2.5 6 2.5"
                                            stroke="#222"/>
                                        <path
                                            d="M20.5 12.5h-2.558c-.696 0-1.044 0-1.306.189-.262.188-.372.518-.592 1.178l-.088.265c-.22.66-.33.99-.592 1.18-.262.188-.61.188-1.306.188H9.943c-.696 0-1.044 0-1.306-.189-.262-.188-.372-.518-.592-1.178l-.088-.265c-.22-.66-.33-.99-.592-1.18-.262-.188-.61-.188-1.306-.188H3.5m12.667 1H7.833m12.667-6h-2.558c-.696 0-1.044 0-1.306.189s-.372.519-.592 1.179l-.088.264c-.22.66-.33.99-.592 1.18-.262.188-.61.188-1.306.188H9.943c-.696 0-1.044 0-1.306-.189-.262-.188-.372-.519-.592-1.179l-.088-.264c-.22-.66-.33-.99-.592-1.18-.262-.188-.61-.188-1.306-.188H3.5m12.667 1H7.833m10.667-6h-.558c-.696 0-1.044 0-1.306.189s-.372.519-.592 1.179l-.088.264c-.22.66-.33.99-.592 1.18-.262.188-.61.188-1.306.188H9.943c-.696 0-1.044 0-1.306-.189s-.372-.519-.592-1.179l-.088-.264c-.22-.66-.33-.99-.592-1.18-.262-.188-.61-.188-1.306-.188H5.5m10.667 1H7.833"
                                            stroke="#222"/>
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="sm:flex items-center justify-between">
                <router-link to="/deals/create"
                             class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Добавить сделку</p>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import Error from "../instruments/Error.vue";
import Success from "../instruments/Success.vue";
import {DealService} from "../../services/DealService";
export default {
    name: "DealList",
    components: {Error, Success},

    data: function () {
        return {
            deals: [],
            loading: false,
            error: null,
            message: null,
        }
    },
    created() {
        this.update()
    },
    methods: {
        navigateToDeal(id) {
            this.$router.push({path: '/deals/' + id})
        },
        update(){
            this.loading = true
            DealService.getDeals()
                .then(response => this.deals = response.data.deals)
                .catch(error => this.error = error.response.data.message)
                .finally(() => this.loading = false)
        },
        deleteActive($id, $name) {
            const Deal = $name.toUpperCase()
            if (confirm('Вы действительно хотите удалить Сделку: ' + Deal + '?')) {
                DealService.delete($id)
                    .then(response => {
                        this.message = 'Сделка: ' + Deal + ' была успешно удалена'
                        this.$router.push({name: 'listActive'})
                    })
                    .catch(error => this.error = error.response.data.error)
            }
        },
    }
}
</script>

<style scoped>

</style>
