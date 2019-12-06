<template>
  <div class="container">
       <!-- <h3>Invoice: 12345</h3> -->
     <div class="card p-5" v-for="invo in invoices" :key="invo.id">
        <div class="card-header">
            <h1>Invoice</h1>
             <div class="card-tools">
                 <button class="btn btn-success">Approve</button>
                 <button class="btn btn-danger">Discurd</button>
             </div>
         </div>
      <!-- <h4>hello:{{this.$route.params.invoice_is}}</h4> -->
      <div class="card-body m-2">
       <h5><span class="indigo">INVOICE: </span><span class="teal">{{invo.invoicenumber}}</span></h5>
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
               <p>Bill to: {{invo.customer}}</p>
               <!-- <p>sdfgh,sdfghj</p>
               <p>Tax number</p> -->
               <!-- <p>dfghj@gmail.com</p> -->
           </div>
           <div class="col-md-3">
                <p class="bold">Invoice Number: </p>
               <p class="bold">Order Number: </p>
               <p class="bold">Invoice date: </p>
               <p class="bold">payment due: </p>
           </div>
           <div class="col-md-2 text-left">
               <p> {{invo.invoicenumber}}</p>
               <p>{{invo.ordernumber}}</p>
               <p>{{invo.invoicedate}}</p>
               <p>{{invo.dueamount}}</p>
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
                        <tr v-for="invopro in invo.invoice_products" :key="invopro.id">
                            <td>{{invopro.productname}}</td>
                            <td>{{invopro.quantity}}</td>
                            <td>{{invopro.price}}</td>
                            <td>{{invopro.linetotal}}</td>
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
                          <td>Subtotal</td><td class="text-right"><span class="text-right">${{invo.subtotal}}</span></td>
                      </tr>
                      <tr>
                          <td>Tax</td><td class="text-right"><span class="text-right">${{invo.tax}}</span></td>
                      </tr>
                      <tr>
                           <td>total</td><td class="text-right"><span class="text-right">${{invo.total}}</span></td>
                      </tr>
                  </tbody>
               </table>
           </div>
       </div>
       <div class="row">
          <div class="col-md-2">
               <button class="btn btn-success">Print</button>
               <button @click="gobactto" class="btn btn-outline-info">Back</button>
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
           invoice_id: this.$route.params.invoice_id,
        //    invoice_id: '',
           invoices: {}
        }
    },
    methods: {
       gettheInvoice(){
           axios.get("/api/invoice/"+this.invoice_id)
                .then(({data}) => {
                            this.invoices = data
                    })
                .catch((error) => {console.log(error)})
       },
        gobactto(){
           this.$router.push('/approved-req-for-super-admin')
       }
    },
    created(){
         this.gettheInvoice()
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