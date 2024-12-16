# Content/View loader for Laravel with Livewire

[![Latest Stable Version](https://poser.pugx.org/linuxstreet/wire-content-modal/v/stable)](https://packagist.org/packages/linuxstreet/wire-content-modal)
[![License](https://poser.pugx.org/linuxstreet/wire-content-modal/license)](https://packagist.org/packages/linuxstreet/wire-content-modal)
[![Total Downloads](https://poser.pugx.org/linuxstreet/wire-content-modal/downloads)](https://packagist.org/packages/linuxstreet/wire-content-modal)

## Installation
> **Requires:**
- **[PHP version 8.1 or later](https://php.net/releases/)**
- **[Laravel version 10 or later](https://github.com/laravel/laravel)**
- **[Livewire version 3 or later](https://github.com/livewire/livewire)**
- **[AlpineJS](https://github.com/alpinejs/alpine)**

Via Composer:

```shell
composer require linuxstreet/wire-content-modal
```

## Usage
In web development, often we need to overlay a smaller window, or modal, on top of the main page to display additional information or allow user interaction. This modal can be populated with content from different sources, such as a Livewire component or a Blade view.

Place component on the web page
```bladehtml
<livewire:content-modal/>
```
Modal is listening for 'modal-show' and 'modal-hide' browser events.

AlpineJS @click example:
```html
<button x-data @click.throttle="$dispatch('modal-show', [=PARAMS])">Show</button>
```
### Params:

> **Mandatory:**
- **component:** [string] - Name of the Livewire component to be loaded
- OR
- **view:** [string] - Name of the Blade view to be loaded

#### NOTE: _If neither component or view is provided, Exception will be thrown._

> **Optional:**
- **spinnerClass:** [string] - Pass additional CSS classes to the loading spinner  (default: '')
- **params:** [array] - Pass additional params to Component/View (default: [])

## Examples:
Provide either 'component' or 'view' options like this:

```html
{ component: 'livewire_component' }
or
{ view: 'blade_view' }
```

Examples with HTML button element using AlpineJS:

```html
<button x-data @click.throttle="$dispatch('modal-show', [{ component: 'my-component' }] )">Show</button>
<button x-data @click.throttle="$dispatch('modal-show', [{ view: 'my-view' }] )">Show</button>
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Layout Customisation
This package uses [TailwindCSS](https://github.com/tailwindlabs/tailwindcss) classes. If you want to customize the layout for different CSS framework use:

```shell
php artisan vendor:publish --provider="Linuxstreet\WireContentModal\WireContentModalServiceProvider"
```

## Testing

```shell
./vendor/bin/pest
```

## Contributing

Please see [contributing.md](contributing.md) for details.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- Igor Jovanovic

## License

Please see the [license file](license.md) for more information.