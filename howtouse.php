<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Sample1</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/phone.css">
    <link rel="stylesheet" href="./css/pc.css">

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

    <?php
    require_once('./template/nav.php');
    ?>

    <section class="sec1 mt-5">
        <div class="h-100 d-flex flex-column-reverse flex-sm-column-reverse flex-md-row flex-lg-row">
            <div class="col-10 col-sm-10 col-md-6 col-lg-6 m-auto pt-4">
                <div class="text-center lead">集中管理型二酸化炭素計測器</div>
                <div class="text-center display-6 fg2">「喚起喚起くん」</div>
                <div class="text-center w-100 mt-3">
                    <a href="./contact.php" class="contact-btn fg m-auto fs-5 text-decoration-none">Contact to Tokachofu</a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 m-auto"><img src="./img/webp/forest.webp" width="100%" alt=""></div>
        </div>
    </section>

    <div class="display-6 text-center py-5 fg2">使い方</div>

    <section class="">
        <div class="h-100 d-flex flex-column-reverse flex-sm-column-reverse flex-md-row flex-lg-row">
            <div class="lead text-center col-10 col-sm-10 col-md-6 col-lg-6 m-auto">
                <div class="">step 1</div>
                <div class="">
                    機器を電源につなぐとWifiが起動するので、デバイスから接続します。<br>
                    SSIDは「ESP-Tokachofu」です。
                </div>
            </div>
            <div class="col-12 col-md-12 col-md-6 col-lg-6 m-auto h-100">
                <img src="./img/webp/sky.webp" width="100%" height="100%" class="vh-s-25 vh-l-50 object-fit-cover" alt="">
            </div>
        </div>
    </section>

    <section class="mt-4 mt-sm-4 mt-md-0 mt-lg-0">
        <div class="h-100 d-flex flex-column-reverse flex-sm-column-reverse flex-md-row-reverse flex-lg-row-reverse">
            <div class="lead text-center col-10 col-sm-10 col-md-6 col-lg-6 m-auto">
                <div class="">step 2</div>
                <div class="">
                    Wifiに接続すると設定画面が出てくるので、お客様自身のWifiに接続してください。
                </div>
            </div>
            <div class="col-12 col-md-12 col-md-6 col-lg-6 m-auto h-100">
                <img src="./img/webp/sky.webp" width="100%" height="100%" class="vh-s-25 vh-l-50  object-fit-cover" alt="">
            </div>
        </div>
    </section>


    <section class="mt-4 mt-sm-4 mt-md-0 mt-lg-0">
        <div class="h-100 d-flex flex-column-reverse flex-sm-column-reverse flex-md-row flex-lg-row">
            <div class="lead text-center col-10 col-sm-10 col-md-6 col-lg-6 m-auto">
                <div class="">step 3</div>
                <p class="">
                    機器をWifiに接続後、公式サイトにログインし、IDを登録して下さい。<br>
                <div class="fs-6">
                    ※会員登録をまだしていない方は<a href="./admin/signup.php">こちら</a>から会員登録してください。
                </div>
                </p>
            </div>
            <div class="col-12 col-md-12 col-md-6 col-lg-6 m-auto h-100">
                <img src="./img/webp/sky.webp" width="100%" height="100%" class="vh-s-25 vh-l-50 object-fit-cover" alt="">
            </div>
        </div>
    </section>

    <section class="mt-4 mt-sm-4 mt-md-0 mt-lg-0">
        <div class="h-100 d-flex flex-column-reverse flex-sm-column-reverse flex-md-row-reverse flex-lg-row-reverse">
            <div class="lead text-center col-10 col-sm-10 col-md-6 col-lg-6 m-auto">
                <div class="">step 4</div>
                <div class="">
                    表示されているIDと機器のIDが同じことを確かめ、設置する場所を入力し、登録ボタンをクリック
                </div>
            </div>
            <div class="col-12 col-md-12 col-md-6 col-lg-6 m-auto h-100">
                <img src="./img/webp/sky.webp" width="100%" height="100%" class="vh-s-25 vh-l-50  object-fit-cover" alt="">
            </div>
        </div>
    </section>


    <section class="mt-4 mt-sm-4 mt-md-0 mt-lg-0">
        <div class="h-100 d-flex flex-column-reverse flex-sm-column-reverse flex-md-row flex-lg-row">
            <div class="lead text-center col-10 col-sm-10 col-md-6 col-lg-6 m-auto">
                <div class="">step 5</div>
                <div class="">
                    設定完了!
                </div>
            </div>
            <div class="col-12 col-md-12 col-md-6 col-lg-6 m-auto h-100">
                <img src="./img/webp/sky.webp" width="100%" height="100%" class="vh-s-25 vh-l-50  object-fit-cover" alt="">
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
            document.getElementById('sidebarMenu').classList.add('dropsidebarMenu');
        }
    </script>
</body>

</html>