<template>
    <div class="container">
        <p id="success"></p>
       <a style="cursor: pointer" @click.prevent="disLikePost"><ion-icon name="thumbs-down-sharp" aria-hidden="true"></ion-icon>({{ totalDislike }})</a>
    </div>
</template>
 
<script>
    export default {
        props:['post'],
        data(){
            return {
                totalDislike:'',
            }
        },
        methods:{
            disLikePost(){
                axios.post('/dislike/'+this.post,{post:this.post})
                .then(response =>{
                    this.getDislike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getDislike(){
                axios.post('/dislike',{post:this.post})
                .then(response =>{
                    console.log(response.data.post.dislike)
                    this.totalDislike = response.data.post.dislike
                })
            }
        },
        mounted() {
            this.getDislike()
        }
    }
</script>