<template>
    <floating-button
        v-show="this.show"
        @click="showModal()"
    ></floating-button>
</template>

<script>
import FloatingButton from './FloatingButton.vue'

export default {
    name: 'CreateIssueModal',

    components: {
        FloatingButton,
    },

    computed: {
        show() {
            return !this.$page.component.startsWith('Settings')
        },
    },

    methods: {},
}
</script>
