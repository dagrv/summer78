<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight justify-center items-center">
            Thank you for your order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-xl">
                    Your order #{{ $order->id }} has been placed
                    <a href="/register" class="text-orange-700">Create an account</a> to manage & track your order(s).
                </div>
            </div>
        </div>
    </div>
</x-app-layout>