<?php

namespace AgenciaS3\Mail\Site\TechnicalAssistance;

use Illuminate\Mail\Mailable;

class TechnicalAssistanceMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\TechnicalAssistance $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Nova solicitação de Assistência Técnica #'.$this->contact->id)
            ->with(['data' => $this->contact])
            ->view('vendor.emails.site.technical-assistance.admin');
    }

}
