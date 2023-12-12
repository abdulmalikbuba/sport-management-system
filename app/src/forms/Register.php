<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;

class AthleteRegistrationForm extends Form
{
    public function __construct($controller, $name)
    {
        $fields = new FieldList([
            CompositeField::create(
                CompositeField::create(
                    TextField::create(
                        'Name',
                        'Full Name'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    DateField::create(
                        'DateOfBirth',
                        'Date Of Birth'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    EmailField::create(
                        'EmailAddress',
                        'Email Address'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    DropdownField::create(
                        'Gender',
                        'Gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'])
                    ->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    TextField::create(
                        'Class',
                        'Class'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    DropdownField::create(
                        'Program',
                        'Program', ['Business' => 'Business', 'Agriculture' => 'Agriculture', 'Home Economics' => 'Home Economics',
                        'Visual Arts' => 'Visual Arts', 'General Arts' => 'General Arts', 'General Science' => 'General Science'])
                    ->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    DropdownField::create(
                        'House',
                        'House', ['1' => '1', '2' => '2', '3' => '3','4' => '4'])
                    ->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),
                
                CompositeField::create(
                    TextField::create(
                        'TelephoneNumber',
                        'Phone Number'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    TextField::create(
                        'Address',
                        'Address'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    DropdownField::create('SportsID', 
                    'Sports',
                    Sports::get()->map('ID', 'Title')) ->setEmptyString('Select Sports')
                    ->addExtraClass('form-control'),
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    NumericField::create(
                        'Height',
                        'Height'
                    )->setScale(2)
                    ->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    NumericField::create(
                        'Weight',
                        'Weight'
                    )->setScale(2)
                    ->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    $upload = FileField::create(
                        'Photo',
                        'Profile Photo'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

            )->addExtraClass('row'),
        ]);

        $actions = FieldList::create(
            FormAction::create('save', 'Save And Continue')
            ->setUseButtonTag(true)
            ->addExtraClass('btn btn-success')
        );

        $upload->getValidator()->setAllowedExtensions(['png', 'jpg', 'jpeg', 'gif']);
        $upload->setFolderName('Athletes-Images');

        $validator = new RequiredFields(
            'Name',
            'Age',
            'EmailAddress',
            'Gender',
            'Telephonenumber',
            'Address',
            'Class',
            'Program',
            'House',
            'SportsID'
            
        );

        parent::__construct($controller, $name, $fields, $actions, $validator, $upload);

    }

    public function save($data, $form, HTTPRequest $request)
    {
        $session = $request->getSession();
        if (!empty($data['Email'])) {
            $member = Athletes::get()->filter("Email", $data['Email'])->first();
            if ($member) {  
                //Set error message
                $form->sessionMessage("Sorry, that email address is already in use.", 'error');
                //Return back to form
                return $this->controller->redirectBack();
            }
        } 

        $member = new Athletes();
        $form->saveInto($member);
        $member->write();
        // $member->addToGroupByCode("Users");
        $this->controller->setSessionMessage("Athlete successfully added");

        return $this->controller->redirect('dashboard/students/');
    }
}