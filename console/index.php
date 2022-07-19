<?php
session_start();

if (isset($_SESSION['request_id'])) {
    header('Location: ./setting.php');
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理者画面 | Tokachofu</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/phone.css">
    <link rel="stylesheet" href="../css/pc.css">

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
    <?php
    require_once('../template/nav.php');
    ?>

    <section class="mt-5 pt-5">
        <div class="display-6 text-center" id="time"></div>
        <div class="lead text-center mt-3"><?= $_SESSION['place_name'] ?>の天気</div>

        <div class="d-flex justify-content-center">
            <div class="px-3 d-flex border border-1 px-5 py-2">
                <label for="weather">今日:</label>
                <div class="" id="weatherToday"></div>
            </div>
            <div class="px-3 d-flex border border-1 px-5 py-2">
                <label for="weather">明日:</label>
                <div class="" id="weatherTomorrow"></div>
            </div>
            <div class="px-3 d-flex border border-1 px-5 py-2">
                <label for="weather">明後日:</label>
                <div class="" id="weatherDayaftertomorrow"></div>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <div class="col-10 m-auto d-flex justify-content-evenly align-items-stretch flex-wrap pb-5 pt-0 pt-sm-5 pt-md-5 pt-lg-5" id="ppm-wrap">

            <div class="col-10 col-md-3 col-sm-4 my-2 col-lg-2 d-flex align-items-center justify-content-center mx-2 border-1 border text-center">
                <a href="./setting.php" class="d-flex justify-content-center flex-column align-items-center">
                    機器を登録
                    <svg xmlns="http://www.w3.org/2000/svg" width="30%" fill="currentColor" class="bi bi-plus-circle p-2 " viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="lead text-center">登録した機器が表示されない場合は、機器の電源を確認してください。</div>
        <hr class="col-10 col-sm-10 col-md-9 col-lg-8 m-auto my-3">

        <div class="col-12 text-center my-3">
            <a href="./action/logout.php" class="lead">ログアウト</a>
        </div>
    </section>

    <?php require_once('../template/pageLinks.php'); ?>

    <?php require_once('../template/footer.php'); ?>


    <script>
        document.getElementById('sidebarMenu').classList.add('dropsidebarMenu');

        //初回ロードか検証
        let flag = false;

        const user = '<?= $_SESSION['user_id'] ?>';
        console.log(user);

        //XHR
        const xhr = new XMLHttpRequest();
        const fd = new FormData();

        const f = () => {
            xhr.open('get', './action/getlatestppm.php?user=' + user);
            xhr.send();
            xhr.addEventListener('load', e => {

                try {
                    const json = JSON.parse(e.target.response);
                    console.log(json);

                    //初回ロード時、枠を生成
                    if (flag == false) {
                        for (i = 0; i < json.body.length; i++) {

                            // 全体のwrapper
                            const d = document.createElement("a");
                            d.setAttribute("class", "col-10 col-md-3 col-sm-4 my-2 col-lg-2 m-auto mx-2 border-1 border text-dark text-decoration-none");
                            d.setAttribute("href", "./detail.php?id=" + json.body[i].machine_id);

                            const t = document.createElement('div');
                            t.setAttribute('class', 'lead text-center fw-bold fs-4 border-bottom-1 border-bottom');
                            if (json.body[i].place != "") {
                                t.innerHTML = json.body[i].place;
                            } else {
                                t.innerHTML = '場所設定なし';
                            }


                            //imgのwrapper
                            const imgWrapper = document.createElement('div');
                            imgWrapper.setAttribute('class', 'w-100 text-center');
                            //imgタグ
                            const img = document.createElement('img');

                            //ppmによって写真を変える
                            if (json.body[i].ppm < 1000) {
                                img.setAttribute('src', '../img/tokachofu_good.png');
                            } else if (json.body[i].ppm > 1500) {
                                img.setAttribute('src', '../img/tokachofu_bad.png');
                            } else {
                                img.setAttribute('src', '../img/tokachofu_normal.png');
                            }

                            img.setAttribute('width', '60%');
                            img.setAttribute('class', 'object-fit-contain ppm-face');
                            //imgタグをimgwrapperで囲む
                            imgWrapper.appendChild(img);
                            //情報類のタグ
                            const c = document.createElement('div');
                            c.setAttribute("class", "text-center fs-4 lead");
                            c.innerHTML = '<div class="ppm">ppm: ' + json.body[i].ppm + '</div>';
                            c.innerHTML += '<div class="temperature">温度: ' + json.body[i].temperature + '</div>';
                            c.innerHTML += '<div class="humid">湿度: ' + json.body[i].humid + '</div>';
                            d.appendChild(t);
                            d.appendChild(imgWrapper);
                            d.appendChild(c);
                            document.getElementById('ppm-wrap').prepend(d);
                        }
                        //初回ロードを次からなくす
                        flag = true;
                    } else {
                        for (i = 0; i < json.body.length; i++) {
                            //ppmによって写真を変える
                            if (json.body[i].ppm < 1000) {
                                document.getElementsByClassName('ppm-face')[i].src = "../img/tokachofu_good.png";
                            } else if (json.body[i].ppm > 1500) {
                                document.getElementsByClassName('ppm-face')[i].src = "../img/tokachofu_bad.png";
                            } else {
                                document.getElementsByClassName('ppm-face')[i].src = "../img/tokachofu_normal.png";
                            }

                            document.getElementsByClassName('ppm')[i].textContent = "ppm: " + json.body[i].ppm;
                            document.getElementsByClassName('temperature')[i].textContent = "温度: " + json.body[i].temperature;
                            document.getElementsByClassName('humid')[i].textContent = "湿度: " + json.body[i].humid;
                        }
                    }
                } catch (e) {
                    return;
                }
            });
        }

        f();

        //10秒ごとに更新
        setInterval(() => {
            f();
        }, 10000);
    </script>

    <script>
        let time = document.getElementById('time');
        let d = new Date();
        let str = d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate() + " ";
        time.textContent = str + d.getHours() + ":" + d.getMinutes();

        const timer = () => {
            d = new Date();
            str = d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate() + " ";
            if (d.getMinutes() <= 9 && d.getMinutes() >= 0) {
                m = "0" + d.getMinutes();
            } else {
                m = d.getMinutes();
            }
            time.textContent = str + d.getHours() + ":" + m;
        }
        setInterval(timer, 10000);
    </script>


    <script>
        //（天気予報API）に接続
        var owmURL = "https://weather.tsukumijima.net/api/forecast/city/" + <?= $_SESSION['place_id'] ?>;

        var request = new XMLHttpRequest();
        request.open('GET', owmURL, true);
        //結果をjson型で受け取る
        request.responseType = 'json';
        request.send();
        request.onload = function() {
            var data = this.response;
            document.getElementById('weatherToday').textContent = data.forecasts[0]['telop'];
            document.getElementById('weatherTomorrow').textContent = data.forecasts[1]['telop'];
            document.getElementById('weatherDayaftertomorrow').textContent = data.forecasts[2]['telop'];
        };
    </script>




    <script src="../fadeInUp.js"></script>
    <script src="../toggleCrowdImg.js"></script>

</body>

</html>