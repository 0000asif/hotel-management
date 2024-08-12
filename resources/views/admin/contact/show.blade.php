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
            width: 80%;
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


                    <div class="title">All Contact Message</div>
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
                                <th class="tr_deg">Id</th>
                                <th class="tr_deg">Name</th>
                                <th class="tr_deg">Email</th>
                                <th class="tr_deg">Phone</th>
                                <th class="tr_deg">Message</th>
                                <th class="tr_deg">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td> {{ $contact->id }} </td>
                                    <td> {{ $contact->name }} </td>
                                    {{-- <td><img src="{{ asset('/storage/'.$room->image) }}" alt="{{ __('image') }}" width="80px" alt="file not found"></td> --}}
                                    {{-- <td>{{$room-> description}}</td> --}}
                                    <td> {{ $contact->email }} </td>
                                    <td> {{ $contact->phone }} </td>
                                    <td> {{ $contact->message }} </td>
                                    <td> <a href="{{ route('sent_mail', $contact->id) }}"
                                            class="btn btn-success">Sent Mail</a> </td>
                                    
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
