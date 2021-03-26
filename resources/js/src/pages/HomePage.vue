<template>
     <div class="content">
        <section class="products">
            <div class="container">
                
                <div class="row">
                    <ProductComponent v-for = "(product, index) in products" :key="index" :product-props="product">

                    </ProductComponent>
                </div>
            </div>
        </section>
    </div>

</template>
 
<script>
import axios from 'axios';
import ProductComponent from '../components/ProductComponent';

export default {
    data(){
        return{
            products: []
        }
    },

    async created(){
       await this.$store.dispatch('loadProduct');
        this.products = this.$store.state.products;
    // const response = await axios.get('http://127.0.0.1:8000/api/products');
    // this.products = response.data.result;
    // console.log(this.products);
        
     },
    
    components:{
         ProductComponent


    }
}
</script>
