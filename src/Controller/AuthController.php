<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth/login", name="auth_login", methods={"POST"})
     */
    public function show(): Response
    {
        $user = $this->getUser();

        return $this->json([
            'username' => $user->getUsername(),
        ]);
    }
}
