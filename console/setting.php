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

</head>

<body>
    <?php
    require_once('../template/nav.php');
    ?>

    <section class="mt-5 py-5">
        <form action="./action/setting.php" method="post">
            <div class="display-6 text-center mb-5 pt-3">追加する機械のIDを入力してください</div>
            <div class="col-10 col-sm-10 col-md-8 col-lg-6 m-auto mb-5">
                <label for="id" class="lead ps-5">ID</label>
                <div class="d-flex align-items-center">
                    <span class="px-2 fs-4">@</span><input type="text" class="form-control" id="id" name="machine_id" required autofocus>
                </div>
            </div>

            <div class="col-10 col-sm-10 col-md-8 col-lg-6 m-auto mb-5">
                <label for="place" class="lead ps-2">設置する場所</label>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control" id="place" name="place" required>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="./index.php" class="btn btn-outline-danger mx-2">戻る</a>
                    <button type="submit" class="btn btn-outline-primary mx-2">登録</button>
            </div>
        </form>
    </section>

    <?php require_once('../template/pageLinks.php'); ?>

    <?php require_once('../template/footer.php'); ?>


    <?php
    if (isset($_SESSION['request_id'])) {
        //@マーク抜きにする
        $str = substr($_SESSION['request_id'], 1, 9);
    ?>
        <script>
            //QRコードで読み取ったIDを出力
            document.getElementById('id').value = "<?= $str ?>";
        </script>
    <?php
    }
    ?>

    <script>
        document.getElementById('sidebarMenu').classList.add('dropsidebarMenu');
    </script>

    <script src="../fadeInUp.js"></script>
    <script src="../toggleCrowdImg.js"></script>

</body>

</html>