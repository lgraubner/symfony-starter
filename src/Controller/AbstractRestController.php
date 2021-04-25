<?php

namespace App\Controller;

use App\Http\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractRestController extends AbstractController
{
    protected function handle($data = null, ?int $status = 200, array $headers = []): Response
    {
        return new ApiResponse($data, $status, $headers);
    }
}
