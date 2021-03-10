<style type="text/css">
  .dropzone .dz-message .dz-button {
    display: none !important;
}
    .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}


  </style>
<div class="box" >
  <div class="box-header">
                    <h2 class="box-title" style="font-weight: 700">Images of {{ $city->name }}</h2>
                    <p></p>
                    
                </div>
  <!-- /.box-header -->
  <div class="box-body">
<div class="form-group">  
   {{-- {!! Form::open(['route' => [ 'add_city_images', $city->slug ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload', 'method' => 'put', 'before' => 'csrf' ]) !!}
            <div>
                <p class="text-danger text-center" style="font-weight: 2700">Drag and drop images here!</p>
            </div>
            {!! Form::close() !!} --}}
            {{-- @foreach(json_decode($gallery->gallery_image, true) as $image) --}}
            @if($city->images != '')
              @foreach(json_decode($city->images, true) as $image)
                  <div style="display: inline-flex; flex-wrap: wrap">
                      <div>
                          <img src="{{ asset('cities_images/'.$image) }}" alt="" style="display: block;width:100px;">
                          {{-- <a href="" style="display:block">Delete</a> --}}
                      </div>
                  </div>
              
              @endforeach
              @else
              <p class="text text-danger">No images yet for {{ $city->name }}</p>

            @endif
            <br>
            <p></p>
            <form action="{{ route('add_city_images', $city->slug) }}" method="POST" class="" id="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                              <div class="col-sm-4 imgUp">
                                <div class="imagePreview"></div>
                                  <label class="btn btn-primary">
                                          Upload
                                      <input type="file" class="uploadFile img" name="images[]" style="width: 0px;height: 0px;overflow: hidden;" multiple>
                                  </label>
                              </div><!-- col-2 -->
                              {{-- <i class="fa fa-plus imgAdd"></i> --}}
                           </div><!-- row -->
                           <button type="submit" id="submit" class="btn btn-success" style="height: 40px;"> Click to upload</button>
            </form>
            <br>
            <center>
                
            </center>
</div>


</div>
<!-- /.box-body -->
</div>


<!-- /.content -->
</div>
