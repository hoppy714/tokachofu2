<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Tokachofu</title>
    <meta name="description" content="学生が開発した「喚起喚起くん」であなたの部屋もきれいな空気にしませんか?">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/phone.css">
    <link rel="stylesheet" href="./css/pc.css">

    <meta name="robots" content="noindex">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&family=Kaisei+Decol:wght@500&display=swap" rel="stylesheet">

    <!-- bootstrapのURLです。消さないでください -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- jQueryのURLです。多分使っているので消さないでください。日付などの処理は別でコード下に書いていますが、jQueryは使っていません。 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- アイコン用のURLです。商用利用はOKです。アイコンはサイトでコードをコピーして使えます -->
    <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="load" id="load">
        <div class="display-2 fg">Tokachofu</div>
    </div>

    <?php
    require_once('./template/nav.php')
    ?>


    <header>
        <div class="video-wrapper position-relative">
            <!-- <video src="https://yutons.com/video/video2.webm" muted autoplay loop poster="./img/webp/forest.webp" id="header-video"></video> -->
            <picture class="m-auto pc-section-img fadeup">
                <source srcset="./img/avif/sky.avif" type="image/avif" class="m-auto pc-section3-img">
                <source srcset="./img/webp/sky.webp" type="image/webp" class="m-auto pc-section3-img">
                <img src="./img/sky.jpg" width="100%" height="100%" class="m-auto pc-section3-img object-fit-cover" alt="">
            </picture>

            <div class="header-content position-absolute justify-content-center">
                <div class="fg2">喚気喚起くん</div>
                <!-- <div class="fg fs-6 ps-4 header-subtitle" style="-webkit-text-stroke: 0px !important;">
                    Designed by Tokachofu
                </div> -->
                <a href="./contact.php" class="fs-5 px-3 fg mt-3 contact-btn text-center text-decoration-none" style="-webkit-text-stroke: 0px !important;">
                    Contact to tokachofu
                </a>
            </div>
        </div>
        <div class="header-rotate"></div>
    </header>

    <section id="sec1" class="sec1 pt-5">
        <div class="section-title position-relative display-6 ff-su">
            室内の二酸化炭素濃度を集中管理
        </div>

        <div class="d-flex flex-column-reverse flex-sm-column-reverse flex-md-column-reverse flex-lg-row sec-content">
            <div class="column-list lead p-3 p-lg-5 d-lg-flex align-items-lg-center justify-content-lg-center fadeup">
                二酸化炭素濃度を測ることで、その室内が十分に換気されているかがわかります。<br>
                二酸化炭素濃度が多くなると、頭痛・眠気が生じるだけでなく、新型コロナウイルスなどの風邪やインフルエンザに感染する原因にもなります。<br>
            </div>
            <div class="column-list bg-green">
                <picture class="m-auto pc-section-img fadeup">
                    <source srcset="./img/avif/forest.avif" type="image/avif" class="m-auto pc-section3-img">
                    <source srcset="./img/webp/forest.webp" type="image/webp" class="m-auto pc-section3-img">
                    <img src="./img/forest.jpg" width="100%" class="m-auto pc-section3-img p-5" alt="">
                </picture>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="d-flex flex-column flex-sm-column flex-md-column flex-lg-row sec-content">
            <div class="column-list bg-green">
                <picture class="m-auto pc-section-img fadeup">
                    <source srcset="./img/avif/window.avif" type="image/avif" class="m-auto pc-section3-img">
                    <source srcset="./img/webp/window.webp" type="image/webp" class="m-auto pc-section3-img">
                    <img src="./img/window.jpg" width="100%" class="m-auto pc-section3-img p-5" alt="">
                </picture>
            </div>
            <div class="column-list sec-content fadeup">
                <div class="text-center lead p-3 p-lg-5 h-100 d-flex justify-content-center align-items-center">
                    今までの二酸化炭素濃度計測器は単体で作動していましたが、Tokachofuがプロデュースする「喚起喚起くん」は、二酸化炭素濃度計測器を設置した部屋の二酸化炭素濃度をまとめて見ることができ、どこの室内が汚染しているかが一目でわかります。<br>
                </div>
            </div>
        </div>
    </section>

    <?php require_once('./template/pageLinks.php'); ?>


    <?php require_once('./template/footer.php'); ?>


    <script src="./fadeInUp.js"></script>
    <script src="./toggleCrowdImg.js"></script>

    <script>
        const spinner = document.getElementById('load');
        window.onload = function() {
            spinner.classList.add('loaded');
        }

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                document.getElementById('sidebarMenu').classList.add('dropsidebarMenu');
            } else {
                document.getElementById('sidebarMenu').classList.remove('dropsidebarMenu');
            }
        })
    </script>
</body>

</html>