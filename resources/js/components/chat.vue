<template>
    <div class="chat">
         <conversation :contact="selectedContact" :messages="messages"/>
        <contactslist :contacts="contacts" @selected="startConversationWith"/>
    </div>
</template>

<script>
    import conversation from './conversation';
    import contactslist from './contactslist';
    export default{
        props: {
            user: {
                type: Object,
                required: true,
            }
        },
        data: function () {
            return {
                selectedContact: null,
                messages: [],
                contacts: [],
            };
        },
        mounted: function () {
            axios.get('/contacts')
                .then((response) => {
                   this.contacts = response.data;
                });
        },
        methods: {
            startConversationWith(contact) {
                console.log(contact.email);
                axios.get('/message/' + contact.email)
                    .then((response) => {
                       this.messages = response.data;
                       this.selectedContact = contact;
                    });
            }
        },
        components: {conversation, contactslist}
    }
</script>

<style lang="scss" scoped>
    .chat{
        display: flex;
    }
</style>