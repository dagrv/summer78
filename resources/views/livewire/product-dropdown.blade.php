<div class="mt-6">
    <div class="font-semibold mb-1">
        {{ Str::title($variations->first()?->type) }}
    </div>

    <x-select class="w-full" wire:model="selectedVariation">
        <option value="">Choose an Option</option>

        @foreach ($variations as $variation)
            <option value="{{ $variation->id }}" {{ $variation->noStock() ? 'disabled' : '' }}>
                {{ $variation->title }} {{ $variation->lowStock() ? '(Low Stock)' : '' }} {{ $variation->noStock() ? '(Sold Out)' : '' }}
            </option>    
        @endforeach
    </x-select>

    @if ($this->selectedVariationModel?->children->count())
        <livewire:product-dropdown :variations="$this->selectedVariationModel->children->sortBy('amount')" :key="$selectedVariation" />
    @endif
</div>
