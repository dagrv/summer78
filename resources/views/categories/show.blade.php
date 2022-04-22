<x-app-layout>
    <x-slot name="header">
        @foreach ($category->ancestors->reverse() as $ancestor)
            <a href="/categories/{{ $ancestor->slug }}" class="text-black font-semibold">
                {{ $ancestor->title }}
            </a>

            <span class="text-xs text-orange-500 last:hidden">&#10095;</span>
        @endforeach

        <h2 class="mt-1 font-semibold text-xl text-black">
            {{ $category->title }}
        </h2>
    </x-slot>

    <livewire:product-browser :category="$category" />
</x-app-layout>

