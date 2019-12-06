<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- <div class="card" v-for="leave in leavedata.data" :key="leave.id"> -->
                <div class="card">
               
                    <div class="card-header text-center">
                        <h3>Leave Request</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="approve(leavedata.id)">Approve</button>
                            <button class="btn btn-danger" @click="discured(leavedata.id)">Discurd</button>
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
                                  <li>{{leavedata.empid}}</li>
                                  <hr>
                                  <li>{{leavedata.empname}}</li>
                                  <hr>
                                  <li>{{leavedata.empemail}}</li>
                                  <hr>
                                  <li>{{leavedata.empdepartment}}</li>
                                  <hr>
                                  <li>{{leavedata.leavetype}}</li>
                                  <hr>
                                  <li>{{leavedata.startdate}}</li>
                                  <hr>
                                  <li>{{leavedata.enddate}}</li>
                                  <hr>
                                  <li>{{leavedata.duration}}</li>
                                  <hr>
                                 
                                  <li>{{leavedata.totalleave}}</li>
                                  <hr>
                                 
                                  <li>{{leavedata.available}}</li>
                                  <hr>
                                  <li>{{leavedata.reliever}}</li>
                                  <hr>
                                  <li>{{leavedata.relieverDep}}</li>
                                  <hr>
                                  <li>{{leavedata.recommender}}</li>
                                  <hr>
                                  <li>{{leavedata.recommenderDep}}</li>
                                  <hr>
                                  <li>{{leavedata.reason}}</li>
                                  <hr>
                                  <li>{{leavedata.address}}</li>
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
                                  <li v-show="leavedata.isapprovedbyreliever == 0"><span class="red">{{leavedata.isapprovedbyreliever|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyreliever == 1"><span class="green">{{leavedata.isapprovedbyreliever|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyreliever == null"><span class="teal">{{leavedata.isapprovedbyreliever|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyrecommender == 0"><span class="red">{{leavedata.isapprovedbyrecommender|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyrecommender == 1"><span class="green">{{leavedata.isapprovedbyrecommender|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyrecommender == null"><span class="teal">{{leavedata.isapprovedbyrecommender|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyadmin == 0"><span class="red">{{leavedata.isapprovedbyadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyadmin == 1"><span class="green">{{leavedata.isapprovedbyadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbyadmin == null"><span class="teal">{{leavedata.isapprovedbyadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbysuperadmin == 0"><span class="red">{{leavedata.isapprovedbysuperadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbysuperadmin == 1"><span class="green">{{leavedata.isapprovedbysuperadmin|approvedbysuperadmin}}</span></li>
                                  <li v-show="leavedata.isapprovedbysuperadmin == null"><span class="teal">{{leavedata.isapprovedbysuperadmin|approvedbysuperadmin}}</span></li>
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
                leavedata: {},
                leave_id: this.$route.params.leave_id
            }
        },
        methods: {
            approve(id){
                axios.put('/api/approvebyreliever/'+id)
                     .then(() => {
                         this.$router.push('/profile')
                          console.log('approved')
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            discured(id){
                axios.put('/api/discurdbyreliever/'+id)
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
             gettheReliever(){
                    axios.get("/api/relieveras-requested/"+this.leave_id)
                         .then(({ data }) => {
                             this.leavedata = data
                         })
                         .catch((error) => {
                             console.log(error)
                         })
       },
          
        },
        mounted() {
            this.gettheReliever()
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