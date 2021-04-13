<template>
    <div class="p-6">
        <div class="py-4">
            <div class="text-xl">
                Contactformulier
            </div>
            <p>
                Vul het formulier in om contact met ons op te nemen.
            </p>
        </div>
        <form @submit.prevent="send">
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Naam" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" ref="name" autocomplete="name" placeholder="Naam"/>
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" ref="email" autocomplete="email" placeholder="Email"/>
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Train mee -->
            <div v-show="category == 'trainmee'" class="col-span-6 sm:col-span-4">
                <jet-label for="diploma" value="Diploma" />
                <jet-input type="text" class="mt-1 block w-full" v-model="form.diploma" autocomplete="diploma" placeholder="Diploma"/>
                <jet-input-error :message="form.errors.diploma" class="mt-2" />
            </div>

            <div v-show="category == 'trainmee'" class="col-span-6 sm:col-span-4">
                <jet-label for="dateofbirth" value="Geboortedatum" />
                <jet-input type="date" class="mt-1 block w-full" v-model="form.dateofbirth" autocomplete="dateofbirth" placeholder="Geboortedatum"/>
                <jet-input-error :message="form.errors.dateofbirth" class="mt-2" />
            </div>

            <!-- Inzet -->
            <div v-show="category == 'inzet'" class="col-span-6 sm:col-span-4">
                <jet-label for="date" value="Datum evenement" />
                <jet-input type="date" class="mt-1 block w-full" v-model="form.date" autocomplete="date" placeholder="Datum"/>
                <jet-input-error :message="form.errors.date" class="mt-2" />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <jet-label for="message" value="Bericht" />
                <input-area class="mt-1 block w-full" v-model="form.message" autocomplete="message" />
                <jet-input-error :message="form.errors.message" class="mt-2" />
            </div>



            <div class="flex space-x-4 mt-4">
                <jet-button type="submit" :disabled="form.processing">Verzenden</jet-button>
                <jet-button type="button" @click="$emit('close')">Annuleren</jet-button>
            </div>
        </form>
    </div>
</template>

<script>
import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import CrudButton from '@/custom/CrudButton'
    import InputArea from '@/custom/InputArea'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            CrudButton,
            InputArea,
        },

        props: {
            category: String,
        },

        data() {
            return {
                isOpen: false,
                createNew: false,
                form: this.$inertia.form({
                    _method: 'POST',
                    name: '',
                    message: '',
                }),

            }
        },

        methods: {
            reset: function () {
                if (this.editMode) {
                    this.form = {
                        name: '',
                        description: '',
                        diploma: '',
                    }
                }
            },
            store() {
                this.form.post('/groepen', {
                    errorBag: 'storeGroup',
                    preserveScrol: true
                })
                this.reset();
                this.$emit('close');
                this.editmode = false;

            },

            edit(group) {
                this.form = Object.assign({}, group);
                this.editMode = true
            },

            update() {
                console.log('update')
                this.form._method = 'PUT';
                this.form.post('/groepen/' + this.group, {
                    errorBag: 'updateGroup',
                    preserveScrol: true
                });

                this.$emit('close');
            },

            deleteMember() {
                console.log('delete')
                if (!confirm('Weet je het zeker?')) return;
                this.form._method = 'DELETE';
                this.form.post('/groepen/' + this.group, {
                    errorBag: 'updateMember',
                    preserveScrol: true
                });
                this.$emit('close');
            }
        },

        emits: ['close']
    }
</script>
