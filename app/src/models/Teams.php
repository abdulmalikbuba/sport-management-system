<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

class Team extends DataObject 
{
    private static $db = [
        'Name' => 'Varchar(255)',
        'Description' => 'Text',
    ];

    private static $has_one = [
        'Logo' => Image::class,
    ];

    private static $belongs_many_many = [
        'Events' => Event::class,
    ];

}