<div class="contact">
  <div class="container">
     <div class="row">
        <div class="col-md-12">
           <div class="titlepage">
              <h2>Contact Us</h2>
           </div>
        </div>
     </div>
     <div class="row">
        <div class="col-md-6">
         
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
           <form id="request" class="main_form" method="POST" action="{{route('contact')}}">
            @csrf
              <div class="row">
                 <div class="col-md-12 ">
                    <input class="contactus" placeholder="Name" type="text" name="name"> 
                 </div>
                 <div class="col-md-12">
                    <input class="contactus" placeholder="Email" type="email" name="email"> 
                 </div>
                 <div class="col-md-12">
                    <input class="contactus" placeholder="Phone Number" type="number" name="phone">                          
                 </div>
                 <div class="col-md-12">
                    <textarea class="textarea" placeholder="Message" type="text" name="message">Message</textarea>
                 </div>
                 <div class="col-md-12">
                    <button class="send_btn">Send</button>
                 </div>
              </div>
           </form>
        </div>
        <div class="col-md-6">
           <div class="map_main">
              <div class="map-responsive">
                 <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>