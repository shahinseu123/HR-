

<style>
   /* .widget-user-header{
       background-position : center center;
       background-size : cover;
       height: 250px;
   }
   .widget-user-image img{
       height: 100px;
       margin-left:420px;
   } */
</style>
<template>
    <div class="container">
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center teal">Discurded Leave Requests</h3>
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
                                        <th>HR Approval</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="leave in leaveRequests.data" :key="leave.id">
                                        <td>{{leave.empname}}</td>
                                        <td>{{leave.empdepartment}}</td>
                                        <td>{{leave.leavetype}}</td>
                                        <td>{{leave.startdate}}</td>
                                        <td>{{leave.enddate}}</td>
                                        <td>{{leave.duration}}</td>
                                        <td>{{leave.totalleave}}</td>
                                        <td>{{leave.available}}</td>
                                        <td>{{leave.isapproveadmin}}</td>
                                        <td>{{leave.isapprovesuperadmin}}</td>
                                        <td> 
                                            <!-- <router-link to=""><i class="fas fa-eye green"></i></router-link>/ -->
                                            <router-link :to="`/show-leave-from-admin/${leave.id}`"><i class="fas fa-eye teal"></i></router-link>/
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
             
              leaveRequests: {},
             
            
          }
        
        },
        methods: {
           getleavediscurdadmin(){
               axios.get('api/createleaverejectforadmin')
                    .then(({data}) => {
                        this.leaveRequests = data
                    })
                    .catch((error) => {
                        comsole.log(error)
                    })
           }
        },
        created(){
           this.getleavediscurdadmin()
        }
    }
</script>
