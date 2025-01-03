<?php

namespace App\Livewire;

use Livewire\Component;

class ManageOrders extends Component
{
    public $currentUrl;

    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);

        $this->currentUrl = $explode_url[3] . ' ' . $explode_url[4];

        return view('livewire.manage-orders')->layout('admin-layout');
    }
}
