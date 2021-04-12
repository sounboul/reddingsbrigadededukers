<template>
    <div class="flex max-w-sm xl:w-1/3 px-3 py-3 justify-center">
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
</template>

<script>
    export default {
        props: {
            href: String,
            img: String,
            },
    }
</script>

