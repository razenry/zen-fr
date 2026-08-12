<?php

namespace App\Controllers;

use App\Core\Controller;

class PulseController extends Controller
{
    public function handle()
    {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input || empty($input['component'])) {
            echo json_encode(['error' => 'Invalid request payload']);
            return;
        }

        $componentName = ucfirst($input['component']);
        $class = "App\\Pulse\\" . $componentName;

        if (!class_exists($class)) {
            echo json_encode(['error' => "Zen Pulse Component [{$componentName}] not found"]);
            return;
        }

        /** @var \App\Core\ZenPulseComponent $component */
        $component = new $class();
        $component->id = $input['id'] ?? ('zen-pulse-' . uniqid());

        // Hydrate state
        if (isset($input['state']) && is_array($input['state'])) {
            $component->hydrate($input['state']);
        }

        // Execute action if passed
        if (!empty($input['action'])) {
            $action = $input['action'];
            $args = $input['args'] ?? [];
            if (method_exists($component, $action)) {
                call_user_func_array([$component, $action], $args);
            }
        }

        // Handle property update directly (zen-model)
        if (!empty($input['property'])) {
            $prop = $input['property'];
            $value = $input['value'] ?? null;
            if (property_exists($component, $prop)) {
                $component->{$prop} = $value;
            }
        }

        $html = $component->render();
        $newState = $component->getState();

        echo json_encode([
            'id'    => $component->id,
            'html'  => $html,
            'state' => $newState
        ]);
    }
}
