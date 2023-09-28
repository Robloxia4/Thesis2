@extends('layouts.apps')

@section('content')
    <div class="col-sm-12 text-left ">
    <h1 class="border-bottom border-bot pt-3">Blotters Record</h1>
    </div>
    <div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
        <div class="col-sm-12 pl-0 pr-0 search-bars" >

 <!----------------
    EDIT HERE
 ---------------->


        <div class="topnav navbar navbar">
  <button class="btn btn-success text-white " href="#home" data-toggle="modal" data-target="#blottermodal" id="createNewBlotter">New Blotter Record <i class="fa fa-plus"></i></button>

  <div class="modal fade" id="blottermodal" name="blottermodal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modelHeading"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">

                     <div class="tab-nav " style="background: rgb(67, 0, 155);">
                        <button class="tablinks btn btn-info active" onclick="schedules(event, 'schedule') ">Complainants</button>
                        <button class="tablinks btn btn-info" onclick="schedules(event, 'respondents')">Respondents</button>
                        <button class="tablinks btn btn-info" onclick="schedules(event, 'victims')">Victims</button>
                        <button class="tablinks btn btn-info" onclick="schedules(event, 'attackers')">Attackers</button>
                        <button class="tablinks btn btn-info" onclick="schedules(event, 'inci_detail')">Incident Detail and Narrative</button>
                     </div>

                     <form id="blotterform"  name="blotterform" class="modal-input">
                        {{ csrf_field() }}





                     <div id="schedule" class="tabcontent">
                        <div class="topnav navbar navbar">
                           <div>
                              <h4 style="color: white">Adding Complainants</h4>
                           </div>
                        </div>

                        <table  class=" overflow-auto bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border no-footer complainants-table">
                           <thead>
                              <tr class="headings">
                                 <th class="column-title">Action</th>
                                 <th class="column-title">FullName</th>
                                 <th class="column-title">Alias</th>
                                 <th class="column-title">FirstName</th>
                                 <th class="column-title">MiddleName</th>
                                 <th class="column-title">LastName</th>
                                 <th class="bulk-actions" hidden colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>


                           </tbody>
                        </table>
                        <span class="text-danger error-text Complainant_error"></span>


                     </div>



                     <div id="respondents" class="tabcontent">
                        <div class="topnav navbar navbar">
                           <div>
                              <h4 style="color: white">Adding Respondents</h4>
                           </div>
                        </div>

                        <table  class="bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border no-footer respondents-table">
                           <thead>
                              <tr class="headings">
                                 <th class="column-title">Action</th>
                                 <th class="column-title">FullName</th>
                                 <th class="column-title">Alias</th>
                                 <th class="column-title">FirstName</th>
                                 <th class="column-title">MiddleName</th>
                                 <th class="column-title">LastName</th>
                                 <th class="bulk-actions" hidden colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>


                           </tbody>
                        </table>

                        <span class="text-danger error-text Respondent_error"></span>

                     </div>








                     <div id="victims" class="tabcontent">
                        <div class="topnav navbar navbar">
                           <div>
                              <h4 style="color: white">Adding Victims</h4>
                           </div>
                        </div>
                        <table  class="bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border no-footer victims-table">
                           <thead>
                              <tr class="headings">
                                 <th class="column-title">Action</th>
                                 <th class="column-title">FullName</th>
                                 <th class="column-title">Alias</th>
                                 <th class="column-title">FirstName</th>
                                 <th class="column-title">MiddleName</th>
                                 <th class="column-title">LastName</th>
                                 <th class="bulk-actions" hidden colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>


                           </tbody>
                        </table>

                        <span class="text-danger error-text Victim_error"></span>

                     </div>

                     <div id="attackers" class="tabcontent">
                        <div class="topnav navbar navbar">
                           <div>
                              <h4 style="color: white">Adding Attackers</h4>
                           </div>

                        </div>

                        <table  class="bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border no-footer attackers-table">
                           <thead>
                              <tr class="headings">
                                 <th class="column-title">Action</th>
                                 <th class="column-title">FullName</th>
                                 <th class="column-title">Alias</th>
                                 <th class="column-title">FirstName</th>
                                 <th class="column-title">MiddleName</th>
                                 <th class="column-title">LastName</th>
                                 <th class="bulk-actions" hidden colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>


                           </tbody>
                        </table>

                        <span class="text-danger error-text Attacker_error"></span>
                     </div>




                     <div id="inci_detail" class="tabcontent">

                           <input type="hidden" name="blotter_id" id="blotter_id">
                           {{-- <input type="hidden" name="person_id" id="person_id"> --}}

                           <div class="row" style="margin-left: 0px;margin-right: 0px;">
                              <div class="col-sm-6" >
                                <label >Incident Location</label>
                                <input type="text" id="incident_location" name="incident_location" required="required" class="form-control ">
                                <span class="text-danger error-text incident_location_error"></span>
                              </div>
                              <div class="col-sm-6" >
                                 <label >Incident type</label>
                                 <input type="text" id="incident_type" name="incident_type" required="required" class="form-control ">
                                 <span class="text-danger error-text incident_type_error"></span>
                               </div>
                            </div>

                           <div class="row" style="margin-left: 0px;margin-right: 0px;">
                              <div class="col-sm-6" >
                                <label >Date of Incident</label>
                                <input type="date" id="date_incident" name="date_incident" required="required" class="form-control ">
                                <span class="text-danger error-text date_incident_error"></span>

                              </div>
                              <div class="col-sm-6" >
                                 <label >Time of Incident</label>
                                 <input type="time" id="time_incident" name="time_incident" required="required" class="form-control ">
                                 <span class="text-danger error-text time_incident_error"></span>
                               </div>
                            </div>

                            <div class="row" style="margin-left: 0px;margin-right: 0px; margin-top:1rem;">
                              <div class="col-sm-6" >
                                <label >Date Reported</label>
                                <input type="date" id="date_reported" name="date_reported" required="required" class="form-control ">
                                <span class="text-danger error-text date_reported_error"></span>
                              </div>
                              <div class="col-sm-6" >
                                 <label >Time Reported</label>
                                 <input type="time" id="time_reported" name="time_reported" required="required" class="form-control ">
                                 <span class="text-danger error-text time_reported_error"></span>
                               </div>
                            </div>

                            <div class="row" style="margin-left: 0px;margin-right: 0px; margin-top:1rem;">
                              <div class="col-sm-6" >
                                <label >Date Schedule</label>
                                <input type="date" id="schedule_date" name="schedule_date" required="required" class="form-control ">
                                <input type="text" id="schedule" name="schedule" hidden>

                              </div>

                              {{-- <div class="col-sm-6" >
                                 <label >Time Schedule</label>
                                 <input type="time" id="schedule_time" name="schedule_time" required="required" class="form-control ">
                               </div> --}}

                            </div>

                            <div class="row" style="margin-left: 0px;margin-right: 0px; margin-top:1rem;">

                              <div class="col-sm-6" >
                                 <label class="col-form-label col-md-3 col-sm-3 label-align">Status
                                 </label>

                                 <div class="col-md-12 col-sm-12 ">
                                     <input type="radio" name="status" value="Ongoing">
                                     <label for="ongoing">Ongoing</label><br>
                                     <input type="radio" name="status" value="Settled">
                                     <label for="settled">Settled</label><br>
                                     <span class="text-danger error-text status_error"></span>
                                 </div>
                              </div>
                            </div>


                            <div class="item form-group" style="margin-top:1rem;>
                              <label for="incident_narrative">Incident Narrative</label>
                              <div class="col-md-12 col-sm-12 ">
                                 <textarea name="incident_narrative" id="incident_narrative" rows="10" style="width: 100%"></textarea>
                                 <span class="text-danger error-text incident_narrative_error"></span>
                              </div>
                           </div>





                     </div>

                     <div class="item form-group" style="margin-top: 1rem;">
                        <div class="col-md-12 col-sm-12 offset-md-4">
                           <button type="submit" id="saveBtn" class="btn btn-success">Save New Blotters</button>
                           <a class="btn btn-primary" type="button" data-dismiss="modal" style="margin-left: 4px;" >Cancel</a>
                           <input class="btn btn-primary" type="reset" value="Reset">
                        </div>
                     </div>

                  </form>

         </div>

         <div class="modal-footer text-white">
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="viewblottermodal" name="viewblottermodal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="viewmodelHeading"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">
            <table  class="bulk_action dataTables_info table datatable-element table-striped jambo_table bulk_action text-center border no-footer">
               <thead>
                  <tr class="headings">
                     <th class="column-title">Blotter Id</th>
                     <th class="column-title">Status</th>
                     <th class="column-title">Incident Location</th>
                     <th class="column-title">Incident Type</th>
                     <th class="column-title">Incident Date</th>
                     <th class="column-title">Incident Time</th>
                     <th class="column-title">Schedule Date</th>
                     {{-- <th class="column-title">Schedule Time</th> --}}
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td id="viewblotter_id"></td>
                     <td id="status"></td>
                     <td id="viewincident_location"></td>
                     <td id="viewincident_type"></td>
                     <td id="viewdate_incident"></td>
                     <td id="viewtimeof_incident"></td>
                     <td id="viewschedule_date"></td>
                     {{-- <td id="viewschedule_time"></td> --}}
                  </tr>
               </tbody>
            </table>
            <hr>

            <h5>List of Person Involves</h5>

            <table id="blotter_list-table" class="bulk_action dataTables_info table datatable-element table-striped jambo_table bulk_action text-center border no-footer">
               <thead>
                  <tr class="headings">
                     <th class="column-title">Resident Id</th>
                     <th class="column-title">FullName</th>
                     <th class="column-title">Involvement Type</th>
                     <th class="bulk-actions" hidden colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                     </th>
                  </tr>
               </thead>
               <tbody class="blotter-list-data">


               </tbody>
            </table>
            <h4>Incident Narrative</h4>
            <textarea name="viewincident_narrative" id="viewincident_narrative" rows="10" style="width: 100%; border:none;" disabled></textarea>
            {{-- <form id="blotterform"  name="blotterform" class="modal-input">
            </form> --}}
         </div>



         <div class="modal-footer text-white">
         </div>
      </div>
   </div>
</div>



  <div class="search-container">
    {{-- <form action="/action_page.php"> --}}
      <input class="global_filter" type="text" id="global_filter" placeholder="Search..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    {{-- </form> --}}
  </div>
</div>



<div class=" col-sm-12 text-left h-100  pr-0 pl-0 pt-2 pb-2 text-white" >
   <div class="row pl-4 pr-4   ">
      <div class="col-sm-12 border border-bot ">
      </div>
   </div>
   <div class="row pt-4 pl-4 pr-4">
      <div class="col-sm-12 overflow-auto display-nones ">




  <table id="blotter-table" class="bulk_action dataTables_info table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer data-table">
            <thead>
               <tr class="headings">
                  <th class="column-title">Action</th>
                  <th class="column-title">Blotter Id </th>
                  <th class="column-title">Blotter Status </th>
                  <th class="column-title">Date Recorded </th>
                  <th class="column-title">Time Recorded  </th>
                  <th class="column-title">Incident Type </th>
                  <th class="column-title">Incident Date </th>
                  <th class="column-title">Incident Time</th>
                  <th class="bulk-actions" hidden colspan="7">
                     <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
               </tr>
            </thead>
            <tbody>
            </tbody>
   </table>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

         <script type="text/javascript">

            $(function () {
                  $.ajaxSetup({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
               });



            // PersonInvolves

            // Adding Complainants
            var complainants_table = $('.complainants-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('personinvolves.index') }}",
                columns: [
                  {data: 'add_complainant', name: 'add_complainant', orderable: false, searchable: false},
                  {data: 'fullname', name: 'fullname', orderable: false, searchable: false},
                  { data: 'alias', name: 'alias'},
                  { data: 'firstname', name: 'firstname', visible: false},
                  { data: 'middlename', name: 'middlename', visible: false},
                  { data: 'lastname', name: 'lastname', visible: false}
                ]

            });

            $('body').on('click', '.addComplainant', function(){
               var resident_id = $(this).data('id');
               $.get("{{ route('personinvolves.index') }}" +'/' + resident_id +'/edit', function (data) {
                  $('.addComplainant' + data.resident_id).trigger('click');
               })
             });

            // Adding Complainants End

            // Adding Respondents
            var respondents_table = $('.respondents-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('personinvolves.index') }}",
                columns: [
                  {data: 'add_respondent', name: 'add_respondent', orderable: false, searchable: false},
                  {data: 'fullname', name: 'fullname', orderable: false, searchable: false},
                  { data: 'alias', name: 'alias'},
                  { data: 'firstname', name: 'firstname', visible: false},
                  { data: 'middlename', name: 'middlename', visible: false},
                  { data: 'lastname', name: 'lastname', visible: false}
                ]

            });

            $('body').on('click', '.addRespondent', function(){
               var resident_id = $(this).data('id');
               $.get("{{ route('personinvolves.index') }}" +'/' + resident_id +'/edit', function (data) {
                  $('.addRespondent' + data.resident_id).trigger('click');
               })
             });
            // Adding Respondents End

            // Adding Victims
            var victims_table = $('.victims-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('personinvolves.index') }}",
                columns: [
                  {data: 'add_victim', name: 'add_victim', orderable: false, searchable: false},
                  {data: 'fullname', name: 'fullname', orderable: false, searchable: false},
                  { data: 'alias', name: 'alias'},
                  { data: 'firstname', name: 'firstname', visible: false},
                  { data: 'middlename', name: 'middlename', visible: false},
                  { data: 'lastname', name: 'lastname', visible: false}
                ]

            });

            $('body').on('click', '.addVictim', function(){
               var resident_id = $(this).data('id');
               $.get("{{ route('personinvolves.index') }}" +'/' + resident_id +'/edit', function (data) {
                  $('.addVictim' + data.resident_id).trigger('click');
               })
             });

            // Adding Victims End

            // Adding Attackers
            var attackers_table = $('.attackers-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('personinvolves.index') }}",
                columns: [
                  {data: 'add_attacker', name: 'add_attacker', orderable: false, searchable: false},
                  {data: 'fullname', name: 'fullname', orderable: false, searchable: false},
                  { data: 'alias', name: 'alias'},
                  { data: 'firstname', name: 'firstname', visible: false},
                  { data: 'middlename', name: 'middlename', visible: false},
                  { data: 'lastname', name: 'lastname', visible: false}
                ]

            });

            $('body').on('click', '.addAttacker', function(){
               var resident_id = $(this).data('id');
               $.get("{{ route('personinvolves.index') }}" +'/' + resident_id +'/edit', function (data) {
                  $('.addAttacker' + data.resident_id).trigger('click');
               })
             });

            // Adding Attackers End

            // PersonInvolves End

            // Blotter and Narrative Report
            var table = $('.data-table').DataTable({
                processing: true,
                dom: 'lrtip',
                serverSide: true,
                ajax: "{{ route('blotters.index') }}",
                columns: [
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'blotter_id', name: 'blotter_id'},
                    {data: 'status', name: 'status'},
                    {   data: 'date_reported', name: 'date_reported'},
                    {  data: 'time_reported', name: 'time_reported'},
                    {   data: 'incident_type', name: 'incident_type'},
                    {     data: 'date_incident', name: 'date_incident'},
                    { data: 'time_incident', name: 'time_incident'}
                ]

            });


             $('#createNewBlotter').click(function () {
               $("#saveBtn").attr("disabled", false);
                 $('#saveBtn').val("create-blotter");
                 $('#blotter_id').val('');
                 $('#blotterform').trigger("reset");
                 $('#modelHeading').html("Create New Blotter");
                 $(document).find('span.error-text').text('');
                 $('#blottermodal').modal('show');
             });

             $('body').on('click', '.viewBlotter', function(){
               var blotter_id = $(this).data('id');
               $.get("{{ route('blotters.index') }}" +'/' + blotter_id +'/edit', function (data) {
                  $('#viewmodelHeading').html("View BLotter");
                  $('#status').html(data[0].status);
                  $('#viewblottermodal').modal('show');
                  $('#viewblotter_id').html(data[0].blotter_id);
                  $('#viewincident_location').html(data[0].incident_location);
                  $('#viewincident_type').html(data[0].incident_type);
                  $('#viewdate_incident').html(data[0].date_incident);
                  $('#viewtimeof_incident').html(data[0].time_incident);


                  $('#viewschedule_date').html(data[0].schedule_date);
                  // $('#viewschedule_time').html(data[0].schedule_time);
                  $('#viewincident_narrative').val(data[0].incident_narrative);

                  var len = data[1].length;
                  var tbody = ' <tbody class="blotter-list-data"></tbody>';
                  if(len > 0){
                     $('.blotter-list-data').remove();
                     $('#blotter_list-table').append(tbody);
                     for(var i = 0; i <len;i++){
                        var resident_id = data[1][i].resident_id;
                        var person_involve = data[1][i].person_involve;
                        var involvement_type = data[1][i].involvement_type;
                        var tr = '<tr>'
                        +'<td>'+ resident_id +'</td>'+
                        '<td>'+ person_involve +'</td>'+
                        '<td>'+ involvement_type +'</td>'+
                        '</tr>'
                     $('.blotter-list-data').append(tr);
                     }
                  }
                  else{
                     console.log("No BLotter Data Available");
                  }
               })
             });

             $('body').on('click', '.editBlotter', function () {
               var blotter_id = $(this).data('id');
               $(document).find('span.error-text').text('');
               $("#saveBtn").attr("disabled", false);
               $('#blotterform').trigger("reset");
               $.get("{{ route('blotters.index') }}" +'/' + blotter_id +'/edit', function (data) {
                  $('#modelHeading').html("Edit Blotter");
                  $('#saveBtn').val("edit-blotter");
                  $('#blottermodal').modal('show');
                  $('#blotter_id').val(data[0].blotter_id);
                  $('#incident_location').val(data[0].incident_location);
                  $('#incident_type').val(data[0].incident_type);
                  $('#date_incident').val(data[0].date_incident);
                  $('#time_incident').val(data[0].time_incident);
                  $('#date_reported').val(data[0].date_reported);
                  $('#time_reported').val(data[0].time_reported);
                  $('#schedule_date').val(data[0].schedule_date);
                  // $('#schedule_time').val(data.schedule_time);
                  $('input[name^="status"][value="'+data[0].status+'"').prop('checked',true);
                  $('#incident_narrative').val(data[0].incident_narrative);


                  var complainantLen = data[1].length;
                  for(var i=0;i<complainantLen; i++){
                     if(data[1][i].involvement_type == "Complainant" ){
                        $('.addComplainantp' + data[1][i].resident_id).prop('checked',true);
                        $('.addComplainant' + data[1][i].resident_id).prop('checked',true);
                     }
                  }

                  var respondentLen = data[1].length;
                  for(var i=0;i<respondentLen; i++){
                     if(data[1][i].involvement_type == "Respondent" ){
                        $('.addRespondentp' + data[1][i].resident_id).prop('checked',true);
                        $('.addRespondent' + data[1][i].resident_id).prop('checked',true);
                     }

                  }

                  var victimLen = data[1].length;
                  for(var i=0;i<victimLen; i++){
                     if(data[1][i].involvement_type == "Victim" ){
                        $('.addVictimp' + data[1][i].resident_id).prop('checked',true);
                        $('.addVictim' + data[1][i].resident_id).prop('checked',true);
                     }

                  }

                  var attackerLen = data[1].length;
                  for(var i=0;i<attackerLen; i++){
                     if(data[1][i].involvement_type == "Attacker" ){
                        $('.addAttackerp' + data[1][i].resident_id).prop('checked',true);
                        $('.addAttacker' + data[1][i].resident_id).prop('checked',true);
                     }

                  }
               })
            });

             $('#saveBtn').click(function (e) {

                e.preventDefault();
                $(this).attr("disabled", true);
                $.ajax({
                  data: $('#blotterform').serialize(),
                  url: "{{ route('blotters.store') }}",
                  type: "POST",
                  dataType: 'json',
                  beforeSend:function(){
                     $(document).find('span.error-text').text('');
                  },
                  success: function (data) {
                     if(data.status == 0){
                        // $('.incident_location_error').html("The incident location is required.");
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+'_error').text(val[0]);
                        });
                        $('#saveBtn').attr("disabled", false);
                     }
                     else{
                     $(document).find('span.error-text').text('');
                     $('#blotterform').trigger("reset");
                      $('#blottermodal').modal('hide');
                      $('.error-msgg').html("");
                      table.draw();
                     }
                  },
                  error: function (data) {
                      console.log('Error:', data);
                      $('#saveBtn').html('Save Changes');
                  }
              });
            });

            $('body').on('click', '.deleteBlotter', function () {

            var blotter_id = $(this).data("id");
            if(confirm("Are You sure want to delete !")){
               $.ajax({
                  type: "DELETE",
                  url: "{{ route('blotters.store') }}"+'/'+blotter_id,
                  success: function (data) {
                     table.draw();
                  },
                  error: function (data) {
                     console.log('Error:', data);
                  }
            });
            }


         });
               // Blotter and Narrative Report End

         });



         </script>







      </div>
   </div>
</div>













    </div>

@endsection


