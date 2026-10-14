<?php

return [
    // Número de WhatsApp con lada de país, sin espacios ni signos (52 = México).
    'whatsapp' => env('LANDING_WHATSAPP', '523129432555'),

    // Teléfono como se muestra al público (datos estructurados para Google).
    'telefono' => env('LANDING_TELEFONO', '+52 312 943 2555'),

    /*
    |--------------------------------------------------------------------------
    | Aviso de privacidad
    |--------------------------------------------------------------------------
    | Llena estos datos con la información REAL del cliente antes de publicar.
    | Mientras digan "PENDIENTE", el aviso no está completo.
    */
    'responsable'       => env('LANDING_RESPONSABLE', 'EM Construcciones'),
    'domicilio'         => env('LANDING_DOMICILIO', '[PENDIENTE: calle, número, colonia, C.P.], Colima, Colima, México'),
    'correo_privacidad' => env('LANDING_CORREO_PRIVACIDAD', '[PENDIENTE: correo para temas de privacidad]'),
    'aviso_actualizado' => '13 de octubre de 2026',

    // ID del Pixel de Meta (Meta Ads). Déjalo vacío hasta que el cliente lo tenga.
    // Con valor: aparece el banner de cookies y el Pixel solo carga si la persona acepta.
    'meta_pixel_id' => env('META_PIXEL_ID'),
];
