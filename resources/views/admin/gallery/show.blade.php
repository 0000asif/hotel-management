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


                    <div class="title">All Gallery Photo</div>
                    <div class="col-8">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <center>
                    <div class="row">
                      @foreach ($gallries as $gallery)
                          <div class="col-md-3">
                            <img style="height="200px!important"; width="300px!important" src="{{asset('/storage/'.$gallery->image)}}" alt="{{__('image')}}">
                            <a href="{{route('delete_gallery',$gallery->id)}}" class="btn btn-danger">Delete Image</a>
                          </div>
                      @endforeach
                    </div>
                    
                    <form action="{{route('upload_gallery')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div style="padding: 30px">
                        <label style="color:white; font-weight:bold;">Upload Image</label>
                        <input type="file" name="photo" accept="image/*">
                        <input type="submit" value="Add Image" class="btn btn-success">
                      </div>
                    </form>
                    </center>









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
