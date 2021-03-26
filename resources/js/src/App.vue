<template>
    <div>
        <header-component />
        <router-view></router-view>
        <footer-component />
    </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent';
import FooterComponent from './components/FooterComponent';
export default {

    components:{
        HeaderComponent,FooterComponent
    }
}
</script>