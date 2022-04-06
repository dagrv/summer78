<div class="space-y-4">
    <img src="{{ $selectedImageUrl }}" class="rounded-lg shadow-lg border">

    <div class="grid grid-cols-6 gap-2">
        
        @foreach ($product->getMedia() as $media)
            <button wire:click="selectImage('{{ $media->getUrl() }}')">
                <img src="{{ $media->getUrl('thumb200x200') }}" class="shadow-lg">
            </button>
        @endforeach
    </div>
</div>
