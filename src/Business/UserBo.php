<?php

//
// Componente de negocio donde se implementa la 
// lógica de negocio relacionada con el usuario.
//

require_once(__DIR__ . '/../DB/SQLiteUserDao.php');

//
// Estructura que representa un tipo enumerado para los errores de login.
//
abstract class LoginValErrStatus {
   const ERR_USERNAME = 0;
   const ERR_PASSWORD = 1;
}

final class UserBo {

   private SQLiteUserDao $userDao;

   private int $valStatus = 0;

   public function __construct(SQLiteUserDao $userDao) {
      $this->userDao = $userDao;
   }

   public function getValStatus(): int {
      return $this->valStatus;
   }

   public function getByUsername(string $username): ?object {
      return $this->userDao->getByUsername($username);
   }
   
   //
   // Método que contiene la lógica del login del usuario.
   // 
   public function login(string $username, string $password): bool {
      $loginRes = false;
      $user = $this->getByUsername($username);
      if ($user) {
         if (password_verify($password, $user->password)) {
            $loginRes = true;
         } else {
            $this->valStatus = LoginValErrStatus::ERR_PASSWORD;
         }
      } else { 
         $this->valStatus  = LoginValErrStatus::ERR_USERNAME;
      }      
      return $loginRes;
   }

}