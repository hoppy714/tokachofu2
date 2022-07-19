<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: ./../console/index.php');
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
    <?php require_once('../template/nav.php'); ?>


    <section class="py-5">
        <div class="py-5">
            <div class="w-100 text-center display-6 py-4"><span class="fg">Tokachofu</span>会員ログイン</div>

            <div class="d-none text-center text-danger mb-5 fs-4 fw-bold" id="err">メールアドレスかパスワードが違います。</div>
            <script>
                const err = document.getElementById('err');
                const url = new URL(location);
                if (url.searchParams.get('err') === '1') {
                    err.classList.remove('d-none');
                }
            </script>
            <form action="./action/login.php" method="POST">
                <div class="d-flex flex-column col-10 col-lg-6 col-md-8 col-sm-10 m-auto">
                    <label for="user_id" class="lead">ユーザーID(メールアドレス)</label>
                    <input type="email" class="form-control" name="user_id" id="user_id" autofocus required>
                </div>
                <div class="d-flex flex-column col-10 col-lg-6 col-md-8 col-sm-10 m-auto mt-5">
                    <label for="password" class="lead">パスワード</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="w-100 text-center mt-5">
                    <button type="submit" class="btn btn-outline-primary m-auto col-6 col-lg-3">ログイン</button>
                </div>
            </form>
        </div>
        <hr class="col-8 m-auto">
        <div class="col-12 text-center py-3">
            <a href="./signup.php" class="text-center">アカウント新規作成</a>
        </div>
    </section>

    <?php require_once('../template/pageLinks.php'); ?>

    <?php require_once('../template/footer.php'); ?>

    
    <script>
        window.onload = function() {
            document.getElementById('sidebarMenu').classList.add('dropsidebarMenu');

        }
    </script>

    <script src="../fadeInUp.js"></script>
    <script src="../toggleCrowdImg.js"></script>

</body>

</html>