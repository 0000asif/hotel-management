<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .title {
            font-size: 25px;
        }

        .container-fluid {
            padding: 0;
        }

        .page-content {
            padding: 0;
        }

        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }

        td {
            padding: 10px;
        }

        tr {
            border: 3px solid white;
        }

        .tr_deg {
            background-color: skyblue;
            padding: 8px
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


                    <div class="title">All Booking Room</div>
                    <div class="col-8">
                        @if (session('success'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <table class="table_deg">
                        <thead>
                            <tr>
                                <th class="tr_deg">Room Id</th>
                                <th class="tr_deg">Customar Name</th>
                                <th class="tr_deg">Email</th>
                                <th class="tr_deg">Phone</th>
                                <th class="tr_deg">Arrival Date</th>
                                <th class="tr_deg">Leave Date</th>
                                <th class="tr_deg">Status</th>
                                <th class="tr_deg">Room title</th>
                                <th class="tr_deg">Price</th>
                                <th class="tr_deg">Image</th>
                                <th class="tr_deg">Delete</th>
                                <th class="tr_deg">Status Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $room)
                                <tr>
                                    <td> {{ $room->room->id }} </td>
                                    <td> {{ $room->name }} </td>
                                    {{-- <td><img src="{{ asset('/storage/'.$room->image) }}" alt="{{ __('image') }}" width="80px" alt="file not found"></td> --}}
                                    {{-- <td>{{$room-> description}}</td> --}}
                                    <td> {{ $room->email }} </td>
                                    <td> {{ $room->phone }} </td>
                                    <td> {{ $room->start_date }} </td>
                                    <td> {{ $room->end_date }} </td>
                                    <td> 
                                      
                                      @if ($room->status=='approve')
                                          <span style="color: skyblue">Approved</span>
                                      @endif 
                                      
                                      @if ($room->status=='waiting')
                                          <span style="color: yellow">Waiting</span>
                                      @endif

                                      @if ($room->status=='reject')
                                          <span style="color: red">Rejected</span>
                                      @endif
                                    </td>
                                    <td> {{ $room->room->room_title }} </td>
                                    <td> {{ $room->room->price }}$ </td>
                                    <td><img src="{{ asset('/storage/' . $room->room->image) }}"
                                            alt="{{ __('image') }}" width="200!important" alt="file not found"></td>
                                    <td> <a onclick="return confirm('Are you want to sure Delete this record')"
                                            href="{{ route('delete_booking', $room->id) }}"
                                            class="btn btn-sm btn-primary">Delete</a> </td>
                                    <td>
                                      <a href="{{route('approve',$room->id)}}" class="btn btn-sm mb-2 btn-success">Approve</a>
                                      <a href="{{route('reject',$room->id)}}" class="btn btn-sm btn-warning">Reject</a>
                                    </td>
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
