<?php

$password = 'y10b3z$AytrOwz';

// Creación de un hash de la contraseña usando el algoritmo por defecto (BCRYPT).
echo password_hash($password, PASSWORD_DEFAULT)."\n";