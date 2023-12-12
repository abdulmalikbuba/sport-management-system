<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;

class MemberExtension extends DataExtension
{
    private static $db = [
        'DateOfBirth' => 'Date',
        'Telephonenumber' => 'Varchar',
        'Gender' => 'Varchar',
        'Address' => 'Varchar',
    ];

    private static $has_one = [
        'ProfilePhoto' => Image::class,
        'Sports' => Sports::class
    ];
}