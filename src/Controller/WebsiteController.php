<?php

namespace App\Controller;

use App\Entity\Website;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebsiteController extends AbstractController
{
    /**
     * @Route("/website/{id}", name="app_show_website", methods={"GET"})
     */
    public function show(Website $website): Response
    {
        return $this->json($website);
    }

    /**
     * @Route("/website", name="app_create_website", methods={"POST"})
     */
    public function create(): Response
    {
        throw $this->createNotFoundException();
    }

    /**
     * @Route("/website/{id}", name="app_update_website", methods={"PATCH"})
     */
    public function update(): Response
    {
        throw $this->createNotFoundException();
    }

    /**
     * @Route("/website/{id}", name="app_delete_website", methods={"DELETE"})
     */
    public function delete(): Response
    {
        throw $this->createNotFoundException();
    }
}
