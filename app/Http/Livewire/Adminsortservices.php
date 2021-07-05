<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service;

class Adminsortservices extends Component
{
	public $start_date = null;
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
        $this->mySortedServices = Service::orderBy('created_at','desc')->get();
    }

// public function updatedStartDate()
//     {
//         if ($this->start_date) {
//             $services = Service::select("*")
//                     ->when($this->start_date, function ($query) {
//                             return $query->orderBy($this->start_date, 'desc');
//                         })
//                         ->get();

//         dd($services);
//         }
//     }



public function submit()
    {
        if ($this->start_date == null) {
            $this->message = 'Please select a start dateddddddd!';
            return;
        }

        if ($this->end_date) {
            $services = Service::whereBetween('created_at', [$this->start_date, $this->end_date])->get();
            $this->mySortedServices = $services;

            $this->message = '';
        }
        else {
            $this->message = 'Please select a start date!';
            return;
        }
    }


    // public function updatedEndDate()
    // {
    // 	if ($this->start_date == null) {
    //         $this->message = 'Please select a start dateddddddd!';
    //         return;
    //     }

    //     if ($this->end_date) {
    //         $services = Service::whereBetween('created_at', [$this->start_date, $this->end_date])->get();
    //         $this->mySortedServices = $services;

    //         $this->message = '';
    //     }
    //     else {
    //         $this->message = 'Please select a start date!';
    //         return;
    //     }
    // }

    public function render()
    {
        return view('livewire.adminsortservices');
    }
}
