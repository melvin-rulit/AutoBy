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
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">Адрес филиала</p>
                            </div>
                        </td>
                        <td class="pl-4">
                            <p class="text-sm leading-none text-gray-600 ml-2"></p>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="branch of branches" :key=branch.id tabindex="0"
                        @click="navigateToBranch(branch.id)"
                        class="focus:outline-none h-16 border border-gray-100 rounded cursor-pointer hover:bg-blue-100">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ branch.name }}</p>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ branch.address }}</p>
                            </div>
                        </td>
                        <td class="pl-4">
                            <div class="flex">
                                <button @click="deleteBranch(branch.id, branch.name)" class="text-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none py-2 px-2 rounded hover:bg-red-200 focus:outline-none">
                                    <svg fill="none" height="25" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                    </svg>
                                </button>
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
            errorMessage: null,
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
        navigateToBranch ($branchId){
            this.$router.push({ path: '/branches/' + $branchId});
        },
        deleteBranch ($id, $name){
            const Branch = $name.toUpperCase()
            if (confirm('Вы действительно хотите удалить филиал ' + Branch + '?')) {
                BranchService.delete($id)
                    .then(() => this.update(this.page))
                    .catch(error => this.errorMessage = error.response.data.error)
            }

        }
    }
}
</script>
