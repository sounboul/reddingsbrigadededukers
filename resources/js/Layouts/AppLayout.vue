<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary navigation -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="justify-between flex h-16">
                    <div class="flex">
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link :href="route('home')" :active="route().current('home')">
                                Home
                            </jet-nav-link>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link :href="route('zwemmendredden')" :active="route().current('zwemmendredden')">
                                Zwemmend redden
                            </jet-nav-link>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link :href="route('waterhulpverlening')" :active="route().current('waterhulpverlening')">
                                Waterhulpverlening
                            </jet-nav-link>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link :href="route('activiteiten')" :active="route().current('activiteiten')">
                                Activiteiten
                            </jet-nav-link>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex items-center">
                            <jet-nav-link :href="route('leden.index')" :active="route().current('leden.index')">
                                Leden
                            </jet-nav-link>
                        </div>
                    </div>

                    <div class="ml-3 relative" v-if="$page.props.user">
                        <jet-dropdown align="right" width="48">
                            <template #trigger>
                                <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.firstname" />
                                </button>

                                <span v-else class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">


                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Account
                                </div>

                                <jet-dropdown-link :href="route('profile.show')">
                                    Profile
                                </jet-dropdown-link>

                                <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                    API Tokens
                                </jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <jet-dropdown-link as="button">
                                        Log Out
                                    </jet-dropdown-link>
                                </form>
                            </template>
                        </jet-dropdown>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Page Heading -->
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header"></slot>
            </div>
        </header>


        <!-- Page Content -->
        <main>
            <slot></slot>
        </main>

        <!-- Footer -->
        <footer>
            <div class="w-full bg-white p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 border-b-2 m-10 pb-5">
                    <div class="text-lg text-center">
                        <jet-button @click="openModal('trainmee')">TRAIN MEE</jet-button>
                        <div class="mt-10">
                            Kom vrijblijvend twee keer mee trainen
                        </div>
                    </div>
                    <div class="text-center">
                        Post adres: <br>
                        <br>
                        Reddingsbrigade De Dukers<br>
                        Binnenveen 9<br>
                        7948DB Nijeveen<br>
                        Nederland<br>
                    </div>
                    <div class="text-center">
                        <div>
                            <div class="inline-flex space-x-4">
                                <div class="flex-1 transform hover:scale-110 duration-500 ease-in-out">
                                    <a class="" href="https://www.facebook.com/DeDukers" target="_blank"><span style="font-size: 3em; color: Orange;"><i class="fab fa-facebook "></i></span></a>
                                </div>
                                <div class="flex-1 transform hover:scale-110 duration-500 ease-in-out">
                                    <a href="https://www.instagram.com/dedukers/" target="_blank"><span style="font-size: 3em; color: Orange;"><i class="fab fa-instagram"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <a class="" href="">Contact</a><br>
                            <a href="">Vereniging</a>
                        </div>
                    </div>
                </div>
                <div class="text-center pb-4 text-sm bg-white">
                    Copyright &copy;  Reddingsbrigade De Dukers | Ontwerp en realisatie: Harm Jan Beekhuis
                </div>
            </div>
        </footer>
        <jet-modal :show='isOpen' @close=closeModal>
            <information-form @close="closeModal" :category="category"/>
        </jet-modal>
    </div>

</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import LinkButton from '@/custom/LinkButton.vue'
    import JetButton from '@/Jetstream/Button';
    import JetModal from '@/Jetstream/Modal'
    import InformationForm from '@/custom/InformationForm'

    export default {
        name: 'AppLayout',

        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            LinkButton,
            JetButton,
            JetModal,
            InformationForm
        },

        data() {
            return {
                showingNavigationDropdown: false,
                isOpen: false,
                category: '',
            }
        },

        props: {
            openForm: false,
            setCategory: '',
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },

            openModal(category) {
                this.category = category;
                this.isOpen = true;
            },

            closeModal() {
                this.isOpen = false
                this.$emit('close')
            },

        },
        watch: {
            openForm: function(oldval, newval) {
                this.isOpen = this.openForm
                this.category = this.setCategory
            }
        },
        emits: ['close']
    }
</script>
