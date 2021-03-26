<template>
     <div class="col-md-3 col-sm-6" >
        <div class="product-grid">
            <div class="product-image" >
                <a href="#">
                    <img class="pic-1 p-3 size"  :src="productProps.image">
                    <img class="pic-2"  :src="productProps.image">
                </a>
            </div>
            <div class="product-content">
                <h3 class="title">{{ productProps.name }}</h3>
                <div class="price">Price: {{ productProps.price }} tk.</div>
                <router-link class="add-to-cart btn btn-success" :to="{'name':'product-details', params:{slug: productProps.slug}}">View Details</router-link>
            </div>
        </div>
    </div>
</template>
<script>

export default {
  
    props:['productProps']
}
</script>