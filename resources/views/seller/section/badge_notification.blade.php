
{{$count_badge}}
@if($count_badge)

 <div class="pad margin no-print">
            <div class="callout callout-info bg-warning text-warning" style="margin-bottom: 0!important;background-color: #fec30bbb; color: black;">
              <h4><i class="fa fa-info text-danger"></i> Note:</h4>
              Hello! {{Auth::User()->name}} <br /> 
              <p style=" color: black;"><strong>{{$count_badge}}</strong> of your accounts have a status of <strong> ORDINARY </strong>.
              </p> 
              <a href="{{route('seller.service.badges')}}"> Upgrade Now</a>
            </div>
          </div>
          @endif
          @if($count_badge == 0)
           <div class="pad margin no-print">
            <div class="callout callout-info bg-warning text-warning" style="margin-bottom: 0!important;background-color: #fec30bbb;">
              <h4><i class="fa fa-info text-danger"></i> Note:</h4>
              Hello! {{Auth::User()->name}} <br /> 
              <p style=" color: black;"><strong> You have not created a service yet!.</strong></p> 
              <a href="{{ route('seller.service.create') }}"> Click here to create a new service</a>
            </div>
          </div>
          @endif