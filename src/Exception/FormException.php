<?php

namespace App\Exception;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class FormException extends HttpException
{
    protected $form;

    public function __construct(FormInterface $form, int $statusCode = 400, string $message = null, \Exception $previous = null, array $headers = [], ?int $code = 0)
    {
        parent::__construct($statusCode, $message ?: Response::$statusTexts[400], $previous, $headers, $code);

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
