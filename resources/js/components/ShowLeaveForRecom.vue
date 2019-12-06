<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" v-for="l in leave" :key="l.id">
                <!-- <div class="card"> -->
               
                    <div class="card-header text-center">
                        <h3>Leave Request</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="approve(l.id)">Approve</button>
                            <button class="btn btn-danger" @click="discured(l.id)">Discurd</button>
                            <button class="btn btn-info" @click="gotohome">Back</button>
                        </div>
                    </div>
                        
                     <div class="card-body">
                   <div class="row">
                       <div class="col-md-3">
                           <ul id="list1" class="text-left">
                                  <li>ID</li>
                                  <hr>
                                  <li>Name</li>
                                  <hr>
                                  <li>Email</li>
                                  <hr>
                                  <li>Department</li>
                                  <hr>
                                  <li>Leave Type</li>
                                  <hr>
                                  <li>Start date</li>
                                  <hr>
                                  <li>End Date</li>
                                  <hr>
                                  <li>Duration</li>
                                  <hr>
                                  <li>Total leave</li>
                                  <hr>
                                  <li>Remaining Leave</li>
                                  <hr>
                                  <li>Reliever name</li>
                                  <hr>
                                  <li>Reliever department</li>
                                  <hr>
                                  <li>Recommender name</li>
                                  <hr>
                                  <li>Recommender department</li>
                                  <hr>
                                  <li>Reason</li>
                                  <hr>
                                  <li>Address</li>
                              </ul>
                       </div>
                       <div class="col-md-4">
                           <ul id="list1" class="text-left">
                                  <li>{{l.empid}}</li>
                                  <hr>
                                  <li>{{l.empname}}</li>
                                  <hr>
                                  <li>{{l.empemail}}</li>
                                  <hr>
                                  <li>{{l.empdepartment}}</li>
                                  <hr>
                                  <li>{{l.leavetype}}</li>
                                  <hr>
                                  <li>{{l.startdate}}</li>
                                  <hr>
                                  <li>{{l.enddate}}</li>
                                  <hr>
                                  <li>{{l.duration}}</li>
                                  <hr>
                                 
                                  <li>{{l.totalleave}}</li>
                                  <hr>
                                 
                                  <li>{{l.available}}</li>
                                  <hr>
                                  <li>{{l.reliever}}</li>
                                  <hr>
                                  <li>{{l.relieverDep}}</li>
                                  <hr>
                                  <li>{{l.recommender}}</li>
                                  <hr>
                                  <li>{{l.recommenderDep}}</li>
                                  <hr>
                                  <li>{{l.reason}}</li>
                                  <hr>
                                  <li>{{l.address}}</li>
                              </ul>
                       </div>
                       
                       <div class="col-md-3">
                           <ul id="list1" class="text-left">
                                  <li>From Reliever</li>
                                  <li>From Recommender</li>
                                  <li>From Admin</li>
                                  <li>From HR</li>
                               </ul>
                       </div>
                       <div class="col-md-2">
                           <ul id="list1" class="">
                                  <li v-show="l.isapprovedbyreliever == 0"><span class="red">{{l.isapprovedbyreliever|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyreliever == 1"><span class="green">{{l.isapprovedbyreliever|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyreliever == null"><span class="teal">{{l.isapprovedbyreliever|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyrecommender == 0"><span class="red">{{l.isapprovedbyrecommender|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyrecommender == 1"><span class="green">{{l.isapprovedbyrecommender|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyrecommender == null"><span class="teal">{{l.isapprovedbyrecommender|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyadmin == 0"><span class="red">{{l.isapprovedbyadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyadmin == 1"><span class="green">{{l.isapprovedbyadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbyadmin == null"><span class="teal">{{l.isapprovedbyadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbysuperadmin == 0"><span class="red">{{l.isapprovedbysuperadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbysuperadmin == 1"><span class="green">{{l.isapprovedbysuperadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="l.isapprovedbysuperadmin == null"><span class="teal">{{l.isapprovedbysuperadmin|approvedbysuperadmin}}</span></li>
                               </ul>
                       
                          </div>
                     </div>
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
                leave: {},
                leave_id: this.$route.params.leavereq_id
            }
        },
        methods: {
            approve(id){
                axios.put('/api/approvebyrecommender/'+id)
                     .then(() => {
                          this.$router.push('/profile')
                        console.log('approved')
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            discured(id){
                axios.put('/api/discurdbyrecommender/'+id)
                     .then(() => {
                          this.$router.push('/profile')
                        console.log('discurded')
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            gotohome(){
                this.$router.push('/profile')
            },
             getthePurchase(){
                    axios.get("/api/create-leave/"+this.leave_id)
                    .then(({data}) => {
                                this.leave = data   
                        })
                        .catch((error) => {console.log(error)})
       },
            gobactto(){
                this.$router.push('/profile')
       }
        },
        mounted() {
            this.getthePurchase()
            console.log('Component mounted.')
        }
    }
</script>
<style>
#list1 {
  list-style: none;
  margin-right: 20px;
 
}
#list2 {
  list-style: none;
  margin-left: 50px;
 
}
.taka{
    margin-left: 225px;
}
.asset{
    margin-left: 40px;
}
.total-taka{
    margin-left: 140px
}
.total-asset{
    margin-left: 40px
}
.text-right{
    margin-right: 20px
}
</style>