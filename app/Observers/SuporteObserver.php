<?php

namespace App\Observers;

use App\Models\Suporte;
use Illuminate\Support\Facades\Auth;

class SuporteObserver
{
    /**
     * Handle the Suporte "creating" event.
     */
    public function creating(Suporte $suporte): void
    {
        $suporte->user_id = Auth::user()->id;
    }    
}
