<template>

<div class="flex justify-center w-full">
    <div class='sm:m-6 m-3 p-6 w-full max-w-3xl bg-white rounded-lg'>
        <div class="text-xl pb-3"><slot name="title"></slot></div>
        <div class="p-6 w-full"><slot name="content" class="p-6 w-full"></slot></div>
    </div>
</div>

</template>

<script>
    export default {
        components: {

            },
    }
</script>
