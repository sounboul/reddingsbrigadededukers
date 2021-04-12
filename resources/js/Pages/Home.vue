<template>
    <app-layout>
        <div class="flex justify-center">
            <div class=" w-8/12 bg-white pb-0 p-6 rounded-lg">
                <div class="inline-flex space-x-4">
                    <div class="flex-1">
                        <img class="max-h-28 " src="img/logo.jpg">
                    </div>
                    <div class="flex-2 pt-6 ">
                        <div class="text-3xl">
                            Reddingsbrigade De Dukers
                        </div>
                        <div class="text-lg">
                            Meppel / Nijeveen e.o.
                        </div>
                    </div>
                </div>
                <div class="relative h-96 pt-20 mt-4 -mr-20 -ml-20  bg-no-repeat bg-cover bg-center bg-clip-border bg-local rounded-lg shadow-xl" style="background-image: url('img/omslag-1.png')">
                    <div class="transition-opacity duration-500 ease-in-out opacity-100 hover:opacity-20">
                        <div class="absolute bottom-0 w-full h-full p-20   from-black to-transparent bg-gradient-to-t rounded-lg">
                        </div>
                        <div class="absolute bottom-0 left-0 mb-20 ml-20 text-white text-3xl tracking-wide ">
                            Het bestrijden van de verdrinkingsdood, in de ruimste zin van het woord
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-full justify-center mt-6">
            <div class="flex flex-wrap justify-center w-8/12 p-6">
                <flex-item :href="route('zwemmendredden')" img="img/zwemmend-redden.jpeg">
                    <template #title>Zwemmend Redden</template>
                    <template #content>Vanaf zwemdiploma A of easy swim kun je bij ons beginnen met zwemmen. De volwassenen trainen op donderdagavond en de jeugd op zaterdagochtend.</template>
                </flex-item>
                <flex-item :href="route('waterhulpverlening')" img="img/waterhulpverlening.jpeg">
                    <template #title>Waterhulpverlening</template>
                    <template #content>Buiten zijn wij te vinden bij evenementen in de buurt. Denk hierbij aan een survival run of triathlon. Onze boot is ook inzetbaar voor de Nationale Reddingsvloot. Dit betekent dat we bij overstromingen kunnen worden ingezet om mensen te evacueren.</template>
                </flex-item>
                <flex-item :href="route('activiteiten')" img="img/activiteiten.jpeg">
                    <template #title>Activiteiten</template>
                    <template #content>Naast het zwemmen en het uitvoeren van bewakingen, houden wij erg van gezelligheid. Jaarlijks organiseren we een uitje voor alle leden. Ook nemen we deel aan avond marathons of organiseren we leerzame clinics voor de jeugd.</template>
                </flex-item>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout';
    import FlexItem from '@/custom/FlexItem';

    export default {
        components: {
            AppLayout,
            FlexItem,
        }
    }
</script>
