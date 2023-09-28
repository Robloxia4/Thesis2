<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Account Setting</title>

    <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Footer-Clean.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/styles.css') }}>
</head>

<body style="margin: 0 0 100px;">
    <input type="hidden" id = "current_resident" data-id = {{ session("resident.id") }}>

    @include('inc.client_nav')

    <div style="margin-bottom: 227px;">
        <h1 class="m-3 mt-5 text-center">Edit Your Account Information</h1>

        <form id="resident_accountsetting_form" class="p-4">
            {{ csrf_field() }}
            <input type="hidden" name="resident_id" id="resident_id" value="{{ session("resident.id") }}">
            <input type="hidden" name="resident_email" id="resident_email" value="{{ session("resident.email") }}">
            <div class="rounded shadow-lg border border-secondary p-4" style="font-size: 20px">

                <div class="alert alert-success" id="success_msg">
                  
                </div>


                {{-- Basic info --}}
                <h2 style="color: rgb(3, 50, 112); ">Basic Info</h2><hr>
                {{-- 1st row --}}
                <div class="form-row p-3">
                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_firstname">First Name</label>
                        <input type="text" class="form-control" id="resident_accountsetting_firstname" name="resident_accountsetting_firstname" placeholder="N/A" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_lastname">Last Name</label>
                        <input type="text" class="form-control" id="resident_accountsetting_lastname" name="resident_accountsetting_lastname" placeholder="N/A" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_middlename">Midlle Name</label>
                        <input type="text" class="form-control" id="resident_accountsetting_middlename" name="resident_accountsetting_middlename" placeholder="N/A">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="resident_accountsetting_alias">Alias</label>
                        <input type="text" class="form-control" id="resident_accountsetting_alias" name="resident_accountsetting_alias" placeholder="N/A">
                    </div>
                </div>

                {{-- 2nd row --}}
                <div class="form-row p-3">

                    <div class="form-group col-md-5">
                        <label for="resident_accountsetting_birthday">Birthday</label>
                        <input type="date" id="resident_accountsetting_birthday" name="resident_accountsetting_birthday"  class="form-control ">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="resident_accountsetting_birthplace">Place of Birth</label>
                        <input type="text" id="resident_accountsetting_birthplace" name="resident_accountsetting_birthplace"  class="form-control " placeholder="Ex: Morong, Rizal">
                    </div>

                    <div class="form-group col-md-2 pl-2">
                        <label class="row pl-2" for="resident_accountsetting_age">Age </label>
                        <input type="text" id="resident_accountsetting_age" name="resident_accountsetting_age"  class="form-control " placeholder="Ex: 14">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="resident_accountsetting_gender">Gender</label>
                        <select class="form-control" id="resident_accountsetting_gender" name="resident_accountsetting_gender">
                            <option value="">-Select Gender-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="resident_accountsetting_height">Height</label>
                        <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="resident_accountsetting_height" id="resident_accountsetting_height" placeholder="N/A" value="0">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="resident_accountsetting_weight">Weight</label>
                        <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="resident_accountsetting_weight" id="resident_accountsetting_weight" placeholder="N/A" value="0">
                    </div>
                </div>

                {{-- 3rd row --}}
                <div class="form-row p-3">
                    <div class="col-md-6  form-group" >
                        <label for="resident_accountsetting_voterstatus">Voter Status</label>
                        <select class="form-control" id="resident_accountsetting_voterstatus" name="resident_accountsetting_voterstatus">
                            <option value="">-Select Voter Status-</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-md-6 item form-group">
                        <label for="resident_accountsetting_civilstatus">Civil Status</label>
                        <select class="form-control" name="resident_accountsetting_civilstatus" id="resident_accountsetting_civilstatus">
                            <option value="">-Select Marital Status-</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Divorced</option>
                        </select>

                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_citizenship">CitizenShip</label>
                        <input type="text" id="resident_accountsetting_citizenship" name="resident_accountsetting_citizenship" placeholder="Ex: Filipino"   class="form-control ">
                    </div>
                </div>

                {{-- 4th row --}}
                <div class="form-row p-3" >
                    <div class="col-sm-6 form-group" >
                        <label for="resident_accountsetting_telephone">Telephone</label>
                        <input type="text" class="form-control"   name="resident_accountsetting_telephone" id="resident_accountsetting_telephone" placeholder="Ex: 123-45-678" maxlength="8">
                        <span class="text-danger error_text resident_accountsetting_telephone_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="resident_accountsetting_mobile">Mobile</label>
                        <input type="text" class="form-control" name="resident_accountsetting_mobile" id="resident_accountsetting_mobile"  placeholder="Ex: 09166041823" value="" maxlength="11">
                        <span class="text-danger error_text resident_accountsetting_mobile_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="resident_accountsetting_address_1">Address 1 </label>
                        <textarea id="resident_accountsetting_address_1" name="resident_accountsetting_address_1" placeholder="Ex: P.O. Box 1201, Manila Central Post Office 1050 Manila"  class="form-control " rows="2" style="resize: none;"></textarea>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="resident_accountsetting_address_2">Address 2</label>
                        <textarea type="textbox" id="resident_accountsetting_address_2" name="resident_accountsetting_address_2" placeholder="Ex: P.O. Box 1121, Araneta Center Post Office 1135 Quezon City, Metro Manila"  class="form-control " rows="2" style="resize: none;"></textarea>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_area">Area</label><br>
                        <select name="resident_accountsetting_area" id="resident_accountsetting_area" class="form-control ">
                            <option value="">-Select Area-</option>
                            @if(count($area_setting) > 0)
                            @foreach ($area_setting as $area_setting)
                            <option value="{{  $area_setting->area }}" >{{ $area_setting->area }}</option>

                            @endforeach
                            @endif

                        </select>
                    </div>
                </div>

            </div>

            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 20px">
                {{-- Parents/Guardians/Spouse --}}
                <h2 style="color: rgb(3, 50, 112)">Parents/Guardians/Spouse</h2><hr>

                {{-- 1st row --}}
                <div class="form-row p-3">
                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_father">Father's Name</label>
                        <input type="text" class="form-control" name="resident_accountsetting_father" id="resident_accountsetting_father" placeholder="N/A">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_mother">Mother's Name</label>
                        <input type="text" class="form-control" name="resident_accountsetting_mother" id="resident_accountsetting_mother" placeholder="N/A">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_spouse">Spouse</label>
                        <input type="text" class="form-control" name="resident_accountsetting_spouse" id="resident_accountsetting_spouse" placeholder="N/A">
                    </div>

                </div>
            </div>

            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 20px">
                {{-- Social Welfare Services --}}
                <h2 style="color: rgb(3, 50, 112)">Social Welfare Services</h2><hr>

                <div class="form-row p-3">
                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_PAG_IBIG">PAG-IBIG</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  name="resident_accountsetting_PAG_IBIG" id="resident_accountsetting_PAG_IBIG" placeholder="Ex: 1234-5678-9101" maxlength = "14" value="">
                        <span class="text-danger error_text resident_accountsetting_PAG_IBIG_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_PHILHEALTH">PHILHEALTH</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="resident_accountsetting_PHILHEALTH" id="resident_accountsetting_PHILHEALTH" placeholder="Ex: 0028-1215160-9" maxlength = "14" value="">
                        <span class="text-danger error_text resident_accountsetting_PHILHEALTH_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_SSS">SSS</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="resident_accountsetting_SSS" id="resident_accountsetting_SSS" placeholder="Ex: 04-0751449-0"  maxlength = "10" value="">
                        <span class="text-danger error_text resident_accountsetting_SSS_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="resident_accountsetting_TIN">TIN</label>
                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="resident_accountsetting_TIN" id="resident_accountsetting_TIN" placeholder="Ex: 123-456-789-000" maxlength = "12" value="">
                        <span class="text-danger error_text resident_accountsetting_TIN_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                </div>
            </div>

            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 20px">
                {{-- Account --}}
                <h2 style="color: rgb(3, 50, 112)">Account</h2><hr>

                <div class="form-row p-3">
                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_username">Username</label>
                        <input type="text" id="resident_accountsetting_username" name="resident_accountsetting_username" value="" placeholder="Enter username" class="form-control ">
                        <span class="text-danger error_text resident_accountsetting_username_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_email">Email</label>
                        <input type="email" id="resident_accountsetting_email" name="resident_accountsetting_email"  placeholder="Ex: johnmark@gmail.com" class="form-control ">
                        <span class="text-danger error_text resident_accountsetting_email_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_newpassword">New password</label>
                        <input type="password" id="resident_accountsetting_newpassword" name="resident_accountsetting_newpassword"  placeholder="Enter new password" class="form-control " minlength="8">
                        <span class="text-danger error_text resident_accountsetting_newpassword_error" style="text-align:left;font-size:18px;" ></span>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="resident_accountsetting_newpassword_confirmation">Confirm new password</label>
                        <input type="password" id="resident_accountsetting_newpassword_confirmation" name="resident_accountsetting_newpassword_confirmation"  placeholder="Confirm your password" class="form-control " disabled>
                        <span class="text-danger error_text resident_accountsetting_newpassword_confirmation_error" style="text-align:left;font-size:18px;" ></span>
                    </div>
                </div>
            </div>

            {{-- confirmation --}}
            <div class="rounded shadow-lg border border-secondary p-4 mt-5" style="font-size: 30px">
                <div class="form-row  justify-content-around">
                    <h2 style="color: rgb(3, 50, 112)" class="col-12">Confirmation</h2><hr>
                    <input type="password" class="form-control col-8" id="resident_accountsetting_password" name="resident_accountsetting_password" placeholder="Enter password to save changes">
                    <input type="submit" class="btn btn-success col-2" id="resident_accountsetting_submit" name="resident_accountsetting_submit" value="Save Changes">
                </div>
                <div class="form-row  justify-content-around">
                    <span class="text-danger error_text resident_accountsetting_password_error col-8" style="text-align:left;font-size:18px;" ></span>
                    <div class="col-2"></div>
                </div>

            </div>

        </form>
        {{-- end of form --}}
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
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">Company Name © 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript">


       $(function() {
            //Global Varibles
            var current_id = $("#current_resident").data("id");
            showUserInfo(current_id);

            $("#success_msg").hide();

            //Ajax
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });

            function showUserInfo(id){
               $.get('/barangay' +'/' + id +'/edit', function (data) {
                    //Basic Info
                    $("#resident_accountsetting_firstname").val(data.firstname);
                    $("#resident_accountsetting_lastname").val(data.lastname);
                    $("#resident_accountsetting_middlename").val(data.middlename);
                    $("#resident_accountsetting_alias").val(data.alias);
                    $("#resident_accountsetting_birthday").val(data.birthday);
                    $("#resident_accountsetting_birthplace").val(data.birth_of_place);
                    $("#resident_accountsetting_age").val(data.age);
                    $("#resident_accountsetting_gender").val(data.gender);
                    $("#resident_accountsetting_height").val(data.height);
                    $("#resident_accountsetting_weight").val(data.weight);
                    $("#resident_accountsetting_voterstatus").val(data.voterstatus);
                    $("#resident_accountsetting_civilstatus").val(data.civilstatus);
                    $("#resident_accountsetting_citizenship").val(data.citizenship);

                    // telephone_no = data.telephone_no.replace(/(\d{3})(\d{2})(\d{3})/, "$1-$2-$3");
                    $("#resident_accountsetting_telephone").val(data.telephone_no);

                    $("#resident_accountsetting_mobile").val(data.mobile_no);

                    $("#resident_accountsetting_address_1").val(data.address_1);
                    $("#resident_accountsetting_address_2").val(data.address_2);
                    $("#resident_accountsetting_area").val(data.area);

                    //Parents/Guardians/Spouse
                    $("#resident_accountsetting_father").val(data.father);
                    $("#resident_accountsetting_mother").val(data.mother);
                    $("#resident_accountsetting_spouse").val(data.spouse);

                    //Social Welfare Services
                    $("#resident_accountsetting_PAG_IBIG").val(data.PAG_IBIG);
                    $("#resident_accountsetting_PHILHEALTH").val(data.PHILHEALTH);
                    $("#resident_accountsetting_SSS").val(data.SSS);
                    $("#resident_accountsetting_TIN").val(data.TIN);

                    //Account
                    $("#resident_accountsetting_username").val("{{ session('resident.username') }}");
                    $("#resident_accountsetting_email").val(data.email);
               })
            }

            $("#resident_accountsetting_newpassword").on("blur",  function() {

                if( $("#resident_accountsetting_newpassword").val() != null){
                    $("#resident_accountsetting_newpassword_confirmation").removeAttr("disabled");

                }

                if( $("#resident_accountsetting_newpassword").val() == ""){
                    $("#resident_accountsetting_newpassword_confirmation").attr('disabled', 'disabled');
                }

            });
            $("#resident_accountsetting_form").on('submit', function (e) {
               e.preventDefault();

               $.ajax({
                  type:"POST",
                  url:"{{ route('client_accountsetting_check') }}",
                  data: $("#resident_accountsetting_form").serialize(),
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
                        window.scrollTo(0, 0);
                        $("#success_msg").text(data.msg);
                        $("#success_msg").show();
                        showUserInfo(current_id);
                        $("#resident_accountsetting_form")[0].reset();
                        $("#resident_accountsetting_newpassword_confirmation").attr('disabled', 'disabled');
                        $("#navbar-firstname").html('<i class="fa fa-user" style="margin-right: 5px;"></i>' + data.firstname);
                        $(document).find('span.error_text').text("");
                     }
                  }
               });

            });

       }) // end of ready function

    </script>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script type="text/javascript" src=" {{ URL::asset('js/app.js') }}"></script>

<!---datatable-->


<script type="text/javascript" src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>



<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>

<!--pagination-->
<script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/pagination.min.js') }}"></script>
</html>
