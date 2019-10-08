<?php

namespace AgenciaS3\Mail\Site\Part;

use Illuminate\Mail\Mailable;

class PartMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\PartContact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo orçamento recebido pelo site para peças')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.site.part.admin');
    }

}
