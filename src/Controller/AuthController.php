<?php

namespace App\Controller;

use App\Entity\User;
use App\Exception\FormException;
use App\Form\RegisterFormType;
use App\Http\ApiResponse;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractRestController
{
    /**
     * @Route("/auth/login", name="app_login", methods={"POST"})
     */
    public function login(): Response
    {
        $user = $this->getUser();

        return $this->handle([
            'username' => $user->getUsername(),
        ]);
    }

    /**
     * @Route("/auth/logout", name="app_logout", methods={"POST"})
     */
    public function logout(): Response
    {
        // will not be executed
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

    /**
     * @Route("/auth/register", name="app_register", methods={"POST"})
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->setDisplayName('Mickey Mouse');

        $form = $this->createForm(RegisterFormType::class);

        $form->submit($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->handle($user);
        }

        throw new FormException($form);
    }

    private function getErrorMessages(FormInterface $form)
    {
        $errors = [];

        foreach ($form->getErrors() as $key => $error) {
            if ($form->isRoot()) {
                $errors['#'][] = $error->getMessage();
            } else {
                $errors[] = $error->getMessage();
            }
        }

        foreach ($form->all() as $child) {
            $errors[$child->getName()] = $this->getErrorMessages($child);
        }

        return $errors;
    }

    /**
     * @Route("/auth/verify", name="app_verify", methods={"POST"})
     */
    public function verify(): Response
    {
        return $this->createNotFoundException();
    }
}
