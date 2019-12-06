
<style>
  
</style>
<template>
    <div class="container">
                <ul class="nav navbar pink bg-dark p-2 nav-pills">
                  <li class="nav-item font-weight-bold"><router-link class="nav-link" to="/purchase" data-toggle="tab">Create Purchase</router-link></li>
                  <li class="nav-item font-weight-bold"><router-link class="nav-link" to="/invoice" data-toggle="tab">Create Invoice</router-link></li>
                  <li class="nav-item font-weight-bold"><router-link class="nav-link" to="/createnotice" data-toggle="tab">Add Notice</router-link></li>
                  <li class="nav-item font-weight-bold"><router-link class="nav-link" to="/createleave" data-toggle="tab">Request Leave</router-link></li>
                </ul>
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center teal">Leave Requests</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Type</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Duration</th>
                                        <!-- <th>Total</th> -->
                                        <!-- <th>Remaining</th> -->
                                        <th>Reliever Approval</th>
                                        <th>Recommender Approval</th>
                                        <th>Admin Approval</th>
                                        <th>HR Approval</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="leave in userdata.create_leaves" :key="leave.id">
                                        <td>{{leave.empname}}</td>
                                        <td>{{leave.empdepartment}}</td>
                                        <td>{{leave.leavetype}}</td>
                                        <td>{{leave.startdate}}</td>
                                        <td>{{leave.enddate}}</td>
                                        <td>{{leave.duration}}</td>
                                        <!-- <td>{{leave.totalleave}}</td> -->
                                        <!-- <td>{{leave.available}}</td> -->
                                        <td v-show="leave.isapprovedbyreliever == 0"><span class="badge label label-danger">{{leave.isapprovedbyreliever|approvedbyreliever}}</span></td>
                                        <td v-show="leave.isapprovedbyreliever == 1"><span class="badge label label-success">{{leave.isapprovedbyreliever|approvedbyreliever}}</span></td>
                                        <td v-show="leave.isapprovedbyreliever == null"><span class="badge label label-warning">{{leave.isapprovedbyreliever|approvedbyreliever}}</span></td>
                                        
                                         <td v-show="leave.isapprovedbyrecommender == 0"><span class="badge label label-danger">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                        <td v-show="leave.isapprovedbyrecommender == 1"><span class="badge label label-success">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                        <td v-show="leave.isapprovedbyrecommender == null"><span class="badge label label-warning">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td> 
                                        

                                        
                                        <td v-show="leave.isapprovedbyadmin == 0"><span class="badge label label-danger">{{leave.isapprovedbyadmin|approvedbyadmin}}</span></td>
                                        <td v-show="leave.isapprovedbyadmin == 1"><span class="badge label label-success">{{leave.isapprovedbyadmin|approvedbyadmin}}</span></td>
                                        <td v-show="leave.isapprovedbyadmin == null"><span class="badge label label-warning">{{leave.isapprovedbyadmin|approvedbyadmin}}</span></td>
                                        
                                        <td v-show="leave.isapprovedbysuperadmin == 0"><span class="badge label label-danger">{{leave.isapprovedbysuperadmin|approvedbysuperadmin}}</span></td>
                                        <td v-show="leave.isapprovedbysuperadmin == 1"><span class="badge label label-success">{{leave.isapprovedbysuperadmin|approvedbysuperadmin}}</span></td>
                                        <td v-show="leave.isapprovedbysuperadmin == null"><span class="badge label label-warning">{{leave.isapprovedbyrecommender|approvedbysuperadmin}}</span></td>
                                        
                                        <td>
                                            <router-link :to="`/show-leave-req/${leave.id}`"><i class="fas fa-eye teal"></i></router-link><span></span>
                                            <a href="#" @click="deleteLeave(leave.id)"><i class="fas fa-trash-alt red"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center teal">Leave Requests where you are <span class="red">Recommender</span></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Type</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Duration</th>
                                        <th>Total</th>
                                        <th>Remaining</th>
                                      
                                        <th>Is approved</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="leave in recommenderLeave" :key="leave.id">
                                        <td>{{leave.empname}}</td>
                                        <td>{{leave.empdepartment}}</td>
                                        <td>{{leave.leavetype}}</td>
                                        <td>{{leave.startdate}}</td>
                                        <td>{{leave.enddate}}</td>
                                        <td>{{leave.duration}}</td>
                                        <td>{{leave.totalleave}}</td>
                                        <td>{{leave.available}}</td>
                                       <td v-show="leave.isapprovedbyrecommender == 0"><span class="badge label label-danger">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                       <td v-show="leave.isapprovedbyrecommender == 1"><span class="badge label label-success">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                       <td v-show="leave.isapprovedbyrecommender == null"><span class="badge label label-warning">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                       <!-- <td><span class="badge label label-danger">{{leave.isapprovedbysuperadmin|approvedbysuperadmin}}</span></td> -->
                                      
                                        <td>
                                            <router-link :to="`/showleavereqforrec/${leave.id}`"><i class="fas fa-eye teal"></i></router-link>
                                            <a href=""><i class="fas fa-trash red"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center teal">Leave Requests where you are <span class="red">Reliever</span></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Type</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Duration</th>
                                        <th>Total</th>
                                        <th>Remaining</th>
                                        <th>Is Approved</th>
                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="leave in relieverLeave" :key="leave.id">
                                        <td>{{leave.empname}}</td>
                                        <td>{{leave.empdepartment}}</td>
                                        <td>{{leave.leavetype}}</td>
                                        <td>{{leave.startdate}}</td>
                                        <td>{{leave.enddate}}</td>
                                        <td>{{leave.duration}}</td>
                                        <td>{{leave.totalleave}}</td>
                                        <td>{{leave.available}}</td>
                                        <td v-show="leave.isapprovedbyreliever == 0"><span class="badge label label-danger">{{leave.isapprovedbyreliever|approvedbyreliever}}</span></td>
                                        <td v-show="leave.isapprovedbyreliever == 1"><span class="badge label label-success">{{leave.isapprovedbyreliever|approvedbyreliever}}</span></td>
                                        <td v-show="leave.isapprovedbyreliever == null"><span class="badge label label-warning">{{leave.isapprovedbyreliever|approvedbyreliever}}</span></td>
                                        <td>
                                            <router-link :to="`/show-leave-for-reliev/${leave.id}`"><i class="fas fa-eye teal"></i></router-link>
                                            <a href=""><i class="fas fa-trash red"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    
                             <div class="col-md-6">
                                  <form>
                                   <input v-model="form.email" type="hidden" name="email" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                             
                                    <has-error :form="form" field="mail"></has-error>
                                  </form>
                             </div>
                        </div>
             </div>
    </div>
</template>

<script>
    export default {
        data(){
          return {
              userdata: {},
              leaveRequests: {},
              recommenderLeave: {},
              relieverLeave: {},
              form : new Form({
              
                  email: '',
               
              }),
            
          }
        
        },
        computed: {
              populateForm(){
                this.form.email = this.userdata.email
                
            },
        },
        methods: {
            populateForm2(){
                this.form.email = this.userdata.email
                
            },
            deleteLeave(id){
                axios.delete('api/create-leave/'+id)
                     .then(() => {
                         Bus.$emit('bus-is-on')
                        swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            getLeaveEhereRecommender(){
                console.log(this.form.email)
                axios.get('api/recommender/'+this.form.email)
                   
                     .then(({data}) => {
                         this.recommenderLeave = data
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            getLeaveEhereReliever(){
                console.log(this.form.email)
                axios.get('api/reliever/'+this.form.email)
                   
                     .then(({data}) => {
                         this.relieverLeave = data
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            }
          
        },
        created(){
            // Bus.$on('bus-is-on', () => { this.deleteLeave() })
            axios.get('api/profile')
                 .then(({ data }) => {
                    this.userdata = data
               })
               .catch((eror) => {
                   console.log(error)
               })
               
        // setTimeout(() => {
        //     this.populateForm()
        // }, 1000);
        setTimeout(() => {
            this.populateForm2()
            this.getLeaveEhereReliever()
            this.getLeaveEhereRecommender()
        }, 2000);
         setTimeout(() => {
             this.populateForm2()
             this.getLeaveEhereReliever()
             this.getLeaveEhereRecommender()
         }, 4000);
         },
   
    }
</script>
