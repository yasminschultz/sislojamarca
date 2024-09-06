<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Carrossel</title>
    
    <!-- CSS do Slick Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css">
</head>
<body>

    <!-- Seu carrossel aqui -->
    <div class="your-carousel-class">
        <div><img src="../img/eventos-carrousel/2.png" alt="Imagem 1"></div>
        <div><img src="../img/eventos-carrousel/3.png" alt="Imagem 2"></div>
        <div><img src="../img/eventos-carrousel/4.png" alt="Imagem 3"></div>
        <div><img src="../img/eventos-carrousel/5.png" alt="Imagem 4"></div>
        <div><img src="../img/eventos-carrousel/6.png" alt="Imagem 5"></div>
        <!-- Adicione mais imagens conforme necessário -->
    </div>

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
</body>
</html>