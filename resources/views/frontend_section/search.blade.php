<!--<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
-->
  <div class="row justify-content-center bg-dark">


<form class="form-inline" action="{{route('search2')}}" method="POST" role="search">
    {{ csrf_field() }}
<div class="form-group mr-4"> 
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Service">
      </div>
    <div class="form-group mr-4">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Location">
      </div>
   

    <div class="form-group">
      <button type="submit" class="btn btn-warning mb-2 font-weight-bold btn-block bg-warning text-white"> Search  <i class="fa fa-search ml-2" aria-hidden="true"></i>  </button>
    </div>
    </div>




 <!--   <div class="col-sm">
      <div class="form-group">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Location ">
      </div>
    </div>




    <div class="col-sm">
      <div class="form-group">
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
    </div>
  -->





    





  </div>

</form>




<form action="{{route('search2')}}" method="GET">
    <input type="text" name="name" required/>
    <input type="text" name="state" required/>

    <button type="submit">Submit</button>
</form>




<div class="search-section search-area-2 bg-grea">
    <div class="container">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                    <form method="GET">
                       
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="max-area" tabindex="-98">
                                        <option>Bedrooms</option>
                                        <option>2400</option>
                                        <option>2800</option>
                                        <option>3200</option>
                                        <option>3600</option>
                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Bedrooms"><div class="filter-option"><div class="filter-option-inner">Bedrooms</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <div class="dropdown bootstrap-select search-fields"><select class="selectpicker search-fields" name="min-area" tabindex="-98">
                                        <option>Bathrooms</option>
                                        <option>2400</option>
                                        <option>2800</option>
                                        <option>3200</option>
                                        <option>3600</option>
                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Bathrooms"><div class="filter-option"><div class="filter-option-inner">Bathrooms</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="range-slider">
                                    <div  data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><span class="min-value">10642 USD</span> <span class="max-value">150000 USD</span><input class="current-min" type="hidden" name="min_price" value="10642"><input class="current-max" type="hidden" name="max_price" value="150000"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 7.09467%; width: 92.9053%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 7.09467%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"></a></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <button class="btn btn-block bg-warning font-weight-bold text-white btn-warning">Search <i class="fa fa-search ml-2" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>