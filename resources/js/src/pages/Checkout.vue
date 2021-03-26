<template >
    <div class="content">
        <section class="container checkout">
             <div class="row">
                <div class="col-md-6">
                    <div class="cart-summary">
                        <div class="media mt-2">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="product-image ">
                                        <img :src="checkOutProduct.image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media-body mt-3"> 
                                        <div class="product-info ml-2">
                                            <h4 class="text-info"> {{ checkOutProduct.name }} </h4>
                                            <h5 >Price:  {{ checkOutProduct.price }} taka</h5>
                                            <h5>Quantity: {{ checkOutQuantity }} </h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            
                    </div>
                
                </div>

            <div class="col-md-6">
                <div class="card mt-3  pr-1">
                    <div class="card-header">
                        Sipping Info
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="placeOrder()">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-controll" name="customer_name" @blur="$v.$touch()" v-model="customer_name">
                                <p class="text-danger" v-if="$v.customer_name.$invalid">customer name is requred.</p>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-controll" name="customer_phone" @blur="$v.$touch()" v-model="customer_phone">
                                <p class="text-danger" v-if="$v.customer_phone.$invalid">customer phone is requred.</p>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-controll btn btn-warning" value="Place Order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <hr>
            <h5 class="text-center text-info"> Total: {{ getTotal() }} Taka</h5> 
        </section>
    </div>


 
          
</template>

<script>
import axios from 'axios';
const {required} = require('vuelidate/lib/validators')
export default {
    data(){
        return{
            checkOutProduct: null,
            checkOutQuantity: null,
            orderData:{
                'product_id': null,
                'product_quantity': null,
                'grand_total':null,
                shipping_info: {}
            },
            customer_name: '',
            customer_phone: ''
        }
    },
 
    methods:{
        getTotal(){
              
              let totalPrice = this.checkOutProduct.price * parseInt(this.checkOutQuantity);
              return totalPrice;
        },
          async placeOrder(){
            this.orderData.grand_total = this.getTotal();
            this.orderData.product_id = this.checkOutProduct.id;
            this.orderData.product_quantity = this.checkOutQuantity;
            this.orderData.shipping_info = {
                customer_name : this.customer_name,
                customer_phone : this.customer_phone
            };

            // this.$v.$touch();
            // return;
            console.log(this.$route.params.slug);
            let response = await axios.post(
            'http://127.0.0.1:8000/api/place-order',
            this.orderData
        );

        if(response.data.success){
            this.$router.push({'name': 'checkout-success'});
        }
        else{
            this.$router.push({'name': 'checkout-failure'})
        }
           
        }
    },

      beforeMount() {
        this.checkOutProduct = this.$route.params.product;
        this.checkOutQuantity = this.$route.params.quantity;
    },
    validations:{
        customer_name: {required},
        customer_phone: {required}
    }
    


}
</script>



