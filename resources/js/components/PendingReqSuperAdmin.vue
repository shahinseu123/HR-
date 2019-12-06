
<template>
    <div class="container">
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center teal">Pending Leave Requests</h3>
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
                                        <th>Admin Approval</th>
                                        <th>Recommender Approval</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="leave in leavePending" :key="leave.id">
                                        <td>{{leave.empname}}</td>
                                        <td>{{leave.empdepartment}}</td>
                                        <td>{{leave.leavetype}}</td>
                                        <td>{{leave.startdate}}</td>
                                        <td>{{leave.enddate}}</td>
                                        <td>{{leave.duration}}</td>
                                        <td>{{leave.totalleave}}</td>
                                        <td>{{leave.available}}</td>
                                        <td v-show="leave.isapprovedbyadmin == 0"><span class="badge label label-danger">{{leave.isapprovedbyadmin|approvedbyadmin}}</span></td>
                                        <td v-show="leave.isapprovedbyadmin == 1"><span class="badge label label-success">{{leave.isapprovedbyadmin|approvedbyadmin}}</span></td>
                                        <td v-show="leave.isapprovedbyadmin == null"><span class="badge label label-success">{{leave.isapprovedbyadmin|approvedbyadmin}}</span></td>
                                        
                                      
                                         <td v-show="leave.isapprovedbyrecommender == 0"><span class="badge label label-danger">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                        <td v-show="leave.isapprovedbyrecommender == 1"><span class="badge label label-success">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                        <td v-show="leave.isapprovedbyrecommender == null"><span class="badge label label-warning">{{leave.isapprovedbyrecommender|approvedbyrecommender}}</span></td>
                                        <td>
                                            <!-- <router-link to=""><i class="fas fa-eye green"></i></router-link>/ -->
                                            <router-link :to="`/show-leave-from-super-admin/${leave.id}`"><i class="fas fa-eye teal"></i></router-link>
                                            <a href=""><i class="fas fa-trash red"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
            </div>
</template>

<script>
    export default {
        data(){
          return {
             
              leavePending: {},
              leavependingleng: null

          }
        
        },
        methods: {
            sendLeanth(){
               Bus.$emit('sendTheLen', this.leavependingleng)
            },
            getLeaveReqForSuperAdmin(){
                axios.get('api/createleaveforsuperadmin')
                     .then(({data}) => {
                         this.leavePending = data
                         this.leavependingleng = data.length
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            }
      
        },
        created(){
            this.getLeaveReqForSuperAdmin()
            // this.getInvoices()
            // this.getPurchase()
            // this.getLeaveRequest()
            Bus.$on('trigger-gun', () => { this.sendLeanth()})
              
        }
    }
</script>
