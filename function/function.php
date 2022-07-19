<?php

require_once __DIR__ . "/database.php";

class Functions extends Database
{
    //ユーザー新規作成処理
    public function signup($name, $mail, $place_id, $place_name, $password)
    {
        // すでに登録されていないかを確認
        $confirm_sql = "SELECT * FROM user WHERE id = :id";
        $sth = $this->conn->prepare($confirm_sql);
        $sth->bindValue(':id', $name, PDO::PARAM_STR);
        $sth->execute();

        // 結果の行数を取得
        $count = $sth->rowCount();

        // テーブルに登録使用としているデータがまだ設定されていなかったら処理
        if ($count == 0) {

            // ハッシュ化して格納
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            $insert_sql = "INSERT INTO user(`name`,user_id,place_id,place_name,`password`) VALUES (:user_id,:mail,:place_id,:place_name,:password);";
            $sth = $this->conn->prepare($insert_sql);

            $sth->bindValue(':user_id', $name, PDO::PARAM_STR);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $sth->bindValue(':place_id', $place_id, PDO::PARAM_STR);
            $sth->bindValue(':place_name', $place_name, PDO::PARAM_STR);
            $sth->bindValue(':password', $pass_hash, PDO::PARAM_STR);

            $sth->execute();

            //user_idを取得
            $select_sql = "SELECT id FROM user WHERE user_id = :mail;";
            $sth = $this->conn->prepare($select_sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $sth->execute();

            $res = $sth->fetch(PDO::FETCH_ASSOC);

            //セッションに保存
            session_start();
            $_SESSION['user_id'] = $res['id'];
            $_SESSION['name'] = $name;
            $_SESSION['user_mail'] = $mail;
            $_SESSION['place_id'] = $place_id;
            $_SESSION['place_name'] = $place_name;

            header('Location: ../../console/index.php');
            exit();
        } else {
            header('Location:  ../../admin/signup.php?err=1');
            exit();
        }
    }

    //ログイン処理
    public function login($id, $password)
    {
        //データがあるか検証
        $select_sql = "SELECT * FROM user WHERE user_id = :id;";
        $sth = $this->conn->prepare($select_sql);
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        $sth->execute();

        $res = $sth->fetch(PDO::FETCH_ASSOC);

        //パスワードがあっていれば
        if (password_verify($password, $res['password'])) {
            //フェッチして結果をばらばらに
            // セッションに保存
            session_start();
            $_SESSION['user_mail'] = $id;
            $_SESSION['user_name'] = $res['name'];
            $_SESSION['user_id'] = $res['id'];
            $_SESSION['place_id'] = $res['place_id'];
            $_SESSION['place_name'] = $res['place_name'];

            header('Location: ../../console/index.php');
        } else {
            header('Location: ../../admin/index.php?err=1');
        }
        exit();
    }

    //一番新しいカラムの取得
    public function getLatestPPM($id)
    {
        //最新のPPMなどを取得
        $select_sql = "SELECT * FROM info INNER JOIN co2_machine ON info.machine_id = co2_machine.machine_id WHERE info.machine_id IN (SELECT co2_machine.machine_id FROM co2_machine WHERE co2_machine.user_id = :id) AND info.time = (SELECT MAX(time) FROM info) GROUP BY info.machine_id;";
        $sth = $this->conn->prepare($select_sql);

        //SQLの1の部分ど:idに変更
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        $sth->execute();
        $array = [];

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            array_push($array, $row);
        }

        $response['body'] = $array;
        $response['status'] = 200;

        //レスポンス
        echo (json_encode($response));
    }

    //すべてのPPM(一週間分)
    public function getAllPPM($id)
    {
        //LIMITの数は、１分に１個の意味
        //１時間だと60
        //一日だと1440
        //1週間だと10080
        // 大きくなるとグラフが見にくくなる
        $select_sql = "SELECT * FROM info WHERE machine_id = :id LIMIT 60;";
        $sth = $this->conn->prepare($select_sql);
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        $sth->execute();
        $array = [];
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            array_push($array, $row);
        }
        return $array;
    }

    //機械とユーザーを紐づけ
    public function insertNewMachine($machine_id, $place)
    {
        $check_sql = "SELECT * FROM co2_machine WHERE machine_id = :id;";
        $sth = $this->conn->prepare($check_sql);
        $machine_id = "@" . $machine_id;

        $sth->bindValue(':id', $machine_id, PDO::PARAM_STR);
        $sth->execute();

        $num_row = $sth->rowCount();

        //指定されたIDがテーブルにある時
        if ($num_row == 1) {

            //ユーザー・場所を登録
            $insert_sql = "UPDATE co2_machine SET user_id = :user_id, place = :place WHERE machine_id = :machine_id;";
            $sth = $this->conn->prepare($insert_sql);
            session_start();
            $user = $_SESSION['user_id'];

            //QRコードから送られてきたIDを破棄
            if (isset($_SESSION['request_id'])) {
                unset($_SESSION['request_id']);
            }
            var_dump($_SESSION);
            $sth->bindValue(':machine_id', $machine_id, PDO::PARAM_STR);
            $sth->bindValue(':user_id', $user, PDO::PARAM_INT);
            $sth->bindValue(':place', $place, PDO::PARAM_STR);
            $sth->execute();
            header('Location: ./../index.php');
        } else {
            header('Location: ./../index.php?err=1');
        }
        exit();
    }


    public function getMachineInfo($id)
    {
        $select_sql = "SELECT * FROM co2_machine WHERE machine_id = :id;";
        $sth = $this->conn->prepare($select_sql);
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        $sth->execute();
        $res = $sth->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    //ランダムな文字列を生成する(長さ10)
    public function api()
    {

        /*
        ######マシンID挿入用
        for ($i = 0; $i <= 100; $i++) {
            $bytes = openssl_random_pseudo_bytes(5);
            $hex  = bin2hex($bytes);

            $str = "@" . $hex;

            $insert_sql = "INSERT INTO co2_machine (machine_id ) VALUES (:machine_id)";
            $sth = $this->conn->prepare($insert_sql);
            $sth->bindValue(':machine_id', $str, PDO::PARAM_STR);
            $sth->execute();
        }

        */

        /*
        ######テストデータ挿入用
        $ppm_array = [];
        $temperature_array = [];
        $humid_array = [];
        $time_array = [];

        //ppm用(15000件)
        for ($i = 500; $i < 2000; $i++) {
            for ($counter = 0; $counter < 10; $counter++) {
                array_push($ppm_array, $i);
            }
        }

        //温度用
        for ($i = 10; $i < 35; $i++) {
            for ($counter = 0; $counter < 600; $counter++) {
                array_push($temperature_array, (string) $i);
            }
        }

        //湿度用
        for ($i = 10; $i < 85; $i++) {
            for ($counter = 0; $counter < 200; $counter++) {
                array_push($humid_array, (string)$i);
            }
        }

        //時間用
        // for ($month = 11; $month < 13; $month) {
        for ($date = 1; $date < 12; $date++) {
            for ($hour = 0; $hour < 24; $hour++) {
                for ($minute = 0; $minute < 60; $minute++) {

                    // 桁合わせ
                    //10日以下の場合
                    if ($date < 10) {
                        $date_temp = "0" . $date;
                    } else {
                        $date_temp =  $date;
                    }
                    //10時以下の場合
                    if ($hour < 10) {
                        $hour_temp = "0" . $hour;
                    } else {
                        $hour_temp =  $hour;
                    }

                    //10分以下の場合
                    if ($minute < 10) {
                        $minute_temp = "0" . $minute;
                    } else {
                        $minute_temp =  $minute;
                    }

                    $str = "202208" . $date_temp . $hour_temp . $minute_temp;
                    // var_dump($str);
                    array_push($time_array, $str);
                }
            }
        }
        // }

        shuffle($ppm_array);
        shuffle($temperature_array);
        shuffle($humid_array);

        for ($j = 0; $j < 15000; $j++) {
            $insert_sql = "INSERT info (machine_id,ppm,temperature,humid,time) VALUES (:machine_id,:ppm,:temperature,:humid,:time);";
            $sth = $this->conn->prepare($insert_sql);
            $sth->bindValue(':machine_id', '@c3dc2fbe23', PDO::PARAM_STR);
            $sth->bindValue(':ppm', $ppm_array[$j], PDO::PARAM_INT);
            $sth->bindValue(':temperature', $temperature_array[$j], PDO::PARAM_STR);
            $sth->bindValue(':humid', $humid_array[$j], PDO::PARAM_STR);
            $sth->bindValue(':time', $time_array[$j], PDO::PARAM_STR);
            $sth->execute();
        }

        var_dump('Success');
        */
    }
}
