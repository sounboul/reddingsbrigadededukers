<template>
    <app-layout :openForm=openForm setCategory="inzet" @close="openForm=false">
        <template #header>
            Waterhulpverlening
        </template>
        <div class="flex w-full justify-center mt-6">
            <div class="flex flex-wrap justify-center w-8/12 p-6">
                <flex-item @click="setTab(1)" @mouseover="setTab(1)" img="img/whvopleiding.jpeg" :isActive="currentTab == 1">
                    <template #title>Opleiding tot Lifeguard</template>
                    <template #content>Vanaf 12 jaar kun je meelopen tijdens bewakingen. Je wordt dan begeleid door een ervaren Lifeguard. Ook kun je starten met de Lifeguard opleiding.</template>
                </flex-item>
                <flex-item @click="setTab(2)" @mouseover="setTab(2)" img="img/toezicht.jpeg" :isActive="currentTab == 2">
                    <template #title>Toezicht bij evenementen</template>
                    <template #content>Bij vele evenementen op en rondom het water zijn wij te vinden. Als reddingsbrigade kunnen wij assiteren bij het stukje waterveiligheid bij een evenement. </template>
                    <template #footer>
                        <jet-button v-on:click.prevent @click="openForm=true">Vraag assistentie</jet-button>
                    </template>
                </flex-item>
                <flex-item @click="setTab(1)" @mouseover="setTab(3)" img="img/omslag-1.png" :isActive="currentTab == 3">
                    <template #title>De nationale reddingsvloot (NRV)</template>
                    <template #content>Wanneer een deel van Nederland overstroomt, wordt onze reddingsbrigade opgeroepen om te helpen bij het evacueren van de bevolking. Ook kunnen wij ingezet worden om mensen in veiligheid te brengen en eerste hulp te verlenen in onderstroomde gebieden. </template>
                </flex-item>
            </div>
        </div>
        <div class="justify-center m-6">
            <div v-show="currentTab == 1">
                <custom-tab>
                    <template #title>
                        Opleiding tot Lifeguard
                    </template>
                    <template #content>
                        Text
                    </template>
                </custom-tab>
            </div>
            <div v-show="currentTab == 2">
                <custom-tab>
                    <template #title>
                        Toezicht bij evenementen
                    </template>
                    <template #content>
                        Text
                    </template>
                </custom-tab>
            </div>
            <div v-show="currentTab == 3">
                <custom-tab>
                    <template #title>
                        De nationale reddingsvloot
                    </template>
                    <template #content>
                        Text
                    </template>
                </custom-tab>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout';
    import FlexItem from '@/custom/FlexItem';
    import JetButton from '@/Jetstream/Button';
    import CustomTab from '@/custom/Tab';

    export default {
        components: {
            AppLayout,
            FlexItem,
            JetButton,
            CustomTab
        },
        data: function () {
            return {
                openForm:false,
                currentTab: 1
            }
        },
        methods: {
            setTab(tab) {
                this.currentTab = tab
            }
        }
    }
</script>
