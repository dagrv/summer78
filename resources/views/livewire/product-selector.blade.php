<div>
    @if ($initialVariation)
        <livewire:product-dropdown :variations="$initialVariation" />
    @endif

    @if ($skuVariant)
        <div class="mt-4">
            <x-button wire:click.prevent="addToCart" class="font-semibold w-full justify-center text-md">
                Add to Cart - {{ $skuVariant->formattedPrice() }}
            </x-button>
        </div>
    @endif
</div>
