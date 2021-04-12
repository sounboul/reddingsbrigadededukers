<template>
    <basic-element>
        <template #title>
            Leden gekoppeld aan dit account
        </template>

        <template #description>
            Selecteer hier het lid dat u wilt inzien
        </template>

        <template #content>
            <div class="flex flex-col space-y-5 w-full">
                <div v-for="member in members" :key='member.id' class="flex justify-center">
                    <link-button :href="route('leden.show', member)">
                        {{ member.username }}
                    </link-button>
                </div>
                <div class="flex justify-center">
                     <custom-button href="#" @click="$emit('open')">
                        <i class="fas fa-plus-circle mr-2"></i> Voeg toe
                    </custom-button>
                </div>


            </div>

        </template>
    </basic-element>

</template>

<script>
import BasicElement from '@/custom/BasicElement'
import CustomButton from '@/custom/CustomButton'
import MemberItem from '@/custom/MemberItem'
import LinkButton from '@/custom/LinkButton'

export default {
    props: {
        members: Object,
    },
    data: function() {
        return {

        }
    },
    components: {
        BasicElement,
        CustomButton,
        MemberItem,
        LinkButton,
    },
    methods: {
        addVisibility() {
            members.forEach(element => {
                this.members.push({...element, visible: false})
            })
        }
    },
    emits: ['open']
}
</script>
