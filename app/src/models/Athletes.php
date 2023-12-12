<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\FieldType\DBDate;

class Athletes extends DataObject
{
    private static $db = [
        'Name' => 'Varchar',
        'DateOfBirth' => 'Date',
        'Gender' => 'Varchar',
        'EmailAddress' => 'Varchar',
        'Class' => 'Varchar',
        'Program' => 'Enum("Business,Agriculture,Home Economics,Visual Arts,General Arts,General Science","Business")',
        'TelephoneNumber' => 'Varchar',
        'Height' => 'Decimal(5,2)',
        'Weight' => 'Decimal(5,2)',
        'Address' => 'Varchar(255)',
        'House' => 'Enum("1,2,3,4","1")'
    ];

    private static $has_one = [
        'Sports' => Sports::class,
        'Photo' => Image::class,
    ];

    private static $owns = [
        'Photo',
    ];

    private static $summary_fields = [
        'GridThumbnail' => 'Image',
        'Name' => 'Athlete Name',
        'Age' => 'Age',
        'EmailAddress' => 'Email Address',
        'Class' => 'Class',
        'Program' => 'Program',
        'TelephoneNumber' => 'Telephone Number',
    ];

    public function getGridThumbnail()
    {
        if ($this->Photo()->exists()) {
            return $this->Photo()->Fill(100,100);
        }

        return "(no image)";
    }

    public function getAge() 
    {
        $dateOfBirth = $this->DateOfBirth;
        if ($dateOfBirth) {
            $now = new DateTime();
            $birthdate = new DateTime($dateOfBirth);
            $interval = $birthdate->diff($now);
            return $interval->y;
        }
        return null;
    }
    
}