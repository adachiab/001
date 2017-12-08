<?php
class DAO {
    
    private $table = '';
    function __construct() {
    $db_config = DBConfig::$default;
      define('DB_DATABASE',$db_config['db_name']);
      define('DB_USERNAME',$db_config['user']);
      define('DB_PASSWORD','');
      define('PDO_DSN','mysql:host=localhost;dbname=' . $db_config['db_name']);
      try{
        //DB接続
        $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
        //エラーをスロー
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      } catch(PDOException $e){
        echo $e->getMessage();
        exit;
      }

    }
    function findUserById($id) { /* ... */ }
    function findUserByName($name) { /* ... */ }
    function insertUser(array $user) { /* ... */ }


}