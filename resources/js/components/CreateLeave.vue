<template>
   <div class="container">
      <div class="row">
          <div class="col-md-12">
          <form @submit.prevent="sendLeaveRequest">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Create a Leave Request</h3>
                </div>
                   <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label for="notes" class="control-label">Employee ID</label>
                                <input  v-model="form.empid" type="text" name="empid" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('empid') }">
                                <has-error :form="form" field="empid"></has-error>
                             </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                  <label for="empname" class="control-label">Employee Name</label>
                                  <input v-model="form.empname" type="text" name="empname" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('empname') }">
                                <has-error :form="form" field="empdepartment"></has-error>
                             </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label for="empdepartment" class="control-label">Employee Department</label>
                                <input v-model="form.empdepartment" type="text" name="empdepartment" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('empdepartment') }">
                                <has-error :form="form" field="empdepartment"></has-error>
                             </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                  <label for="empemail" class="control-label">Employee Email</label>
                                   <input v-model="form.empemail" type="text" name="empemail" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('empemail') }">
                             
                                <has-error :form="form" field="empemail"></has-error>
                             </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label for="notes" class="control-label">Leave Type</label>
                                 <select id="item-tax-0" class="form-control select2 select2-hidden-accessible" v-model="form.leavetype" name="leavetype" tabindex="-1" aria-hidden="true" :class="{ 'is-invalid': form.errors.has('leavetype') }">
                                    <option selected value="">- Select Leave Type -</option>
                                    <option value="sick leave">Sick Leave</option>
                                    <option value="casual leave">Casual Leave</option>
                                    <option value="unpaid leave">Unpaid Leave</option>
                              </select>
                               <has-error :form="form" field="leavetype"></has-error>
                             </div>
                        </div>
                         <div class="col-md-6">
                           
                              <div class="form-group">
                                 <label for="startdate" class="control-label">Start Date</label>
                                <input v-model="form.startdate" type="date" name="startdate"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('startdate') }">
                                <has-error :form="form" field="startdate"></has-error>
                             </div>
                             <!-- $data[latestInvoice.id ? item.invoice_id = latestInvoice.id : '0']" -->
                        </div>
                    </div>
                      <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                  <label for="duration" class="control-label">Duration</label>
                                <input v-model="form.duration" type="text" name="duration" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('duration') }">
                                <has-error :form="form" field="duration"></has-error>
                             </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label for="enddate" class="control-label">End Date</label>
                                <input @change="substructDate" v-model="form.enddate" type="date" name="enddate"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('enddate') }">
                                <has-error :form="form" field="enddate"></has-error>
                             </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                   <label for="available" class="control-label">Total Leave </label>
                                <input v-model="form.totalleave" type="text" name="totalleave"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('totalleave') }">
                                <has-error :form="form" field="totalleave"></has-error>
                             </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                  <label for="available" class="control-label">Available Leave </label>
                                <input v-model="form.available" type="text" name="available" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('available') }">
                                <has-error :form="form" field="available"></has-error>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                             <label for="reason" class="control-label">Reason for leave</label>
                                <textarea class="form-control" v-model="form.reason" placeholder="Enter Reasosn" rows="3" name="notes" cols="50" id="notes"  :class="{ 'is-invalid': form.errors.has('reason') }"></textarea> 
                                <has-error :form="form" field="reason"></has-error>
                        </div>
                    
                        <div class="col-md-12 mb-3">
                             <label for="reason" class="control-label">Address</label>
                                <textarea class="form-control" v-model="form.address" placeholder="Enter Adress" rows="3" name="notes" cols="50" id="notes"  :class="{ 'is-invalid': form.errors.has('address') }"></textarea> 
                                <has-error :form="form" field="address"></has-error>
                        </div>
                     <div class="container">
                         <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="relieverDep" class="control-label">Reliever Department</label>
                                    <select @change="getEmployees" id="item-tax-0" class="form-control select2 select2-hidden-accessible" v-model="form.relieverDep" name="relieverDep" tabindex="-1" aria-hidden="true" :class="{ 'is-invalid': form.errors.has('relieverDep') }">
                                        <option selected value="">- Select Department -</option>
                                        <option v-for="dep in departments.data" :key="dep.id" :value="dep.name">{{dep.name}}</option>
                                   </select>
                                <has-error :form="form" field="relieverDep"></has-error>
                                </div>
                            </div> 
                            <div class="col-md-6"> 
                             <div class="form-group">
                                    <label for="notes" class="control-label">Recommender Department</label>
                                    <select @change="getEmployees2" id="item-tax-0" class="form-control select2 select2-hidden-accessible" v-model="form.recommenderDep" name="recommenderDep" tabindex="-1" aria-hidden="true" :class="{ 'is-invalid': form.errors.has('recommenderDep') }">
                                        <option selected value="">- Select Department -</option>
                                        <option v-for="dep in departments.data" :key="dep.id" :value="dep.name">{{dep.name}}</option>
                                   </select>
                                <has-error :form="form" field="recommenderDep"></has-error>
                                </div> 
                            </div>
                         </div>
                         <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reliever" class="control-label">Reliever Name </label>
                                    <select @change="byActionSelect" id="item-tax-0" class="form-control select2 select2-hidden-accessible" v-model="form.reliever" name="reliever" tabindex="-1" aria-hidden="true" :class="{ 'is-invalid': form.errors.has('reliever') }">
                                        <option selected value="">- Select Name -</option>
                                        <option v-for="dep in employees" :key="dep.id" :value="dep.name">{{dep.name}}</option>
                                   </select>
                                    <has-error :form="form" field="reliever"></has-error>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="recommender" class="control-label">Recommender Name </label>
                                    <select @change="byActionSelectRec" id="item-tax-0" class="form-control select2 select2-hidden-accessible" v-model="form.recommender" name="recommender" tabindex="-1" aria-hidden="true" :class="{ 'is-invalid': form.errors.has('recommender') }">
                                        <option selected value="">- Select Name -</option>
                                        <option v-for="dep in employees2" :key="dep.id" :value="dep.name">{{dep.name}}</option>
                                   </select>
                                    <has-error :form="form" field="recommender"></has-error>
                                </div>
                            </div>
                         </div>
                    </div>
                    </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12">
                           <button type="submit" class="btn btn-success mb-3">Create</button>
                           <button @click="gotoprofile" type="button" class="btn btn-danger mb-3">Back</button>
                       </div>
                    </div>
                <!-- <button @click="substructDate" class="btn btn-success">ckick</button> -->
                
        
           </form>
          </div>
      </div>
   </div>
</template>
<script>

export default {
   
    data(){
       return {
           profile: {},
           employees: {},
           employees2: {},
           departments: {},
   
           selectRelev: '',
           form: new Form({
               id: '',
               empid: '',
               empemail: '',
               empname: '',
               empdepartment: '',
               leavetype: '',
               startdate: '',
               enddate: '',
               available: '',
               reliever: '',
               relieverDep: '',
               relieverEmail: '',
               reason: '',
               totalleave: '20',
               recommenderDep: '',
               recommender: '',
               recommenderEmail: '',
               duration: '',
               address: ''

           })
       }
    },
   
    methods: {
        setRecom(){
           this.employees2.forEach(ele => {
               if(this.form.recommender === ele.name){
                  console.log(ele.name +' is the recommender '+ele.email)
                  this.form.recommenderEmail = ele.email
               }
           });
        },
        setReli(){
           this.employees.forEach(ele => {
               if(this.form.reliever === ele.name){
                  console.log(ele.name +' is the reliever '+ele.email)
                  this.form.relieverEmail = ele.email
               }
           });
        },
        gotoprofile(){
               this.$router.push('/profile')
        },
        
        setProfile(){
            this.form.empid = this.profile.empid
            this.form.empname = this.profile.name
            this.form.empemail = this.profile.email
            this.form.empdepartment = this.profile.department
        },
        sendLeaveRequest(){
            this.form.post('api/create-leave')
                .then(() => {
                      swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            this.$router.push("/profile")
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        availableLeaveCount(){
            this.form.available = this.form.totalleave - this.form.duration
        },
        substructDate(){
                var dt1 = new Date(this.form.startdate);
                var dt2 = new Date(this.form.enddate);
                  
                    this.form.duration = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
                    this.availableLeaveCount()  
        },
        byActionSelect(){
                this.setReli()
        },
         byActionSelectRec(){
                 this.setRecom()
                            //  console.log('hello'+this.form.recommenderEmail)
        },
        getDepartments(){
            axios.get('api/marketing')
                 .then(({data}) => {
                     this.departments = data
                 })
        },
        getEmployees(){
            axios.get('api/employee/'+this.form.relieverDep)
                .then(({data}) => {
                    this.employees = data
                  
                })
                .catch((error) => {
                    console.log(error)
                })
        },
         getEmployees2(){
            axios.get('api/employee/'+this.form.recommenderDep)
                .then(({data}) => {
                    this.employees2 = data
                     
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        getUser(){
            axios.get('api/profile')
                 .then(({data}) => {
                     this.profile = data
                 })
        }

    },
    mounted(){
        this.getDepartments()
        this.getUser();
        console.log('mounted')
    setTimeout(() => {
            this.setProfile()
            // this.setRecom()
        
    }, 1000);
    },

}
// Client ID: 1
// Client secret: Rf1RiUqHqz2QfW9ddUHqYhk71WfJZABB9QBZguJu
// Password grant client created successfully.
// Client ID: 2
// Client secret: KBTRpBjwzd6n0NfhPI9XF1FPhiS73q1IroVKZNXq
</script>