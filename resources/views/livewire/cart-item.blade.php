<div class="border-b py-3 flex items-start last:border-0 last:pb-0">
    <div class="w-20 mr-4">
        <img src="{{ $variation->getFirstMediaUrl('default', 'thumb200x200') }}" class="w-20 shadow-lg rounded-md">
    </div>

    <div class="space-y-2">
        <div>
            <div class="font-semibold text-lg">
                {{ $variation->product->title }}
            </div>

            <div class="space-y-2">
                <div>{{ $variation->formattedPrice() }}</div>

                <div class="flex items-center text-sm">

                    @foreach ($variation->ancestorsAndSelf as $ancestor)
                        {{ $ancestor->title }} @if (!$loop->last) / @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <div class="text-sm flex items-center space-x-2">
                <div class="font-semibold mt-4">Quantity</div>

                <select class="text-sm border-none rounded-md ml-2 mt-4" wire:model="quantity">
                    @for ($quantity = 1; $quantity <= $variation->stockCount(); $quantity++)
                        <option value="{{ $quantity }}" class="mt-4">{{ $quantity }}</option>
                    @endfor
                </select>
            </div>

            <button class="text-sm text-red-700 mt-4" wire:click="remove">
                Delete
            </button>
        </div>
    </div>
</div>