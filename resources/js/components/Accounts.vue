<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                 <div class="card-header">
                    <h3>Accounts info</h3>
                    <div class="card-tools"><button type="button" @click="editMode = false" data-toggle="modal" data-target="#myModal" class="btn btn-info">Add Employee</button></div>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Join date</th>
                        <th>Modify</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="stuff in accounts.data" :key="stuff.id">
                        <td>{{stuff.idno}}</td>
                        <td>{{stuff.name}}</td>
                        <td>{{stuff.email}}</td>
                        <td>{{stuff.designation}}</td>
                        <td>{{stuff.department}}</td>
                        <td>{{stuff.created_at}}</td>
                        <td>
                            <!-- edit  -->
                          <a href="#" @click="editAccount(stuff)"  ><i class="fas fa-edit green"></i></a><span> /  </span><a href="#" @click="deleteAccount(stuff.id)"><i class="fas fa-trash-alt red"></i></a>
                            <!-- edit  -->
                        </td>

                     </tr>
                    </tbody>
                </table>
                  </div>
                  <!-- <div class="card-footer">

                      <pagination :data="employees" @pagination-change-page="getResults"></pagination>
                  </div> -->
            </div>
            </div>
        </div>

        
             
          <!-- model  -->
          <div class="modal" id="myModal">
                <div class="modal-dialog model-dialog-centered" role="document">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 v-show="!editMode" class="modal-title">Add Employee</h4>
                        <h4 v-show="editMode" class="modal-title">Update Employee info</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                <form @submit.prevent="editMode ? updateAccount() : createAccount()">
           <!-- edit  -->
         <div class="modal-body">
         
            <div class="form-group">
                        <input v-model="form.idno" type="text" name="name"
                            placeholder="Employee ID"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('idno') }">
                        <has-error :form="form" field="idno"></has-error>
                        </div>

                        <div class="form-group">
                        <input v-model="form.name" type="name" name="name"
                            placeholder="Employee name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                        </div>

                       <div class="form-group">
                          <input v-model="form.email" name="email" id="email"
                           placeholder="Employee email"
                           class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                           <has-error :form="form" field="email"></has-error>
                       </div>

                        <div class="form-group">
                           <input v-model="form.designation" type="text" name="designation" id="designation"
                           placeholder="Employee designation"
                           class="form-control" :class="{ 'is-invalid': form.errors.has('designation') }">
                           <has-error :form="form" field="designation"></has-error>
                        </div>

                          <div class="form-group">
                           <input v-model="form.department" type="text" name="designation" id="department"
                           placeholder="Employee department"
                           class="form-control" :class="{ 'is-invalid': form.errors.has('department') }">
                           <has-error :form="form" field="department"></has-error>
                        </div>

             </div>

      <!-- Modal footer -->
                 <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                 <!-- edit  -->
                 <button type="submit" v-show="!editMode" class="btn btn-success"><i class="fas fa-save"></i>  Create</button>
                 <button type="submit" v-show="editMode" class="btn btn-success"><i class="fas fa-save"></i>  Update</button>
                
                 <!-- edit  -->
                </div>

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
                editMode: false,
                accounts: {},
                accountlength: null,
                form : new Form({
                   id: '',
                   idno: '',
                   name: '',
                   email: '',
                   designation:'',
                   department: ''

               }) 
            }
        },
        // created() {
        //     console.log('Component mounted.')
        //     this.loadUsers()
        // },
        methods :{
        //     getResults(page = 1) {
		// 	axios.get('api/employee?page=' + page)
		// 		.then(response => {
		// 			this.employees = response.data;
		// 		});
		// },
            updateAccount(){
                this.form.put('api/account/'+this.form.id)
                .then(() => {
                         swal.fire(
                                    'Updated!',
                                    'Your file has been Updated.',
                                    'success'
                                    )
                   
                    Bus.$emit('busstarted')
                     $('#myModal').modal('hide')
                })
                .catch(() => {
                       swal.fire({
                                        type: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                        footer: '<a href>Why do I have this issue?</a>'
                                        })       
                })
            },
           
            deleteAccount(id){
                 axios.delete('api/account/'+id)
                 .then(() => {
                      swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                            Bus.$emit('busstarted')
                 })
                 .catch(() => {
                        swal.fire({
                                        type: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                        footer: '<a href>Why do I have this issue?</a>'
                                        })
                 })
            },
            createAccount(){
                 this.editMode = false;
                 this.form.post('api/account')
                    .then(()=>{
                         $('#myModal').modal('hide')
                          swal.fire(
                                    'Created!',
                                    'Your file has been created.',
                                    'success'
                                    )
                            Bus.$emit('busstarted') 
                             this.form.reset()    

                    }).catch(()=>{
                           swal.fire({
                                        type: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                        footer: '<a href>Why do I have this issue?</a>'
                                        })
                    })
            },
              editAccount(stuff){
                this.editMode = true;
                this.form.reset()
                $('#myModal').modal('show')
                this.form.fill(stuff);
                console.log('edit account')
               
            },

            loadAccount(){
               
              axios.get('api/account')
                    .then(({data})=>{
                     this.accounts = data 
                     this.accountlength = data.data.length
                     Bus.$emit('eventbus', this.accountlength)
                     }).catch(() => {

                     })

            
        }
        
      },
        created() {
            //  Bus.$on('searchit', ()=>{
            //       let query = this.$parent.search;
            //        axios.get('api/findEmp?q=' + query)
            //       .then((data) => {
            //       this.employees = data.data
            //       })
            //       .catch(() => {
            //           swal.fire({
            //                     type: 'error',
            //                     title: 'Oops...',
            //                     text: 'Something went wrong!',
            //                     footer: '<a href>Why do I have this issue?</a>'
            //                     })
            //     })
            //  })
            console.log('Component mounted.')
            this.loadAccount()
            Bus.$on('busstarted', ()=>{
                this.loadAccount()
            })
        },
      
    }
</script>

