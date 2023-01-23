<?php

require_once(__DIR__ . '/../globals.php');
require_once(__DIR__ . './SQLiteDao.php');

//
// SQLiteUserDao.
// Componente de acceso a datos donde se implementa
// la lógica de acceso a datos relacionada con el usuario,
// en una bd de tipo SQLite.
//
final class SQLiteUserDao extends SQLiteDao {

   //
   // Método que contiene la lógica para la obtención
   // de un usuario a partir del username.
   //
   public function getByUsername(string $username): ?object {
      $user = null;
      try {
         // Query.
         $query = 'SELECT * FROM users WHERE username = :username';
         // SQLite3Stmt.
         $statement = self::$conn->prepare($query);
         if ( $statement !== false ) {
            $statement->bindValue(':username', $username, SQLITE3_TEXT);
            // SQLite3Result.
            $result = $statement->execute();
            if ( $result !== false ) {
               if ( $row = $result->fetchArray(SQLITE3_ASSOC) ) {
                  $user = (object) $row;
               }
            }
         }
      } catch (Exception $e) {
         die("[Exception] {$e->getTraceAsString()}");
      }
      return $user;
   }

}