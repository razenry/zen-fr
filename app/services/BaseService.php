<?php

namespace App\Services;

abstract class BaseService
{
    /**
     * Response helper for service operations
     */
    protected function success($data = null, string $message = 'Operation successful')
    {
        return [
            'status'  => true,
            'message' => $message,
            'data'    => $data
        ];
    }

    protected function error(string $message = 'Operation failed', $data = null)
    {
        return [
            'status'  => false,
            'message' => $message,
            'data'    => $data
        ];
    }
}
