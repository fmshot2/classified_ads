<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service;

class Adminsortservices extends Component
{
	public $start_date;

	public $end_date;

	public $all_service;

	public $all_services;

	 protected $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
    ];

	public function submit() {
		$this->validate();
		// dd($this->start_date);
		$from = $this->start_date;
		$to = $this->end_date;
   $services = Service::whereBetween('created_at', [$from, $to])
          ->get();
          $this->all_service = $services;
          // dd($this->all_service);
	}
	
    public function render()
    {
    	$services = Service::where('name', "featured test2")
          ->get();
    	$this->all_services = $this->all_service;
    	if ($this->end_date) {

    	dd($this->start_date, 
    		$this->end_date);
    	 	$services = Service::whereBetween('created_at', [$this->start_date, $this->end_date])
          ->get();
            $this->all_services = $services;
    	 } 
        return view('livewire.adminsortservices', ['all_services' => $services, 'all_service' => $this->all_service]);
    }
}
