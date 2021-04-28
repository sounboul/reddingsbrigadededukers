<template>
    <form @submit.prevent="store">
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="name" value="Groepsnaam" />
            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" ref="name" autocomplete="name" />
            <jet-input-error :message="form.errors.name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="description" value="Beschrijving" />
            <jet-input type="text" class="mt-1 block w-full" v-model="form.description" autocomplete="description"/>
            <jet-input-error :message="form.errors.description" class="mt-2" />
        </div>
        <div class="flex">
            <crud-button v-show="!editMode" type="submit" :disabled="form.processing">Toevoegen</crud-button>
            <crud-button v-show="editMode" type="button" @click="update()" :disabled="form.processing">Update</crud-button>
            <crud-button v-show="editMode" type="button" @click="deleteGroup()" :disabled="form.processing">Delete</crud-button>
            <crud-button type="button" @click="$emit('close')">Cancel</crud-button>
        </div>
    </form>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import CrudButton from '@/custom/CrudButton'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            CrudButton,
        },
        props: {
            group: {
                type: Object,
                default: null,
                },
            editMode: Boolean,
        },

        data() {
            return {
                isOpen: false,
                createNew: false,
                form: this.$inertia.form({
                    _method: 'POST',
                    id: '',
                    name: '',
                    description: '',
                }),
            }
        },

        methods: {
            reset: function () {
                if (this.editMode) {
                    this.form = {
                        id: '',
                        name: '',
                        description: '',
                    }
                }
            },
            store() {
                this.form.post('/groepen', {
                    errorBag: 'storeGroup',
                    preserveScrol: true,
                    onFinish: () => this.form.reset
                });
                // this.reset();
                // this.$emit('close');
                // this.editmode = false;

            },



            update() {
                this.form._method = 'PUT';
                this.form.post('/groepen/' + this.group, {
                    errorBag: 'updateGroup',
                    preserveScrol: true
                });
                this.$emit('close');
            },

            deleteGroup() {
                if (!confirm('Weet je het zeker?')) return;
                this.form._method = 'DELETE';
                this.form.post('/groepen/' + this.group, {
                    errorBag: 'deleteGroup',
                    preserveScrol: true
                });
                this.$emit('close');
            }
        },

        emits: ['close'],

        created: function() {
            if (this.group) {
                this.form.name = this.group.name;
                this.form.description = this.group.description;
                this.form.id = this.group.id;
            }

        }
    }
</script>

