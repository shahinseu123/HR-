
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
                                        <th>HR Approval</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <td>{{leave.empname}}</td>
                                        <td>{{leave.empdepartment}}</td>
                                        <td>{{leave.leavetype}}</td>
                                        <td>{{leave.startdate}}</td>
                                        <td>{{leave.enddate}}</td>
                                        <td>{{leave.duration}}</td>
                                        <td>{{leave.totalleave}}</td>
                                        <td>{{leave.available}}</td>
                                        <td>{{leave.isapproveadmin}}</td>
                                        <td>{{leave.isapprovesuperadmin}}</td> -->
                                        <td> 
                                            <router-link to=""><i class="fas fa-eye teal"></i></router-link>/
                                            <!-- <router-link :to="`/show-leave-req/${leave.id}`"><i class="fas fa-eye teal"></i></router-link>/ -->
                                            <a href=""><i class="fas fa-trash red"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                           <h3 class="text-center teal">Pending Invoices Requests</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Currency</th>
                                        <th>Details</th>
                                        <th>Invoice Date</th>
                                        <th>Due date</th>
                                        <th>Invoice Number</th>
                                        <th>Order Number</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Admin Approval</th>
                                        <th>HR Approval</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Approved</td>
                                        <td>Approved</td>
                                        <td>
                                            <!-- <router-link :to="`/show-invoice/${invo.id}`"><i class="fas fa-eye teal"></i></router-link>/ -->
                                            <router-link to="" ><i class="fas fa-eye teal"></i></router-link>/
                                            <a href=""><i class="fas fa-trash red"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                           <h3 class="text-center teal">Pending Purchase Requests</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vendor</th>
                                        <th>Currency</th>
                                        <th>Details</th>
                                        <th>Purchase Date</th>
                                        <th>Due date</th>
                                        <th>Purchase Number</th>
                                        <th>Order Number</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Admin Approval</th>
                                        <th>HR Approval</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <tr > 
                                        <td>Approved</td>
                                        <td>Approved</td>
                                        <td>
                                            <!-- <router-link :to="`/show-purchase/${pur.id}`"><i class="fas fa-eye teal"></i></router-link>/ -->
                                            <router-link to=""><i class="fas fa-eye teal"></i></router-link>/
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
              userdata: {},
              leaveRequests: {},
              invoiceRequests: {},
              purchaseRequests: {},
            
            
          }
        
        },
        methods: {
           getInvoices(){
               axios.get('api/invoice')
                    .then(({data}) => {
                        this.invoiceRequests = data
                    })
                    .catch((error) => {
                        console.log(error)
                    })
           },
           getPurchase(){
               axios.get('api/purchase')
                    .then(({data}) => {
                       this.purchaseRequests = data
                    })
                    .catch((error) => {
                        console.log(error)
                    })
           },
           getLeaveRequest(){
               axios.get('api/create-leave')
                    .then(({data}) => {
                       this.leaveRequests = data
                    })
                    .catch((error) => {
                        console.log(error)
                    })
           }
        },
        created(){
            this.getInvoices()
            this.getPurchase()
            this.getLeaveRequest()
              
        }
    }
</script>
