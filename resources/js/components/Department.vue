<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                 <div class="card-header">
                    <h3>Department info</h3>
                    <div class="card-tools"><button type="button" @click="editMode = false" data-toggle="modal" data-target="#myModal" class="btn btn-info">Add Department</button></div>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                       
                        <th>Name</th>
        
                        <th>Modify</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="stuff in departments.data" :key="stuff.id">
                      
                        <td>{{stuff.name}}</td>
                      
                        <td>
                            <!-- edit  -->
                            <a href="#" @click="editDepartment(stuff)"><i class="fas fa-edit green"></i></a><span> /  </span><a href="#" @click="deleteDepartment(stuff.id)"><i class="fas fa-trash-alt red"></i></a>
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
                        <h4 v-show="!editMode" class="modal-title">Add Department</h4>
                        <h4 v-show="editMode" class="modal-title">Update Department info</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                <form @submit.prevent="editMode ? updateDepartment() : createDepartment()">
           <!-- edit  -->
                    <div class="modal-body">
                    
                        <div class="form-group">
                                    <div class="form-group">
                                    <input v-model="form.name" type="name" name="name"
                                        placeholder="Department name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                    </div>
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
                departments: {},
                // marketinglength: null,
                form : new Form({
                   id: '',
                //    idno: '',
                   name: '',
                //    email: '',
                //    designation:'',
                //    department: ''

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
            updateDepartment(){
                this.form.put('api/marketing/'+this.form.id)
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
            editDepartment(stuff){
                 this.editMode = true;
                 this.form.reset()
                 $('#myModal').modal('show')
                 this.form.fill(stuff);
                //   axios.fill('api/employee/'+id)
                console.log('edit marketinf')

            },
            deleteDepartment(id){
                 axios.delete('api/marketing/'+id)
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
            createDepartment(){
                 this.editMode = false;
                 this.form.post('api/marketing')
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
            //  editDepartment(stuff){
            //       this.editMode = true;
            //      this.form.reset()
            //      $('#myModal').modal('show')
            //      this.form.fill(stuff);
            //     console.log('edit sales')
            //     //   axios.fill('api/employee/'+id)

            // },

            loadMarketing(){
               
              axios.get('api/marketing')
                    .then(({data})=>{
                     this.departments = data 
                    //  this.marketinglength = data.data.length
                     Bus.$emit('eventbus', this.marketinglength)
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
            this.loadMarketing()
            Bus.$on('busstarted', ()=>{
                this.loadMarketing()
            })
        },
      
    }
</script>

