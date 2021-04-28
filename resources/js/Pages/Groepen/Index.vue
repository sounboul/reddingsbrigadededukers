<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Groepen
            </h2>
            <p>Hallo,</p>
        </template>

        <div class="flex justify-center w-full">
            <div class='m-6 max-w-3xl'>
                <basic-element>
                    <template #title>
                        Groepen
                    </template>
                    <template #description>
                        Overzicht van alle groepen
                    </template>
                    <template #content>
                        <div class="flex flex-col space-y-5 w-full">
                            <div v-for="group in groups" :key="group.id" class="flex justify-center">
                                <div>
                                    <!-- {{ group.name }} -->
                                    <group-item :group='group'/>
                                </div>
                            </div>
                        </div>
                        <div>
                            <jet-button @click="openModal()">
                                Voeg groep toe
                            </jet-button>
                        </div>
                    </template>
                </basic-element>
            </div>
        </div>

        <jet-modal :show='isOpen' @close=closeModal()>
            <div class="p-6">
                <group-form @close="closeModal()" />
            </div>
        </jet-modal>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'
    import JetModal from '@/Jetstream/Modal'
    import GroupItem from '@/custom/GroupItem.vue'
    import GroupForm from '@/custom/GroupForm.vue'
    import BasicElement from '@/custom/BasicElement.vue'

    export default {
        props: {
            groups: Object,
        },

        methods: {
            openModal: function () {
                this.isOpen = true;
            },
            closeModal: function () {
                this.isOpen = false;
            },
        },

        data: function() {
            return {
                isOpen: false,
            }
        },

        components: {
            AppLayout,
            JetButton,
            JetModal,
            GroupItem,
            GroupForm,
            BasicElement,
        },
    }
</script>
