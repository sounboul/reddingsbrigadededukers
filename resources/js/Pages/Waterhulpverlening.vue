<template>
    <app-layout>
        <template #header>
            Waterhulpverlening
        </template>
        <div class="flex w-full justify-center mt-6">
            <div class="flex flex-wrap justify-center w-8/12 p-6">
                <flex-item :href="route('leden.index')" img="img/whvopleiding.jpeg">
                    <template #title>Opleiding tot Lifeguard</template>
                    <template #content>Vanaf 12 jaar kun je meelopen tijdens bewakingen. Je wordt dan begeleid door een ervaren Lifeguard. Ook kun je starten met de Lifeguard opleiding.</template>
                </flex-item>
                <flex-item :href="route('leden.index')" img="img/toezicht.jpeg">
                    <template #title>Toezicht bij evenementen</template>
                    <template #content>Bij vele evenementen op en rondom het water zijn wij te vinden. Als reddingsbrigade kunnen wij assiteren bij het stukje waterveiligheid bij een evenement. </template>
                    <template #footer>
                        <link-button :href="route('home')">Vraag assistentie</link-button>
                    </template>
                </flex-item>
                <flex-item :href="route('leden.index')" img="img/omslag-1.png">
                    <template #title>De nationale reddingsvloot (NRV)</template>
                    <template #content>Wanneer een deel van Nederland overstroomt, wordt onze reddingsbrigade opgeroepen om te helpen bij het evacueren van de bevolking. Ook kunnen wij ingezet worden om mensen in veiligheid te brengen en eerste hulp te verlenen in onderstroomde gebieden. </template>
                </flex-item>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout';
    import FlexItem from '@/custom/FlexItem';
    import LinkButton from '@/custom/LinkButton';

    export default {
        components: {
        AppLayout,
        FlexItem,
        LinkButton
        },
    }
</script>
