<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/barzaasda", name="foo")
     */
    public function show(): Response
    {
        dump('foo bar');

        return $this->json(['hello' => 'world']);
    }
}
