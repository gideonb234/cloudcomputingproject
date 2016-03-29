<?php

/*
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * class CloudStorage stores images in Google Cloud Storage.
 */
include '../error-enable.php';

class CloudStorage
{
    /**
     * CloudStorage constructor.
     *
     * @param string         $bucketName The cloud storage bucket name
     * @param \Google_Client $client     When null, a new Google_client is created
     *                                   that uses default application credentials.
     */

    private $google_project_id = "cloud-computing-project-1253"

    public function initClient() {
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Google_Service_Storage::DEVSTORAGE_FULL_CONTROL);
        return new Google_Service_Storage($client);
    }

    /**
     * Uploads a file to storage and returns the url of the new file.
     *
     * @param $localFilePath string
     * @param $contentType string
     *
     * @return string A URL pointing to the stored file.
     */
    public function storeFile($localFilePath, $contentType)
    {
        $obj = new Google_Service_Storage_StorageObject();
        // Generate a unique file name so we don't try to write to files to
        // the same name.
        $name = uniqid('', true);
        $obj->setName($name);
        $obj = $this->service->objects->insert($this->bucketName, $obj, array(
            'data' => file_get_contents($localFilePath),
            'uploadType' => 'media',
            'name' => $name,
            'predefinedAcl' => 'publicread',
        ));

        return $obj->getMediaLink();
    }

    /**
     * Gets a file from storage
     * Author: Gideon Brett / Jay-Russell Dennis
     * @param $image, an image url or ID
     */
    public function getFile($image) {

    }
}
?>