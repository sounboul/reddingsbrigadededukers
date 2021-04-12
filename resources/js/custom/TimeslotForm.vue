<template>
    <form @submit.prevent="store">
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="start" value="Start" />
            <jet-input id="start" type="datetime-local" class="mt-1 block w-full" v-model="form.start" ref="start" autocomplete="start" />
            <jet-input-error :message="form.errors.start" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <jet-label for="end" value="Eind" />
            <jet-input type="datetime-local" class="mt-1 block w-full" v-model="form.end" autocomplete="end"/>
            <jet-input-error :message="form.errors.end" class="mt-2" />
        </div>

        <div class="flex">
            <crud-button v-show="!editMode" type="submit" :disabled="form.processing">Toevoegen</crud-button>
            <crud-button v-show="editMode" type="button" @click="update()" :disabled="form.processing">Update</crud-button>
            <crud-button v-show="editMode" type="button" @click="deleteTimeslot()" :disabled="form.processing">Delete</crud-button>
            <crud-button type="button" @click="$emit('close')">Cancel</crud-button>
        </div>
    </form>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import CrudButton from '@/custom/CrudButton'

    export default {
        components: {
            JetButton,
            JetInput,
            JetInputError,
            JetLabel,
            CrudButton,
        },

        props: {
            group: Object,
            form: Object,
            editMode: Boolean,
        },

        data() {
            return {
                isOpen: false,
                createNew: false,
            }
        },

        methods: {
            reset: function () {
                if (this.editMode) {
                    this.form = {
                        start: '',
                        end: '',
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
                this.form.post('/timeslots/' + this.group, {
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

