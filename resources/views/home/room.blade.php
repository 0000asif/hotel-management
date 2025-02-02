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
         @foreach ($room as $rooms)
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover" class="room">
                        <div class="room_img">
                           <figure><img src="{{asset('storage/'.$rooms->image)}}" alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                           <h3>{{ $rooms->room_title }}</h3>
                           <p>{!! Str::limit($rooms->description,150) !!}</p>
                           <a href="{{route('single_room',$rooms->id)}}" class="btn btn-success">Read More</a>
                        </div>

                  </div>
               </div>
            @endforeach
         </div>
   </div>
</div>
