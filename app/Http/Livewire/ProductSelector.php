<?php

namespace App\Http\Livewire;

use App\Cart\Contracts\CartInterface;
use App\Models\Variation;
use Livewire\Component;

class ProductSelector extends Component
{
    public $product;
    public $initialVariation;
    public $skuVariant;
    public $listeners = [
        'skuVariantSelected'
    ];

    public function mount()
    {
        $this->initialVariation = $this->product->variations->sortBy('order')->groupBy('type')->first();
    }

    public function skuVariantSelected($variantId)
    {
        if (!$variantId) {
            $this->skuVariant = null;
            return;
        }

        $this->skuVariant = Variation::find($variantId);
    }

    public function addToCart(CartInterface $cart)
    {
        $cart->add($this->skuVariant, 1);

        //Emit global event to update the cart instantly.
        $this->emit('cart.updated');

        $this->dispatchBrowserEvent('notification', [
            'body' => $this->skuVariant->product->title . 'added to your cart ✅', // TODO: Add product name too.
            'timeout' => 4500,
        ]);
    }

    public function render()
    {
        return view('livewire.product-selector');
    }
}
