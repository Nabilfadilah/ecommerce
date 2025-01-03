<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{
    public $currentUrl;

    public function render()
    {
        $current_url = url()->current();
        $explode_url = explode('/', $current_url);

        $this->currentUrl = $explode_url[3] . ' ' . $explode_url[4];

        return view('livewire.admin-dashboard')
            ->layout('admin-layout'); // Pastikan path layout sesuai
    }
}


// cek ieu jirr
        // return view('livewire.admin-dashboard');

        // return view('livewire.admin-dashboard');

        // kuduna kieu
        // return view('livewire.admin-dashboard')->layout('admin-layout');

        // make volt
        // return layout('admin-layout')->slot('main', function () {
        //     return view('livewire.admin-dashboard');
        // });

        // return view('livewire.admin-dashboard')->extends('livewire.admin-layout');
