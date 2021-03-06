<form wire:submit.prevent="checkout">
    <div class="overflow-hidden sm:rounded-lg grid grid-cols-6 grid-flow-col gap-4">
        <div class="p-6 rounded-lg shadow-lg bg-white border-b border-gray-200 col-span-3 self-start space-y-6">
                @guest
                    <div class="space-y-3">
                        <div class="font-semibold text-lg">Account Details</div>
                        <div>
                            <label for="email">Email</label>
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" wire:model.defer="accountForm.email" />
                            @error('accountForm.email')
                                <div class="mt-2 font-semibold text-red-700">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                @endguest

            {{-- Shipping --}}
            <div class="space-y-3">
                <div class="font-semibold text-lg">Shipping</div>

                @if ($this->userShippingAddresses)
                    <x-select class="w-full" wire:model="userShippingAddressId">
                        <option value="">Choose a pre-saved address or create</option>
                        @foreach ($this->userShippingAddresses as $address)
                            <option value="{{ $address->id }}">{{ $address->formattedAddress() }}</option>
                        @endforeach
                    </x-select>
                @endif

                <div class="space-y-3">
                    <div>
                        <label for="address">Address</label>
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" wire:model.defer="shippingForm.address" />
                        @error('shippingForm.address')
                            <div class="mt-2 font-semibold text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <label for="city">City</label>
                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" wire:model.defer="shippingForm.city" />
                            @error('shippingForm.city')
                                <div class="mt-2 font-semibold text-red-700">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    <div class="col-span-1">
                            <label for="postcode">Postal Code</label>
                            <x-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" wire:model.defer="shippingForm.postcode" />
                            @error('shippingForm.postcode')
                                <div class="mt-2 font-semibold text-red-700">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <div class="font-semibold text-lg">Delivery</div>
                <div class="space-y-1">
                    <x-select class="w-full" wire:model="shippingTypeId">
                        @foreach ($shippingTypes as $shippingType)
                            <option value="{{ $shippingType->id }}">{{ $shippingType->title }} ({{ $shippingType->formattedPrice() }})</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="space-y-3">
                <div class="font-semibold text-lg">Payment</div>
                <div>
                    Stripe
                </div>
            </div>
        </div>

        <div class="p-6 rounded-lg shadow-lg bg-white border-b border-gray-200 col-span-3 self-start space-y-4">
            <div>
                @foreach ($cart->contents() as $variation)
                    <div class="border-b py-3 flex items-start">
                        <div class="w-16 mr-4">
                            <img src="{{ $variation->getFirstMediaUrl('default') }}" class="w-16 rounded-md shadow-lg">
                        </div>

                        <div class="space-y-2">
                            <div>
                                <div class="font-semibold">{{ $variation->product->title }}</div>
                                <div class="space-y-1 text-md">
                                    <div>{{ $variation->formattedPrice() }}</div>

                                    <div class="flex items-center text-md">
                                        <div class="mr-1 font-semibold text-md">
                                            Quantity: {{ $variation->pivot->quantity }} <span class="text-orange-400 mx-1">/</span>
                                        </div>
                                        @foreach ($variation->ancestorsAndSelf as $ancestor)
                                            {{ $ancestor->title }} @if (!$loop->last)<span class="text-orange-400 mx-1">/</span>@endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="space-y-4">
                <div class="space-y-1">
                    <div class="space-y-1 flex items-center justify-between">
                        <div class="font-semibold">Subtotal</div>
                        <h1 class="font-semibold">{{ $cart->formattedSubtotal() }}<h1>
                    </div>

                    <div class="space-y-1 flex items-center justify-between">
                        <div class="font-semibold">Shipping ({{ $this->shippingType->title }})</div>
                        <h1 class="font-semibold">{{ $this->shippingType->formattedPrice() }}</h1>
                    </div>

                    <div class="space-y-1 flex items-center justify-between">
                        <div class="font-semibold">Total</div>
                        <h1 class="font-semibold">{{ money($this->total) }}</h1>
                    </div>
                </div>

                <x-button type="submit" class="w-full justify-center mt-4 mb-4">Confirm & Pay</x-button>
            </div>
        </div>
    </div>
</form>