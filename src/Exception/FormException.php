<?php

namespace App\Exception;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FormException extends BadRequestHttpException
{
    protected $form;

    public function __construct(FormInterface $form, string $message = null, \Throwable $previous = null, ?int $code = 0, array $headers = [])
    {
        parent::__construct($message, $previous, $code, $headers);

        $this->form = $form;
    }

    public function getForm(): FormInterface
    {
        return $this->form;
    }

    public function getErrors()
    {
        $data = [];
        $errors = $this->form->getErrors(true);

        foreach ($errors as $error) {
            $data[$error->getOrigin()->getName()][] = $error->getMessage();
        }

        return $data;
    }
}
