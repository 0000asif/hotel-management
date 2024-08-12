<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
  <style>
    .title{
      font-size: 25px;  
    }
    .table_deg{
      border: 2px solid white;
      margin: auto;
      width: 100%;
      text-align: center;
      margin-top: 40px;
    }
    td{
      padding: 10px;
    }
    tr{
      border: 3px solid white;
    }
    .tr_deg{
      background-color: skyblue;
      padding: 15px
    }
  </style>
</head>
  
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
                    
                      
                          <div class="title">All Room</div>
                            <table class="table_deg">
                              <thead>
                                <tr>
                                  <th class="tr_deg">Id</th>
                                  <th class="tr_deg">Room Title</th>
                                  <th class="tr_deg">Image</th>
                                  <th class="tr_deg">Description</th> 
                                  <th class="tr_deg">price</th>
                                  <th class="tr_deg">Room type</th>
                                  <th class="tr_deg">Wifi</th>
                                  <th class="tr_deg">view</th>
                                  <th class="tr_deg">Edit</th>
                                  <th class="tr_deg">delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($rooms as $room)
                                  <tr>
                                    <td> {{$room->id}} </td>
                                    <td> {{$room->room_title}} </td>
                                    <td><img src="{{ asset('/storage/'.$room->image) }}" alt="{{ __('image') }}" width="80px" alt="file not found"></td>
                                    <td> {!! Str::limit($room->description,150) !!} </td>
                                    {{-- <td>{{$room-> description}}</td> --}}
                                    <td> {{$room->price}}$ </td>
                                    <td> {{$room->room_type}} </td>
                                    <td> {{$room->wifi}} </td>
                                    <td> <a href="{{route('single_room',$room->id)}}" class="btn btn-success">View</a> </td>
                                    <td> <a href="{{route('edit_room',$room->id)}}" class="btn btn-info">Edit</a> </td>
                                    <td> <a href="{{route('delete_room',$room->id)}}" class="btn btn-primary">Delete</a> </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                          
                      
                      




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
