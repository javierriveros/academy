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
                    if ($(window).scrollTop() > 100) {
                        $(".navbar").removeClass("bg-transparent");
                        $(".navbar").removeClass("navbar-dark");
                        $(".navbar").addClass("navbar-light");
                    } else {
                        $(".navbar").addClass("bg-transparent");
                        $(".navbar").removeClass("navbar-light");
                        $(".navbar").addClass("navbar-dark");
                    }
            }
        }
    }
</script>
