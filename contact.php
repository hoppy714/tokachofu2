<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Tokachofu | お問い合わせ</title>
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

    <?php
    require_once('./template/nav.php');
    ?>

    <section class="pt-5">
        <div class="lead display-4 text-center fg2 contact-title py-5" id="contactTitle">
            <span>M</span>
            <span>a</span>
            <span>i</span>
            <span>l</span>
            <span>&nbsp;</span>
            <span>F</span>
            <span>o</span>
            <span>r</span>
            <span>m</span>
        </div>
    </section>

    <section class="pb-5">
        <div class="form-wrapper col-10 m-auto p-5">
            <label for=""><span class="text-danger">*</span>は必須項目です</label>
            <form action="./send_mail.php" method="post">
                <div class="d-flex flex-column mt-4">
                    <label class="lead ps-3" for="name"><span class="text-danger">*</span>氏名</label>
                    <input type="text" name="name" id="name" class="form-control my-1" placeholder="山田　太郎" autofocus required>
                </div>
                <div class="d-flex flex-column mt-4">
                    <label class="lead ps-3" for="mail"><span class="text-danger">*</span>メールアドレス</label>
                    <input type="email" name="mail" id="mail" class="form-control my-1" placeholder="info@example.com" required>
                </div>
                <div class="d-flex flex-column mt-4">
                    <label class="lead ps-3" for="tel">電話番号</label>
                    <input type="tel" name="tel" id="tel" class="form-control my-1" placeholder="00-0000-0000">
                </div>
                <div class="d-flex flex-column mt-4">
                    <label class="lead ps-3" for="context"><span class="text-danger">*</span>お問い合わせ内容</label>
                    <textarea name="context" id="context" class="form-text my-1" cols="20" rows="10" required></textarea>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-outline-success mt-5 col-6 m-auto lead">送信</button>
                </div>
            </form>
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
            document.getElementById('contactTitle').classList.add('-visible')
        }
    </script>
</body>

</html>