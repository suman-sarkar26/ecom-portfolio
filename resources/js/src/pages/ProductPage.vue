<template>
    
    <div class="content">
        <section class=" container product-details">
           <div class="row" >
               <div class="col-md-4" >
                   <div class="product-image">
                         <img class="image-responsive"  :src="productData.image">
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="product-info">
                       
                       <h3 class="text-info">{{productData.name}}</h3>
                       <h4 >Price: {{ productData.price }} taka</h4>
                        <form>
                            <label>Quantity: </label>
                            <input v-model="productQuantity" class="quantity" type="number" name="quantity">
                            <div class="mt-4">
                              <router-link :to="{'name':'checkout', params:{ product:productData, quantity:productQuantity }}"><button class="btn btn-warning" >Buy Now</button></router-link>  
                              
                            </div>
                        </form>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-md-5">   
                   <div class="details">
                        {{ productData.description }}
                    </div>
               </div>
               
           </div>
        </section>
    </div>

</template>

<script>
import axios from 'axios';
// import Button from '../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button.vue';

export default {
    // components:{Button},
    data(){
        return{
            productData: [],
            productQuantity:1
        }
    },

    async created(){
        const response = this.$store.getters.getProductBySlug(this.$route.params.slug);

        this.productData = response[0];
      
     }
}
</script>