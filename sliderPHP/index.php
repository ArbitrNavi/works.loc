<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php 
        $array_img = array(
            "https://kartinkin.net/uploads/posts/2022-03/1646474217_21-kartinkin-net-p-kartinki-zakat-solntsa-42.jpg",
            "https://proprikol.ru/wp-content/uploads/2020/06/krasivye-kartinki-zakaty-8.jpg",
            "https://kartinkin.net/uploads/posts/2022-02/1646031162_18-kartinkin-net-p-krasivie-kartinki-zakata-19.jpg",
            "https://all-aforizmy.ru/wp-content/uploads/2021/12/ebltuf4wwaaftrd.jpg",
            "https://phonoteka.org/uploads/posts/2022-01/1642640772_18-phonoteka-org-p-fon-zakat-19.jpg",
            "https://oir.mobi/uploads/posts/2019-12/1575741249_25-39.jpg",
        )
    ?>

    <div class="slider">
        <?php 
            foreach($array_img as $value){
                ?>
                <div class="element">
                    <img src="<?php echo $value ?>" alt="">
                </div>
                <?php
            };
        ?>
    </div>
    <script src="./jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.slider').slick();
    </script>
</body>
</html>