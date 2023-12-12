<?php

use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;

class AddSportsForm extends Form
{
    public function __construct($controller, $name)
    {
        $fields = new FieldList([
            CompositeField::create(
                CompositeField::create(
                    TextField::create(
                        'Title',
                        'Title'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-12 col-sm-12'),

            )->addExtraClass('row'),
        ]);

        $actions = FieldList::create(
            FormAction::create('save', 'Save Sport')
            ->setUseButtonTag(true)
            ->addExtraClass('btn btn-success')
        );

        $validator = new RequiredFields(
            'Name',
        );

        parent::__construct($controller, $name, $fields, $actions, $validator);

    }

    public function save($data, $form, HTTPRequest $request)
    {
        if (!empty($data['Title'])) {
            $member = Sports::get()->filter("Title", $data['Title'])->first();
            if ($member) {  
                //Set error message
                $form->sessionMessage("Sorry, sports already exist!", 'error');
                //Return back to form
                return $this->controller->redirectBack();
            }
        } 

        $sports = new Sports();
        $form->saveInto($sports);
        $sports->write();
        $form->sessionMessage('Sports successfully added','good');

        return $this->controller->redirect('dashboard/sports/');
    }

}