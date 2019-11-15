<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //

             'http://water.dev/Ctable',
             'http://water.dev/loctiontable',
             'http://water.dev/categorytable',
             'http://water.dev/lloctiontable',
             'http://water.dev/regionaltable'




    ];
}
