<template>
    <button :type="type"
        class="bg-blue-500 text-white m-2 inline-flex justify-center rounded-md border
            border-transparent px-4 py-2 text-base leading-6 font-medium text-white shadow-sm
            focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5
        ">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                    type: String,
                    default: 'submit',
                },
        }
    }
</script>
