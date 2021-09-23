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

        // クエリ実行準備
        public function prepare($query) {
            $stmt = $this->pdo->prepare($query);
            return new SQLStatement($stmt);
        }

        // 直接実行
        public function execute($query) {
            return $this->pdo->execute($query);
        }

        // PDOオブジェクト生成
        private function create_pdo() {
            try {
                $this->pdo = new PDO("mysql:dbname=hospital_reserve;host=db", "develop", "develop");
            }
            catch (PDOException $e) { return false; }
            return true;
        }
    }

    // SQLステートメント
    class SQLStatement {
        private $stmt;

        // コンストラクタ
        public function __construct($stmt) {
            $this->stmt = $stmt;
        }

        // 整数値のバインド
        public function bind_int($param, $value) {
            $this->stmt->bindValue($param, $value, PDO::PARAM_INT);
        }

        // 文字列のバインド
        public function bind_string($param, $value) {
            $this->stmt->bindValue($param, $value, PDO::PARAM_STR);
        }

        // 実行
        public function execute() {
            $this->stmt->execute();
        }

        // 全部フェッチ
        public function fetch_all() {
            return $this->stmt->fetchAll();
        }
    }
?>