<?php
namespace AgenciaS3;

class Application extends \Illuminate\Foundation\Application
{

    public function publicPath()
    {
        $path = '/home/agencias3';
        return $path . DIRECTORY_SEPARATOR . 'www' . DIRECTORY_SEPARATOR . 'wesa';
    }

}