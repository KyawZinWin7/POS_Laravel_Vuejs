</body>

<!-- jquery js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- bootstrap js  -->
<script src="/assets/bootstrap-5/js/bootstrap.min.js"></script>

<!-- curved-image-slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!-- for feature section -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 2000,
        navText: [
            "<img src='assets/images/arrow-prev.svg'/>",
            "<img src='assets/images/arrow-next.svg'/>"

        ],
        responsive: {
            1000: {
                items: 4,
                nav: true,
                loop: false,
            },
            600: {
                items: 1.5,
                nav: true
            },
        }
    })
</script>

<!-- curved image slider -->
<script>
    $('.image-slider').slick({
        dots: false,
        prevArrow: false,
        nextArrow: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        centerMode: true,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 1000,
        pauseOnHover: false,

        responsive: [

            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    variableWidth: true,
                    centerMode: true,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    mobileFirst: true,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    variableWidth: true,
                    centerMode: true,
                }
            },


            {
                breakpoint: 480,
                settings: {
                    mobileFirst: true,
                    dots: false,
                    prevArrow: false,
                    nextArrow: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    variableWidth: true,
                    // autoplay: true,
                    autoplaySpeed: 1000,
                    // mobileFirst: true,
                }
            }

        ]
    });
</script>


</html>