<template>
    <button type="button" :class="classes" id="user-menu" aria-expanded="false" aria-haspopup="true">
        <span class="sr-only">Open user menu</span>
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            href: String,
            active: {
                type: Boolean,
                default: false
            },
            pulse: {
                type: Boolean,
                default: false,
            }
        },

        computed: {
            classes() {
                if (this.active && this.pulse) {
                    return 'animate-pulse relative text-indigo-700 bg-gray-800 h-12 w-12 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-white transition duration-150 ease-in-out'
                }

                else if (this.active && !this.pulse) {
                    return 'relative text-indigo-700 bg-gray-800 h-12 w-12 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-white transition duration-150 ease-in-out'
                }
                else if (!this.active && this.pulse) {
                    return 'animate-pulse relative text-white bg-gray-800 h-12 w-12 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-white transition duration-150 ease-in-out'
                }

                else {
                    return 'relative text-white bg-gray-800 h-12 w-12 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-white transition duration-150 ease-in-out'
                }

            }
        }
    }
</script>

