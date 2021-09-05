<?php

namespace Modules\BaseCore\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends \App\Exceptions\Handler
{
    /**
     * Get the view used to render HTTP exceptions.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface  $e
     * @return string
     */
    protected function getHttpExceptionView(HttpExceptionInterface $e)
    {
        return "basecore::errors.{$e->getStatusCode()}";
    }
}
