<?php

namespace App\Core;

abstract class Mailable
{
    public string $subject = '';
    protected string $view = '';
    protected array $viewData = [];
    protected string $htmlBody = '';

    public function subject(string $subject): static
    {
        $this->subject = $subject;
        return $this;
    }

    public function view(string $view, array $data = []): static
    {
        $this->view = $view;
        $this->viewData = array_merge($this->viewData, $data);
        return $this;
    }

    public function html(string $html): static
    {
        $this->htmlBody = $html;
        return $this;
    }

    public function build(): static
    {
        return $this;
    }

    public function render(): string
    {
        $this->build();

        if (!empty($this->htmlBody)) {
            return $this->htmlBody;
        }

        if (!empty($this->view)) {
            ob_start();
            extract($this->viewData);
            $viewPath = dirname(__DIR__, 2) . '/app/views/' . str_replace('.', '/', $this->view) . '.php';
            if (file_exists($viewPath)) {
                require $viewPath;
            } else {
                echo "<p>" . htmlspecialchars($this->subject) . "</p>";
            }
            return ob_get_clean();
        }

        return "<div>" . htmlspecialchars($this->subject) . "</div>";
    }
}
