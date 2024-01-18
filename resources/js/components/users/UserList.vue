<template>

    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <h3 class="text-4xl font-extrabold dark:text-white">Пользователи</h3>
            <div class="mt-7 overflow-x-auto">

                <table class="w-full whitespace-nowrap">

                    <thead class="bg-gray-100">
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">ФИО пользователя</p>
                            </div>
                        </td>
                        <td class="pl-24">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600 ml-2">Роль</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600 ml-2">Филиал</p>
                            </div>
                        </td>
                        <td class="pl-3">
                            <p class="text-sm leading-none text-gray-600 ml-2">Действия</p>
                        </td>
                    </tr>
                    </thead>

                </table>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "UserList",

    data: function () {
        return {
            users: [],

        }
    },
}
</script>

<style scoped>

</style>
