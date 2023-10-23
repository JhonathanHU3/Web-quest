<?php
$options = array(
    PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootCA.crt.pem'
);
$pdo = new PDO('mysql:host=api-webquest-teste01-server2.mysql.database.azure.com;port=3306;dbname=bdapi', 'qrlvyvqjpp', '114810AOWJI2F2F1$', $options);

?>
