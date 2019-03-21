<template>
    <div class="chat">
         <conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <contactslist :contacts="contacts" @selected="startConversationWith"/>
    </div>
</template>

<script>
    import conversation from './conversation';
    import contactslist from './contactslist';
    import Echo from "laravel-echo";
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
            console.log(this.user.email);
            window.Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => {
                    //console.log(e.message);
                    this.handleIncoming(e.message);
                });
            axios.get('/contacts')
                .then((response) => {
                   this.contacts = response.data;
                });
        },
        methods: {
            startConversationWith(contact) {
                //console.log(contact.email);
                axios.get('/message/' + contact.email)
                    .then((response) => {
                       this.messages = response.data;
                       this.selectedContact = contact;
                    });
            },
            saveNewMessage(text) {
                this.messages.push(text);
            },
            handleIncoming(message) {
                //console.log(selectedContact);
                    this.saveNewMessage(message);
                    return;
                alert(message);

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