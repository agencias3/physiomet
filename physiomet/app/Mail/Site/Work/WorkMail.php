<?php

namespace AgenciaS3\Mail\Site\Work;

use Illuminate\Mail\Mailable;

class WorkMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\Work $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo curriculo recebido pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.site.work.admin');
    }

}
