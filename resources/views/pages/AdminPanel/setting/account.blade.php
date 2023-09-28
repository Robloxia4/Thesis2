@extends('layouts.apps')
@section('content')

<input type="hidden" id="current_user" data-id = {{ session("user.id") }}  data-type = {{ session("user.type") }}>

<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Account</h1>
</div>

<div class="main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="col-sm-12 pl-0 pr-0 search-bars" >

      <!----------------
         EDIT HERE
         ---------------->

         {{-- - Tablink - --}}
         <div class="tab-nav ">
            <button class="tablinks active" onclick="schedules(event, 'schedule')">Account Setting</button>
            <button class="tablinks " id="tablink-create-account" onclick="schedules(event, 'create') ">Create Account</button>
            <button class="tablinks"  id="tablink-manage-account" onclick="schedules(event, 'manage')">Manage Account</button>
            <button class="tablinks"  id="tablink-manage-account" onclick="schedules(event, 'resident')">Manage Resident Account</button>
            <button class="tablinks" id="tablink-session-history" onclick="schedules(event, 'session')">Session History</button>
         </div>

         {{-- - Account Setting Tablink - --}}
         <div id="schedule" class="tabcontent">

            <div class="col-sm-12 pt-2">
               <!-----
                  START HERE
                  --->
               <h2 class="">My Account</h2>
                  <div class="container rounded-lg bg-dark col-8 p-3 m-3" style="margin-left:100px">
                     <h3 class="text-white">Customize information</h3>
                     <div class="containder  p-2">

                        {{-- Firstname --}}
                        <div class="row rounded-lg bg-white p-3 m-2">
                           <div class="col">
                              <p class="m-0"><b>FIRST NAME</b></p>
                              <p class="m-0" id="account_firstname">Account Firstname</p>
                           </div>
                           <div class="col align-self-center">
                              <button class="btn btn-dark float-right" id="firstname_edit">Edit</button>
                           </div>
                        </div>

                        {{-- Lastname --}}
                        <div class="row rounded-lg bg-white p-3 m-2">
                           <div class="col">
                              <p class="m-0"><b>LAST NAME</b></p>
                              <p class="m-0" id="account_lastname">Account Lastname</p>
                           </div>
                           <div class="col align-self-center">
                              <button class="btn btn-dark float-right" id="lastname_edit">Edit</button>
                           </div>
                        </div>

                        {{-- username --}}
                        <div class="row rounded-lg bg-white p-3 m-2">
                           <div class="col">
                              <p class="m-0"><b>USERNAME</b></p>
                              <p class="m-0" id="account_username">Account Username</p>
                           </div>
                           <div class="col align-self-center">
                              <button class="btn btn-dark float-right " id="username_edit">Edit</button>
                           </div>
                        </div>
                        {{-- email --}}
                           <div class="row rounded-lg bg-white p-3 m-2">
                              <div class="col">
                                 <p class="m-0"><b>EMAIL</b></p>
                                 <p class="m-0" id="account_email">Account Email</p>
                              </div>
                              <div class="col align-self-center">
                                 <button class="btn btn-dark float-right" id="email_edit">Edit</button>
                              </div>
                        </div>
                        {{-- phone number
                           <div class="row rounded-lg bg-white p-3 m-2">
                              <div class="col">
                                 <p class="m-0"><b>PHONE NUMBER</b></p>
                                 <p class="m-0">Account Phone Number</p>
                              </div>
                              <div class="col align-self-center">
                                 <button class="btn btn-dark float-right" id="phonenumber_edit">Edit</button>
                              </div>
                        </div> --}}
                        {{-- password --}}
                        <div class="row rounded-lg bg-white p-3 m-2">
                           <div class="col align-self-center">
                              <p class="m-0"><b>PASSWORD</b></p>
                           </div>
                           <div class="col align-self-center">
                              <button class="btn btn-dark float-right" id="password_edit">Change Pasword</button>
                           </div>
                     </div>
                  </div>
               </div>
                  <!-----
                     END HERE
                     --->
            </div>

            {{-- - Account Setting Tablink Modal - --}}
            <div class="container">
               <!-- Trigger the modal with a button -->
               {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#account_settings_modal">Open Large Modal</button> --}}

               <div class="modal fade " id="account_settings_modal" role="dialog">
                  <div class="modal-dialog modal-lg ">
                     <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                           <h4 class="modal-title ">Change Account Settings</h4>
                           <button type="button" class="close text-white" data-dismiss="modal" >&times;</button>
                        </div>
                        <div class="modal-body">
                           <form id="account_settings_form" name="account_settings_form" class="form-horizontal m-2">
                              {{-- hidden var --}}
                              <input type="text" name="current_id" id="current_id" hidden>
                              <input type="text" name="table_edit" id="table_edit" hidden>

                              {{-- Label 1 --}}
                              <div class="form-group row p-2">
                                 <label for="new_input_modal" id="modal_label1"  class="font-weight-bold">Label1</label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control font-weight-bold" id="new_input_modal" name="new_input_modal">
                                    <span class="text-danger error_text new_input_modal_error new_input_email_modal_error new_input_username_modal_error"></span>
                                 </div>
                              </div>

                              {{-- Label 3 // this only show when password is being change --}}
                              <div class="form-group row p-2" id="password_edit_modal">
                                 <label for="current_password_modal_confirmation" id="modal_label2" class="font-weight-bold">CONFIRM NEW PASSWORD</label>
                                 <div class="col-sm-12">
                                    <input type="password" id="current_password_modal_confirmation" name="current_password_modal" placeholder="Confirm New Password" class="form-control ">
                                    <span class="text-danger error_text current_password_modal_confirmation_error"></span>
                                 </div>
                              </div>

                              {{-- Label 2 --}}
                              <div class="form-group row p-2">
                                 <label for="current_password_modal" id="modal_label2" class="font-weight-bold">CURRENT PASSWORD</label>
                                 <div class="col-sm-12">
                                    <input type="password" id="current_password_modal" name="current_password_modal" placeholder="Enter Password to save changes" class="form-control ">
                                    <span class="text-danger error_text current_password_modal_error"></span>
                                 </div>
                              </div>


                              <div class="form-group">
                                 <button type="submit" class="btn btn-primary float-right" id="saveBtn" value="create" >Save changes
                                 </button>
                              </div>
                           </form>

                   </div>
                 </div>
               </div>
             </div>
            </div>
         </div>
      <br>

               {{-- - Create Account Tablink - --}}

               <div id="create" class="tabcontent">

                  <div class="row">
                     <div class="col-md-12 order-md-1 d-flex justify-content-center pt-4" >
                        {{-- ------------------------------------------------- form ------------------------------------------------------ --}}
                        <form class="needs-validation" novalidate="" id="create_account_form">
                           <div class="row">

                              {{-- firstname --}}
                              <div class="col-md-6 mb-3">
                                 <label for="firstname">First name</label>
                                 <input type="text" class="form-control" name="create_account_form_firstname" id="create_account_form_firstname" placeholder="Enter First Name">
                                 <span class="text-danger error_text create_account_form_firstname_error"></span>
                              </div>

                              {{-- lastname --}}
                              <div class="col-md-6 mb-3">
                                 <label for="create_account_form_lastname">Last name</label>
                                 <input type="text" class="form-control" name="create_account_form_lastname" id="create_account_form_lastname" placeholder="Enter Last Name" >
                                 <span class="text-danger error_text create_account_form_lastname_error"></span>
                              </div>
                           </div>

                           {{-- username --}}
                           <div class="mb-3">
                              <label for="create_account_form_username">Username</label>
                              <div class="input-group">
                                 <input type="text" class="form-control" name="create_account_form_username" id="create_account_form_username" placeholder="Enter Username">
                                 <span class="text-danger error_text create_account_form_username_error"></span>
                              </div>
                           </div>
                           {{-- email --}}
                           <div class="mb-3">
                              <label for="create_account_form_email">Email</label>
                              <input type="email" class="form-control" name="create_account_form_email" id="create_account_form_email" placeholder="you@example.com">
                              <span class="text-danger error_text create_account_form_email_error"></span>
                           </div>
                           {{-- password --}}
                           <div class="mb-3">
                              <label for="create_account_form_password">Password</label>
                              <input type="password" class="form-control" name="create_account_form_password" id="create_account_form_password" placeholder="Enter password">
                              <span class="text-danger error_text create_account_form_password_error"></span>
                           </div>
                           {{-- verify password --}}
                           <div class="mb-3">
                              <label for="create_account_form_verify_password">Verify Password</label>
                              <input type="password" class="form-control" name="create_account_form_verify_password" id="create_account_form_verify_password" placeholder="Verify password">
                              <span class="text-danger error_text create_account_form_verify_password_error"></span>
                           </div>

                           {{-- type --}}
                           <div class="mb-3">
                              <label for="create_account_form_type">Select user type:</label>
                              <select class="form-control" id="create_account_form_type" name="create_account_form_type">
                                <option>Encoder</option>
                                <option>Admin</option>
                              </select>
                           </div>

                           <hr class="mb-4">
                           <div class="text-center button-center d-flex justify-content-center">
                              {{-- submit --}}
                              <button id="submitBtn" name="" class="btn btn-success col-sm-3 text-center btn-lg btn-block" type="submit">Submit</button>
                              {{-- reset --}}
                              <button id="resetBtn" name="" class="btn btn-primary col-sm-3 text-center btn-lg btn-block center-button" style="margin-top: 0px;"  type="reset">Reset</button>
                           </div>
                        </form>
                        {{-- ------------------------------------------------- form ------------------------------------------------------ --}}
                     </div>
                  </div>

               </div>

            {{-- - Manage Account Tablink - --}}
            <div id="manage" class="tabcontent">
               <div class="row ">
                  <div class="col-sm-12 pl-3 ">
                     <form id="manage_account_form">
                        <div class="row">
                           <div class="col-sm-6">
                              <input type="hidden" name="id" id="manage_account_id" value="" >
                              <div class="form-group row">
                                 {{-- Username --}}
                                 <label for="manage_account_username"  class="col-sm-3 col-form-label">Username</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="manage_account_username" id="manage_account_username" placeholder="Select User" value="" readonly>
                                    <span class="text-danger error_text manage_account_username_error"></span>
                                 </div>
                              </div>
                              {{-- New Password --}}
                              <div class="form-group row">
                                 <label for="manage_account_new_password" class="col-sm-3 col-form-label">New Password</label>
                                 <div class="col-sm-9">
                                    <input type="password" name="manage_account_new_password" class="form-control" id="manage_account_new_password" placeholder="Enter New Password" value="">
                                    <span class="text-danger error_text manage_account_new_password_error"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              {{-- Confirm Password --}}
                              <div class="form-group row">
                                 <label for="manage_account_confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
                                 <div class="col-sm-9">
                                    <input type="password" name="manage_account_confirm_password" class="form-control" id="manage_account_confirm_password" placeholder="Confirm Password" value="">
                                    <span class="text-danger error_text manage_account_confirm_password_error"></span>
                                 </div>
                              </div>
                              
                              <div class="col-sm-12 pl-0 pr-0  ">
                                 <div class="form-group text-right ">
                                    <button type="submit" id="changepasswordBtn"class="btn btn-success account-button " disabled><b>Change Password</b></button>
                                    
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                     </form>
                     <div class="border-buttom border-bot pl-3 pr-3">
                     </div>
                     
                     
                     <div class="col-sm-12 overflow-auto  pt-2">
                        
                        
                        
                        <table id="manage-account-table" class="bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer" >
                           <thead>
                              <tr class="headings">
                                 <th class="column-title">Action</th>
                                 <th class="column-title" hidden>Id</th>
                                 <th class="column-title">Last Name</th>
                                 <th class="column-title">First Name </th>
                                 <th class="column-title">Username</th>
                                 <th class="column-title">Email</th>
                                 <th class="column-title">Type</th>
                                 
                                 
                              </tr>
                           </thead>
                           <tbody>
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

            {{-- - Manage Resident Account Tablink - --}}
            <div id="resident" class="tabcontent">
               <div class="row ">
                  <div class="col-sm-12 pl-3 ">
                     <form id="manage_resident_account_form">
                        <div class="row">
                           <div class="col-sm-6">
                              <input type="hidden" name="manage_resident_account_id" id="manage_resident_account_id" value="" >
                              <div class="form-group row">
                                 {{-- Username --}}
                                 <label for="manage_resident_account_username"  class="col-sm-3 col-form-label">Username</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="manage_resident_account_username" id="manage_resident_account_username" placeholder="Select User" value="" readonly>
                                    <span class="text-danger error_text manage_resident_account_username_error"></span>
                                 </div>
                              </div>
                              {{-- New Password --}}
                              <div class="form-group row">
                                 <label for="manage_resident_account_new_password" class="col-sm-3 col-form-label">New Password</label>
                                 <div class="col-sm-9">
                                    <input type="password" name="manage_resident_account_new_password" class="form-control" id="manage_resident_account_new_password" placeholder="Enter New Password" value="">
                                    <span class="text-danger error_text manage_resident_account_new_password_error"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              {{-- Confirm Password --}}
                              <div class="form-group row">
                                 <label for="manage_resident_account_confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
                                 <div class="col-sm-9">
                                    <input type="password" name="manage_resident_account_confirm_password" class="form-control" id="manage_resident_account_confirm_password" placeholder="Confirm Password" value="">
                                    <span class="text-danger error_text manage_resident_account_confirm_password_error"></span>
                                 </div>
                              </div>
                              
                              <div class="col-sm-12 pl-0 pr-0  ">
                                 <div class="form-group text-right ">
                                    <button type="submit" id="resident_changepasswordBtn"class="btn btn-success account-button " disabled><b>Change Password</b></button>
                                    
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                     </form>
                     <div class="border-buttom border-bot pl-3 pr-3">
                     </div>
                     
                     
                     <div class="col-sm-12 overflow-auto  pt-2">
                        
                        
                        
                        <table id="manage-resident-account-table" class="bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer" >
                           <thead>
                              <tr class="headings">
                                 <th class="column-title">Action</th>
                                 <th class="column-title" hidden>Id</th>
                                 <th class="column-title">Last Name</th>
                                 <th class="column-title">First Name </th>
                                 <th class="column-title">Username</th>
                                 <th class="column-title">Email</th>
                              </tr>
                           </thead>
                           <tbody>
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

            {{-- - Session History Tablink - --}}

            <div id="session" class="tabcontent">
               <div class="topnav navbar ">
                  <button class="btn btn-primary text-white " href="#home">Clear</button>
                  <div class="search-container">

                     <input class="global_filter" type="text" id="global_filter"   placeholder="Search..." name="search">
                     <button type="submit"><i class="fa fa-search"></i></button>

                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">



                     <div class="col-sm-12 overflow-auto pt-3 ">





                        <table class="dataTables_info table datatable-element  resident table-striped jambo_table bulk_action text-center border session_history_table">
                           <thead>
                              <tr class="headings">
                                 <th class="column-title" hidden >session_id </th>
                                 <th class="column-title" hidden >user_id </th>
                                 <th class="column-title">Username </th>
                                 <th class="column-title">Login At </th>


                              </th>
                              <th class="bulk-actions" hidden colspan="7">
                                 <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                           </tr>
                        </thead>
                        <tbody>


                           {{-- @if(count($sessions) > 0)
                              @foreach ($sessions as $sessions)



                              <tr class="even pointer">
                                 <td class=" " hidden>{{ $sessions->session_id }}</td>
                                 <td class=" " hidden>{{ $sessions->user_id }}</td>
                                 <td class=" ">{{ $sessions->username }} </td>
                                 <td class=" ">{{ $sessions->login_at }}</td>
                              </tr>
                              @endforeach
                              @endif
                               --}}
                           </tbody>
                        </table>

                     </div>
                  </div>

               </div>
            </div>


         </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

      <script type="text/javascript">
         $(function() {

            //Global varibles
            var current_id = $("#current_user").data("id");
            var user_type = $("#current_user").data("type");

            var isFirstname = false;
            showUserInfo(current_id);
            
            //Hide Navlink
            if(user_type == "Encoder"){
            $("#tablink-create-account").hide();
            $("#tablink-manage-account").hide();
            $("#tablink-session-history").hide();
            }



            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });

            //Table on Manage Account
            var table = $("#manage-account-table").DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('account.index') }}",
               columns: [
               {data: 'action', name: 'action', orderable: false, searchable: true},
               {data: 'account_id', name: 'account_id', visible:false , searchable: false},
               {data: 'first_name', name: 'manage_account_form_firstname', orderable: false, searchable: true},
               {data: 'last_name', name: 'manage_account_form_lastname', orderable: false, searchable: true},
               {data: 'username', name: 'manage_account_form_username', orderable: false, searchable: true},
               {data: 'email', name: 'manage_account_form_email', orderable: false, searchable: true},
               {data: 'type', name: 'manage_account_form_type', orderable: false, searchable: true},
               ]

            });

               //Table on Manage Resident Account
               var table = $("#manage-resident-account-table").DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('ResidentAccountTable') }}",
               columns: [
               {data: 'action', name: 'action', orderable: false, searchable: true},
               {data: 'resident_account_id', name: 'resident_account_id', visible:false , searchable: false},
               {data: 'first_name', name: 'manage_resident_account_form_firstname', orderable: false, searchable: true},
               {data: 'last_name', name: 'manage_resident_account_form_lastname', orderable: false, searchable: true},
               {data: 'username', name: 'manage_resident_account_form_username', orderable: false, searchable: true},
               {data: 'email', name: 'manage_resident_account_form_email', orderable: false, searchable: true},
               ]

            });

               //Table on sessionTable
               var sessionTable = $(".session_history_table").DataTable({
               processing: true,
               dom: 'lrtip',
               serverSide: true,
               ajax: "/setting/account/session/table",
               columns: [
               {data: 'session_id', name: 'session_id', visible:false},
               {data: 'user_id', name: 'user_id', visible:false},
               {data: 'username', name: 'username',  orderable: false},
               {data: 'login_at', name: 'login_at', orderable: true},
               ]

            });

            //Select Button
            $('body').on('click', '#selectBtn', function () {
               var id = $(this).data('id');
               var username = $(this).data('username');
               $("#changepasswordBtn").removeAttr("disabled");

               $("#manage_account_id").val(id);

               $("#manage_account_username").val(username);
            });

            //Resident Select Button
            $('body').on('click', '#residentSelectBtn', function () {
               var id = $(this).data('id');
               var username = $(this).data('username');
               $("#resident_changepasswordBtn").removeAttr("disabled");

               $("#manage_resident_account_id").val(id);

               $("#manage_resident_account_username").val(username);
            });

            //Edit
            $('#manage_account_form').on('submit', function (e) {
               e.preventDefault();
               var id = $("#manage_account_id").val();

               if(confirm("Are you sure want to change password!?"))
               {
                  $.ajax({
                  type: "PATCH",
                  url: "{{ route('account.index') }}"+'/'+id,
                  data: $('#manage_account_form').serialize(),
                  dataType: 'json',

                  beforeSend:function(){
                     $(document).find('span.error_text').text('');
                  },

                  success: function (data) {
                     if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+"_error").text(val[0]);
                        });
                     }
                     else{
                        $("#manage_account_form")[0].reset();
                        $("#changepasswordBtn").attr("disabled", true);
                        alert(data.msg);
                        table.draw();
                     }
                  }

                });
               }

            });

            // Resident Edit
            $('#manage_resident_account_form').on('submit', function (e) {
               e.preventDefault();
               var id = $("#manage_resident_account_id").val();

               if(confirm("Are you sure want to change password!?"))
               {
                  $.ajax({
                  type: "PATCH",
                  url: "/setting/account/resident_account"+'/'+ id,
                  data: $('#manage_resident_account_form').serialize(),
                  dataType: 'json',

                  beforeSend:function(){
                     $(document).find('span.error_text').text('');
                  },

                  success: function (data) {
                     if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+"_error").text(val[0]);
                        });
                     }
                     else{
                        $("#manage_resident_account_form")[0].reset();
                        $("#resident_changepasswordBtn").attr("disabled", true);
                        alert(data.msg);
                        table.draw();
                     }
                  }

                });
               }

            });

            //Delete
            $('body').on('click', '#deleteBtn', function () {

               var id = $(this).data("id");

               if(id == $("#current_user").data('id')){
                  alert("You cannot delete your own account!!")
               }
               else
               {
                  if(confirm("Are you sure want to delete this account!?"))
                  {
                     $.ajax({
                        type: "DELETE",
                        url: "{{ route('account.index') }}"+'/'+id,

                        success: function (data) {
                           table.draw();
                           sessionTable.draw();
                           alert(data.success);
                        },
                        error: function (data) {
                           console.log('Error:', data);
                        }
                      });
                  }
               }
            });

            //Resident Delete
            $('body').on('click', '#residentDeleteBtn', function () {
               
               var id = $(this).data("id");
               
               if(confirm("Are you sure want to delete this account!?"))
               {
                  $.ajax({
                     type: "DELETE",
                     url: "/setting/account/resident_account"+'/'+id,
                     
                     success: function (data) {
                        table.draw();
                        sessionTable.draw();
                        alert(data.success);
                     },
                     error: function (data) {
                        console.log('Error:', data);
                     }
                  });
               }
               
            });

            //Create Account
            $("#create_account_form").on('submit', function (e) {
               e.preventDefault();

               $.ajax({
                  type:"post",
                  url:"{{ route('account.store') }}",
                  data:new FormData(this),
                  dataType:"json",
                  processData:false,
                  contentType:false,
                  beforeSend:function(){
                     $(document).find('span.error_text').text('');
                  },
                  success: function (data) {
                     if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+"_error").text(val[0]);
                        });
                     }
                     else{
                        $("#create_account_form")[0].reset();
                        alert(data.msg);
                        table.draw();
                     }
                  }
               });

            });

            //Create Account Reset Button
            $("#resetBtn").click(function (e) {
               $(document).find('span.error_text').text('');

            });

            //Account Setting show info function
            function showUserInfo(id){
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $("#account_firstname").text(data.first_name);
                  $("#account_lastname").text(data.last_name);
                  $("#account_username").text(data.username);
                  $("#account_email").text(data.email);
               })
            }

            //Hidding label 3 for Account Setting Modal
            $("#password_edit_modal").hide();

            //On modal close
            $("#account_settings_modal").on("hidden.bs.modal", function () {
               $("#account_settings_form")[0].reset();
               $(document).find('span.error_text').text('');
               $("#password_edit_modal").hide();
               $("#new_input_modal").attr("name","new_input_modal");
               $("#current_password_modal_confirmation").attr("name","current_password_modal");
               $("#new_input_modal").attr("type","text");

               isFirstname = false;
            });

            // Modal for firstname edit
            $('body').on('click', '#firstname_edit', function () {
               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data)
               {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW FIRST NAME");
                  $("#new_input_modal").val(data.first_name);

                  $('#current_id').val(id);
                  $('#table_edit').val("firstname");

                  isFirstname = true;
               })
            });

            // Modal for Lastname edit
            $('body').on('click', '#lastname_edit', function () {

               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW LAST NAME");
                  $("#new_input_modal").val(data.last_name);

                  $('#current_id').val(id);
                  $('#table_edit').val("lastname");
               })
            });

            //Modal for username edit
            $('body').on('click', '#username_edit', function () {
               var id = current_id;  // var id =  $(this).data('id');
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
               $('#account_settings_modal').modal('toggle');
               $("#account_settings_modal").show();

               $('#modal_label1').text("NEW USERNAME");
               $("#new_input_modal").val(data.username);

               $("#new_input_modal").attr("name","new_input_username_modal");

               $('#current_id').val(id);
               $('#table_edit').val("username");
            })
         });
            // Modal for email edit
            $('body').on('click', '#email_edit', function () {

               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW EMAIL");
                  $("#new_input_modal").val(data.email);

                  $("#new_input_modal").attr("name","new_input_email_modal");

                  $('#current_id').val(id);
                  $('#table_edit').val("email");
               })
            });

             // Modal for phone number edit
            // $('body').on('click', '#phonenumber_edit', function () {

            //    var id = current_id;
            //    $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
            //       $('#account_settings_modal').modal('toggle');
            //       $("#account_settings_modal").show();

            //       $('#modal_label1').text("NEW PHONENUMBER");
            //       $("#new_input_modal").val("Wala pang phone number hehe");
            //    })

            // });

            // Modal for password edit
            $('body').on('click', '#password_edit', function () {

               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW PASSWORD");
                  $("#new_input_modal").attr("placeholder", "Enter new password");

                  $('#current_id').val(id);
                  $('#table_edit').val("password");


                  $("#new_input_modal").attr("type","password");
                  $("#current_password_modal_confirmation").attr("name","current_password_modal_confirmation");
                  $("#password_edit_modal").show();
               })
           });

         //Modal on submit
         $("#account_settings_form").on('submit', function (e) {
               e.preventDefault();

               $firstname = $("#new_input_modal").val();

               $.ajax({
                  type:"post",
                  url:"{{ route("accountSettingCheck") }}",
                  data: $("#account_settings_form").serialize(),
                  dataType:"json",
                  beforeSend:function(){
                     $(document).find('span.error_text').text('');
                  },
                  success: function (data) {
                     if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+"_error").text(val[0]);
                        });
                     }
                     else{
                        $('#account_settings_modal').modal('hide');
                        table.draw();
                        sessionTable.draw();
                        alert(data.msg);
                        showUserInfo(current_id);
                        $("#account_settings_form")[0].reset();
                        $(document).find('span.error_text').text('');

                        if(isFirstname == true){
                           $('#firstname_topnav').html('Welcome, ' + $firstname)
                        }
                     }
                  }
               });

            });

      });

      </script>
      @endsection

















