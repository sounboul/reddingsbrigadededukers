<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="bg-white mb-6">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <custom-nav-circle :active="showingMobileMenu" @click="showingMobileMenu = ! showingMobileMenu">
                        <i class="absolute fas fa-bars text-2xl top-3 right-3"></i>
                    </custom-nav-circle>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <!-- Logo -->
                    <!-- <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                    </div> -->
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <custom-nav-link :href="route('home')" :active="route().current('home')">
                                Home
                            </custom-nav-link>
                            <custom-nav-link :href="route('zwemmendredden')" :active="route().current('zwemmendredden')">
                                Zwemmend redden
                            </custom-nav-link>
                            <custom-nav-link :href="route('waterhulpverlening')" :active="route().current('waterhulpverlening')">
                                Waterhulpverlening
                            </custom-nav-link>
                            <custom-nav-link :href="route('activiteiten')" :active="route().current('activiteiten')">
                                Activiteiten
                            </custom-nav-link>
                        </div>
                    </div>
                </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <custom-nav-circle v-if="$page.props.user" :active="showingNotifications" :pulse="hasNotifications" @click="showingNotifications = ! showingNotifications">
                            <i class="absolute far fa-bell text-2xl top-3 right-3"></i>
                        </custom-nav-circle>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <custom-nav-circle :active="showingNavigationDropdown" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                    <i class="absolute fas fa-swimmer  text-2xl top-3 right-2"></i>
                                </custom-nav-circle>
                            </div>

                            <!--
                                Dropdown menu, show/hide based on menu state.

                                Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <transition
                                enter-active-class="transition-opacity duration-300"
                                enter-from-class="opacity-0"
                                enter-to-class="opacity-100"
                                leave-active-class="transition-opacity duration-300"
                                leave-from-class="opacity-100"
                                leave-to-class="opacity-0"
                            >
                                <div v-if="showingNavigationDropdown" class="transition-opacity ease-in-out duration-100 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                    <custom-dropdown-link :href="route('leden.index')">
                                        Leden
                                    </custom-dropdown-link>
                                    <custom-dropdown-link :href="route('profile.show')" v-show="$page.props.user">
                                        Profiel
                                    </custom-dropdown-link>
                                    <form @submit.prevent="logout" v-show="$page.props.user">
                                        <custom-dropdown-link as="button">
                                            Log uit
                                        </custom-dropdown-link>
                                    </form>

                                    <!--
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                                    -->
                                </div>
                            </transition>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div v-if="showingMobileMenu" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <custom-responsive-nav-link :href="route('home')">
                    Home
                </custom-responsive-nav-link>
                <custom-responsive-nav-link :href="route('zwemmendredden')">
                    Zwemmend redden
                </custom-responsive-nav-link>
                <custom-responsive-nav-link :href="route('waterhulpverlening')">
                    Waterhulpverlening
                </custom-responsive-nav-link>
                <custom-responsive-nav-link :href="route('activiteiten')">
                    Activiteiten
                </custom-responsive-nav-link>
                <!--
                <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
                -->
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
                            <a class="" href="/contact">Contact</a><br>
                            <a href="/vereniging">Vereniging</a>
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
        <jet-modal :show='showingNotifications' @close="showingNotifications = false">
            <div class="relative bg-white rounded-lg p-6 flex">
                <div class="absolute top-4 right-4">
                    <button @click="showingNotifications = false">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                Er zijn geen notificaties
            </div>
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
    import CustomNavLink from '@/custom/NavLink'
    import CustomResponsiveNavLink from '@/custom/ResponsiveNavLink'
    import CustomDropdownLink from '@/custom/DropdownLink'
    import CustomNavCircle from '@/custom/NavCircle'


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
            InformationForm,
            CustomNavLink,
            CustomResponsiveNavLink,
            CustomDropdownLink,
            CustomNavCircle,
        },

        data() {
            return {
                showingNavigationDropdown: false,
                showingNotifications: false,
                showingMobileMenu: false,
                hasNotifications: true,
                isOpen: false,
                category: '',
            }
        },

        props: {
            openForm: false,
            setCategory: '',
        },

        methods: {
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
