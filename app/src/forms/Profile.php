<?php

use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FileField;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;

class EditProfileForm extends Form
{
    public function __construct($controller, $name, $profile = null)
    {

        $fields = new FieldList([
            CompositeField::create(
                HiddenField::create('ID'),
                CompositeField::create(
                    TextField::create(
                        'Surname',
                        'Surname'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    TextField::create(
                        'FirstName',
                        'First Name'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    EmailField::create(
                        'Email',
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
                        'Telephonenumber',
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
                    DateField::create(
                        'DateOfBirth',
                        'Date Of Birth'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    $upload = FileField::create(
                        'ProfilePhoto',
                        'Profile Photo'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-6 col-sm-12'),

                CompositeField::create(
                    DropdownField::create('SportsID', 
                    'Sports',
                    Sports::get()->map('ID', 'Title')) ->setEmptyString('Select Sports')
                    ->addExtraClass('form-control'),
                )->addExtraClass('col-lg-12 col-sm-12'),


            )->addExtraClass('row'),

        ]);

        $actions = FieldList::create(
            FormAction::create('updateProfile', 'Update')
            ->setUseButtonTag(true)
            ->addExtraClass('btn btn-success')
        );

        $upload->getValidator()->setAllowedExtensions(['png', 'jpg', 'jpeg', 'gif']);
        $upload->setFolderName('Teacher\'s-Images');

        $validator = new RequiredFields(
            'Surname',
            'FirstName',
            'Email',
            'Gender',
            'Telephonenumber',
            'SportsID'
        );

        parent::__construct($controller, $name, $fields, $actions, $validator);

        if ($profile)
        {
            $this->loadDataFrom($profile);
        }

        $this->loadDataFrom(Security::getCurrentUser());

    }

    public function updateProfile($data, $form, HTTPRequest $request)
    {
        if (isset($data['ID']) && !empty($data['ID'])) {
                $member = Member::get()->byID($data['ID']);
            } else {
                $member = new Member;
            }
    
            $form->saveInto($member);
        $member->write();
        
        $this->controller->setSessionMessage("Profile updated successfully.", 'good');
        
        return $this->controller->redirectBack();
    }
  
}