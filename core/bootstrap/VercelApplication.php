<?php

use Illuminate\Foundation\Application;

class VercelApplication extends Application
{
    public function bootstrapPath($path = '')
    {
        $prefix = '/tmp/bootstrap-cache';

        return $prefix . ($path !== '' ? DIRECTORY_SEPARATOR . $path : '');
    }
}
