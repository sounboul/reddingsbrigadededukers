<template>
    <form @submit.prevent="$emit('submitted')">
        <slot name="form"></slot>
        <jet-button><slot name="button-text"></slot></jet-button>
    </form>
</template>

<script>
import JetButton from '@/Jetstream/Button'

export default {
    components: {
        JetButton,
    },
    emits: ['submitted'],
}
</script>


