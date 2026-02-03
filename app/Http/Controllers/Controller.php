<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function lang() 
    {
        return request()->attributes->get('browser_lang');
    }
}
