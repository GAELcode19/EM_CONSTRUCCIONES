<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Hash del único script en línea de la landing:
     * document.documentElement.classList.add('js')
     * Si cambias ese script, recalcula el hash:
     * echo -n "<script>" | openssl dgst -sha256 -binary | openssl base64
     */
    private const INLINE_JS_HASH = 'sha256-Du+OJKJSbdUgz5nrHeWWINvez6XKDDU/tyj/5c2uvwo=';

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Cabeceras base para todas las páginas
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=(), usb=(), interest-cohort=()');

        if ($request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        // CSP estricta solo en la landing (las páginas de acceso usan Livewire/Flux)
        if ($request->routeIs('home', 'privacidad')) {
            $response->headers->set('Content-Security-Policy', $this->landingCsp());
        }

        $response->headers->remove('X-Powered-By');

        return $response;
    }

    private function landingCsp(): string
    {
        // El Pixel de Meta solo se carga si la persona acepta las cookies de publicidad (cookies.js).
        $meta = filled(config('landing.meta_pixel_id'));

        $script  = "'self' '".self::INLINE_JS_HASH."'".($meta ? ' https://connect.facebook.net' : '');
        $img     = "'self' data:".($meta ? ' https://www.facebook.com' : '');
        $connect = "'self'".($meta ? ' https://www.facebook.com https://connect.facebook.net' : '');

        return implode('; ', [
            "default-src 'self'",
            "script-src $script",
            "style-src 'self' 'unsafe-inline'",
            "img-src $img",
            "font-src 'self'",
            "connect-src $connect",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'none'",
            'upgrade-insecure-requests',
        ]);
    }
}
