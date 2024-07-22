<?php

namespace App\Services;

class AppUrlService
{
    protected string $appUrl;

    public function __construct()
    {
        $this->appUrl = env('APP_URL');
    }

    public function getAppUrl(): string
    {
        return $this->appUrl;
    }
}
