<?php

namespace App\Http;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse extends JsonResponse
{
    public function __construct($data = null, int $status = 200, array $headers = [])
    {
        parent::__construct([
            'data' => $data,
        ], $status, $headers);
    }
}
