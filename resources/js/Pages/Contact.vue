<template>
    <app-layout>
        <simple-element>
            <template #title>Contact</template>
            <template #content>
                <div>
                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Algemeen contact</div>
                        <div class="font-bold text-lg">email@email.com</div>
                    </div>

                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Waterhulpverlening</div>
                        <div class="font-bold text-lg">email@email.com</div>
                    </div>

                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Website</div>
                        <div class="font-bold text-lg">email@email.com</div>
                    </div>
                </div>
            </template>
        </simple-element>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout';
    import SimpleElement from '../custom/SimpleElement.vue';

    export default {
        components: {
            AppLayout,
            SimpleElement
        }
    }
</script>
