<?php

namespace App\Core;

trait ApiResponse
{
    /**
     * Send JSON Response
     */
    protected function json(array $payload, int $statusCode = 200)
    {
        if (!headers_sent()) {
            http_response_code($statusCode);
            header('Content-Type: application/json; charset=utf-8');
        }
        echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if (PHP_SAPI === 'cli' && (defined('PHPUNIT_COMPOSER_INSTALL') || defined('PEST'))) {
            return $payload;
        }
        exit;
    }

    /**
     * Standardized Success Response
     */
    protected function sendSuccess($data = null, string $message = 'Success', int $statusCode = 200)
    {
        return $this->json([
            'success' => true,
            'message' => $message,
            'data'    => $data
        ], $statusCode);
    }

    /**
     * Standardized Error Response
     */
    protected function sendError(string $message = 'Error', $errors = null, int $statusCode = 400)
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        if ($errors !== null) {
            $response['errors'] = $errors;
        }

        return $this->json($response, $statusCode);
    }

    /**
     * Standardized Validation Error (422)
     */
    protected function sendValidationError(array $errors, string $message = 'Validation failed')
    {
        return $this->sendError($message, $errors, 422);
    }

    /**
     * Standardized Unauthorized Response (401)
     */
    protected function sendUnauthorized(string $message = 'Unauthorized access')
    {
        return $this->sendError($message, null, 401);
    }

    /**
     * Standardized Forbidden Response (403)
     */
    protected function sendForbidden(string $message = 'Access forbidden')
    {
        return $this->sendError($message, null, 403);
    }

    /**
     * Standardized Not Found Response (404)
     */
    protected function sendNotFound(string $message = 'Resource not found')
    {
        return $this->sendError($message, null, 404);
    }
}
