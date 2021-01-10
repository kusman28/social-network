<template>
    <div class="container">
        <p id="success"></p>
       <a style="cursor: pointer" @click.prevent="likePost"><ion-icon name="thumbs-up-sharp" aria-hidden="true"></ion-icon>({{ totalLike }})</a>
    </div>
</template>
 
<script>
    export default {
        props:['post'],
        data(){
            return {
                totalLike: 0,
            }
        },
        methods:{
            likePost(){
                axios.post('/like/'+this.post,{post:this.post})
                .then(response =>{
                    if (response.data == 'unliked') {
                        this.totalLike -= 1;
                    } else {
                        this.totalLike += 1;
                    }
                    // $('#success').html(response.data.message)
                })
                .catch()
            },
            getlike(){
                axios.post('/like',{post:this.post})
                .then(response =>{
                    console.log(response.data.post.like)
                    this.totalLike = response.data.post.like
                })
            }
        },
        mounted() {
            this.getlike()
        }
    }
</script> 