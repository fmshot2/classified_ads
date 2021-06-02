<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service;

class Adminsortservices extends Component
{
	public $start_date;
	public $end_date;
	public $all_service;
	public $message;
    public $mySortedServices = [];

	protected $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
    ];

    public function mount()
    {
        $this->mySortedServices = Service::all();
    }

    public function updatedEndDate()
    {
        if ($this->start_date) {
            $services = Service::whereBetween('created_at', [$this->start_date, $this->end_date])->get();
            $this->mySortedServices = $services;

            $this->message = '';
        }
        else {
            $this->message = 'Please a start date!';
            return;
        }
    }

    public function render()
    {
        return view('livewire.adminsortservices');
    }
}
