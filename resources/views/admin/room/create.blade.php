<!DOCTYPE html>
<html>

@include('admin.css')
<body>
  {{-- header start --}}
  @include('admin.header')
    {{-- header end  --}}
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
          <div class="page-header">
              <div class="container-fluid">
                    <div class="title"><strong class="d-block">Add Room</strong></div>
                    <div class="col-9">
                    @if ($errors->any())
                        <div class="card-footer text-body-secondary">
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{$error}} </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                    @endif



                      
                      <form class="form-horizontal" method="POST" action="{{route('room.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Room title</label>
                          <div class="col-sm-9">
                            <input id="inputHorizontalSuccess" name="room_title" type="text" placeholder="Room title" class="form-control form-control-success"> 
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Description</label>
                          <div class="col-sm-9">
                            <textarea name="description" placeholder="Room description" id="inputHorizontalSuccess" class="form-control form-control-success" cols="32" rows="4"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Price</label>
                          <div class="col-sm-9">
                            <input id="inputHorizontalSuccess" name="price" type="number" placeholder="Price" class="form-control form-control-success"> 
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Upload Image</label>
                          <div class="col-sm-9">
                            <input type="file" name="photo" accept="image/*" class="form-control form-control-success"> 
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Room type</label>
                          <div class="col-sm-9">
                            <select name="room_type" class="form-control form-control-success" id="">
                              <option value="regular">Regular</option>
                              <option value="premium">premium</option>
                              <option value="delux">Delux</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Wifi</label>
                          <div class="col-sm-9">
                            <select name="wifi" class="form-control form-control-success" id="">
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group row">       
                          <div class="col-sm-9 offset-sm-3">
                            <input type="submit" value="Create Room" class="btn btn-primary">
                          </div>
                        </div>
                      </form>
                    </div>



              </div>
            </div>
          </div>
          
    @include('admin.footer')        
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>
</body>

</html>
