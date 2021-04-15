<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GtbPaymentForm extends Component
{

    public $gtpay_mert_id        = 14264; 
    public $gtpay_tranx_id;
    public $gtpay_tranx_amt      = 10 * 100;
    public $gtpay_tranx_curr     = 566;
    public $gtpay_cust_id        = 458742;
    public $gtpay_tranx_noti_url = 'https://paystacktest.test/api/gtb-status';
    public $gtpay_cust_name      = 'John Doe';
    public $gtpay_tranx_memo     = 'Mobow';
    public $gtpay_echo_data      = 'DEQFOOIPP0;REG13762;John Adebisi: 2nd term school and accomodation fees;XNFYGHT325541;1209';
    public $gtpay_no_show_gtbank = 'yes';
    public $gtpay_gway_name      = 'etranzact';
    public $hashkey = '3EBF9CF6D082C89F88490B01D072B0F4E1EE52E86EC731D9B49538F33B551D486AB70673FE1B876B94EF76EC5E0AA1D3D14BA933424037FB1219662AFAB8FF51';

    
//     <input type="hidden" name="gtpay_mert_id" value="17" />
// <input type="hidden" name="gtpay_tranx_id" value="" />
// <input type="hidden" name="gtpay_tranx_amt" value="5000" />
// <input type="hidden" name="gtpay_tranx_curr" value="566" />
// <input type="hidden" name="gtpay_cust_id" value="458742" />
// <input type="hidden" name="gtpay_cust_name" value="Test Customer" />
// <input type="hidden" name="gtpay_tranx_memo" value="Mobow" />
// <input type="hidden" name="gtpay_no_show_gtbank" value="yes" />
// <input type="hidden" name="gtpay_echo_data" value="TEST" />
// <input type="hidden" name="gtpay_gway_name" value="" />
// <input type="hidden" name="gtpay_hash" value="" />
// <input type="hidden" name="gtpay_tranx_noti_url" value="" />
// <input type="submit" value="Pay Via GTPay" name="btnSubmit"/>
// <input type="hidden" name="gtpay_echo_data" value="DEQFOOIPP0;REG13762;John Adebisi: 2nd term school and accomodation fees;XNFYGHT325541;1209">




    // public $gtpay_hash = gtpay_mert_id,gtpay_tranx_id,gtpay_tranx_amt,gtpay_tranx_curr,gtpay_cust_id,gtpay_tranx_noti_url '14264' . '1234567890' . 10 * 100 . '566' . 'adsa' . 'https://eftechnology.net' . '3EBF9CF6D082C89F88490B01D072B0F4E1EE52E86EC731D9B49538F33B551D486AB70673FE1B876B94EF76EC5E0AA1D3D14BA933424037FB1219662AFAB8FF51';

    

    public $hashed;

    public function gen_transaction_id()
    {
        return mt_rand(1000000000, 9999999999);
    }

    public function mount()
    {
        $gtpay_hash = $this->gtpay_mert_id.$this->gtpay_tranx_id.$this->gtpay_tranx_amt.$this->gtpay_tranx_curr.$this->gtpay_cust_id.$this->gtpay_tranx_noti_url.$this->hashkey;
        $this->gtpay_tranx_id       = $this->gen_transaction_id();

        $this->hashed = hash('sha512', $gtpay_hash);
    }

    public function render()
    {
        return view('livewire.gtb-payment-form');
    }
}
