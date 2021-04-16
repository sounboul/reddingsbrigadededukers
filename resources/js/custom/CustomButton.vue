<template>
    <button :type="type" :class="classes">
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
            color: {
                type: String,
                default: null,
            }
        },

        computed: {

            classes() {
                if (this.color) {
                    return 'inline-flex items-center px-4 py-2 bg-'+this.color+'-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-'+this.color+'-700 active:bg-'+this.color+'-900 transition ease-in-out duration-150'
                }

                else {
                    return 'inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150'
                }
            }
        }
    }
</script>
