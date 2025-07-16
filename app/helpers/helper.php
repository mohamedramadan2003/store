<?php

use Illuminate\Support\Facades\Auth;

 function name()
{
    return Auth::user()->name ;
}
