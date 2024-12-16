<?php

namespace Linuxstreet\WireContentModal;

use Illuminate\Support\Facades\Blade;
use Livewire\Attributes\On;
use Livewire\Component;

class WireContentModal extends Component
{
    public string $component = '';
    public string $view = '';
    public array $params = [];
    public bool $isOpen = false;
    public string $content = '';

    private function generateKey(): string
    {
        return $this->component . '-' . microtime();
    }

    #[On('modal-show')]
    public function show(array $options = []): void
    {
        $component = $options['component'] ?? '';
        $view = $options['view'] ?? '';
        throw_if((blank($component) && blank($view)), new \Exception('Component or View name must be provided.'));

        $this->component = $component;
        $this->view = $view;
        $this->params = $options['params'] ?? [];
        $this->isOpen = true;
    }

    #[On('modal-hide')]
    public function hide(): void
    {
        $this->component = '';
        $this->params = [];
        $this->isOpen = false;
    }

    public function readyToRender(): bool
    {
        return $this->isOpen && (!blank($this->component . $this->view));
    }

    public function render()
    {
        $this->content = '';

        if ($this->readyToRender()) {
            try {
                $this->content = (!$this->view)
                    ? Blade::render('@livewire($component, $params, key($key))', ['component' => $this->component,
                        'params' => $this->params, 'key' => $this->generateKey()])
                    : Blade::render('@include($view, $params)', ['view' => $this->view, 'params' => $this->params]);
            } catch (\Throwable $e) {
                $this->content = $e->getMessage();
            }
        }

        return view('wire-content-modal::livewire.content-modal');
    }
}
