<?php
namespace MyVendor\ContactForm\Form;

use Aura\Html\Helper\Tag;
use Ray\WebFormModule\AbstractForm;

class LoginForm extends AbstractForm
{
    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $form = $this->form([
            'method' => 'post',
            'action' => '/multi'
        ]);
        // name
        /* @var $tag Tag */
        $tag = $this->helper->get('tag');
        $form .= $tag('div', ['class' => 'form-group']);
        $form .= $tag('div', ['class' => 'form-group']);

        $form .= $tag('div', ['class' => 'form-group']);
        $form .= $tag('label', ['for' => 'name']);
        $form .= 'User ID:';
        $form .= $tag('/label') . PHP_EOL;
        $form .= $this->input('user');
        $form .= $this->error('user');
        $form .= $tag('/div') . PHP_EOL;
        // message
        $form .= $tag('div', ['class' => 'form-group']);
        $form .= $tag('label', ['for' => 'message']);
        $form .= 'Password:';
        $form .= $tag('/label') . PHP_EOL;
        $form .= $this->input('password');
        $form .= $this->error('password');
        $form .= $tag('/div') . PHP_EOL;
        // submit
        $form .= $this->input('submit');
        $form .= $tag('/form');

        return $form;
    }

    // use SetAntiCsrfTrait;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->setField('user')
            ->setAttribs([
                'id' => 'login[user]',
                'name' => 'login[user]',
                'size' => 8,
                'class' => 'form-control',
                'placeholder' => 'user name'
            ]);
        $this->setField('password', 'text')
            ->setAttribs([
                'id' => 'login[password]',
                'name' => 'login[password]',
                'class' => 'form-control',
                'placeholder' => 'Password'
            ]);
        $this->setField('submit', 'submit')
            ->setAttribs([
                'name' => 'submit',
                'value' => 'login'
            ]);
        // user
        $this->filter->validate('user')->is('alnum');
        $this->filter->useFieldMessage('user', 'user id must be alphabetic only.');
        // password
        $this->filter->validate('password')->isNotBlank();
        $this->filter->useFieldMessage('password', 'password is required.');
    }
}
