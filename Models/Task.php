<?php

require_once('Model.php');

class Task extends Model
{
    // プロパティ
    protected $table = 'tasks';

    // 新規作成に使用するメソッド
    public function create($data)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
        // DbManagerクラスのインスタンス
        // dbhプロパティの
        // PDOのインスタンス
        // prepareメソッドを実行
        // INSERT INTO (カラム名, ,) VALUES (値, 値, 値,)
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (title, contents, created) VALUES (?, ?, ?)');
        $stmt->execute($data);
    }


    public function getTaskById($data)
    {
        var_dump($data);
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table.' WHERE id = ? ');
        $stmt->execute($data);
        $tasks = $stmt->fetch();

        // return === 関数の呼び出し元に、値を返す
        return $tasks;
    }

    public function findByTitle($data)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE title LIKE ?');
        $stmt->execute($data);
        $tasks = $stmt->fetchAll();
        return $tasks;
    }

    public function findByContents($data)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE contents LIKE ?');
        $stmt->execute($data);
        $tasks = $stmt->fetchAll();
        return $tasks;
    }
}