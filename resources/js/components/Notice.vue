<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" v-for="note in notices.data" :key="note.id">
                    <div class="card-header text-center">
                        <h3 class="teal">{{note.header}}</h3>
                    </div>
                    <div class="card-body">
                         <p class="lead">{{note.body}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-right ">{{note.created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            notices: {}
        }
    },
    methods: {
        loadNotice(){
            axios.get('api/notice')
                 .then(({data}) => {
                     this.notices = data
                 })
                 .catch((error) => {
                     console.log(error)
                 })
        }
    },
    created(){
        this.loadNotice()
        console.log('created')
    }
}
</script>
