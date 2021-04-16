<template>
    <div class="flex justify-center w-full p-6">
        <div class="w-full bg-white pb-0 p-6 rounded-lg max-w-3xl border-t-2 border-indigo-400 shadow">


            <div class="text-xl">
                <slot name="title"></slot>
            </div>
            <div class="p-6">
                <slot name="content"></slot>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

    }
</script>
