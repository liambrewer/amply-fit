<x-auth-layout title="Register" description="Create your account.">
    <livewire:auth.register-form />

    <p class="text-sm text-gray-800">Already have an account? <a wire:navigate class="text-blue-500 hover:underline" href="{{ route('login:show') }}">Log in</a></p>
</x-auth-layout>
