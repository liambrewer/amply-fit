<x-auth-layout title="Login" description="Please enter your email to receive a magic link.">
    <livewire:auth.login-form />

    <p class="text-sm text-gray-800">Don't have an account? <a wire:navigate class="text-blue-500 hover:underline" href="{{ route('register:show') }}">Register</a></p>
</x-auth-layout>
