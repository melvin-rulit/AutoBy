<template>
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Добавление сделки</h3>

            <Error :errors="this.error"/>
            <Success :message="this.message"/>

            <form @submit="store">

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Тип сделки" v-model:value="deal.type" :values="types"/>
                    </div>
                    <div v-if="currentUser.roleId === 1" class="relative z-0 w-full mb-6 group">
                        <Select title="Филиал" v-model:value="deal.branchId" :values="branches"/>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Способ оформления сделки" v-model:value="deal.kind" :values="kinds"/>
                    </div>
                    <div v-show="deal.kind === 'proxy'" class="relative z-0 w-full mb-6 group">
                        <Select title="Доверенность" v-model:value="deal.proxyId" :values="proxies"/>
                    </div>

                    <div v-show="deal.kind === 'owner'" class="relative z-0 w-full mb-6 group">
                        <Select title="Арендодатель" v-model:value="deal.ownerId" :values="owners"/>
                    </div>
                </div>


                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Арендополучатель" v-model:value="deal.clientId" :values="clients"/>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <Select title="Актив" v-model:value="deal.activeId" :values="activesList"/>
                    </div>
                </div>


                <div class="relative z-0 w-full mb-6 group">
                    <TextInput title="Гражданство арендополучателя" v-model:value="deal.citizenship" type="text"/>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <NumberInput title="Сумма основного долга" v-model:value="deal.remain" min="0" step="0.01"/>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <DataInput title="Дата/время договора" v-model:value="deal.createdAt" type="datetime-local"/>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <NumberInput title="Стоимость аренды" v-model:value="deal.costOfRent" min="0" step="0.01"/>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <NumberInput title="Стоимость выкупа" v-model:value="deal.costOfBuyout" min="0" step="0.01"/>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <NumberInput title="Срок выкупа (мес)" v-model:value="deal.redemption_period" min="1" max="12" step="1"/>
                </div>
                <div v-show="this.deal.type === 'credit'" class="relative z-0 w-full group">
                    <NumberInput title="Сумма первоначального взноса" v-model:value="deal.initial" min="0" step="0.01"/>
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
                roleId: null
            },
            deal: {
                type: null,
                kind: null,
                proxyId: null,
                ownerId: null,
                branchId: null,
                clientId: null,
                activeId: null,
                remain: null,
                // createdAt: createdAt,
                validUntil: null,
                costOfRent: null,
                costOfBuyout: null,
                initial: null,
                comment: null,
                redemption_period: null,
                citizenship: null,
            },
            message: null,
            errors: null,
        }
    },
    methods: {
        store(){

        }
    }
}
</script>

<style scoped>

</style>
