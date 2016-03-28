<?php
// All the database/google cloud connection stuff should go here
/**
* 
*/
class config 
{
    
    private var $client;

    public function __construct($bucketName, Google_Client $client = null)
    {
        $this->service = new Google_Service_Storage($client);
        $this->bucketName = $bucketName;
    }


    function connect_to_db() {

    }

    function conenct_to_filestore() {
        $client->addScope(Google_Service_Storage::DEVSTORAGE_FULL_CONTROL);

        $storage = new Google_Service_Storage($client);

        // test
        $buckets = $storage->buckets->listBuckets($projectId);

        foreach ($buckets['items'] as $bucket) {
            printf("%s\n", $bucket->getName());
        }
    }
}
    $projectId = "id"
    $bucketName = "name"
    $test = new config($bucketName);
    $test->conenct_to_filestore($projectId);
    echo $test;

?>

