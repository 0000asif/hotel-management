<!DOCTYPE html>
<html lang="en">
@include('home.css')
<style>
    .form-control-label {
        font-size: 18px;
    }
</style>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    {{-- <div class="loader_bg">
         <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#"/></div>
      </div> --}}
    <!-- end loader -->
    <!-- header -->
    @include('home.header')
    <!-- end header -->




    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding: 20px" class="room_img">
                            <img style="height:380px; width:800px; " src="{{ asset('storage/' . $room->image) }}"
                                alt="room" />
                        </div>
                        <div class="bed_room">
                            <h3 style="padding: 12px">{{ $room->room_title }}</h3>
                            <p style="padding: 12px">{{ $room->description }}</p>
                            <h4 style="padding: 12px">Room Type : {{ $room->room_type }}</h4>
                            <h4 style="padding: 12px">Free wifi : {{ $room->wifi }}</h4>
                            <h2 style="padding: 12px; font-size: xx-large;">Price : {{ $room->price }}</h2>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <h1 style="font-size: 40px">Book Room</h1>

                    @if (session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="card-footer text-body-secondary">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form id="request" method="POST" action="{{ route('room_booking', $room->id) }}"
                        class="main_form">
                        <div class="row">
                            @csrf

                            <div class="col-md-12 ">
                                <label class="form-control-label">Name</label>
                                <input class="contactus" placeholder="Name" type="text"
                                    @if (Auth::id()) value="{{ Auth::user()->name }}" @endif
                                    name="name">
                            </div>
                            <div class="col-md-12">
                                <label class="form-control-label">Email</label>
                                <input class="contactus" placeholder="Email" type="email"
                                    @if (Auth::id()) value="{{ Auth::user()->email }}" @endif
                                    name="email">
                            </div>
                            <div class="col-md-12">
                                <label class="form-control-label">Phone Number</label>
                                <input class="contactus" placeholder="Phone Number" type="number"
                                    @if (Auth::id()) value="{{ Auth::user()->phone }}" @endif
                                    name="phone">
                            </div>
                            <div class="col-md-12">
                                <label class="form-control-label">Start Date</label>
                                <input class="contactus" placeholder="Phone Number" id="startDate" type="date"
                                    name="startDate">
                            </div>
                            <div class="col-md-12">
                                <label class="form-control-label">End Date</label>
                                <input class="contactus" placeholder="Phone Number" id="endDate" type="date"
                                    name="endDate">
                            </div>
                            <div class="col-md-12">
                                <button class="send_btn">Book Room</button>
                            </div>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>







    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

        });
    </script>
</body>

</html>
