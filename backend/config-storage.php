<?php

require_once '../error-enable.php';
require_once 'config-sql.php';

require_once __DIR__ . '/../vendor/autoload.php';

class CloudStorage
{
    private $google_project_id = "cloud-computing-project-1253";

    public function initClient() {
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Google_Service_Storage::DEVSTORAGE_FULL_CONTROL);
        return new Google_Service_Storage($client);
    }

    public function storeFile($file)
    {
        $localFile = "../upload/".$file;
        $client = $this->initClient();
        $obj = new Google_Service_Storage_StorageObject();
        $bucketName = 'cloud-computing-storage';
        $obj->setName($file);
        $obj = $client->objects->insert($bucketName, $obj, array(
            'data' => file_get_contents($localFile),
            'uploadType' => 'media',
            'name' => $file,
            'predefinedAcl' => 'publicread',
        ));
        return $obj->getMediaLink();
    }

    public function getFile($image) {

    }
}
?>