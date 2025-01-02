<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
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
