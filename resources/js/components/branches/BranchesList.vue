<template>
    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <h3 class="text-4xl font-extrabold dark:text-white">Филиалы</h3>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-100">
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">Название филиала</p>
                            </div>
                        </td>
                        <td class="pl-4">
                            <p class="text-sm leading-none text-gray-600 ml-2">Действия</p>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="branch of branches" :key=branch.id tabindex="0"
                        class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ branch.name }}</p>
                            </div>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <router-link to="/branches/create"
                         class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded"
                         type="button">
                <p class="text-sm font-medium leading-none text-white">Добавить филиал</p>
            </router-link>
        </div>
    </div>
</template>

<script>
import {BranchService} from "../../services/BranchService";

export default {
    name: "BranchesList",

    data: function () {
        return {
            branches: [],
        }
    },
    created: function () {
        this.update()
    },
    methods: {
        update: function () {
            BranchService.getBranches()
                .then(response => this.branches = response.data.branches)
        },
    }
}
</script>
