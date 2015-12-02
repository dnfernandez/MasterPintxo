<?php
// file: /core/PDOConnection.php

class PDOConnection {
  private static $dbhost = "127.0.0.1";
  private static $dbname = "G_31MasterPintxo";
  private static $dbuser = "adminG31";
  private static $dbpass = "bfd59291e825b5f2bbf1eb76569f8fe7.";
  private static $db_singleton = null;
  
  public static function getInstance() {
    if (self::$db_singleton == null) {
      self::$db_singleton = new PDO(
	"mysql:host=".self::$dbhost.";dbname=".self::$dbname.";charset=utf8", // connection string
	self::$dbuser, 
	self::$dbpass, 
	array( // options
	  PDO::ATTR_EMULATE_PREPARES => false,
	  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	)
      );
    }
    return self::$db_singleton;
  }
}
?>