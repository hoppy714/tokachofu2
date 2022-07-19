<?php
session_start();

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

    <!-- 折れ線グラフを書くためのライブラリ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>

</head>

<body>
    <?php
    require_once('../template/nav.php');

    //URLにidが指定されているとき
    if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
        $machine_id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
        include('../function/function.php');
        $func = new Functions;

        // 機械のおいている場所を表示するために取得
        $machine_info = $func->getMachineInfo($machine_id);
        $place = $machine_info['place'];
        $ppm_info = $func->getAllPPM($machine_id);

        //時間を配列に格納
        $time_array = [];
        for ($i = 0; $i < count($ppm_info); $i++) {
            $str = $ppm_info[$i]['time'];
            $year = substr($str, 0, 4);
            $month = substr($str, 4, 2);
            $date = substr($str, 6, 2);
            $hour = substr($str, 8, 2);
            $minute = substr($str, 10, 2);
            $str = $year . "年" . $month . "月" . $date . "日" . $hour . "時" . $minute . "分";
            $str = $month . "月" . $date . "日" . $hour . "時" . $minute . "分";
            array_push($time_array, $str);
        }
        //二酸化炭素濃度を配列に格納
        $ppm_array = [];
        for ($i = 0; $i < count($ppm_info); $i++) {
            array_push($ppm_array, $ppm_info[$i]['ppm']);
        }

        // JSに表示させるためにエンコード
        $time_array = json_encode($time_array);
        $ppm_array = json_encode($ppm_array);

    ?>
        <section class="pt-5 my-5">
            <div class="w-100 ps-10">
                <a href="./index.php" class="text-dark text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                </a>
            </div>
            <div class="d-flex align-items-stretch justify-content-center">
                <div class="display-6 text-center m-0"><?= $place ?></div>
                <div class="btn btn-outline-primary d-flex align-items-center justify-content-center p-1 m-2 ms-4" id="reload">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                    </svg>
                </div>
            </div>
            <div class="col-12">
                <canvas id="chart" class="col-11 col-sm-11 col-md-9 col-lg-9 m-auto"></canvas>
            </div>
        </section>
    <?php
        //URLにidが指定されていないとき
    } else if (!isset($_SESSION['user_id'])) {
    ?>
        <div class="lead display-6 col-12 text-center pt-5 my-5">ログインしなおしてください</div>

        <div class="col-12 text-center py-5">
            <a href="../admin/index.php" class="lead">ログイン</a>
        </div>
    <?php
    } else {
    ?>
        <div class="lead display-6 col-12 text-center pt-5 my-5">指定されたデータが見つかりませんでした。</div>
        <div class="col-12 text-center py-5">
            <a href="./index.php" class="lead">戻る</a>
        </div>
    <?php
    }
    require_once('../template/pageLinks.php');
    require_once('../template/footer.php');
    ?>
    <script>
        document.getElementById('sidebarMenu').classList.add('dropsidebarMenu');

        let context = document.getElementById("chart").getContext('2d');
        new Chart(context, {
            type: 'line',
            data: {
                //横ラベル
                labels: <?= $time_array; ?>,
                // datasets: [{
                //     label: "二酸化炭素濃度",
                //     data: [8.0, 9.4, 11.9, 15.4, 21.1, 23.4, 26.4, 28.0, 25.9, 20.5, 14.9, 10.3],
                // }],
                datasets: [{
                    label: "二酸化炭素濃度",
                    data: <?= $ppm_array ?>,
                }]
            },
            options: {
                responsive: false,
            }
        })

        document.getElementById('reload').addEventListener('click', () => {
            location.reload();
        })
    </script>


    <script src="../fadeInUp.js"></script>
    <script src="../toggleCrowdImg.js"></script>


</body>

</html>