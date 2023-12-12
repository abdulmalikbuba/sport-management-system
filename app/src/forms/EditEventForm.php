<?php

use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;

class EditEventForm extends Form
{
    public function __construct($controller, $name, $event)
    {
        $fields = FieldList::create(
            TextField::create('Title', 'Title')->setValue($event->Title),
            DateField::create('Date', 'Date')->setValue($event->Date),
            TextField::create('Venue', 'Venue')->setValue($event->Venue),
        );

        $actions = FieldList::create(
            FormAction::create('updateEvent', 'Update')
        );

        parent::__construct($controller, $name, $fields, $actions);

    }
}