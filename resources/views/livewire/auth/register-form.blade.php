<form class="space-y-2.5" wire:submit.prevent="submit">
    <x-ui.input.text wire:model="name" name="name" type="text" label="Name" required />

    <x-ui.input.text wire:model="email" name="email" type="email" label="Email" required />

    <x-ui.button.primary class="w-full" type="submit" wire:loading.attr="disabled">
        <x-slot name="left">
            <x-ui.button.icon wire:loading icon="heroicon-m-arrow-path" class="animate-spin"  />
        </x-slot>

        <span wire:loading.remove>Create Account</span>
        <span wire:loading>Creating Account...</span>

        <x-slot name="right">
            <x-ui.button.icon wire:loading.remove icon="heroicon-m-arrow-right" />
        </x-slot>
    </x-ui.button.primary>
</form>
