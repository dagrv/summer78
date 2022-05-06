<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            Orders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-xl space-y-3 border border-gray-300 shadow-xl">
                @forelse ($orders as $order)
                    <div class="bg-white p-6 col-span-4 space-y-4">
                        <div class="border-b pb-3 flex items-center justify-between">
                            <div>Order: n°{{ $order->id }}</div>
                            <div>Price: {{ $order->formattedSubtotal() }}</div>
                            <div>Shipping Type: {{ $order->shippingType->title }}</div>
                            <div>Date: {{ $order->created_at->toDateTimeString() }}</div>

                            <div>
                                <span class="inline-flex items-center px-3 py-1 text-sm rounded-lg font-semibold bg-green-100 border border-green-600 text-green-800">
                                    @if ($order->status() === 'placed_at')
                                        Status : Order Placed
                                    @endif

                                    @if ($order->status() === 'shipped_at')
                                         Status : Order Shipped {{-- ({{ $order->shipped_at->toDateTimeString() }}) --}}
                                    @endif

                                    @if ($order->status() === 'packaged_at')
                                        Status : Order Packaged
                                    @endif
                                </span>
                            </div>
                        </div>

                        @foreach ($order->variations as $variation)
                            <div class="border-b py-3 space-y-2 flex items-center last:border-0 last:pb-0">
                                <div class="w-16 mr-4">
                                    <img src="{{ $variation->getFirstMediaUrl('default', 'thumb200x200') }}" class="w-16 shadow-xl rounded-md border border-gray-200">
                                </div>

                                <div class="space-y-1">
                                    <div>
                                        <div class="font-semibold">{{ $variation->formattedPrice() }}</div>
                                        <div>{{ $variation->product->title }}</div>
                                    </div>

                                    <div class="flex items-center text-sm">
                                        <div class="mr-1 font-semibold">
                                            Quantity: {{ $variation->pivot->quantity }}<span class="text-green-600 mx-1">/</span>
                                        </div>

                                        @foreach ($variation->ancestorsAndSelf as $ancestor)
                                            {{ $ancestor->title }}
                                            @if (!$loop->last)
                                                <span class="text-orange-600 mx-1">/</span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @empty
                    No Orders found
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>