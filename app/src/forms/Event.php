<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\DatetimeField;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\RequiredFields;

class AddEventsForm extends Form
{
    public function __construct($controller, $name)
    {
        $fields = FieldList::create([
            CompositeField::create(
                CompositeField::create(
                    TextField::create(
                        'Title',
                        'Event Title'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-12 col-sm-12'),

                CompositeField::create(
                    DateField::create(
                        'Date',
                        'Event Date'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-12 col-sm-12'),

                CompositeField::create(
                    TextField::create(
                        'Venue',
                        'Venue'
                    )->addExtraClass('form-control')
                )->addExtraClass('col-lg-12 col-sm-12'),
            )->addExtraClass('row'),

        ]);

        $actions = FieldList::create(
            FormAction::create('doCreateEvent', 'Create Event')
            ->setUseButtonTag(true)
            ->addExtraClass('btn btn-success')
        );

        $validator = new RequiredFields(
            'Title',
            'Date',
            'Venue'
        );

        parent::__construct($controller, $name, $fields, $actions,$validator);
    }

    public function doCreateEvent($data, $form)
    {
        $event = Events::create();
        $form->saveInto($event);
        $event->write();

        // Set a success message and redirect
        $form->sessionMessage('Event created successfully!', 'good');
        return $this->controller->redirectBack();
    }
}