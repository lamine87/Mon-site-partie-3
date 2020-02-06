<template>
    <div class="col-md-4 col-sm-12 col-lg-4">
        <form  method="POST" class="flex flex-col" @submit.prevent="submitComment">

<!--            <div class="form-row">-->
            <!--                <div id="comment" style="overflow:scroll; height:180px;" class="form-group col-md-12">-->

            <!--                </div>-->

            <!--                <div class="form-group col-md-6">-->
            <!--                    <label for="nom">Nom</label>-->
            <!--                    <input type="text" class="form-control" id="nom" name="nom" value="" placeholder="Jean" v-model="comment">-->
            <!--                </div>-->

            <!--                <div class="form-group col-md-6">-->
            <!--                    <label for="email">Email</label>-->
            <!--                    <input type="email" class="form-control" id="email" name="email" value="" placeholder="exemple@yahoo.com" v-model="comment">-->
            <!--                </div>-->


                <div class="form-group col-md-12">

                    <textarea class="border rounded p-3" v-model="comment"></textarea>
                </div>
<!--            </div>-->

            <button type="submit" class="border rounded py-2">
                <img src="" title="envoyer">
            </button>

        </form>
    </div>

</template>



<script>
    export default{
        data(){
            return{
                comment:'',
            }
        },

       methods: {
           submitComment() {
               axios.post('/comments', {
                   content: this.comment

               })
               console.log(this.comment)

                   .then(function (response) {
                   console.log(response);
               }).catch(function (error) {
                       console.log(error);
                   });
           },
       },
    }

</script>
