<?php 

//
// SQLiteDao.
// Clase padre de todos los DAOs que existan en la APP.
//
class SQLiteDao {

   protected static ?SQLite3 $conn = null;

   public function __construct() {
      self::$conn = self::getConnInstance();
   }

   private static function getConnInstance(): SQLite3 {
      if (!self::$conn) {
         if (DBPATH != "") {
            try {
               self::$conn = new SQLite3(DBPATH);
               self::$conn->enableExceptions(true);
            } catch (Exception $e) {
               die("[Exception] {$e->getTraceAsString()}");
            }
         } else {
            die("Error. No se ha especificado el path de la base de datos");
         }
      }
      return self::$conn;
   }

}