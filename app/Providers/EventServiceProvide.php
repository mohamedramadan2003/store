<?php

namespace App\Providers;

use App\Listeners\ProuductCreate;
use Illuminate\Support\ServiceProvider;

class EventServiceProvide extends ServiceProvider
{
   protected $listen = [
    'product.created' => [ProuductCreate::class],
   ];
    public function register(): void
    {

    }

    public function boot(): void
    {
        
    }
}
