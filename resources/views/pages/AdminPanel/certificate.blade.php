
@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Barangay Setting</h1>
</div>
<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="col-sm-12 pl-0 pr-0 search-bars" >
      <!----------------
         EDIT HERE
         ---------------->
      <div class="tab-nav ">
         <button class="tablinks active" onclick="schedules(event, 'schedule') ">Layout</button>
         <button class="tablinks" onclick="schedules(event, 'request')">Requested Certificate</button>
         <button class="tablinks" onclick="schedules(event, 'type')">Certificate Type</button>
      </div>
      <div id="request" class="tabcontent">
         <div class="row">
            <div class="col-sm-6">
               <div class="col-sm-12 overflow-auto pt-3 ">
                  <div class="col-sm-12 text-light pl-2 pt-2 pb-1  border-bot float-left bg-dark" >
                     <p  style="margin-bottom: 0px;"> <b>UNPAID RESIDENT </b></p>
                  </div>
                  <table  class="dataTables_info table datatable-element  requesttable table-striped jambo_table bulk_action text-center border">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Name </th>
                           <th class="column-title">Requested </th>

                           <th class="column-title">Action</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="col-sm-12 overflow-auto pt-3 ">
                  <div class="col-sm-12 text-light pl-2 pt-2 pb-1  border-bot float-left bg-dark" >
                     <p  style="margin-bottom: 0px;"> <b>PAID RESIDENT </b></p>
                  </div>
                  <table  class="dataTables_info table datatable-element  requesttable-paid table-striped jambo_table bulk_action text-center border">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Name </th>
                           <th class="column-title">Requested </th>

                           <th class="column-title">Action</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div id="type" class="tabcontent">
         <button id="createcert" class="btn btn-success btn-xs ml-3 pr-4 pl-4 pt-2 mt-2" data-toggle="modal" data-target="#certmodal"> <i class="fa fa-plus fa-lg"></i></button>
         <div class="row">
            <div class="col-sm-12">
               <div class="col-sm-12 overflow-auto pt-3 ">
                  <table id="certtype" class="dataTables_info table datatable-element  resident table-striped jambo_table bulk_action text-center border">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Action </th>
                           <th class="column-title">Certificate Type </th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div id="schedule" class="tabcontent">
         <div class="row">
            <div class="col-sm-6">
               <div class="col-sm-12 overflow-auto pt-3 ">
                  <div class="row">
                     <div class="col-md-12 order-md-1  pt-4" >
                        <form class="needs-validation" name="certform"  id="certform"  method="POST"  enctype="multipart/form-data">
                           @csrf
                           <input hidden id="certificate_id" name="certificate_id"  value="{{ $layout->layout_id ?? '' }}">
                           <div class="mb-3">
                              <label >Barangay Logo 1: Dimension: MAX:500px</label>
                              <input  type="file" class="form-control" class="text-center"  id="logo1" name="logo1" required="" style="padding: 0px !important">
                              <div class="invalid-feedback text-danger">
                                 <span class="text-danger">{{ $errors->first('title') }}</span>
                              </div>
                           </div>
                           <div class="mb-3">
                              <label >Barangay Logo 2: Dimension: MAX:500px</label>
                              <input id="logo2" type="file" class="form-control" class="text-center" required=""  id="logo2" name="logo2" style="padding: 0px !important">
                              <div class="invalid-feedback">
                                 Invalid Logo or no image
                              </div>
                           </div>
                           <div class="mb-3">
                              <label >Punong Barangay: Dimension: MAX:500px</label>
                              <input id="punongbarangay" type="file" class="form-control" class="text-center" required="" id="punongbarangay" name="punongbarangay" style="padding: 0px !important">
                              <div class="invalid-feedback">
                                 Invalid Logo or no image
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="brgy"> Municipality/City </label>
                              <input  class="form-control" id="municipality" name="municipality" value="{{ $layout->municipality ?? ''  }}" required="" placeholder="Ex: MUNICIPALITY OF BARAS/CITY OF CEBU">
                              <div class="invalid-feedback">
                                 Input Field Required
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="city">Province </label>
                              <input type="text" class="form-control" id="province" name="province" value="{{ $layout->province ?? ''  }}"  placeholder="Ex: PROVINCE OF RIZAL" required="">
                              <div class="invalid-feedback">
                                 Input Field Required
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="city">Barangay </label>
                              <input type="text" class="form-control" id="barangay" name="barangay"  value="{{ $layout->barangay ?? ''  }}"  placeholder="Ex: BARANGAY TISA" required="">
                              <div class="invalid-feedback">
                                 Input Field Required
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="Province">Office </label>
                              <input type="text" class="form-control" id="office" value="{{ $layout->office ?? ''  }}"  name="office" placeholder="Ex: OFFICE OF PUNONG BARANGAY" required="">
                              <div class="invalid-feedback">
                                 Input Field Required
                              </div>
                           </div>
                           <div class="text-center button-center d-flex justify-content-center">
                              <button id="certsave" class="btn btn-success col-sm-3 text-center btn-lg btn-block" type="submit">Submit</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 border solid overflow-auto">
               <div class="row">
                  <div class="column-right text-right" >
                     <img src="{{ URL::asset('images/logos.png') }}" style="resize: both;width: 100px;margin-right: 30px;">
                  </div>
                  <div class="column-center text-center" >
                     <p id="heading"  style='font-size:12px;font-family: "Times New Roman, Times, serif";'> REPUBLIC OF THE PHILIPPINES<br>
                        {{ $layout->municipality ?? 'MUNICIPALITY OF KABANKALAN CITY '  }}<br>
                        {{ $layout->province ?? 'Negros Occidental'  }}<br>
                        <b ><u>  {{ $layout->barangay ?? 'Brgy. Camugao'  }}<br></u></b>
                     </p>
                     <div id="punong" style='font-size:22px;font-family: "Times New Roman, Times, serif";padding:0px'><b>{{ $layout->office ?? 'Office of Brgy. Captain'  }}</b>
                     </div>
                     <div style='font-size:24px;font-family: "Times New Roman, Times, serif;padding:0px'><u><b>C E R T I F I C A T I O N</b></u>
                     </div>
                  </div>
                  <div class="column-left text-left" >
                     <img src="{{ URL::asset('images/logos.png') }}" style="resize: both;width: 100px;margin-right: 30px;">
                  </div>
               </div>
               <div class="box">
                  <img  id="logobackground1" class="background-opacity text-center" style="height: 450px;margin-left: 30%;margin-top: 40px" src="{{  Storage::url($layout->logo_2 ?? 'background photo no set')  }}">
                  <div class="row text">
                     <div class="column-body-left text-center " >
                        <img src="{{ URL::asset('images/adones.jpg') }}" style="resize: both;width: 75px;margin-right: 30px;">
                        <div class="form-group" style='font-size:16px;font-family: "Times New Roman, Times, serif;'>
                           @foreach ($puno as $puno)
                           <p ><b>{{ $puno->name }}</b><br>{{ $puno->position }}</p>
                           @endforeach
                           @if(count($brgy_official))
                           @foreach ($brgy_official as $brgy_official)
                           <p ><b>{{ $brgy_official->name }}</b><br>{{ $brgy_official->position }}</p>
                           @endforeach
                           @endif
                        </div>
                     </div>
                     <div class="column-body-right text-left " style="padding-left:5px">
                        <br>
                        <br>
                        <br>
                        <br>
                        <span style=" font-size: 17px ; font-family: Arial, Helvetica, sans-serif;"><b>TO WHOM MAY IT CONCERN:</b></span>
                        <br>
                        <br>
                        <br>
                        <p style=" font-size: 17px ; font-family: Arial, Helvetica, sans-serif; text-align: justify;text-justify: inter-word;">
                           This is to certify that the person whose photo, signature, and thumbprint appear here in is a bonafide resident of their barangay. He/She is of good moral character, a law abiding citizen and has no derogatory record on files as of this date
                        </p>
                        <br>
                        <!-- <p style=" text-indent: 50px;font-size: 17px ; font-family: Arial, Helvetica, sans-serif; text-align: justify;text-justify: inter-word;">
                           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <br>
                        <p style=" text-indent: 50px;font-size: 17px ; font-family: Arial, Helvetica, sans-serif; text-align: justify;text-justify: inter-word;">
                           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p> -->
                        <br>
                        <div class="row">
                           <br>
                           <br>
                           <div class="column-inside-left">
                              &nbsp
                           </div>
                           <div class="text-center column-inside-right " style="font-size: 17px ; font-family: Arial, Helvetica, sans-serif;  ">
                              <span>APPROVE BY:<br></span>
                              @if(count($approve2))
                              @foreach ($approve2 as $approve2)
                              <span style="text-transform: uppercase;
                                 display: inline-block;">{{ $approve2->name }}</span><br><span>{{ $approve2->position }}<span>
                              @endforeach
                              @endif
                           </div>
                        </div>
                        <footer><span><i>***This is a computer-generated document. No signature is required***</i></span></footer>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(function () {
         $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });

         // cert request paid table

         var requesttable_paid = $('.requesttable-paid').DataTable({
               processing: true,

               serverSide: true,
               ajax: "{{ route('certrequestpaid.index') }}",
               columns: [{data: 'name',name: 'name'
                   },{data: 'request_type',name: 'request_type'

                   },{
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
                   ]
           });
         //cert request-unpaid table
         var requesttable = $('.requesttable').DataTable({
               processing: true,

               serverSide: true,
               ajax: "{{ route('certrequestunpaid.index') }}",
               columns: [{data: 'name',name: 'name'
                   },{data: 'request_type',name: 'request_type'


                   },{
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false

                   },
                   ]
           });
           //certtype table
           var certtype = $('#certtype').DataTable({
               processing: true,

               serverSide: true,
               ajax: "{{ route('certificate_type.index') }}",
               columns: [{
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false


                   },{data: 'certificate_type',name: 'certificate_type'


                   },
                   ]
           });


               $('#logo1').change(function(){

                  let reader = new FileReader();
                  reader.onload = (e) => {
                    $('#logo1create').attr('src', e.target.result);
                    $('#logo1create1').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(this.files[0]);
                 });

                 $('#logo2').change(function(){
                   let reader = new FileReader();
                   reader.onload = (e) => {
                   $('#logo2create').attr('src', e.target.result);
                   $('#logo2create2').attr('src', e.target.result);
                   $('#logobackground1').attr('src', e.target.result);
                   $('#logobackground2').attr('src', e.target.result);
                   }
                   reader.readAsDataURL(this.files[0]);
                   });
                   $('#punongbarangay').change(function(){
                   let reader = new FileReader();
                   reader.onload = (e) => {
                   $('#punongbarangay1').attr('src', e.target.result);
                   $('#punongbarangay2').attr('src', e.target.result);
                   }
                   reader.readAsDataURL(this.files[0]);
                   });


           //insert certificate
           $('#certform').submit(function (e) {
             e.preventDefault();

             var municipality =  document.getElementById("municipality").value;
             var province =  document.getElementById("province").value;
             var barangay =  document.getElementById("barangay").value;
             var office =  document.getElementById("office").value;
             var formData = new FormData(this);
             $.ajax({
               cache: false,
               contentType: false,
               processData: false,
               data:  formData,
               url: '{{ route("certificate.store") }}',
               type: "POST",
               dataType: 'json',
               success: function (data) {
                   alert(JSON.stringify(data));
                   document.getElementById("certificate_id").setAttribute('value','1');

                   $('#heading').html("REPUBLIC OF THE PHILIPPINES<br>" + municipality +
                   "<br>"+province+"<br><b ><u>"+barangay+"</u></b>");
                   $('#punong').html("<b>"+ office +"</b>");
                   $('#heading2').html("REPUBLIC OF THE PHILIPPINES<br>" + municipality +
                   "<br>"+province+"<br><b ><u>"+barangay+"</u></b>");
                   $('#punong2').html("<b>"+ office +"</b>");








               },
               error: function (data) {
                   console.log('Error:', data);
                   document.getElementById("certificate_id").value
                   document.getElementById("certificate_id").setAttribute('value','1');
               }
           });
         });


         //editrequest

         $('body').on('click', '.editrequest', function () {
             var request_id = $(this).data('id');


             $.get("{{ route('certificate.index') }}" +'/' + request_id +'/edit', function (data) {


                 $('#rqtmodal').modal('show');
                 $('#request_id_paid').val(data.request_id);
                 $('#namess').val(data.name);
                 $('#description').val(data.description);
                 $('#age').val(data.age);
                 $('#gender').val(data.gender);
                 $('#paid').val(data.paid);
                 $('#price').val(data.price);
                 $('#request_type').val(data.request_type);


             })
          });
           //certtype submit
           $('#paid').click(function (e) {
               e.preventDefault();



           });
         //approvers
         //do this later

         $('#approved').click(function (e) {
               e.preventDefault();
           $.ajax({
                 data: $('#rqtform').serialize(),
                 url: "{{ route('storerequest.post') }}",
                 type: "POST",
                 dataType: 'json',
                 success: function (data) {
                     $('#rqtform').trigger("reset");
                     $('#rqtmodal').modal('hide');
                     requesttable_paid.draw();
                    requesttable.draw();

                 },
                 error: function (data) {
                     console.log('Error:', data);

                 }
             });
         });


         $('body').on('click', '.deleterequest', function () {

         var cert_id = $(this).data("id");
         if (confirm("Are You sure want to delete !")) {

         $.ajax({
           type: "DELETE",
           url: "{{ route('certrequestpaid.index') }}"+'/'+cert_id,
           success: function (data) {
               requesttable_paid.draw();
                    requesttable.draw();
           },
           error: function (data) {
               console.log('Error:', data);
           }
         });

         }

         });

         //show cert type
         $('#createcert').click(function () {
            $('#certtypeform').trigger("reset");
               $('#certificate_list_id').val('');
             //  $('#certtypeform').trigger("reset");
               $('#modelHeading').html("Certificate Form");
               $('#content_1_err').html("");
               $('#content_2_err').html("");
               $('#content_3_err').html("");
               $('#certificate_type_err').html("");
               $('#certificate_name_err').html("");
               $('#price_err').html("");
           });
           function printErrorMsg (msg) {
    $.each( msg, function( key, value ) {
    console.log(key);
      $('.'+key+'_err').text(value);
    });

}
           //certtype submit
           $('#certsubmit').click(function (e) {
               e.preventDefault();
               $.ajax({
                 data: $('#certtypeform').serialize(),
                 url: "{{ route('certtypesubmit.post') }}",
                 type: "POST",
                 dataType: 'json',
                 success: function (data) {

                    if(data.status == 1){


                     $('#certtypeform').trigger("reset");
                     $('#certmodal').modal('hide');
                     certtype.draw();

                    }else if(data.status == 0){


                        printErrorMsg(data.error);


                    }
                 },
                 /*
                 error: function (data) {
                     console.log('Error:', data);
                 }
                 */
             });
           });
           //certtype edit

           $('body').on('click', '.edittype', function () {
             var request_id = $(this).data('id');


             $.get("{{ route('certificate_type.index') }}" +'/' + request_id +'/edit', function (data) {


                 $('#certmodal').modal('show');
                 $('#certificate_list_id').val(data.certificate_list_id);
                 $('#content_3').val(data.content_3);
                 $('#content_1').val(data.content_1);
                 $('#content_2').val(data.content_2);
                 $('#firstcontent').html(data.content_1);
                 $('#secondcontent').html(data.content_2);
                 $('#thirdcontent').html(data.content_3);
                 $('#certificate_namesss').val(data.certificate_name);
                 $('#pricess').val(data.price);
                 $('#certificate_type').val(data.certificate_type);



              //   $('#certificate_name').html(data.certificate_name);

             })
          });

          // delete type of certificate
           $('body').on('click', '.deletetype', function () {

               var cert_id = $(this).data("id");
               if (confirm("Are You sure want to delete !")) {

               $.ajax({
                   type: "DELETE",
                   url: "{{ route('certificate_type.index') }}"+'/'+cert_id,
                   success: function (data) {
                       certtype.draw();
                   },
                   error: function (data) {
                       console.log('Error:', data);
                   }
               });

               }

         });

         function downloadFile(response) {
            var blob = new Blob([response], {type: 'application/pdf'})
            var url = URL.createObjectURL(blob);
            location.assign(url);
        }
            //print
         $('#printcert').click(function (e) {

               e.preventDefault();
               /*
           $.ajax({
                 data: $('#createform').serialize(),
                 url: "{{ route('Print.post') }}",
                 type: "GET",

                 xhrFields: {
                responseType: 'blob'
                },
                success: function (data) {
                     $('#createform').trigger("reset");
                     $('#createmodal').modal('hide');
                     var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "Certificate.pdf";
                    link.click();

                 },
                 error: function (data) {
                     console.log('Error:', data);

                 }
             });

*/

                            $.ajax({

                type: 'GET',

                data: $('#createform').serialize(),
                 url: "{{ route('Print.post') }}",

                xhrFields: {

                    responseType: 'blob'

                },

                success: function(response){
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "certificate.pdf";
                    link.click();
                    $('#createform').trigger("reset");
                     $('#createmodal').modal('hide');
                },
                    error: function(blob){
                        console.log(blob);
                    }

                })//.done(downloadFile);


         });

         });
         //preview certificate
         function previewtype() {

           $('#certmodal').modal('hide');
           setTimeout(function(){

               $('#createmodal').modal('show');
           },500);

           var id;
          id = document.getElementById("certificate_list_id").value


          document.getElementById("print_id").setAttribute('value',id);


         }
         //print

      </script>
   </div>
</div>
<div class="modal fade" id="rqtmodal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" >Requested Form</h4>
         </div>
         <div class="modal-body">
            <!--FORM-->
            <form id="rqtform" name="rqtform" class="form-horizontal">
               <input type="hidden" name="request_id_paid" id="request_id_paid">
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-12">
                     <input readonly type="text" class="form-control" id="namess" name="namess" placeholder="Name" value="" maxlength="50" required="">
                  </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-12">
                     <textarea readonly id="description" name="description" rows="5" style=" width:100%;"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Requested Clearance</label>
                  <div class="col-sm-12">
                     <input readonly type="text" class="form-control" id="request_type" name="request_type" placeholder="Name" value="" maxlength="50" required="">
                  </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Age</label>
                  <div class="col-sm-12">
                     <input readonly type="number" class="form-control" id="age" name="age" placeholder="Age" value="" maxlength="50" required="">
                  </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-12">
                     <input readonly type="text" class="form-control" id="gender" name="gender" placeholder="Gender" value="" maxlength="50" required="">
                  </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Paid</label>
                  <div class="col-sm-12">
                     <select name="paid" id="paid" style="height:38px; width: 100%">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Price</label>
                  <div class="col-sm-12">
                     <input readonly type="number" class="form-control" id="price" name="price" placeholder="Price" value="" maxlength="50" required="">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="approved" class="btn btn-primary">Approve</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="createmodal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" >Requested Form</h4>
         </div>
         <div class="modal-body">
            <!--FORM-->
            <form id="createform" name="createform" class="form-horizontal">
               <div class="row">
                  <div class="column-right text-right" >
                     <img style="width: 120px" id="logo1create1" class="logo1create1" src="{{  Storage::url($layout->logo_1 ?? 'Logo not set')  }}">
                  </div>
                  <div class="column-center text-center" >
                     <p id="heading2" style='font-size:19px;font-family: "Times New Roman, Times, serif";'> REPUBLIC OF THE PHILIPPINES<br>
                        {{ $layout->municipality ?? 'Municipality not set'  }}<br>
                        {{ $layout->province ?? 'Province not set'  }}<br>
                        <b ><u>   {{ $layout->barangay ?? 'Barangay not set'  }}</u></b>
                     </p>
                     <div id="punong2" style='font-size:22px;font-family: "Times New Roman, Times, serif";padding:0px'><b>   {{ $layout->office ?? 'Office not set'  }}</b>
                     </div>
                     <div style='font-size:24px;font-family: "Times New Roman, Times, serif;padding:0px'><u><b id="certificate_name">C E R T I F I C A T I O N</b></u>
                     </div>
                  </div>
                  <div class="column-left text-left" >
                     <img style="width: 120px" id="logo2create2" class="logo2create" src="{{  Storage::url($layout->logo_2 ?? 'Logo not set')  }}">
                  </div>
               </div>
               <div class="box">
                  <img  id="logobackground2" class="background-opacity text-center" style="height: 450px;margin-left: 30%;margin-top: 40px" src="{{  Storage::url($layout->logo_2 ?? 'background logo not set')  }}">
                  <div class="row text">
                     <div class="column-body-left text-center " >
                        <img id="punongbarangay2" style="width: 120px" src="{{  Storage::url($layout->punongbarangay ?? '2X2 PIC of punong barangay not set')  }}">
                        <div class="form-group" style='font-size:16px;font-family: "Times New Roman, Times, serif;'>
                           @if(count($puno2))
                           @foreach ($puno2 as $puno2)
                           <p ><b>{{ $puno2->name }}</b><br>{{ $puno2->position }}</p>
                           @endforeach
                           @endif
                           @if(count($brgy_official2))
                           @foreach ($brgy_official2 as $brgy_official2)
                           <p ><b>{{ $brgy_official2->name }}</b><br>{{ $brgy_official2->position }}</p>
                           @endforeach
                           @endif
                        </div>
                     </div>
                     <div class="column-body-right text-left " style="padding-left:5px">
                        <br>
                        <br>
                        <br>
                        <br>
                        <span style=" font-size: 17px ; font-family: Arial, Helvetica, sans-serif;"><b>TO WHOM MAY IT CONCERN:</b></span>
                        <br>
                        <br>
                        <br>
                        <div style=" text-indent: 50px;font-size: 17px ; font-family: Arial, Helvetica, sans-serif;text-justify: inter-word;">
                           <p >
                              THIS IS TO CERTIFY THAT ___________________, _____ years old, ______ and a resident of <span id="firstcontent">start of the paragraph</span>
                           </p>
                           <br>
                           <p id="secondcontent">
                            start of the paragraph
                               </p>
                           <br>
                           <p >
                              <b>DONE AND ISSUED</b> this  ___ day of _______________ at the <span id="thirdcontent">start of the paragraph</span>
                           </p>
                           <br>
                        </div>
                        <div class="row">
                           <br>
                           <br>
                           <div class="column-inside-left">
                              &nbsp
                           </div>
                           <div class="text-center column-inside-right " style="font-size: 17px ; font-family: Arial, Helvetica, sans-serif;  ">
                              <span>APPROVE BY:<br></span>
                              @if(count($approve))
                              @foreach ($approve as $approve)
                              <span style="text-transform: uppercase;
                                 display: inline-block;">{{ $approve->name }}</span><br><span>{{ $approve->position }}<span>
                              @endforeach
                              @endif
                           </div>
                        </div>
                        <footer><span><i>***This is a computer-generated document. No signature is required***</i></span></footer>
                     </div>
                  </div>
               </div>
               <input value="" name="print_id" id="print_id" hidden>

               <div class="text-center button-center d-flex justify-content-center modal-footer">
                  <a class="btn btn-primary" data-dismiss="modal">Close</a>
                  <button class="btn btn-success"  id="printcert" >Print</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="certmodal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="modelHeading" ></h4>
         </div>
         <div class="modal-body">
            <!--FORM-->
            <form id="certtypeform" name="certtypeform" class="form-horizontal">
               <input type="hidden" name="certificate_list_id" id="certificate_list_id" value="">
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">First Paragraph</label>
                  <div class="col-sm-12">
                     <textarea id="content_1" required name="content_1" rows="5" style=" width:100%;" placeholder="Ex: Barangay Tika, Cebu City. He/She is personally known to me of good moral..."></textarea>
                     <span id="content_1_err" class="text-danger error-text content_1_err"></span>
                    </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Second Paragraph</label>
                  <div class="col-sm-12">
                     <textarea id="content_2" required name="content_2" rows="5" style=" width:100%;" placeholder="Ex: To certify further, that he/she has no derogatory and/or criminal records filed in this barangay"></textarea>
                     <span id="content_2_err" class="text-danger error-text content_2_err"></span>
                    </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Third Paragraph</label>
                  <div class="col-sm-12">
                     <input type="text" required class="form-control" id="content_3" name="content_3" placeholder="Ex: Barangay Tika, Cebu City" value="" maxlength="50" required="">
                     <span id="content_3_err" class="text-danger error-text content_3_err"></span>
                    </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Certificate Type</label>
                  <div class="col-sm-12">
                     <input type="text" required class="form-control" id="certificate_type" name="certificate_type" placeholder="Name" value="" maxlength="50" required="">
                     <span id="certificate_type_err" class="text-danger error-text certificate_type_err"></span>
                    </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Certificate Name</label>
                  <div class="col-sm-12">
                     <input type="text" required class="form-control" id="certificate_namesss" name="certificate_name" placeholder="C E R T I F I C A T E" value="" maxlength="50" required="">
                     <span id="certificate_name_err" class="text-danger error-text certificate_name_err"></span>
                    </div>
               </div>
               <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-12">
                     <input type="number" onkeypress="return isNumberKey(event)" required class="form-control" id="pricess" name="price" placeholder="0"  required="">
                     <span id="price_err" class="text-danger error-text price_err"></span>
                    </div>
               </div>

         <div class="modal-footer">
         <a class="btn btn-success" href="javascript:previewtype()">Preview</a>
         <a class="btn btn-secondary" data-dismiss="modal">Close</a>
         <button type="button" id="certsubmit" class="btn btn-primary">Submit</button>
         </div>
         </form>
      </div>
   </div>
</div>
</div>
@endsection

