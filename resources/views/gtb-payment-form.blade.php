<div class="col-md-5">
    <form name="submit2gtpay_form" action="https://ibank.gtbank.com/GTPay/Tranx.aspx" target="_self" method="post">

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_mert_id">gtpay_mert_id<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_mert_id" class="form-control" id="gtpay_mert_id" wire:model="gtpay_mert_id">
                @error('gtpay_mert_id') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_tranx_id">gtpay_tranx_id<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_tranx_id" wire:model="gtpay_tranx_id" class="form-control" id="gtpay_tranx_id">
                @error('gtpay_tranx_id') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_tranx_amt">gtpay_tranx_amt<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_tranx_amt" wire:model="gtpay_tranx_amt" class="form-control" id="gtpay_tranx_amt">
                @error('gtpay_tranx_amt') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_tranx_curr">gtpay_tranx_curr<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_tranx_curr" wire:model="gtpay_tranx_curr" class="form-control" id="gtpay_tranx_curr">
                @error('gtpay_tranx_curr') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_cust_id">gtpay_cust_id<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_cust_id" wire:model="gtpay_cust_id" class="form-control" id="gtpay_cust_id">
                @error('gtpay_cust_id') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_cust_name">gtpay_cust_name<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_cust_name" wire:model="gtpay_cust_name" class="form-control" id="gtpay_cust_name">
                @error('gtpay_cust_name') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_tranx_memo">gtpay_tranx_memo<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_tranx_memo" wire:model="gtpay_tranx_memo" class="form-control" id="gtpay_tranx_memo">
                @error('gtpay_tranx_memo') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_echo_data">gtpay_echo_data<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="" wire:model="gtpay_echo_data" class="form-control" id="gtpay_echo_data">
                @error('gtpay_echo_data') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_no_show_gtbank">gtpay_no_show_gtbank<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_no_show_gtbank" wire:model="gtpay_no_show_gtbank" class="form-control" id="gtpay_no_show_gtbank">
                @error('gtpay_no_show_gtbank') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_gway_name">gtpay_gway_name<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_gway_name" wire:model="gtpay_gway_name" class="form-control" id="gtpay_gway_name">
                @error('gtpay_gway_name') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_hash">gtpay_hash<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_hash" value="{{ $hashed }}" class="form-control" id="gtpay_hash">
                @error('gtpay_hash') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-3 text-left">
                <label for="gtpay_tranx_noti_url">gtpay_tranx_noti_url<small class="text-danger" title="This field is required">*</small></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="gtpay_tranx_noti_url" wire:model="gtpay_tranx_noti_url" class="form-control" id="gtpay_tranx_noti_url">
                @error('gtpay_tranx_noti_url') <p class="mb-0 text-left text-danger"><small>{{ $message }}</small></p> @enderror
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Pay</button>
        </div>
    </form>
</div>
<!-- <script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    window.addEventListener('make-payment', event => {
        console.log('Name updated to: ' + event.detail.newName);

        var handler = PaystackPop.setup({
            key: event.detail.public_key, // Replace with your public key
            email: event.detail.email,
            amount: event.detail.amount * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
            ref: event.detail.ref, // Replace with a reference you generated
            callback: function(response) {
                //this happens after the payment is completed successfully
                var reference = response.reference;

                Livewire.emit('save', response)

            },
            onClose: function() {
                alert('Transaction was not completed, window closed.');
            },
        });
        handler.openIframe();

    })
</script> -->