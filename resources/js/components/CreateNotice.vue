<template>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Notice</h3>
                    <div class="card-tools">
                        <button class="btn btn-success" @click="createModel">Add Notice</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="note in notices.data" :key="note.id">
                                <td>{{note.header}}</td>
                                <td>{{note.body}}</td>
                                <td>{{note.created_at}}</td>
                                <td>
                                    <a href="#" @click="editModel(note)"><i class="fas fa-edit text-green"></i></a><span> /  </span>
                                    <a href="#" @click="deleteNotice(note.id)"><i class="fas fa-trash-alt text-red"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="card-tools">
                        <router-link class="btn btn-info" to="/profile">Go Back To Profile</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="!editMode" class="modal-title" id="mymodel">Add Notice info</h5>
                    <h5 v-show="editMode" class="modal-title" id="mymodel">Edit Notice info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateNotice(): createNotice()">
                <div class="modal-body">
                     <div class="form-group">
                        <div class="col-sm-12">
                        <input type="text" v-model="form.header" class="form-control" id="header" placeholder="Title.."  :class="{ 'is-invalid': form.errors.has('header') }">
                            <has-error :form="form" field="header"></has-error>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-sm-12">
                        <textarea  v-model="form.body" class="form-control" id="body" placeholder="Description ....." :class="{ 'is-invalid': form.errors.has('body') }"></textarea>
                            <has-error :form="form" field="body"></has-error>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
                    <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
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
            notices: {},
            editMode: false,
            form: new Form({
                  id: '',
                  header: '',
                  body: '',
            })
        }
    },
    methods: {
        updateNotice(){
            this.form.put('api/notice/'+this.form.id)
                .then(() => {
                          swal.fire(
                                    'Updated',
                                    'Your file has been updated.',
                                    'success'
                                    )
                         Bus.$emit('busstarted')
                          $('#myModal').modal('show')
                         
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        createModel(){
            this.editMode = false
            $('#myModal').modal('show')
            this.form.reset()



        },
        editModel(data){
            this.editMode = true
            $('#myModal').modal('show')
            this.form.fill(data)
        },
        deleteNotice(id){
            this.form.delete('api/notice/'+id)
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
         loadNotice(){
             axios.get('api/notice')
                  .then(({data}) => {
                      this.notices = data
                  })
                  .catch((error) => {
                      console.log(error)
                  })
         },
          createNotice(){
              this.form.post('api/notice')
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
          },
    },
    created(){
        this.loadNotice()
        Bus.$on('busstarted', () => {this.loadNotice()})
        console.log('created')
    }
}
</script>