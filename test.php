<?php

include_once 'backend/config-sql.php';
include_once 'backend/config-storage.php';
include_once 'error-enable.php'

$cloudSql = new CloudSQL();
$cloudSql->newConnection();
echo "test succcess";

$cloudStorage = new CloudStorage();
$storage = $cloudStorage->initClient();

$google_project_id = "cloud-computing-project-1253";
$buckets = $storage->buckets->listBuckets($google_project_id);


foreach ($buckets['items'] as $bucket) {
    echo $bucket->getName();
}

?>