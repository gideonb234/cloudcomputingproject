<?php

include 'backend/config-sql.php';

$cloudSql = new CloudSQL();
$cloudSql->newConnection();
echo "test succcess";

?>