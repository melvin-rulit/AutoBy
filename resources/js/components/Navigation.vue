<template>
    <div class="flex pt-12 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <aside id="sidebar" class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-12 font-normal duration-75 lg:flex transition-width" aria-label="Sidebar">
            <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <Body/>
        </div>

    </div>
</template>

<script>
import Body from "./Body.vue";

export default {
    components: {Body},
    name: "Navigation",

    data: function () {
        return {
            user: {

            }
        }
    },
}
</script>
