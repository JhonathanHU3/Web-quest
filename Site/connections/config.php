<?php
$options = array(
    PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootCA.crt.pem'
);
$pdo = new PDO('mysql:host=$host;port=3306;dbname=bdapi', $user, $password, $options);

?>
