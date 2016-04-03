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
        // this access control is for project owners
        $ownerAccess = new Google_Service_Storage_ObjectAccessControl();
        $ownerAccess->setEntity('project-owners-' . $this->google_project_id);
        $ownerAccess->setRole('OWNER');

        // this access control is for public access
        $readerAccess = new Google_Service_Storage_ObjectAccessControl();
        $readerAccess->setEntity('allUsers');
        $readerAccess->setRole('READER');

        $obj = new Google_Service_Storage_StorageObject();
        $obj->setName($file);
        $obj->setAcl([$ownerAccess, $readerAccess]);
        $obj = $client->objects->insert($bucketName, $obj, array(
            'data' => file_get_contents($localFile),
            'uploadType' => 'media',
            'name' => $file,
        ));
        echo $obj->getMediaLink(); die();
    }

    public function getFile($image) {

    }
}
?>