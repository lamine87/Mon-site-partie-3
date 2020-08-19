<template>
    <div class="container">
        <p id="success"></p>
        <a href="http://"><i @click.prevent="likePost" class="fa fa-thumbs-up" aria-hidden="true"></i>({{ totallike }})</a>
    </div>
</template>

<script>
    export default {
        props:['post'],
        data(){
            return {
                totallike:'',
            }
        },
        methods:{
            likePost(){
                axios.post('/like/'+this.mouve,{mouve:this.mouve})
                    .then(response =>{
                        this.getlike()
                        $('#success').html(response.data.message)
                    })
                    .catch()
            },
            getlike(){
                axios.post('/like',{mouve:this.mouve})
                    .then(response =>{
                        console.log(response.data.mouve.like)
                        this.totallike = response.data.mouve.like
                    })
            }
        },
        mounted() {
            this.getlike()
        }
    }
</script>
