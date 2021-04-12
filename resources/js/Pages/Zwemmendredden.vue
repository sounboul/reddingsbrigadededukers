<template>
    <app-layout>
        <template #header>
            Zwemmend Redden
        </template>
        <div class="flex w-full justify-center mt-6">
            <div class="flex flex-wrap justify-center w-8/12 p-6">
                <flex-item :href="route('leden.index')" img="img/whvopleiding.jpeg">
                    <template #title>Junior Redder</template>
                    <template #content>Wanneer je een zwemdiploma hebt, kun je trainen voor het diploma Junior Redder (1-4). Hierbij leer je voornamelijk: Beter zwemmen, jezelf redden en de beginselen van het helpen van anderen.</template>
                </flex-item>
                <flex-item :href="route('leden.index')" img="img/toezicht.jpeg">
                    <template #title>Zwemmend Redder</template>
                    <template #content>Wanneer je jezelf kunt redden in water, kun je ook anderen gaan redden. Welk reddingsmiddel gebruik je wanneer en welke technieken kun je gebruiken om een drenkeling uit het water  te krijgen?</template>

                </flex-item>
                <flex-item :href="route('leden.index')" img="img/omslag-1.png">
                    <template #title>Lifesaver en verder</template>
                    <template #content>Als Lifesaver is het aan jou en je team reddingen uit te voeren. </template>
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
