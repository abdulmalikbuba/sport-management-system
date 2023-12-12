<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBDatetime;
use SilverStripe\View\ArrayData;

class Events extends DataObject
{
    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'Text',
        'Date' => 'Date',
        'Venue' => 'Varchar',
    ];

    
}