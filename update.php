<?php
//データの更新の処理
//index.phpに戻る⇒最後header("location:index.php");
/**
 * edit.phpからデータを受け取って
 * データベースに保存して
 * 画面に表示する
 */
require_once("Models/Task.php");

$title = $_POST["title"];
$contents = $_POST["contents"];
$id = $_POST["id"]; 

$task = new task();
$task->update([$title,$contents,$id]);

header("location:index.php");