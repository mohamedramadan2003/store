<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\CreateProductNotification;

class ProuductCreate
{

    public function __construct()
    {
        //
    }

    public function handle($product = null , $user): void
    {
        $no = $user->notify(new CreateProductNotification($product));

    }
}
