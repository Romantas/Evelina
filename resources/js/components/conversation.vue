<template>
    <div class="conversation">
        <h1>{{ contact ? contact.name : 'Pasirinkite įmonę' }}</h1>
        <messagesfeed :contact="contact" :messages="messages"/>
        <messagecomposer @send="sendMessage"/>
    </div>
</template>

<script>
    import messagecomposer from './messagecomposer';
    import messagesfeed from './messagesfeed';
    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text){
                console.log(text);
            }
        },
        components: {messagecomposer, messagesfeed}
    }
</script>

<style lang="scss" scoped>
.conversation{
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    h1{
        font-size: 36px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px solid #aaaaaa;
    }
}
</style>