<?php

require_once 'classes/LDAP.class.php';

$ldap = new LDAP();

$usuario = $ldap->logar('williamferreira', '326890658@Bc');

echo "<pre>";
print_r($usuario);

?>

