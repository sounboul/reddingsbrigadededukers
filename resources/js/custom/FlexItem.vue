<template>
    <div v-if="href" class="flex max-w-md xl:w-1/3 px-3 py-3 justify-center">
        <div class="flex-1 rounded-lg overflow-hidden bg-white shadow-xl transform hover:scale-110 duration-500 ease-in-out">
            <inertia-link :href="href">
                <img class="w-full h-56 object-cover" :src="img"/>
                <div class="p-6 justify-center">
                    <div class="text-xl mb-2  text-center">
                        <slot name="title"></slot>
                    </div>
                    <p><slot name="content"></slot></p>
                    <div class="flex justify-center mt-6">
                        <slot name="footer"></slot>
                    </div>
                </div>
            </inertia-link>
        </div>
    </div>
    <div v-else class="flex max-w-sm xl:w-1/3 px-3 py-3 justify-center">
        <div :class="classes">
            <img class="w-full h-56 object-cover" :src="img"/>
            <div class="p-6 justify-center">
                <div class="text-xl mb-2  text-center">
                    <slot name="title"></slot>
                </div>
                <p><slot name="content"></slot></p>
                <div class="flex justify-center mt-6">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            href: {
                type: String,
                default: ''
            },
            isActive: {
                type: Boolean,
                default: false,
            },
            img: String,
            },
        computed: {
            classes() {
                return this.isActive
                            ? 'flex-1 rounded-lg overflow-hidden bg-white shadow-xl transform hover:scale-110 duration-500 ease-in-out  border-b-8 border-indigo-400    focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
                            : 'flex-1 rounded-lg overflow-hidden bg-white shadow-xl transform hover:scale-110 duration-500 ease-in-out  border-b-8 border-transparent  hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
            }
        }
    }
</script>

