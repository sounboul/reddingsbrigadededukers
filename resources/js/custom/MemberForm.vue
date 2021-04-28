<template>
    <form @submit.prevent="store">
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="firstname" value="Voornaam" />
            <jet-input id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" ref="firstname" autocomplete="firstname" />
            <jet-input-error :message="form.errors.firstname" class="mt-2" />

        </div>

        <div class="col-span-6 sm:col-span-4">
            <jet-label for="tussenvoegsel" value="Tussenvoegsel" />
            <jet-input id="tussenvoegsel" type="text" class="mt-1 block w-full" v-model="form.tussenvoegsel" ref="tussenvoegsel" autocomplete="tussenvoegselword" />
            <jet-input-error :message="form.errors.tussenvoegsel" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <jet-label for="lastname" value="Achternaam" />
            <jet-input type="text" class="mt-1 block w-full" v-model="form.lastname" autocomplete="lastname"/>
            <jet-input-error :message="form.errors.lastname" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <jet-label for="username" value="Gebruikersnaam" />
            <jet-input id="username" type="text" class="mt-1 block w-full" v-model="form.username" autocomplete="username"/>
        <jet-input-error :message="form.errors.username" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <jet-label for="email" value="Email" />
            <jet-input id="email" type="text" class="mt-1 block w-full" v-model="form.email" autocomplete="email"/>
            <jet-input-error :message="form.errors.email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="dateofbirth" value="Geboortedatum" />
            <jet-input id="dateofbirth" type="date" class="mt-1 block w-full" v-model="form.dateofbirth" autocomplete="dateofbirth"/>
            <jet-input-error :message="form.errors.dateofbirth" class="mt-2" />
        </div>
        <div class="flex">
            <crud-button v-show="!editMode" type="submit" :disabled="form.processing">Toevoegen</crud-button>
            <crud-button v-show="editMode" type="button" @click="update()" :disabled="form.processing">Update</crud-button>
            <crud-button v-show="editMode" type="button" @click="deleteModal=true" :disabled="form.processing">Delete</crud-button>
            <crud-button type="button" @click="$emit('close')">Cancel</crud-button>
        </div>
        <confirmation-modal :show="deleteModal">
            <template #title>Lid Verwijderen</template>
            <template #content>Weet u zeker dat u het lid wilt verwijderen?</template>
            <template #footer>
                <crud-button @click="deleteModal=false">Annuleren</crud-button>
                <danger-button @click="deleteMember()">Verwijderen</danger-button>
            </template>
        </confirmation-modal>
    </form>
</template>

<script>
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import CrudButton from '@/custom/CrudButton'
    import ConfirmationModal from '@/Jetstream/ConfirmationModal.vue'
    import DangerButton from '@/Jetstream/DangerButton.vue'

    export default {
        components: {
            JetInput,
            JetInputError,
            JetLabel,
            CrudButton,
            ConfirmationModal,
            DangerButton
        },

        props: {
            member: {
                type: Object,
                default: {},
            },
            editMode: Boolean,
            deleteModal: false,
        },

        data() {
            return {
                isOpen: false,
                createNew: false,
                form: this.$inertia.form({
                _method: 'POST',
                id: '',
                firstname: '',
                tussenvoegsel: '',
                lastname: '',
                username: '',
                email: '',
                dateofbirth: '',
            }),

            }
        },

        methods: {
            reset: function () {
                if (this.editMode) {
                    this.form = {
                        id: '',
                        firstname: '',
                        tussenvoegsel: '',
                        lastname: '',
                        username: '',
                        email: '',
                        dateofbirth: '',
                    }
                }
            },

            store() {
                this.form.post('/leden', {
                    errorBag: 'storeMember',
                    preserveScrol: true
                })
                this.reset();
                this.$emit('close');
                this.editmode = false;

            },


            update() {
                this.form._method = 'PUT';
                this.form.post('/leden/' + this.member, {
                    errorBag: 'updateMember',
                    preserveScrol: true
                });
                this.$emit('close');
            },

            deleteMember() {
                this.form._method = 'DELETE';
                this.form.post('/leden/' + this.member, {
                    errorBag: 'updateMember',
                    preserveScrol: true
                });
                this.$emit('close');
            }
        },

        emits: ['close'],

        created: function() {
            if (this.member) {
                this.form.id = this.member.id;
                this.form.firstname = this.member.firstname;
                this.form.tussenvoegsel = this.member.tussenvoegsel;
                this.form.lastname = this.member.lastname;
                this.form.username = this.member.username;
                this.form.email = this.member.email;
                this.form.dateofbirth = this.member.dateofbirth;
            }

        }
    }
</script>

