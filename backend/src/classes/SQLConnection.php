<?php
    // SQLへの接続クラス
    class SQLConnection {
        private $pdo = null;

        // 生成
        static function create() {
            $conn = new SQLConnection();
            if (!$conn->create_pdo()) { return null; }
            return $conn;
        }

        // PDOオブジェクト生成
        private function create_pdo() {
            try {
                $pdo = new PDO("mysql:dbname=hospital_reserve;host=db", "develop", "develop");
            }
            catch (PDOException $e) { return false; }
            return true;
        }
    }
?>