<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductBrowser extends Component
{
    public $category;

    public $queryFilters = [];

    public function mount()
    {
        $this->queryFilters = $this->category->products->pluck('variations')
            ->flatten()
            ->groupBy('type')
            ->keys()
            ->mapWithKeys(fn ($key) => [$key => []])
            ->toArray();
    }

    public function render()
    {
        // Product Research
        $search = Product::search('', function($meilisearch, string $query, array $options) {
            $options['facetsDistribution'] = ['size', 'color']; // Temporary Solution

            return $meilisearch->search($query, $options);
        })->raw();
        $products = $this->category->products->find(collect($search['hits'])->pluck('id'));

        return view('livewire.product-browser', [
            'products' => $products,
            'filters' => $search['facetsDistribution']
        ]);
    }
}
