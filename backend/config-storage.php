<?php

require_once './error-enable.php';
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

    public function storeFile($localFilePath, $contentType)
    {
        $obj = new Google_Service_Storage_StorageObject();
        // Generate a unique file name so we don't try to write to files to
        // the same name.
        $name = uniqid('', true);
        $obj->setName($name);
        $obj = $this->service->objects->insert($this->bucketName, $obj, array(
            'data' => file_get_contents("uploads/".$localFilePath),
            'uploadType' => 'media',
            'name' => $name,
            'predefinedAcl' => 'publicread',
        ));
        return $obj->getMediaLink();
    }

    public function getFile($image) {

    }
}
?>