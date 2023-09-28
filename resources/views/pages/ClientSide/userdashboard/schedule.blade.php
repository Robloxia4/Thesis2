

<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Schedule</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
      <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
      <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
   </head>
   <body style="margin: 0 0 100px;">
      <input type="hidden" id = "current_resident" data-id = {{ session("resident.id") }}>
      
      @include('inc.client_nav')

      <div style="margin: 30px;margin-bottom: 80px;">
         <div class="d-flex justify-content-center">
            @if (session()->has("success_certificate"))
            <div class="alert alert-success">
               {{ session()->get("success_certificate")}}
            </div>
            @endif
         </div>
         <div class="jumbotron" style="margin-bottom: 175px;padding-top: 0px;background-color: white !important;">
            <div class="album py-5 bg-white">
               <div class="text-center">
                  <h1 >Certificate</h1>
                  <br>
               </div>
               <div class="container">
                  <div class="row">
                     @if(count($request_list))
                     @foreach ($request_list as $request_list)
                     <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                           <div class="bg-info text-white text-center pt-2" stlye="height: 100px">
                              <h4>{{ $request_list->request_type }}</h4>
                           </div>
                           <div class="card-body">
                              <div class="card-text border-bottom solid">
                                 <div class="row text-center">
                                    <div class="col-sm-6">
                                       <h5>Price</h5>
                                       <h5>{{ $request_list->price }}</h5>
                                    </div>
                                    <div class="col-sm-6">
                                       <h5>Paid</h5>
                                       <h5>{{ $request_list->paid }}</h5>
                                    </div>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                 <small class="pl-2"> {{ Carbon\Carbon::parse($request_list->created_at)->toDateString() }}</small>
                                 <hr>
                                 <div class="btn-group">
                                    <a href="schedule/{{ $request_list->request_id }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <form method="get" id="print_form" action="/barangay/schedule/print/{{ $request_list->request_id }}">
                                       @csrf
                                       <input hidden name="print_id" value="{{ $request_list->request_id }}">
                                       <button data-id="{{ $request_list->request_id }}"  id="{{ $request_list->request_id }}" type="button" form="print_form" class="btn btn-sm print-button btn-outline-secondary">Print</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @endif
                  </div>
                  <script>
                     $(function () {
                      $('.print-button').on('click', function (e) {
                          var data = ( $(this).data('id'));
                          e.preventDefault();
                          $.ajax({
                              type: 'GET',
                              data: $(this).serialize(),
                              url: "/barangay/schedule/print/"+data,
                              xhrFields: {
                                  responseType: 'blob'
                              },
                              success: function(response){
                                  var blob = new Blob([response]);
                                  var link = document.createElement('a');
                                  link.href = window.URL.createObjectURL(blob);
                                  link.download = "certificate.pdf";
                                  link.click();
                              },
                                  error: function(blob){
                                      console.log(blob);
                                  }
                              });
                     });
                     $.ajaxSetup({
                     headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                     });
                     });
                     function downloadFile(response) {
                     var blob = new Blob([response], {type: 'application/pdf'})
                     var url = URL.createObjectURL(blob);
                     location.assign(url);
                     }
                  </script>
               </div>
            </div>
         </div>
      </div>
      <footer class="footer-clean" style="background-color: gray;position: absolute;left: 0;bottom: 0;height: 174px;width: 100%;overflow: hidden;margin-top: 30px;">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-sm-4 col-md-3 item">
                  <h3>Services</h3>
                  <ul>
                     <li><a href="#">Web design</a></li>
                     <li><a href="#">Development</a></li>
                     <li><a href="#">Hosting</a></li>
                  </ul>
               </div>
               <div class="col-sm-4 col-md-3 item">
                  <h3>About</h3>
                  <ul>
                     <li><a href="#">Company</a></li>
                     <li><a href="#">Team</a></li>
                     <li><a href="#">Legacy</a></li>
                  </ul>
               </div>
               <div class="col-sm-4 col-md-3 item">
                  <h3>Careers</h3>
                  <ul>
                     <li><a href="#">Job openings</a></li>
                     <li><a href="#">Employee success</a></li>
                     <li><a href="#">Benefits</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 item social">
                  <a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                  <p class="copyright">Company Name © 2017</p>
               </div>
            </div>
         </div>
      </footer>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
      <script type="text/javascript" src=" {{ URL::asset('js/app.js') }}"></script>
      <!---datatable-->
      <script type="text/javascript" src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <!--pagination-->
      <script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/pagination.min.js') }}"></script>
   </body>
</html>

