<x-auth-layout title="Email Sent">
    <x-slot name="description">
        Trouble finding the email? Please check your spam folder and <a wire:navigate class="text-blue-500 hover:underline" href="{{ route('login:show') }}">try again</a> if not found.
    </x-slot>
</x-auth-layout>
