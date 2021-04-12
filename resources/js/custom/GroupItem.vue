<template>
    <inertia-link :href="route('groepen.show', group)">
        <div class="flex flex-row py-2">
            <div class="font-bold pr-1">{{ group.name}} </div>
            <div class=""> - {{ group.description }}</div>
        </div>
    </inertia-link>
</template>

<script>
    import JetButton from '@/Jetstream/Button'

    export default {
        components: {
            JetButton,
        },

        props: {
            group: Object
        }
    }
</script>
