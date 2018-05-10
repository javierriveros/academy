<template>
  
</template>


<script>
    export default {
        mounted() {
            $(document).ready(this.toggleNavClass)
            $(window).on("scroll ready", this.toggleNavClass)
        },
        methods: {
            toggleNavClass() {
                if($('.main-banner').length > 0)
                    if ($(window).scrollTop() > $('.main-banner').innerHeight()) 
                        $(".navbar").removeClass("bg-transparent");
                    else
                        $(".navbar").addClass("bg-transparent");
            }
        }
    }
</script>
