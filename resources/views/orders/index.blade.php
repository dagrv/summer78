<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            Orders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg space-y-3">
                @forelse ($orders as $order)
                    <div class="bg-white p-6 col-span-4 space-y-3">
                        <div class="border-b pb-3 flex items-center justify-between">
                            <div>Order : n°{{ $order->id }}</div>
                            <div>Price : {{ $order->formattedSubtotal() }}</div>
                            <div>Shipping Type : {{ $order->shippingType->title }}</div>
                            <div>Date : {{ $order->created_at->toDateTimeString() }}</div>

                            <div>
                                <span class="inline-flex items-center px-3 py-1 text-sm rounded-lg font-semibold bg-green-200 text-black">
                                    Order Status
                                </span>
                            </div>
                        </div>

                        <div class="border-b py-3 space-y-2 flex items-center last:border-0 last:pb-0">
                            <div class="w-16 mr-4">
                                <img src="" class="w-16">
                            </div>

                            <div class="space-y-1">
                                <div>
                                    <div>Variation Formatted Price</div>
                                    <div>Variation Product Title</div>
                                </div>

                                <div class="flex items-center text-sm">
                                    <div class="mr-1 font-semibold">
                                        Quantity : <span class="text-gray-800 mx-1">/</span>
                                    </div>
                                    Ancestor detail <span class="text-gray-800 mx-1">/</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    No Orders found
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>