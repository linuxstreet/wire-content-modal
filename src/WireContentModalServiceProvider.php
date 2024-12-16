<?php

namespace Linuxstreet\WireContentModal;

use Livewire\Livewire;

class WireContentModalServiceProvider extends \Illuminate\Support\ServiceProvider
{
    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'wire-content-modal');
    }

    private function bootLivewireComponents(): void
    {
        if (!class_exists(Livewire::class)) {
            return;
        }

        Livewire::component('content-modal', WireContentModal::class);
    }

    private function bootForConsole(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/wire-content-modal'),
        ], 'wire-content-modal');
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootLivewireComponents();

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }
}
