<?php

namespace App\EventSubscriber;

use App\Exception\FormException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class JsonHttpExceptionSubscriber implements EventSubscriberInterface
{
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $request = $event->getRequest();

        if (in_array('application/json', $request->getAcceptableContentTypes())) {
            $statusCode = $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $statusCode >= 500 ? Response::$statusTexts[$statusCode] : $exception->getMessage();

            $error = [
                'message' => $message,
            ];

            if ($exception instanceof FormException) {
                $error['fields'] = $exception->getErrors();
            }

            $response = new JsonResponse([
                'error' => $error,
            ], $statusCode);

            $event->setResponse($response);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.exception' => 'onKernelException',
        ];
    }
}
