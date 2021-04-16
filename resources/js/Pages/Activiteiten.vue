<template>
    <app-layout>
        <simple-element>
            <template #title>Activiteiten</template>
            <template #content>
                <div>
                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>12 februari 2021</div>
                        <div class="font-bold text-lg">Uitje leiding (test)</div>
                        <div>Het jaarlijkse uitje voor de leiding</div>
                    </div>

                    <div class="mb-6 md:mb-3 md:flex md:space-x-3 items-end">
                        <div>21 februari 2021</div>
                        <div class="font-bold text-lg">Bewaking Triathlon</div>
                        <div>Toezicht houden bij de triathlon</div>
                    </div>
                </div>
            </template>
        </simple-element>
    </app-layout>
</template>

<script>
    import SimpleElement from '../custom/SimpleElement.vue';
    import AppLayout from './../Layouts/AppLayout';

    export default {
        components: {
            AppLayout,
            SimpleElement,
        }
    }
</script>
