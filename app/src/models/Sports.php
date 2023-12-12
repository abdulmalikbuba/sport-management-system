<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

class Sports extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)'
    ];

    private static $has_many = [
        'Athletes' => Athletes::class,
        'Teachers' => Member::class
    ];
}