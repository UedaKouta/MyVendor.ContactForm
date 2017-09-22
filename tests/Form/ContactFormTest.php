<?php

namespace MyVendor\ContactForm;

use MyVendor\ContactForm\Form\ContactForm;
use PHPUnit\Framework\TestCase;
use Ray\WebFormModule\FormFactory;

class ContactFormTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        /* @var $form ContactForm */
        $this->form = (new FormFactory)->newInstance(ContactForm::class);
    }

    public function testApplyFailure()
    {
        $data = [
            'name' => 'bear',
            'message' => ''
        ];
        $success = $this->form->apply($data);
        $this->assertFalse($success);
    }

    public function testApplySuccess()
    {
        $data = [
            'name' => 'bear',
            'message' => 'nice'
        ];
        $success = $this->form->apply($data);
        $this->assertTrue($success);
    }
}
