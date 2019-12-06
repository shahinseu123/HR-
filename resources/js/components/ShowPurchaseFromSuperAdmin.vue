<template>
  <div class="container">
       <!-- <h3>Invoice: 12345</h3> -->
     <div class="card p-5" v-for="pur in purchases" :key="pur.id">
         <div class="card-header">
             <h1>Purchase</h1>
             <div class="card-tools">
                 <button class="btn btn-success">Approve</button>
                 <button class="btn btn-danger">Discurd</button>
             </div>
         </div>
      <!-- <h4>hello:{{this.$route.params.invoice_is}}</h4> -->
      <div class="card-body">
       <h5><span class="indigo">PURCHASE: </span><span class="teal">{{pur.purchasenumber}}</span></h5>
       <div class="row">
           <div class="col-md-8" text-left>
               <img class="" src="/img/logo.png" alt="vue image">
           </div>
           <div class="col-md-4 text-left">
            <p class="bold indigo">Shahin Alam</p>
            <p class="teal">shahinalam.seu@gmail.com</p>
       </div>
       </div>
       <hr>
       <div class="row">
           <div class="col-md-7">
               <p>Bill to: {{pur.vendor}}</p>
               <!-- <p>sdfgh,sdfghj</p>
               <p>Tax number</p>
               <p>dfghj@gmail.com</p> -->
           </div>
           <div class="col-md-3">
                <p class="bold">Purchase Number: </p>
               <p class="bold">Order Number: </p>
               <p class="bold">Purchase date: </p>
               <p class="bold">Payment due: </p>
           </div>
           <div class="col-md-2 text-left">
               <p> {{pur.purchasenumber}}</p>
               <p>{{pur.ordernumber}}</p>
               <p>{{pur.purchasedate}}</p>
               <p>{{pur.dueamount}}</p>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12">
               <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pro in pur.invoice_products" :key="pro.id">
                            <td>{{pro.productname}}</td>
                            <td>{{pro.quantity}}</td>
                            <td>{{pro.price}}</td>
                            <td>{{pro.linetotal}}</td>
                        </tr>
                    </tbody>
               </table>
           </div>
       </div>
       <div class="row">
           <div class="col-md-8">

           </div>
           <div class="col-md-4">
               <table class="table">
                  <tbody>
                      <tr>
                          <td>Subtotal</td><td class="text-right"><span class="text-right">${{pur.subtotal}}</span></td>
                      </tr>
                      <tr>
                          <td>Tax</td><td class="text-right"><span class="text-right">${{pur.tax}}</span></td>
                      </tr>
                      <tr>
                           <td>total</td><td class="text-right"><span class="text-right">${{pur.total}}</span></td>
                      </tr>
                  </tbody>
               </table>
           </div>
       </div>
       <div class="card-footer">
          <div class="col-md-2">
               <button @click="printme" class="btn btn-success">Print</button>
               <button @click="gobactto" class="btn btn-outline-info">Back</button>
          </div>

       </div>
       <div class="row">
          <div class="col-md-2">
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
        //    invoice_id: parseInt(this.$route.params.invoice_id),
           purchase_id: this.$route.params.purchase_id,
        //    invoice_id: '',
           purchases: {}
        }
    },
    methods: {
       getthePurchase(){
        //    var id = this.$route.params.invoice
        //    console.log(invoice)
        //    axios.get("api/invoice/"+this.$route.params.invoice_id)
        //    axios.get(`api/invoice/${this.invoice_id}`)
           axios.get("/api/purchase/"+this.purchase_id)
        //    axios.get("api/invoice")
           .then(({data}) => {
                    this.purchases = data
                   
               })
               .catch((error) => {console.log(error)})
       },
       gobactto(){
           this.$router.push('/approved-req-for-super-admin')
       },
       printme(){
           window.print()
       }
    },
    created(){
        //  Bus.$on('buswithid',(id) => {
        //      hey.invoice_id = id
        //      console.log('this is invoice id'+hey.invoice_id)
             
        //  })
         this.getthePurchase()
}
}
</script>
<style>
.first{
    text-align-last: auto;
}
img{
    max-height: 100px;
}
</style>