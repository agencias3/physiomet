<?php

namespace AgenciaS3\Mail\Site\Newsletter;

use AgenciaS3\Entities\Newsletter;
use Illuminate\Mail\Mailable;

class NewsletterClientMail extends Mailable
{
    public $contact;

    public $form;

    public function __construct(Newsletter $contact, $form)
    {
        $this->contact = $contact;
        $this->form = $form;
    }

    public function build()
    {
        $subject = "Obrigado pelo cadastro";

        if (isset($this->form->subject)) {
            $subject = $this->form->subject;
        }

        if (isset($this->form->from)) {
            $email = $this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if (isset($this->form->reply_to)) {
            $email = $this->replyTo($this->form->reply_to, $subject);
        }

        if (isset($this->form->file)) {
            $email = $this->attach(public_path('uploads/form/' . $this->form->file));
        }

        if (isset($this->form->subject)) {
            $description = $this->form->description;
        }

        $email = $this->subject($subject)
            ->with([
                'data' => $this->contact,
                'textEmail' => $description
            ])
            ->view('vendor.emails.site.newsletter.client');


        return $email;
    }

}
