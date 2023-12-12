<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\FormAction;
// use SilverStripe\AssetAdmin\Forms\UploadField;

class EditStudentDetailsForm extends Form
{
    public function __construct($controller, $name, $athlete)
    {
        $fields = FieldList::create(
            TextField::create('Name', 'Name')->setValue($athlete->Name),
            DateField::create('DateOfBirth', 'Date of Birth')->setValue($athlete->DateOfBirth),
            EmailField::create('EmailAddress', 'Email Address')->setValue($athlete->EmailAddress),
            DropdownField::create('Gender', 'Gender')->setSource(['Male' => 'Male', 'Female' => 'Female'])->setValue($athlete->Gender),
            TextField::create('Class', 'Class')->setValue($athlete->Class),
            TextField::create('Program', 'Program')->setValue($athlete->Program),
            TextField::create('TelephoneNumber', 'Telephone Number')->setValue($athlete->TelephoneNumber),
            DropdownField::create('SportsID', 'Sport')->setSource(Sports::get()->map('ID', 'Title'))->setValue($athlete->SportsID),
            TextField::create('Height', 'Height')->setValue($athlete->Height),
            TextField::create('Weight', 'Weight')->setValue($athlete->Weight),
            FileField::create('PhotoID', 'Profile Photo')->setFolderName('profile-photos')->setAllowedExtensions(['jpg', 'jpeg', 'png'])
        );

        $actions = FieldList::create(
            FormAction::create('doUpdate', 'Update')
        );

        parent::__construct($controller, $name, $fields, $actions);
    }
}

