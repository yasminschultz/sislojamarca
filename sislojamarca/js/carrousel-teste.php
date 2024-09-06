<!-- site Leo -->
<div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="https://drive.google.com/file/d/1uElA9FKQBPkespMSpFwJMtnVmzevf7Yz/view">
                    <img src="../img/eventos-carrousel/2.png" alt="" class="d-block" style="width: 100%"></a></div>
            <div class="swiper-slide">
                <a href="https://drive.google.com/file/d/1uElA9FKQBPkespMSpFwJMtnVmzevf7Yz/view">
                    <img src="../img/eventos-carrousel/3.png" alt="" class="d-block" style="width: 100%"></a></div>
            <div class="swiper-slide">
                <a href="https://drive.google.com/file/d/1uElA9FKQBPkespMSpFwJMtnVmzevf7Yz/view">
                    <img src="../img/eventos-carrousel/4.png" alt="" class="d-block" style="width: 100%"></a></div>
            <div class="swiper-slide">
                <a href="https://drive.google.com/file/d/1uElA9FKQBPkespMSpFwJMtnVmzevf7Yz/view">
                    <img src="../img/eventos-carrousel/5.png" alt="" class="d-block" style="width: 100%"></a></div>
            <div class="swiper-slide">
                <a href="https://drive.google.com/file/d/1uElA9FKQBPkespMSpFwJMtnVmzevf7Yz/view">
                    <img src="../img/eventos-carrousel/6.png" alt="" class="d-block" style="width: 100%"></a></div>
            <div class="swiper-slide">
                <a href="https://drive.google.com/file/d/1uElA9FKQBPkespMSpFwJMtnVmzevf7Yz/view">
                    <img src="../img/eventos-carrousel/4.png" alt="" class="d-block" style="width: 100%"></a></div>
        </div>

        <div class="swiper-button-next" style="color: purple;"></div>
        <div class="swiper-button-prev" style="color: purple;"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script>
            var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            });
        </script>

        <style>
            .swiper {
                width: 90%;
                height: 300px;
                border: 0.5px solid purple;
            }

            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>

<!-- meu site -->

<section>
    <img src="../img/eventos-carrousel/4.png" alt="" class="d-block" style="width: 100%"></a></div>
</section>

<!-- site slick -->

<!-- JavaScript do jQuery e Slick Carousel -->
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
            <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>

            <script>
                $(document).ready(function(){
                    $('.your-carousel-class').slick({
                        // Configurações do carrossel
                        dots: true,
                        infinite: true,
                        speed: 500,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    });
                });
            </script>

<!-- CSS do Slick Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css">
