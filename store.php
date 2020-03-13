<?php

//ファイルの読み込み...require_onceのこと！
//myadminからデータを受け取り、変数を作る...$なんちゃら
//データベースに接続できるように、modelに接続する。なぜなら、modelがやってくれてるから
//methodを使用するために最初にインスタンス化をする！$task = newclassっていうやり方。
//index.phpに戻るために、リダイレクトを書く！


require_once("Models/Task.php");

$title = $_POST["title"];
$contents = $_POST["contents"];
$currentTime = $_POST["Y/m/d H:i:s"]; 

$task = new task();
$task->create([$title,$contents,$currentTime]);

header("location:index.php");
exit;
