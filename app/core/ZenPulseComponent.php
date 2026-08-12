<?php

namespace App\Core;

abstract class ZenPulseComponent
{
    public $id;

    public function mount(array $params = [])
    {
        foreach ($params as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function render();

    /**
     * Get public properties state
     */
    public function getState(): array
    {
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        $state = [];

        foreach ($props as $prop) {
            if ($prop->getName() === 'id') continue;
            $state[$prop->getName()] = $prop->getValue($this);
        }

        return $state;
    }

    /**
     * Hydrate state into component
     */
    public function hydrate(array $state)
    {
        foreach ($state as $key => $value) {
            if (property_exists($this, $key) && $key !== 'id') {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Helper to render component HTML string with container wrapper
     */
    public static function renderComponent(string $name, array $params = []): string
    {
        $class = "App\\Pulse\\" . ucfirst($name);
        if (!class_exists($class)) {
            throw new \Exception("Zen Pulse component [{$name}] not found.");
        }

        /** @var ZenPulseComponent $component */
        $component = new $class();
        $component->id = 'zen-pulse-' . uniqid();
        $component->mount($params);

        $stateJson = htmlspecialchars(json_encode($component->getState(), JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8');
        $html = $component->render();

        return sprintf(
            '<div zen-id="%s" zen-component="%s" zen-state="%s" zen:id="%s" zen:component="%s" zen:state="%s">%s</div>',
            $component->id,
            $name,
            $stateJson,
            $component->id,
            $name,
            $stateJson,
            $html
        );
    }
}
