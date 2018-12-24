<template>
    <div class="chat">
        <span  v-bind:class="[myMsg(message.user.id) ? 'me' : 'you' , 'bubble']" v-for="message in messages"  v-bind:key="message.id">
            <b>{{ message.user.name }}</b>
            <br>
            <p>{{ message.message }} </p>
        </span>
    </div>
</template>

<script>
  export default {
    props: ['messages', 'user'],
    methods:{
        myMsg(user_id){
            if(user_id == this.user.id){
                return true;
            }else{
                return false;
            }
        }
    }
  };
</script>