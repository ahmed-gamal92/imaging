<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Driver for image processing
    |--------------------------------------------------------------------------
    | The driver that you want to use to process the images.
    |
    | Accepted values: 'gd', 'imagick'
    |
    */
    'driver' => 'gd',

    /*
    |--------------------------------------------------------------------------
    | Local disk name
    |--------------------------------------------------------------------------
    |
    | All images are first uploaded/stored in your local disk, so please
    | specific the name of disk you want to use for this.
    |
    | You can add more disks in config/filesystems.php
    |
    */
    'local_disk_name' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Local disk URL
    |--------------------------------------------------------------------------
    |
    | When the image is not moved to the cloud yet, it still needs to be
    | served, so please specify here the full URL to the base folder
    | where you store the uploaded images in your local disk.
    */
    'local_disk_url' => 'http://temporal-url',

    /*
    |--------------------------------------------------------------------------
    | Cloud disk URL
    |--------------------------------------------------------------------------
    |
    | After one image is uploaded and processed, it can be moved to the cloud.
    | To do so, besides wiring up the events and listeners, you have to
    | specify a cloud disk here. If you do not want to use a cloud disk,
    | just leave this empty.
    |
    | You can add more disks in config/filesystems.php
    |
    */
    'cloud_disk_name' => '',

    /*
    |--------------------------------------------------------------------------
    | Cloud disk URL
    |--------------------------------------------------------------------------
    |
    | Same as local disk URL, but for the cloud. This URL will be used
    | once (and if) the images have been moved to the cloud.
    |
    */
    'cloud_disk_url' => '',

];