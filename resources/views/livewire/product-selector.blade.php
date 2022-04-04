<div>
    @if ($initialVariation)
        <livewire:product-dropdown :variations="$initialVariation" />
    @endif

    @if ($skuVariant)
        <div class="mt-8">
            <x-button wire:click.prevent="addToCart" class="font-semibold w-full justify-center text-lg">
                Add to Cart - {{ $skuVariant->formattedPrice() }}
            </x-button>
        </div>
    @endif
</div>
