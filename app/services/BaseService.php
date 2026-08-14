<?php

namespace App\Services;

abstract class BaseService
{
    /**
     * Response helper for service operations
     */
    protected function success($data = null, string $message = 'Operation successful', array $meta = []): array
    {
        $response = [
            'status'  => true,
            'success' => true,
            'message' => $message,
            'data'    => $data
        ];

        if (!empty($meta)) {
            $response['meta'] = $meta;
        }

        return $response;
    }

    protected function error(string $message = 'Operation failed', mixed $errors = null, int $code = 400): array
    {
        return [
            'status'  => false,
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
            'code'    => $code
        ];
    }
}
