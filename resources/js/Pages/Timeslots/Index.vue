<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Timeslots
            </h2>
            <p>Hallo, {{ $page.props.user.firstname }}</p>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <jet-button @click="openModal()">
                    Voeg timeslot toe
                </jet-button>

                <jet-modal :show='isOpen' @close=closeModal()>
                    <div class="p-6">
                        <timeslot-form @close="closeModal()" :form="form" />
                    </div>
                </jet-modal>
                <div v-for="timeslot in timeslots" :key="timeslot.id">
                    {{ timeslot }}
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'
    import JetModal from '@/Jetstream/Modal'
    import TimeslotForm from '@/custom/TimeslotForm.vue'

    export default {
        props: {
            timeslots: Object,
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
                form: this.$inertia.form({
                    _method: 'POST',
                    id: '',
                    name: '',
                    description: '',
                }),
            }
        },

        components: {
            AppLayout,
            JetButton,
            JetModal,
            GroupItem,
            TimeslotForm,
        },
    }
</script>
