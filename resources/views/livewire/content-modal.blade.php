<div x-data="{
    isOpen: $wire.$entangle('isOpen'),
    spinnerClass: '',
    show() {
        this.isOpen = true;
    },
    hide() {
        this.isOpen = false;
        }
    }"
     x-on:modal-show.window="show()"
     x-on:modal-hide.window="hide()"
     x-on:close.stop="hide()"
     x-on:keydown.escape.window="hide()"
     x-show="isOpen"
     x-transition.opacity.duration.200ms
     class="fixed backdrop-blur-sm inset-0 bg-gray-500/75 overflow-y-auto px-4 py-6 sm:px-0 z-10 transform transition-all"
     style="display: none;"
     x-cloak>
    <div x-show="isOpen"
         class="relative bg-white rounded-lg shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto">
        <div x-on:click="hide()"
             class="cursor-pointer absolute -right-2 -top-2 rounded-full bg-neutral-600">
            <x-wire-content-modal::icon-close/>
        </div>
        <div class="flex justify-center items-center p-6">
            <x-wire-content-modal::loading-spinner wire:loading/>
            <div wire:loading.remove>{!! $content !!}</div>
        </div>
    </div>
</div>
