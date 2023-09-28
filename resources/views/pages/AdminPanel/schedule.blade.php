

@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Settlement Schedule</h1>
</div>
<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="row " >
      <div class="col-sm-10 pl-3 pr-0 search-bars" >
         <!----------------
            EDIT HERE
            ---------------->
         <div class="tab-nav ">
            <button class="tablinks active" onclick="schedules(event, 'schedule') ">Scheduled Settlements</button>
            <button class="tablinks" onclick="schedules(event, 'unschedule')">Unscheduled Settlements</button>
            <button class="tablinks" onclick="schedules(event, 'schedule_today')">Schedules Today</button>
            <button class="tablinks" onclick="schedules(event, 'case')">Settled Cases</button>
         </div>
         <div class="topnav navbar-schedule display-flex-nav">
              <div class="search-container ">

                  <input class="global_filter "  id="global_filter" type="text" placeholder="Search..." name="search">
                  <button type="submit"><i class="fa fa-search"></i></button>

            </div>
         </div>

         <div class="modal fade" id="viewscheduledata" name="viewscheduledata" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="viewmodelHeading"></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>

                  <div class="modal-body">
                     <h6 id="blotterid_schedule"></h6>
                     <h6 id="schedule_data"></h6>
                     <h4>List of Person Involves</h4>
                     <div class="divv"></div>

                     <table id="blotter_list-table" class=" overflow-auto bulk_action dataTables_info table datatable-element table-striped jambo_table bulk_action text-center border no-footer">
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


                  </div>

                  <div class="modal-footer text-white">
                  </div>
               </div>
            </div>
         </div>

         <div class="modal fade" id="editscheduledata" name="editscheduledata" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="editmodelHeading"></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>

                  <div class="modal-body">
                     <h6 id="edit_blotterid_schedule"></h6>

                     <form id="blotterform"  name="blotterform" class="modal-input">
                        {{ csrf_field() }}

                           <input type="hidden" name="blotter_id" id="blotter_id">

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
                                <input type="date" id="date_reported"  name="date_reported" required="required" class="form-control ">
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
                                <input type="text" name="schedule" hidden>

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


                     <div class="item form-group" style="margin-top: 1rem;">
                        <div class="col-md-12 col-sm-12 offset-md-4">
                           <button type="submit" id="saveBtn" class="btn btn-success">Save</button>
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





         <div id="schedule" class="tabcontent overflow-auto ">







            <table class=" overflow-auto table dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border table_schedule">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

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


         </div>















         <div id="unschedule" class="tabcontent overflow-auto ">






            <table class="overflow-auto table dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border table_unschedule">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

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













         </div>








         <div id="schedule_today" class="tabcontent overflow-auto ">





            <table class="table overflow-auto dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border table_today">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

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









         </div>















         <div id="case" class="tabcontent overflow-auto ">










            <table class="table  overflow-auto dataTables_info datatable-element resident table-striped jambo_table bulk_action text-center border table_settled">
                <thead>
                   <tr class="headings">
                      <th class="column-title">Action</th>
                      <th class="column-title">Blotter Id </th>

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









         </div>
      </div>


 <!----------------

 NAKA PADDING ITO PAKI CENTER ALIGN
 --->





 <div class="col-sm-2 pl-2 pr-4 pt-2 pd-1 " >
    <div class="alert alert-primary alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center "><b>Settled Cases</b></h6>
<h1 class="num-align text-center"><b id="numberof_settled"></b></h1>
</div>

<div class="alert alert-success alert-size border border-secondary " role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Scheduled Cases</b></h6>
<h1 class="num-align text-center"><b id="numberof_scheduled"></b></h1>
</div>
<div class="alert alert-danger alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Unsettled Cases</b></h6>
<h1 class="num-align text-center"><b id="numberof_unsettleded"></b></h1>
</div>
<div class="alert alert-warning alert-size border border-secondary" role="alert">
<h6 class="border-bottom border-bot text-center schedule-align"><b>Unscheduled Cases</b></h6>
<h1 class="num-align text-center"><b id="numberof_unscheduled"></b></h1>


<script type="text/javascript">
   $(function () {

                  $.ajaxSetup({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
               });


               // Table Schedule

            var table_schedule = $('.table_schedule').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lrtip',
                ajax: "{{ route('schedules.index') }}",
                columns: [
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                  {data: 'blotter_id', name: 'blotter_id'},
                 {   data: 'date_reported', name: 'date_reported'},
                    {  data: 'time_reported', name: 'time_reported'},
                    {   data: 'incident_type', name: 'incident_type'},
                    {     data: 'date_incident', name: 'date_incident'},
                    { data: 'time_incident', name: 'time_incident'}
                ],
                drawCallback: function(){
                   var api = this.api();
                   $('#numberof_scheduled').html(api.rows().data().length)
                }

            });


            var table_unschedule = $('.table_unschedule').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lrtip',
                ajax: "{{ route('unschedules.index') }}",
                columns: [
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                  {data: 'blotter_id', name: 'blotter_id'},
                 {   data: 'date_reported', name: 'date_reported'},
                    {  data: 'time_reported', name: 'time_reported'},
                    {   data: 'incident_type', name: 'incident_type'},
                    {     data: 'date_incident', name: 'date_incident'},
                    { data: 'time_incident', name: 'time_incident'}
                ],
                drawCallback: function(){
                   var api = this.api();
                   var apiSchedule = table_schedule;
                   $('#numberof_unscheduled').html(api.rows().data().length)
                   $('#numberof_unsettleded').html(apiSchedule.rows().data().length + api.rows().data().length)
                }

            });


            var table_today = $('.table_today').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lrtip',
                ajax: "{{ route('scheduletoday.index') }}",
                columns: [
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                  {data: 'blotter_id', name: 'blotter_id'},
                 {   data: 'date_reported', name: 'date_reported'},
                    {  data: 'time_reported', name: 'time_reported'},
                    {   data: 'incident_type', name: 'incident_type'},
                    {     data: 'date_incident', name: 'date_incident'},
                    { data: 'time_incident', name: 'time_incident'}
                ]

            });


            var table_settled = $('.table_settled').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lrtip',
                ajax: "{{ route('settled.index') }}",
                columns: [
                  {data: 'action', name: 'action', orderable: false, searchable: false},
                  {data: 'blotter_id', name: 'blotter_id'},
                 {   data: 'date_reported', name: 'date_reported'},
                    {  data: 'time_reported', name: 'time_reported'},
                    {   data: 'incident_type', name: 'incident_type'},
                    {     data: 'date_incident', name: 'date_incident'},
                    { data: 'time_incident', name: 'time_incident'}
                ],
                drawCallback: function(){
                   var api = this.api();
                   $('#numberof_settled').html(api.rows().data().length)
                }

            });

            //Edit Schedule

            $('body').on('click', '.editSchedule', function() {
        var blotter_id = $(this).data('id');
         $(document).find('span.error-text').text('');
        $('#saveBtn').attr("disabled", false);

        $.get("{{ route('schedules.index') }}" +'/' + blotter_id +'/edit', function (data) {
         $('#editscheduledata').modal('show');
         $('#editmodelHeading').html("Edit BLotter");
         $('#edit_blotterid_schedule').html("BLotter ID " + data[0].blotter_id);

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
               });
        });

        $('#saveBtn').click(function (e) {
           $(this).attr("disabled", true);
                e.preventDefault();
                $.ajax({
                  data: $('#blotterform').serialize(),
                  url: "{{ route('schedules.store') }}",
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
                     $('#editscheduledata').modal('hide');
                      table_schedule.draw();
                      table_unschedule.draw();
                      table_today.draw();
                      table_settled.draw();
                     }
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
            });





// View Schedule
      $('body').on('click', '.viewSchedule', function() {
        var blotter_id = $(this).data('id');

        $.get("{{ route('schedules.index') }}" +'/' + blotter_id +'/edit', function (data) {
         $('#viewscheduledata').modal('show');
         $('#viewmodelHeading').html("View Schedule");
         $('#blotterid_schedule').html("BLotter ID " + data[0].blotter_id);
         $('#schedule_data').html("Schedule Date: " + data[0].schedule_date);

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
               });

        });

   });

</script>
</div>

 </div>














</div>
</div>

@endsection

