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
            <div class="w-100 text-center display-6 py-4"><span class="fg">Tokachofu</span>会員新規登録</div>
            <form>
                <div class="d-flex flex-column col-10 col-lg-6 col-md-8 col-sm-10 m-auto mt-5">
                    <label for="name" class="lead">氏名*<span class="text-danger d-none" id="nameerrorlabel">必須項目です。</span></label>
                    <input type="text" class="form-control" name="name" id="name" autofocus required>
                </div>
                <div class="d-flex flex-column col-10 col-lg-6 col-md-8 col-sm-10 m-auto mt-5">
                    <label for="mail" class="lead">メールアドレス*<span class="text-danger d-none" id="mailerrorlabel">必須項目です。</span></label>
                    <input type="email" class="form-control" name="mail" id="mail" required>
                </div>

                <div class="d-flex flex-column col-10 col-lg-6 col-md-8 col-sm-10 m-auto mt-5">
                    <div class="lead">天気の場所の設定*</div>
                    <div class="">
                        <label for="prefecture">県名:</label>
                        <select name="prefecture" class="form-select" id="prefecture" required>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="place">都市:</label>
                        <select name="place" class="form-select" id="place" required>
                            <option value="">先に県を選択してください</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex flex-column col-10 col-lg-6 col-md-8 col-sm-10 m-auto mt-5">
                    <label for="password" class="lead">ログインで使用するパスワード*<span class="text-danger d-none" id="passworderrorlabel">パスワードを入力してください。</span></label>
                    <input type="password" class="form-control" name="password" minlength=6 id="password" required>
                </div>
                <div class="d-flex flex-column col-10 col-lg-6 col-md-8 col-sm-10 m-auto mt-5">
                    <label for="confpassword" class="lead">パスワード(再確認)*<span class="text-danger d-none" id="confpassworderrorlabel">パスワードをもう一度入力してください。</span></label>
                    <input type="password" class="form-control" name="confpassword" minlength=6 id="confpassword" required>
                </div>
                <div class="col-12 text-center py-5">
                    <textarea id="primacy-policy" cols="70" rows="10" readonly>

プライバシーポリシー

Tokachofu（以下，「当社」といいます。）は，本ウェブサイト上で提供するサービス（以下,「本サービス」といいます。）における，ユーザーの個人情報の取扱いについて，以下のとおりプライバシーポリシー（以下，「本ポリシー」といいます。）を定めます。
第1条（個人情報）

「個人情報」とは，個人情報保護法にいう「個人情報」を指すものとし，生存する個人に関する情報であって，当該情報に含まれる氏名，生年月日，住所，電話番号，連絡先その他の記述等により特定の個人を識別できる情報及び容貌，指紋，声紋にかかるデータ，及び健康保険証の保険者番号などの当該情報単体から特定の個人を識別できる情報（個人識別情報）を指します。
第2条（個人情報の収集方法）

当社は，ユーザーが利用登録をする際に氏名，生年月日，住所，電話番号，メールアドレス，銀行口座番号，クレジットカード番号，運転免許証番号などの個人情報をお尋ねすることがあります。また，ユーザーと提携先などとの間でなされたユーザーの個人情報を含む取引記録や決済に関する情報を,当社の提携先（情報提供元，広告主，広告配信先などを含みます。以下，｢提携先｣といいます。）などから収集することがあります。
第3条（個人情報を収集・利用する目的）

当社が個人情報を収集・利用する目的は，以下のとおりです。

当社サービスの提供・運営のため
ユーザーからのお問い合わせに回答するため（本人確認を行うことを含む）
ユーザーが利用中のサービスの新機能，更新情報，キャンペーン等及び当社が提供する他のサービスの案内のメールを送付するため
メンテナンス，重要なお知らせなど必要に応じたご連絡のため
利用規約に違反したユーザーや，不正・不当な目的でサービスを利用しようとするユーザーの特定をし，ご利用をお断りするため
ユーザーにご自身の登録情報の閲覧や変更，削除，ご利用状況の閲覧を行っていただくため
有料サービスにおいて，ユーザーに利用料金を請求するため
上記の利用目的に付随する目的

第4条（利用目的の変更）

当社は，利用目的が変更前と関連性を有すると合理的に認められる場合に限り，個人情報の利用目的を変更するものとします。
利用目的の変更を行った場合には，変更後の目的について，当社所定の方法により，ユーザーに通知し，または本ウェブサイト上に公表するものとします。

第5条（個人情報の第三者提供）

当社は，次に掲げる場合を除いて，あらかじめユーザーの同意を得ることなく，第三者に個人情報を提供することはありません。ただし，個人情報保護法その他の法令で認められる場合を除きます。
    人の生命，身体または財産の保護のために必要がある場合であって，本人の同意を得ることが困難であるとき
    公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合であって，本人の同意を得ることが困難であるとき
    国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって，本人の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがあるとき
    予め次の事項を告知あるいは公表し，かつ当社が個人情報保護委員会に届出をしたとき
        利用目的に第三者への提供を含むこと
        第三者に提供されるデータの項目
        第三者への提供の手段または方法
        本人の求めに応じて個人情報の第三者への提供を停止すること
        本人の求めを受け付ける方法
前項の定めにかかわらず，次に掲げる場合には，当該情報の提供先は第三者に該当しないものとします。
    当社が利用目的の達成に必要な範囲内において個人情報の取扱いの全部または一部を委託する場合
    合併その他の事由による事業の承継に伴って個人情報が提供される場合
    個人情報を特定の者との間で共同して利用する場合であって，その旨並びに共同して利用される個人情報の項目，共同して利用する者の範囲，利用する者の利用目的および当該個人情報の管理について責任を有する者の氏名または名称について，あらかじめ本人に通知し，または本人が容易に知り得る状態に置いた場合

第6条（個人情報の開示）

当社は，本人から個人情報の開示を求められたときは，本人に対し，遅滞なくこれを開示します。ただし，開示することにより次のいずれかに該当する場合は，その全部または一部を開示しないこともあり，開示しない決定をした場合には，その旨を遅滞なく通知します。なお，個人情報の開示に際しては，1件あたり1，000円の手数料を申し受けます。
    本人または第三者の生命，身体，財産その他の権利利益を害するおそれがある場合
    当社の業務の適正な実施に著しい支障を及ぼすおそれがある場合
    その他法令に違反することとなる場合
前項の定めにかかわらず，履歴情報および特性情報などの個人情報以外の情報については，原則として開示いたしません。

第7条（個人情報の訂正および削除）

ユーザーは，当社の保有する自己の個人情報が誤った情報である場合には，当社が定める手続きにより，当社に対して個人情報の訂正，追加または削除（以下，「訂正等」といいます。）を請求することができます。
当社は，ユーザーから前項の請求を受けてその請求に応じる必要があると判断した場合には，遅滞なく，当該個人情報の訂正等を行うものとします。
当社は，前項の規定に基づき訂正等を行った場合，または訂正等を行わない旨の決定をしたときは遅滞なく，これをユーザーに通知します。

第8条（個人情報の利用停止等）

当社は，本人から，個人情報が，利用目的の範囲を超えて取り扱われているという理由，または不正の手段により取得されたものであるという理由により，その利用の停止または消去（以下，「利用停止等」といいます。）を求められた場合には，遅滞なく必要な調査を行います。
前項の調査結果に基づき，その請求に応じる必要があると判断した場合には，遅滞なく，当該個人情報の利用停止等を行います。
当社は，前項の規定に基づき利用停止等を行った場合，または利用停止等を行わない旨の決定をしたときは，遅滞なく，これをユーザーに通知します。
前2項にかかわらず，利用停止等に多額の費用を有する場合その他利用停止等を行うことが困難な場合であって，ユーザーの権利利益を保護するために必要なこれに代わるべき措置をとれる場合は，この代替策を講じるものとします。

第9条（プライバシーポリシーの変更）

本ポリシーの内容は，法令その他本ポリシーに別段の定めのある事項を除いて，ユーザーに通知することなく，変更することができるものとします。
当社が別途定める場合を除いて，変更後のプライバシーポリシーは，本ウェブサイトに掲載したときから効力を生じるものとします。
以上
                    </textarea>
                </div>

                <div class="w-100 text-center mt-5">
                    <button type="submit" id="sub" class="btn btn-outline-primary m-auto col-9 col-lg-3">プライバシーポリシーに同意し、新規登録</button>
                </div>
            </form>
        </div>
        <hr class="col-8 m-auto">
        <div class="col-12 text-center py-3">
            <a href="./index.php" class="text-center">ログイン</a>
        </div>
    </section>

    <?php require_once('../template/pageLinks.php'); ?>

    <?php require_once('../template/footer.php'); ?>


    <script src="./prefecture_list.js"></script>
    <script>
        document.getElementById('sidebarMenu').classList.add('dropsidebarMenu');

        // 登録ボタンを押した処理
        document.getElementById('sub').addEventListener('click', e => {
            e.preventDefault();
            // 送信するデータを保存する
            const fd = new FormData();
            // 非同期通信
            const xhr = new XMLHttpRequest();

            // 選択されている都市名とIDを取得
            let place_id = document.getElementById('place').value;
            let place_index = document.getElementById('place').selectedIndex;
            let place_name = document.getElementById('place')[place_index].textContent;
            // ユーザーの名前を取得
            let name = document.getElementById('name').value;
            // ユーザーのメールアドレスを取得
            let mail = document.getElementById('mail').value;

            // パスワードを取得
            let password = document.getElementById('password').value;
            let confpassword = document.getElementById('confpassword').value;
            let err = 0;

            if (name == "") {
                document.getElementById('nameerrorlabel').classList.remove('d-none');
                err += 1;
            }
            if (mail == "") {
                document.getElementById('mailerrorlabel').classList.remove('d-none');
                err += 1;
            }
            if (password == "") {
                document.getElementById('passworderrorlabel').classList.remove('d-none');
                err += 1;
            }

            if (password != confpassword) {
                document.getElementById('confpassworderrorlabel').classList.remove('d-none');
                err += 1;
            }

            // エラーがなければデータベースに送信
            if (err == 0) {
                fd.append('name', name);
                fd.append('mail', mail);
                fd.append('place_id', place_id);
                fd.append('place_name', place_name);
                fd.append('password', password);
                xhr.open('post', './action/signup.php');
                xhr.send(fd);

                xhr.onload = e => {
                    const respose_url = e.target.responseURL;
                    location.href = respose_url;
                }

            } else {
                document.body.scrollIntoView();
            }
        })


        //県の選択optionを生成
        const pre_tag = document.getElementById('prefecture');
        // 50項目の設定をprefecture_list.jsに記載
        for (i = 0; i <= 51; i++) {
            if (i == 0) {
                let pre_option = document.createElement('option');
                pre_option.textContent = "県を選択してください";
                pre_tag.appendChild(pre_option);
            } else {
                let pre_option = document.createElement('option');
                pre_option.textContent = pre_text[i - 1];
                pre_option.setAttribute('value', Object.keys(pre_value)[i - 1]);
                pre_tag.appendChild(pre_option);
            }
        }

        //県の中の都市を生成
        const pla_tag = document.getElementById('place');

        // 県が変更されたときの処理
        pre_tag.addEventListener('change', () => {

            // 都市の生成されているタグをすべて削除
            while (pla_tag.firstChild) {
                pla_tag.removeChild(place.firstChild);
            }

            // 選択している県を取得
            const prefecture = document.getElementById('prefecture').value;

            //取得した県の都市の個数分だけ都市のoptionタグを生成
            for (i = 0; i < (Object.keys(pre_value[prefecture]).length) + 1; i++) {
                if (i == 0) {
                    let pla_option = document.createElement('option');
                    pla_option.textContent = "都市を選択してください";
                    pla_tag.appendChild(pla_option);
                } else {
                    let pla_option = document.createElement('option');
                    pla_option.textContent = Object.keys(pre_value[prefecture])[i - 1];

                    let place = String(Object.keys(pre_value[prefecture])[i - 1]);

                    pla_option.value = pre_value[prefecture][place].id;
                    pla_tag.appendChild(pla_option);
                }
            }
        })
    </script>

    <script src="../fadeInUp.js"></script>
    <script src="../toggleCrowdImg.js"></script>

</body>

</html>