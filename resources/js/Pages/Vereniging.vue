<template>
    <app-layout>
        <simple-element>
            <template #title>Vereniging</template>
            <template #content>
                <div>
                    <div class="text-lg mb-3">Bestuur</div>
                    <table class="table-auto">
                        <tbody>
                            <tr>
                                <td>Voorzitter</td>
                                <td><span class="font-bold">Marijke Magre</span></td>
                            </tr>
                            <tr>
                                <td>Penningmeester</td>
                                <td><span class="font-bold">Sander van Urk</span></td>
                            </tr>
                            <tr>
                                <td>Secretaris</td>
                                <td><span class="font-bold">Nella Beekhuis</span></td>
                            </tr>
                            <tr>
                                <td>Algemeen bestuurslid</td>
                                <td><span class="font-bold">Henk Schrotenboer</span></td>
                            </tr>
                            <tr>
                                <td>Algemeen bestuurslid</td>
                                <td><span class="font-bold">Lisanne Toet</span></td>
                            </tr>
                        </tbody>
                    </table>
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
