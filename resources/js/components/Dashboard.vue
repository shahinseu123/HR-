<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
               <NotFound></NotFound>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
              emplength : null,
            }
        },
        created() {

        //     Bus.$on('eventbus', (v) => {
        //         this.emplength = v
        //  console.log('this is employee: '+this.emplength)
        //     })
        //  console.log('this is employee: '+this.emplength)
        },
        updated(){
            console.log('component updated')
        }
    }
</script>
