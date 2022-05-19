<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Http;

trait ApiService {

    protected function getApiJson(string $url) {
        $response = Http::get($url); // reading api content from the internet

        return json_decode($response->body());
    }

}
