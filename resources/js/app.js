

require('./bootstrap');

window.Vue = require('vue');
// import Treeselect from '@riophae/vue-treeselect'
// // import the styles
// import '@riophae/vue-treeselect/dist/vue-treeselect.css'

import Gate from './Gate'

Vue.prototype.$gate = new Gate(window.user)


import VueRouter from 'vue-router'
import moment from 'moment'
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
  })
  
  // ES6 Modules or TypeScript
  import Swal from 'sweetalert2'
  
  // CommonJS
  window.Bus = new Vue()
  
  window.swal = Swal;
  
  const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  window.toast = toast

  Vue.filter('upText', (value)=>{
    return value.charAt(0).toUpperCase() + value.slice(1)
  })
  Vue.filter('momentTime', (time)=>{
    return moment(time).format("MMM Do YY")
  })
  Vue.filter('approvedbyreliever', (v)=>{
     if(v === 0){
       v = 'Not Approved'
     }else if(v == 1){
       v = 'Approved'
     }else{
       v = 'Pending'
     }
     return v;
  })
  Vue.filter('approvedbyrecommender', (v)=>{
     if(v === 0){
       v = 'Not Approved'
     }else if(v == 1){
       v = 'Approved'
     }else{
       v = 'Pending'
     }
     return v;
  })
  Vue.filter('approvedbyadmin', (v)=>{
     if(v === 0){
       v = 'Not Approved'
     }else if(v == 1){
       v = 'Approved'
     }else{
       v = 'Pending'
     }
     return v;
  })
  Vue.filter('approvedbysuperadmin', (v)=>{
     if(v === 0){
       v = 'Not Approved'
     }else if(v == 1){
       v = 'Approved'
     }else{
       v = 'Pending'
     }
     return v;
  })

import { Form, HasError, AlertError } from 'vform'
window.Form = Form

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import User from './components/User'
import Employee from './components/Employee'
import Holidays from './components/Holidays'
import Notice from './components/Notice'
import Performence from './components/Performence'
import Training from './components/Training'
import Profile from './components/Profile'
import Dashboard from './components/Dashboard'
import CreateNotice from './components/CreateNotice'
import GeneralSchedule from './components/GeneralSchedule'
import CreateInvoice from './components/CreateInvoice'
import Category from './components/Category'
import Customer from './components/Customer'
import Vendor from './components/Vendor'
import CreatePurchase from './components/CreatePurchase'
import CreateLeave from './components/CreateLeave'
// import Software from './components/Software'
// import Itdepartment from './components/Itdepartment'
import Department from './components/Department'
// import Sales from './components/Sales'
// import Accounts from './components/Accounts'
import API from './components/API'
import ShowLeaveReq from './components/ShowLeaveReq'
import ShowPurchase from './components/ShowPurchase'
import ShowInvoice from './components/ShowInvoice'
import PendingReqAdmin from './components/PendingReqAdmin'
import ApprovedReqAdmin from './components/ApprovedReqAdmin'
import DiscurdedReqAdmin from './components/DiscurdedReqAdmin'
import PendingReqSuperAdmin from './components/PendingReqSuperAdmin'
import ApprovedReqSuperAdmin from './components/ApprovedReqSuperAdmin'
import DiscurdedReqSuperAdmin from './components/DiscurdedReqSuperAdmin'
// import ShowLeaveFromSuperAdmin from './components/ShowLeaveFromSuperAdmin'
import ShowInvoiceFromSuperAdmin from './components/ShowInvoiceFromSuperAdmin'
import ShowPurchaseFromSuperAdmin from './components/ShowPurchaseFromSuperAdmin'
import ShowLeaveForRecom from './components/ShowLeaveForRecom'
import ShowLeaveForAdmin from './components/ShowLeaveForAdmin'
import ShowLeaveForSuperAdmin from './components/ShowLeaveForSuperAdmin'
import ShowLeaveReqRecom from './components/ShowLeaveReqRecom'
import NotFound from './components/NotFound'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('User', User);
Vue.component('Employee', Employee);
Vue.component('Holidays', Holidays);
Vue.component('Notice', Notice);
Vue.component('Performence', Performence);
Vue.component('Training', Training);
Vue.component('Profile', Profile);
Vue.component('Dashboard', Dashboard);
Vue.component('CreateNotice', CreateNotice);
Vue.component('GeneralSchedule', GeneralSchedule);
Vue.component('CreateInvoice', CreateInvoice);
Vue.component('Category', Category);
Vue.component('Customer', Customer);
Vue.component('Vendor', Vendor);
Vue.component('CreatePurchase', CreatePurchase);
Vue.component('CreateLeave', CreateLeave);
// Vue.component('Software', Software);
// Vue.component('Itdepartment', Itdepartment);
Vue.component('Department', Department);
// Vue.component('Sales', Sales);
// Vue.component('Accounts', Accounts);
Vue.component('API', API);
Vue.component('ShowLeaveReq', ShowLeaveReq);
// Vue.component('LeaveReqForSuperAdmin', LeaveReqForSuperAdmin);
// Vue.component('LeaveReqForAdmin', LeaveReqForAdmin);
Vue.component('ShowPurchase', ShowPurchase);
Vue.component('ShowInvoice', ShowInvoice);
Vue.component('PendingReqAdmin', PendingReqAdmin);
Vue.component('ApprovedReqAdmin', ApprovedReqAdmin);
Vue.component('DiscurdedReqAdmin', DiscurdedReqAdmin);
Vue.component('PendingReqSuperAdmin', PendingReqSuperAdmin);
Vue.component('ApprovedReqSuperAdmin', ApprovedReqSuperAdmin);
Vue.component('DiscurdedReqSuperAdmin', DiscurdedReqSuperAdmin);
// Vue.component('ShowLeaveFromSuperAdmin', ShowLeaveFromSuperAdmin);
Vue.component('ShowInvoiceFromSuperAdmin', ShowInvoiceFromSuperAdmin);
Vue.component('ShowPurchaseFromSuperAdmin', ShowPurchaseFromSuperAdmin);
Vue.component('ShowLeaveForRecom', ShowLeaveForRecom);
Vue.component('ShowLeaveForAdmin', ShowLeaveForAdmin);
Vue.component('ShowLeaveForSuperAdmin', ShowLeaveForSuperAdmin);
Vue.component('ShowLeaveReqRecom', ShowLeaveReqRecom);
Vue.component('NotFound', NotFound);

Vue.use(VueRouter)
const routes = [
    { path: '/user', component: User },
    { path: '/employee', component: Employee },
    { path: '/holidays', component: Holidays },
    { path: '/notice', component: Notice },
    { path: '/performence', component: Performence },
    { path: '/training', component: Training },
    { path: '/profile', component: Profile },
    { path: '/dashboard', component: Dashboard },
    { path: '/createnotice', component: CreateNotice },
    { path: '/generalschedule', component: GeneralSchedule },
    { path: '/invoice', component: CreateInvoice },
    { path: '/category', component: Category },
    { path: '/customer', component: Customer },
    { path: '/vendor', component: Vendor },
    { path: '/purchase', component: CreatePurchase },
    { path: '/createleave', component: CreateLeave },
    // { path: '/software', component: Software },
    // { path: '/itdepartment', component: Itdepartment },
    { path: '/department', component: Department },
    // { path: '/sales', component: Sales },
    // { path: '/accounts', component: Accounts },
    { path: '/api', component: API },
    { path: '/pending-req-for-admin', component: PendingReqAdmin },
    { path: '/approved-req-for-admin', component: ApprovedReqAdmin },
    { path: '/discurded-req-for-admin', component: DiscurdedReqAdmin },
    { path: '/pending-req-for-super-admin', component: PendingReqSuperAdmin },
    { path: '/approved-req-for-super-admin', component: ApprovedReqSuperAdmin },
    { path: '/discurded-req-for-super-admin', component: DiscurdedReqSuperAdmin },
    { path: '/show-leave-req/:leavereq_id', component: ShowLeaveReq },
    { path: '/showleavereqforrec/:leavereq_id', component: ShowLeaveForRecom },
    // { path: '/show-leave-req', component: ShowLeaveReq },
    { path: '/show-invoice/:invoice_id', component: ShowInvoice },
    { path: '/show-purchase/:purchase_id', component: ShowPurchase },
    { path: '/show-leave-from-super-admin/:leave_id', component: ShowLeaveForSuperAdmin },
    { path: '/show-leave-from-admin/:leave_id', component: ShowLeaveForAdmin },
    { path: '/show-leave-for-reliev/:leave_id', component: ShowLeaveReqRecom },
    // { path: '/show-leave-from-super-admin/:leave_id', component: ShowLeaveForSuperAdmin },
    // { path: '/show-invoice-from-super-admin/:invoice_id', component: ShowInvoiceFromSuperAdmin },
    // { path: '/show-purchase-from-super-admin/:purchase_id', component: ShowPurchaseFromSuperAdmin },
   
    { path: '*', component: NotFound },
]

// passport
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
  })



const app = new Vue({
    // components: { Treeselect },
    el: '#app',
    router,
    data: {
      leavependingleng: null,
      leavependinglengAdmin: null,
      search: null,
      // totalN: null,
      relieverLeavelen:null,
      recommenderLeavelen:null,
      userdata:{},
      form : new Form({
              
        email: '',
     
    }),
    },
   
    methods: {
         
},
created(){
  setTimeout(() => {

    axios.get('api/profile')
    .then(({ data }) => {
      console.log('profile from main')
      this.userdata = data
    })
    .catch((error) => {
      console.log(error)
    })
  }, 1000)
  setTimeout(() => {
    console.log('form loaded from main js')
    this.form.email = this.userdata.email
  },2000)
//---------------------------------------------------------------------------
      setTimeout(()=>{
        axios.get('api/reliever/'+this.form.email)
         
        .then(({data}) => {
            this.relieverLeavelen = data.length
        })
        .catch((error) => {
            console.log(error)
        })
        // this.getLeaveReqForAdmin()
        axios.get('api/recommender/'+this.form.email)
         
        .then(({data}) => {
            this.recommenderLeavelen = data.length
        })
        .catch((error) => {
            console.log(error)
        })
        // this.getLeaveEhereReliever()
        axios.get('api/createleaveforadmin')
        .then(({data}) => {
            this.leavependinglengAdmin = data.length
        })
        .catch((error) => {
            console.log(error)
        })
       
        // this.getLeaveReqForSuperAdmin()
        axios.get('api/createleaveforsuperadmin')
        .then(({data}) => {
            this.leavependingleng = data.length
        })
        .catch((error) => {
            console.log(error)
        })
      }, 4000)
    }
});
