<template>
    <div class="contacts-list">
        <ul>
            <li v-for="(contact, index) in contacts" :key="contact.email" @click="selectedContact(index, contact)" class="{'selected : index == selected'}">
                <div class="avatar">
                    <img :src="contact.logo">
                </div>
                <div class="company">
                    <p>{{ contact.name }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: [],
            }
        },
        data() {
            return {
                selected: 0,
            }
        },
        methods: {
            selectedContact(index, contact){
                this.selected = index;

                this.$emit('selected', contact);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .contacts-list{
        flex: 2;
        max-height: 600px;
        overflow: scroll;
        border-left: 1px solid #aaaaaa;
        ul{
            list-style-type: none;
            padding-left: 0;
            li{
                display: flex;
                padding: 2px;
                border-bottom: 1px solid #aaaaaa;
                max-height: 50px;
                position: relative;
                cursor: pointer;
                .logo{
                    &.selected{
                        background-color: #dfdfdf;
                    }
                    display: flex;
                    flex: 1;
                    align-items: center;
                    img{
                        width: 35px;
                        border-radius: 50%;
                        margin: 0 auto;
                    }
                }
                .company{
                    flex: 3;
                    font-size: 20px;
                    overflow: hidden;
                    display: flex;
                    align-items: center;
                    justify-items: center;
                    p{
                        margin: 0;
                    }
                }
            }
        }
    }
</style>