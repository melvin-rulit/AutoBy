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
                            <p class="text-base leading-none text-gray-600 ml-2 pl-5">Действия</p>
                        </td>
                    </tr>
                    </thead>
                    <tbody>

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
import {ActiveService} from "../../services/ActiveService";
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
    methods: {
        navigateToDeal(id) {
            this.$router.push({path: '/deals/' + id})
        },
        update(){
            this.loading = true
            ActiveService.getActives()
                .then(response => this.actives = response.data.actives)
                .catch(error => this.error = error.response.data.message)
                .finally(() => this.loading = false)
        },
        deleteActive($id, $name) {
            const Deal = $name.toUpperCase()
            if (confirm('Вы действительно хотите удалить Сделку: ' + Deal + '?')) {
                ActiveService.delete($id)
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
