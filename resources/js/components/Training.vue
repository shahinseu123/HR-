<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Training info</h3>
                        <div class="card-tools">
                             <button class="btn btn-success" @click="createModal"> Add Training</button>
                             </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Training on</th>
                                    <th>Training Type</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in trainings.data" :key="item.id">
                                    <td>{{item.empid}}</td>
                                    <td>{{item.name}}</td>
                                    <td>{{item.department}}</td>
                                    <td>{{item.startdate}}</td>
                                    <td>{{item.enddate}}</td>
                                    <td>{{item.trainingon}}</td>
                                    <td>{{item.trainingtype}}</td>
                                    <td>{{item.remark}}</td>
                                    <td>
                                        <a href="#" @click="editModal(item)"  ><i class="fas fa-edit green"></i></a><span>/</span> <a href="#" @click="deleteTraining(item.id)"><i class="fas fa-trash-alt red"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                                <!-- modal  -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Add Training</h5>
                                <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Edit Training</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="editMode ? updateTraining() : createTraining()">
                            <div class="modal-body">
                                 <div class="form-group">
                                     <!-- <div class="card"> -->
                                         <div class="row">
                                             <div class="col-md-12 mb-2">                                               
                                                    <input v-model="form.empid" type="text" name="empid" placeholder="Enter Employee ID" 
                                                        class="form-control" :class="{ 'is-invalid': form.errors.has('empid') }">
                                                    <has-error :form="form" field="empid"></has-error>
                                              </div>
                                             <div class="col-md-12 mb-2">                                               
                                                    <input v-model="form.name" type="text" name="empid" placeholder="Enter Employee name" 
                                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                                    <has-error :form="form" field="name"></has-error>
                                              </div>
                                             <div class="col-md-12 mb-2">                                               
                                                    <input v-model="form.department" type="text" name="empid" placeholder="Enter Employee department" 
                                                        class="form-control" :class="{ 'is-invalid': form.errors.has('department') }">
                                                    <has-error :form="form" field="department"></has-error>
                                              </div>
                                             <div class="col-md-12 mb-2">                                               
                                                    <input v-model="form.startdate" type="date" name="startdate"  
                                                        class="form-control" :class="{ 'is-invalid': form.errors.has('startdate') }">
                                                    <has-error :form="form" field="startdate"></has-error>
                                              </div>
                                             <div class="col-md-12 mb-2">                                               
                                                    <input v-model="form.enddate" type="date" name="startdate"  
                                                        class="form-control" :class="{ 'is-invalid': form.errors.has('enddate') }">
                                                    <has-error :form="form" field="enddate"></has-error>
                                              </div>
                                             <div class="col-md-12 mb-2">                                               
                                                    <input v-model="form.trainingon" type="text" name="trainingon" placeholder="Training on"
                                                        class="form-control" :class="{ 'is-invalid': form.errors.has('trainingon') }">
                                                    <has-error :form="form" field="trainingon"></has-error>
                                              </div>
                                             <div class="col-md-12 mb-2">                                               
                                                    <input v-model="form.trainingtype" type="text" name="trainingtype" placeholder="Training Type"
                                                        class="form-control" :class="{ 'is-invalid': form.errors.has('trainingtype') }">
                                                    <has-error :form="form" field="trainingtype"></has-error>
                                              </div>
                                             <div class="col-md-12 mb-2">                                               
                                                    <textarea class="form-control" v-model="form.remark" placeholder="Enter Deails" rows="3" name="notes" cols="50" id="notes"  :class="{ 'is-invalid': form.errors.has('remark') }"></textarea> 
                                                       <has-error :form="form" field="remark"></has-error>
                                              </div>
                                          </div>
                                       <!-- </div> -->
                               </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button v-show="!editMode" type="submit" class="btn btn-success">Create </button>
                                <button v-show="editMode" type="submit" class="btn btn-success">Create </button>
                            </div>
                            </form>
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
            trainings: {},
            editMode: true,
            form: new Form({
                id: '',
                empid: '',
                name: '',
                department: '',
                startdate: '',
                enddate: '',
                trainingon: '',
                trainingtype: '',
                remark: ''
            })
        }
    },
    methods: {
       createModal(){
           this.form.reset()
           this.editMode = false
             $('#myModal').modal('show')


       },
       updateTraining(){
           this.form.put('api/training/'+this.form.id)
               .then(() => {
                     swal.fire(
                                    'Updated!',
                                    'Your file has been Updated.',
                                    'success'
                                    )
                   
                    Bus.$emit('busstarted')
                     $('#myModal').modal('hide')
               })
               .catch((error) => {
                   console.log(error)
               })
       },
       editModal(v){
             this.editMode = true
             $('#myModal').modal('show')
             this.form.fill(v)
            //  this.form.reset()

           
       },
       deleteTraining(id){
            axios.delete('api/training/'+id)
                .then(() => {
                      swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                            Bus.$emit('busstarted') 
                })
                .catch((error) => {
                    console.log(error)
                })
       },
       loadTraining(){
           axios.get('api/training')
                .then(({data}) => {
                    this.trainings = data
                })
                .catch((error) => {
                    console.log(error)
                })
       },
       createTraining(){
           this.form.post('api/training')
               .then(() => {
                     swal.fire(
                                    'Created!',
                                    'Your file has been created.',
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
    created(){
          this.loadTraining(),
          Bus.$on('busstarted', () => this.loadTraining()) 
    }
    ,
    updated(){
        console.log('component updated')
    }
}
</script>
