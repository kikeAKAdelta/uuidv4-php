<?php

/**
 * Funcion encargada de generar el formato UUIDV4 de acuerdo con el RFC4122.
 */
function uuidv4(){

  $data = random_bytes(16);                         /**Datos aleatorios criptograficamente fuertes. openssl_random_pseudo_bytes() ó random_bytes() */

  assert(strlen($data) == 16);

  $data[6] = chr(ord($data[6]) & 0x0f | 0x40);      // set version to 0100
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80);      // set bits 6-7 to 10
    
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$codigoGeneracion = uuidv4();

echo strtoupper($codigoGeneracion);


?>

