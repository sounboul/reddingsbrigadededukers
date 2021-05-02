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
        <div v-show="success" class="bg-green-500 rounded-lg text-white m-6">
            <div class="p-6">
                <div class="text-xl text-center">
                    Het bericht is succesvol verzonden.
                </div>
                <div class="text-center mt-6">
                    Wij proberen zo spoedig mogelijk te reageren. Meestal is dit binnen een week.

                </div>
            </div>
        </div>
        <div v-show="error" class="bg-red-500 rounded-lg text-white m-6">
            <div class="p-6">
                <div class="text-xl text-center">
                    Er is helaas wat misgegaan.
                </div>
                <div class="text-center mt-6">
                    Probeer het nog eens of zoek op een andere manier contact.

                </div>
            </div>
        </div>
        <div v-show="!success">
            <form @submit.prevent="sendMail">
                <div v-show="category == 'algemeen'" class="col-span-6 sm:col-span-4">
                    <jet-label for="emailTo" value="Verzenden naar:" />

                    <select id="emailTo" class="mt-1 block w-full rounded-lg border-gray-300" v-model="form.emailTo" ref="emailTo" autocomplete="emailTo" placeholder="Emailto">
                        <option value="voorzitter">Voorzitter</option>
                        <option value="penningmeester">Penningmeester</option>
                        <option value="secretaris">Secretaris</option>
                        <option value="bestuur">Bestuur</option>
                        <option value="waterhulpverlening">Waterhulpverlening</option>
                    </select>
                    <jet-input-error :message="form.errors.emailTo" class="mt-2" />
                </div>
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
    import JetDialogModal from '@/Jetstream/DialogModal.vue'

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
            JetDialogModal

        },

        props: {
            category: String,
        },

        data() {
            return {
                isOpen: false,
                createNew: false,
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    message: '',
                    emailTo: '',
                }),

            }
        },

        methods: {


            sendMail: function () {
                this.form.method = 'POST';
                this.form.post('/contact', {
                    errorBag: 'sendMail',
                    preserveScrol: true,
                    onSuccess: () => [
                        //this.$emit('close'),
                        this.form.reset()
                        ],

                });


            }

        },

        computed: {
            success() {
                return this.$page.props.success
            },
            error() {
                return this.$page.props.error
            }
        },


        emits: ['close']
    }
</script>
