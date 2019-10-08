<?php

namespace AgenciaS3\Mail\Site\Newsletter;

use Illuminate\Mail\Mailable;

class NewsletterMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\Newsletter $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo e-mail cadastrado pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.site.newsletter.admin');
    }

}
