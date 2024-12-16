<?php

use Linuxstreet\WireContentModal\WireContentModal;
use function Pest\Livewire\livewire;

it('is initialized', function () {
    livewire(WireContentModal::class)
        ->assertViewIs('wire-content-modal::livewire.content-modal')
        ->assertSet('params', [])
        ->assertSet('isOpen', false)
        ->assertOk();
});

it('throws exception when component or view is missing', function () {
    livewire(WireContentModal::class)
        ->call('show', []);
})->throws(Exception::class, 'Component or View name must be provided.');

it('sets the component to be loaded', function () {
    livewire(WireContentModal::class)
        ->call('show', ['component' => 'test'])
        ->assertSet('component', 'test');
});

it('sets the view to be loaded', function () {
    livewire(WireContentModal::class)
        ->call('show', ['view' => 'test'])
        ->assertSet('view', 'test')
        ->assertSet('component', null);
});

it('sets the view to be loaded with additional params', function () {
    $p = ['id' => 1, 'options' => ['bulk' => true]];
    livewire(WireContentModal::class)
        ->call('show', ['view' => 'test', 'params' => $p])
        ->assertSet('view', 'test')
        ->assertSet('component', null)
        ->assertSet('params', $p)
        ->assertSee('View [test] not found.');
});
