<div class="mx-auto sm:px-6 lg:px-8 max-w-7xl py-12 grid grid-cols-6 gap-4">
    <div class="col-span-1">
        <div class="space-y-6">
            <div class="space-y-1">
                <ul>
                    @foreach ($category->children as $child)
                        <li>
                            <a href="/categories/{{ $child->slug }}" class="text-orange-600">
                                {{ $child->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="space-y-6">
                <div class="space-y-1">
                    <div class="font-semibold mt-2">Max Price ({{ money($priceRange['max']) }})</div>
                    <div class="flex items-center space-x-2">
                        <input class="rounded-md" type="range" min="0" max="{{ $maxPrice }}" wire:model="priceRange.max">
                    </div>
                </div>

                @if ($products->count())
                    @foreach ($filters as $title => $filter)
                        <div class="space-y-1">
                            <div class="font-semibold">{{ Str::title($title) }}</div>
                            @foreach ($filter as $option => $count)
                                <div class="flex items-center space-x-2">
                                    <input class="rounded form-checkbox text-orange-600" checked wire:model="queryFilters.{{ $title }}" type="checkbox" id="{{ $title }}_{{ strtolower($option) }}" value="{{ $option }}">
                                    <label for="{{$title}}_{{strtolower($option)}}">{{ $option }} ({{$count}})</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="col-span-5 sm:px-6 lg:px-8">
        <div class="mb-6">
            Found {{ $products->count() }} {{ Str::plural('product', $products->count()) }} matching with this filter
        </div>

        <div class="overflow-hidden sm:rounded-lg grid lg:grid-cols-3 md:grid-cols-2 gap-4">
            @foreach ($products as $product)
                <a href="/products/{{$product->slug}}" class="p-6 bg-white border border-gray-200 space-y-4 rounded-lg shadow-lg">
                    <img src="{{ $product->getFirstMediaUrl() }}" class="rounded-lg drop-shadow-xl w-full">

                    <div class="space-y-1">
                        <div class="font-normal">{{$product->title}}</div>
                        <div class="font-semibold text-lg text-orange-600">
                            {{ $product->formattedPrice() }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>