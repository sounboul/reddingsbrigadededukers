<template>
    <app-layout>
        <template #header>
            Zwemmend Redden
        </template>
        <div class="flex w-full justify-center mt-6">
            <div class="flex flex-wrap justify-center w-full p-6">
                <flex-item @click="setTab(1); scrollToElement(this.$refs.tab1)" @mouseover="setTab(1)" img="img/junior-redder.jpeg" :isActive="currentTab == 1">
                    <template #title>Junior Redder</template>
                    <!-- <template #content>Wanneer je een zwemdiploma hebt, kun je trainen voor het diploma Junior Redder (1-4). Hierbij leer je voornamelijk: Beter zwemmen, jezelf redden en de beginselen van het helpen van anderen.</template> -->
                </flex-item>
                <flex-item @click="setTab(2); scrollToElement(this.$refs.tab2)" @mouseover="setTab(2)" img="img/zwemmend-redder.jpeg" :isActive="currentTab == 2">
                    <template #title>Zwemmend Redder</template>
                    <!-- <template #content>Wanneer je jezelf kunt redden in water, kun je ook anderen gaan redden. Welk reddingsmiddel gebruik je wanneer en welke technieken kun je gebruiken om een drenkeling uit het water  te krijgen?</template> -->
                </flex-item>
                <flex-item @click="setTab(3); scrollToElement(this.$refs.tab3)" @mouseover="setTab(3)" img="img/zwemmend-redden.jpeg" :isActive="currentTab == 3">
                    <template #title>Lifesaver en verder</template>
                    <!-- <template #content>Als Lifesaver is het aan jou en je team reddingen uit te voeren. </template> -->
                </flex-item>
            </div>
        </div>
        <div class="justify-center">
            <div v-show="currentTab == 1" ref="tab1">
                <custom-tab>
                    <template #title>
                        Junior Redder
                    </template>
                    <template #content>
                        Wanneer je je zwemdiploma hebt, kun je bij onze reddingsbrigade kmoen zwemmen. Gediplomeerde instructeurs gaan jou opleiden, zodat jij klaar bent om je diploma te halen.
                        Tijdens de lessen wordt gewerkt aan zelfredzaamheid. Je verbetert je zwemtechniek, maar leert ook omgaan met bijzondere situaties in het water. Daarnaast leer je de reddingsmiddelen kennen.
                    </template>
                </custom-tab>
            </div>
            <div v-show="currentTab == 2" ref="tab2">
                <custom-tab>
                    <template #title>
                        Zwemmend Redder
                    </template>
                    <template #content>
                        Hoe voer je een redding uit? Dat leer je bij deze diploma's. Ook oefenen we met de reddingsmiddelen en leer je om samen met anderen een reddings uit te voeren.
                    </template>
                </custom-tab>
            </div>
            <div v-show="currentTab == 3" ref="tab3">
                <custom-tab>
                    <template #title>
                        Lifesaver
                    </template>
                    <template #content>
                        Als Lifesaver verdiep je je verder in het redden van mensen. Je leert EHBO gebruiken tijdens reddingen en we gaan echte casussen oefenen. In het zwembad spelen we echte situaties na, zodat jij weet wat je moet doen als je dit ooit buiten tegenkomt. Voor deze diploma's heb je ook je EHBO diploma nodig. Deze opleiding is een goede voorbereiding voor het werk in de Waterhulpverlening.
                    </template>
                </custom-tab>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout';
    import FlexItem from '@/custom/FlexItem';
    import LinkButton from '@/custom/LinkButton';
    import CustomTab from '@/custom/Tab'

    export default {
        components: {
            AppLayout,
            FlexItem,
            LinkButton,
            CustomTab
        },
        data: function() {
            return {
                currentTab: 1
            }
        },
        methods: {
            setTab(tab) {
                this.currentTab = tab
            },
            
            scrollToElement(el) {
                if (el) {
                    console.log('if')
                    el.scrollIntoView({behavior: 'smooth'})
                }
            }
        }
    }
</script>
