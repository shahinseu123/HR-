<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>General Schedule</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="createModel"><i class="fas fa-user-plus fa-fw"></i> Add Schedule</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>Employee ID</th>
                                     <th>Name</th>
                                     <th>Department</th>
                                     <th>Shedule from</th>
                                     <th>Shedule to</th>
                                     <th>Registered</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr  v-for="sc in generalSchedules.data" :key="sc.id">
                                     <td>{{sc.empid}}</td>
                                      <td>{{sc.name}}</td>
                                       <td>{{sc.department}}</td>
                                        <td>{{sc.schedulefrom}}</td>
                                        <td>{{sc.scheduleto}}</td>
                                        <td>{{sc.created_at}}</td>
                                         <td><a @click="editModel(sc)"  href="#"><i class="fas fa-edit fa-fw fontbig blue"></i> </a><a @click="deleteSchedule(sc.id)" href="#"><i class="fas fa-trash-alt fa-fw fontbig red"></i></a> </td>
                                 </tr>
                             </tbody>
                             <!-- <div class="card-footer"></div> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
              <div class="modal" id="myModal">
                <div class="modal-dialog model-dialog-centered" role="document">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <!-- <h4  class="modal-title">Add Schedule</h4> -->
                        <h4 v-show="!editMode" class="modal-title">Add Schedule</h4>
                        <h4 v-show="editMode" class="modal-title">Edit Schedule info</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                <form @submit.prevent="editMode ? updateSchedule() : createGeneralSchedule()">
           <!-- edit  -->
         <div class="modal-body">
         
            <div class="form-group">
                        <input v-model="form.empid" type="text" name="empid"
                            placeholder="Employee ID"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('empid') }">
                        <has-error :form="form" field="empid"></has-error>
                        </div>
                      
                        <div class="form-group">
                        <input v-model="form.name" type="name" name="name"
                            placeholder="Employee name"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                        </div>

                       <div class="form-group">
                          <input v-model="form.department" name="department" id="department" type="text"
                           placeholder="Employee department"
                           class="form-control" :class="{ 'is-invalid': form.errors.has('department') }">
                           <has-error :form="form" field="department"></has-error>
                       </div>

                        <div class="form-group">
                           <input v-model="form.schedulefrom" type="text" name="schedulefrom" id="schedulefrom"
                           placeholder="Employee Shedule from"
                           class="form-control" :class="{ 'is-invalid': form.errors.has('shedulefrom') }">
                           <has-error :form="form" field="shedulefrom"></has-error>
                        </div>

                          <div class="form-group">
                           <input v-model="form.scheduleto" type="text" name="scheduleto" id="scheduleto"
                           placeholder="Employee Schedule to"
                           class="form-control" :class="{ 'is-invalid': form.errors.has('scheduleto') }">
                           <has-error :form="form" field="scheduleto"></has-error>
                        </div>

             </div>

      <!-- Modal footer -->
                 <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                 <!-- edit  -->
                 <button type="submit" v-show="!editMode" class="btn btn-success"><i class="fas fa-save"></i>  Create</button>
                 <button type="submit" v-show="editMode" class="btn btn-success"><i class="fas fa-save"></i>  Update</button>
                 <!-- <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>  Create</button> -->
                
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
            generalSchedules: {},
            form: new Form({
                id: '',
                empid: '',
                name: '',
                department: '',
                schedulefrom: '',
                scheduleto: ''
            })
          }
        },
        methods: {
            updateSchedule(){
                 this.form.put('api/generalschedule/'+this.form.id)
                     .then(() => {
                          swal.fire(
                                    'Updated!',
                                    'Your file has been Updated.',
                                    'success'
                                    )
                    $('#myModal').modal('hide')
                    Bus.$emit('busstarted')
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            createModel(){
                 this.editMode = false
                 this.form.reset()
                 $('#myModal').modal('show')

            },
            editModel(v){
                this.editMode = true
                $('#myModal').modal('show')
                this.form.fill(v)

            },
            deleteSchedule(id){
                axios.delete('api/generalschedule/'+id)
                     .then(() => {
                        swal.fire(
                                    'Updated!',
                                    'Your file has been Updated.',
                                    'success'
                                    )
                   
                    Bus.$emit('busstarted')
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            loadGeneralSchedule(){
                axios.get('api/generalschedule')
                     .then(({data}) => {
                          this.generalSchedules = data
                     })
                     .catch((error) => {
                         console.log(error)
                     })
            },
            createGeneralSchedule(){
                this.form.post('api/generalschedule')
                    .then(() => {
                       swal.fire(
                                    'Created!',
                                    'Your file has been Created.',
                                    'success'
                                    )
                   
                    Bus.$emit('busstarted')
                     $('#myModal').modal('hide')
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
        },
        mounted() {
            this.loadGeneralSchedule()
            Bus.$on('busstarted', () => {this.loadGeneralSchedule()})
            console.log('Component mounted.')
        }
    }

</script>



