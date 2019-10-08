<?php

namespace AgenciaS3\Mail\Site\Partner;

use Illuminate\Mail\Mailable;

class PartnerMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\Partner $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo contato para parceiro recebido pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.site.partner.admin');
    }

}
