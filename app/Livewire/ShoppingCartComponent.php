<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCartComponent extends Component
{
    public $cartItems = [];
    public $subtotal;
    public $vat;
    public $discount;
    public $total;

    public $pageTitle = '';

    protected $listeners = [
        'cartUpdated' => 'render',
    ];

    public function mount()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();
    }

    // kalkulasi dari total product
    public function calculateTotals()
    {
        $cartItems = collect($this->cartItems); // Ubah array menjadi collection.

        $this->subtotal = $cartItems->sum(function ($item) {
            return $item['quantity'] * $item['product']['price'];
        });

        // $this->subtotal = $this->cartItems->sum(function ($item) {
        //     return $item->quantity * $item->product->price;
        // });

        $this->vat = $this->subtotal * 0.1; // Contoh PPN 10%.
        $this->discount = 5000; // menerapkan logika diskon 5k
        $this->total = $this->subtotal + $this->vat - $this->discount;
    }

    // get details dari shopping cart product
    public function getCartItems()
    {
        return ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    // add item to cart
    public function addToCart($productId)
    {
        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1; // menambah quantitas
            $cartItem->save();
        } else {
            ShoppingCart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
        // dispatch
        $this->dispatch('cartUpdated');
    }

    // update cart function
    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            $this->dispatch('cartUpdated');
        }
    }

    // remove items dari cart
    public function removeItem($cartItemId)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            $this->dispatch('cartUpdated');
        }
    }

    public function render()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();

        return view('livewire.shopping-cart-component', [
            'cartItems' => $this->cartItems
        ])->title('E-commerce | Shopping cart');
        // ->title('E-commerce | Shopping cart');
    }

    // public function render()
    // {
    //     return view('livewire.shopping-cart-component');
    // }
}
