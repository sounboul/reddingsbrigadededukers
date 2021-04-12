<template>
    <div class="md:grid md:grid-cols-3 md:gap-6 mb-10 ">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class='px-4 py-5 bg-white sm:p-6 shadow rounded-md'>
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
import JetSectionTitle from '@/Jetstream/SectionTitle'

    export default {
        components: {
                JetSectionTitle,
            },
    }
</script>
