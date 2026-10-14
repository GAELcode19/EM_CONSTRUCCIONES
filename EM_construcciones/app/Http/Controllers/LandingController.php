<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        return view('landing.index', $this->datos());
    }

    public function privacidad(): View
    {
        return view('landing.privacidad', $this->datos());
    }

    /** Datos compartidos por todas las páginas de la landing. */
    private function datos(): array
    {
        return [
            'wa'       => 'https://wa.me/' . config('landing.whatsapp'),
            'telefono' => config('landing.telefono'),
        ];
    }
}
