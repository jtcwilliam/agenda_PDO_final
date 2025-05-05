<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'classes/LDAP.class.php';

$ldap = new LDAP();

$usuario = $ldap->logar('williamferreira', '326890658@Bc');

echo "<pre>";
print_r($usuario);

?>

