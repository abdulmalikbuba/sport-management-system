<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class AddTeamForm extends Form
{
    public function __construct($controller, $name)
    {
        $fields = new FieldList([
            CompositeField::create(
                CompositeField::create(
                    TextField::create(
                        'Name',
                        'Name'
                    )->addExtraClass('form-control')
                ),

                CompositeField::create(
                    TextareaField::create(
                        'Description',
                        'Description'
                    )->addExtraClass('form-control')
                ),

                CompositeField::create(
                    $upload = UploadField::create(
                        'Logo',
                        'Logo'
                    )->addExtraClass('form-control')
                ),

            )->addExtraClass('row'),

        ]);

        $actions = FieldList::create(
            FormAction::create('doAdd', 'Add Team')
            ->setUseButtonTag(true)
            ->addExtraClass('btn btn-success')
        );

        $upload->getValidator()->setAllowedExtensions(['png', 'jpg', 'jpeg', 'gif']);
        $upload->setFolderName('Teams-Images');

        $validator = new RequiredFields(
            'Name',
        );

        parent::__construct($controller, $name, $fields, $actions, $validator);

    }

    public function save($data, $form)
    {
        $team = new Team();
        $form->saveInto($team);
        $team->write();
        $form->sessionMessage('Team successfully added','good');

        return $this->controller->redirect('dashboard/sports/');
    }
}