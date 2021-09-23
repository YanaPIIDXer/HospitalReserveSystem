<?php
    // SQLへの接続クラス
    class SQLConnection {
        private $pdo = null;        // PDOオブジェクト

        // 生成
        public static function create() {
            $conn = new SQLConnection();
            if (!$conn->create_pdo()) { return null; }
            return $conn;
        }

        // クエリ実行
        public function query($query) {
            $stmt = $pdo->query($query);
            return $stmt;
        }

        // 直接実行
        public function execute($query) {
            return $pdo->execute($query);
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