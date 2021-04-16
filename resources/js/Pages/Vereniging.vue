<template>
    <app-layout>
        <simple-element>
            <template #title>Vereniging</template>
            <template #content>
                <div>
                    <div class="text-lg mb-3">Bestuur</div>
                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Voorzitter</div>
                        <div class="font-bold text-lg">Marijke Magre</div>
                        <div>email@email.com</div>
                    </div>

                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Penningmeester</div>
                        <div class="font-bold text-lg">Sander van Urk</div>
                        <div>email@email.com</div>
                    </div>

                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Secretaris</div>
                        <div class="font-bold text-lg">Nella Beekhuis</div>
                        <div>email@email.com</div>
                    </div>

                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Algemeen bestuurslid</div>
                        <div class="font-bold text-lg">Henk Schrotenboer</div>
                        <div>email@email.com</div>
                    </div>
                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>Algemeen bestuurslid</div>
                        <div class="font-bold text-lg">Lisanne Toet</div>
                        <div>email@email.com</div>
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
