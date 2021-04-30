<template>
    <app-layout>
        <simple-element>
            <template #title>Contact</template>
            <template #content>
                <div>
                    <information-form category="algemeen"></information-form>
                </div>
            </template>
        </simple-element>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout';
    import SimpleElement from '../custom/SimpleElement.vue';
    import InformationForm from '../custom/InformationForm.vue';

    export default {
        components: {
            AppLayout,
            SimpleElement,
            InformationForm
        }
    }
</script>
