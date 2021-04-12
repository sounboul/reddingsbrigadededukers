<template>
    <form>
        <div class="col-span-6 sm:col-span-4 py-4">
            <jet-label for='search'>Zoeken:</jet-label>
            <jet-input id='search' type="text" v-model="keyword" class="mt-1 block w-full" />
        </div>
    </form>
</template>

<script>
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'

    export default{
        components: {
            JetInput,
            JetLabel,
        },

        data: function() {
            return {
                filteredMembers: null,
                keyword: null,
                form: this.$inertia.form({
                    member_id: [],
                    user_id: [],
                }),
            }
        },

        watch: {
            keyword(after, before) {
                this.getResults();
            },
        },

        methods: {
            getResults() {
                axios.get('/ledenzoeken', { params: { keyword: this.keyword} })
                    .then(res => this.filteredMembers = res.data)
                    .catch(error => {} );
                    if (this.keyword.length > 1) {
                        this.$emit('filtered-members', this.filteredMembers)
                    } else {
                        this.$emit('filtered-members', null)
                    }
            },
        },

        emits: ['filtered-members']
    }
</script>
