

@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Resident Information</h1>
</div>
<div class="Resident-Content main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="col-sm-12 pl-0 pr-0 search-bars" >
      <div class="topnav navbar navbar">
          <div>
         <button id="createresident" class="btn btn-success text-white " data-toggle="modal" data-target="#residentmodal">New Resident <i class="fa fa-plus"></i></button>
         <button id="bulkdelete" class="btn btn-danger text-white " style="margin-left:2px;" > <i class="fa fa-trash"></i></button>
          </div>


         <div class="modal fade" id="residentmodal" name="residentmodal" tabindex="-1" role="dialog" aria-labelledby="resident-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modelHeading"></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>

                  <div class="modal-body">
                     <form id="residentform"  class="modal-input">
                        {{ csrf_field() }}
                        <input type="hidden" name="resident_id" id="resident_id">
                        <div class="row">
                            <div class="col-sm-6">





                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Last Name</label>
                              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Ex: Mata" value="" required="">
                              <span id="lastname_err" class="text-danger error-text lastname_err"></span>
                            </div>
                            <div class="col-sm-6 ">
                              <label >First Name</label>
                              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Ex: John Mark" value="" required="">
                              <span id="firstname_err" class="text-danger error-text firstname_err"></span>
                            </div>
                          </div>

                          <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Middle Name</label>
                              <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Ex: Panlilio" value="" required="">
                              <span id="middlename_err" class="text-danger error-text middlename_err"></span>
                            </div>
                            <div class="col-sm-6 ">
                              <label >Alias</label>
                              <input type="text" class="form-control" name="alias" id="alias" placeholder="Ex: JM" value="" required="">
                              <span id="alias_err" class="text-danger error-text alias_err"></span>
                            </div>
                          </div>





                          <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Birthday</label>
                              <input type="date" id="birthday" name="birthday" required="required" class="form-control ">
                              <span id="birthday_err" class="text-danger error-text birthday_err"></span>
                            </div>
                            <div class="col-sm-6 ">
                              <label >Age</label>
                              <br>
                              <select name="age" id="selectAge" style="height:38px; width: 100%">
                                <option value="">-Select Age-</option></select>

                            </div>
                            <span id="age_err" class="text-danger error-text age_err"></span>
                          </div>










                         <div class="item form-group">
                            <label class="col-form-label col-md-5 col-sm-5 label-align" for="first-name">Birth of Place
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="birthplace" name="birthplace" placeholder="Ex: Morong, Rizal"   required="required" class="form-control ">
                               <span id="birthplace_err" class="text-danger error-text birthplace_err"></span>
                            </div>
                         </div>


                         <div class="item form-group border solid " style="margin-left: 15px;margin-right: 15px;">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gender
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                                <input type="radio" id="male" name="gender" value="Male">
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" value="Female">
                                <label for="female">Female</label><br>    </div>
                                <span id="gender_err" class="text-danger error-text gender_err"></span>
                         </div>





                         <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6 item form-group" >
                                <label >Voter Status</label>
                                <br>
                                <select name="voterstatus" id="voterstatus" style="height:38px; width: 100%">
                                <option value="">-Select Voter Status-</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>

                              </select>
                              <span id="voterstatus_err" class="text-danger error-text voterstatus_err"></span>
                            </div>
                            <div class="col-sm-6 item form-group">
                              <label >Civil Status</label>
                              <br>
                              <select name="civilstatus" id="civilstatus" style="height:38px; width: 100%">
                              <option value="">-Select Marital Status-</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Widowed">Widowed</option>
                              <option value="Separated">Separated</option>
                              <option value="Divorced">Divorced</option>
                            </select>
                            <span id="civilstatus_err" class="text-danger error-text civilstatus_err"></span>
                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">CitizenShip
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="citizenship" name="citizenship" placeholder="Ex: Filipino"  required="required" class="form-control ">
                               <span id="citizenship_err" class="text-danger error-text citizenship_err"></span>
                            </div>
                         </div>




                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                           <div class="col-sm-6" >
                             <label >Telephone</label>
                             <input type="text" class="form-control"   name="telephone" id="telephone" placeholder="Ex: 123-45-678"  value="" required="">
                             <span id="telephone_err" class="text-danger error-text telephone_err"></span>
                           </div>
                           <div class="col-sm-6 ">
                             <label >Mobile</label>
                             <input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Ex: 09166041823" value="" required="">
                             <span id="mobile_err" class="text-danger error-text mobile_err"></span>
                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Area
                           </label>
                           <div class="col-md-12 col-sm-12 ">
                              <select name="area" id="area" style="height:38px; width: 100%">
                                 <option value="">-Select Area-</option>
                                 @if(count($area_setting) > 0)
                                 @foreach ($area_setting as $area_setting)
                                 <option value="{{  $area_setting->area}}" >{{ $area_setting->area }}</option>


                                 @endforeach
                                 @endif


                               </select>
                               <span id="area_err" class="text-danger error-text area_err"></span>
                              </div>
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Height</label>
                              <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="height" id="height" placeholder="" value="0" required="">
                              <span id="height_err" class="text-danger error-text height_err"></span>
                            </div>
                            <div class="col-sm-6 ">
                              <label >Weight</label>
                              <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="weight" id="weight" placeholder="" value="0" required="">
                              <span id="weight_err" class="text-danger error-text weight_err"></span>
                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="email" id="email" name="email" required="required" placeholder="Ex: johnmark@gmail.com" class="form-control ">
                               <span id="email_err" class="text-danger error-text email_err"></span>
                            </div>
                         </div>







                          <div class="row" style="margin-left: 0px;margin-right: 0px;">
                           <div class="col-sm-6" >
                             <label >PAG-IBIG</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  name="PAG_IBIG" id="PAG_IBIG" placeholder="Ex: 1234-5678-9101" maxlength = "14" value="" required="">
                             <span id="PAG_IBIG_err" class="text-danger error-text PAG_IBIG_err"></span>
                           </div>
                           <div class="col-sm-6 ">
                             <label >PHILHEALTH</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="PHILHEALTH" id="PHILHEALTH" placeholder="Ex: 0028-1215160-9" maxlength = "14" value="" required="">
                             <span id="PHILHEALTH_err" class="text-danger error-text PHILHEALTH_err"></span>
                           </div>
                         </div>


                         <div class="row" style="margin-left: 0px;margin-right: 0px;">
                           <div class="col-sm-6" >
                             <label >SSS</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="SSS" id="SSS" placeholder="Ex: 04-0751449-0"  maxlength = "12" value="" required="">
                             <span id="SSS_err" class="text-danger error-text SSS_err"></span>
                           </div>
                           <div class="col-sm-6 ">
                             <label >TIN</label>
                             <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="TIN" id="TIN" placeholder="Ex: 123-456-789-000" maxlength = "15" value="" required="">
                             <span id="TIN_err" class="text-danger error-text TIN_err"></span>
                           </div>
                         </div>







                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Spouse
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="spouse" name="spouse" required="required" placeholder="N/A" class="form-control ">
                               <span id="spouse_err" class="text-danger error-text spouse_err"></span>
                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Father
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="father" name="father" placeholder="N/A" required="required" class="form-control ">
                               <span id="father_err" class="text-danger error-text father_err"></span>
                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mother
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="mother" name="mother" required="required" value="" placeholder="N/A" class="form-control ">
                               <span id="mother_err" class="text-danger error-text mother_err"></span>
                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 1
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="address_1" name="address_1" placeholder="Ex: P.O. Box 1201, Manila Central Post Office
                               1050 Manila" required="required" class="form-control ">
                               <span id="address_1_err" class="text-danger error-text address_1_err"></span>

                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 2
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="address_2" name="address_2" placeholder="Ex: P.O. Box 1121, Araneta Center Post Office
                               1135 Quezon City, Metro Manila" required="required" class="form-control ">
                               <span id="address_2_err" class="text-danger error-text address_2_err"></span>
                            </div>
                         </div>
                    </div>


                <!----------------
                -->
                    </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                           <div class="col-md-12 col-sm-12 offset-md-4">
                              <button type="submit" id="submit" class="btn btn-success resident-button">Submit</button>
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
         <div class="search-container">
            <input class="global_filter" type="text" id="global_filter" placeholder="Search..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
         </div>
      </div>
      <div class=" col-sm-12 text-left h-100  pr-0 pl-0 pt-2 pb-2 text-white" >
         <div class="row pl-4 pr-4   ">
            <div class="col-sm-12 border border-bot ">
            </div>
         </div>
         <div class="row pt-4 pl-4 pr-4">
            <div  class=" col-sm-12 overflow-auto display-nones ">
               <table   class=" bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer">
                  <thead>
                     <tr class="headings">
                        <th >
                            <input class="icheckbox_flat-green" type="checkbox"   id="check-all" >

                          </th>
                        <th class="column-title">Action</th>
                        <th class="column-title">Resident_ID</th>
                        <th class="column-title">Last Name </th>
                        <th class="column-title">First Name </th>
                        <th class="column-title">Middle Name </th>


                        <th class="column-title">Mobile No.</th>

                        <th class="column-title">Gender</th>


                        </th>
                     </tr>
                  </thead>
                  </tbody>
               </table>


            </div>
         </div>
      </div>
   </div>
</div>








<div class="modal fade" id="residentviewmodal" name="residentviewmodal" tabindex="-1" role="dialog" aria-labelledby="resident-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modelHeading">View Resident Data</h5>



             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>




          <div class="modal-body">
             <form id="residentviewform"  class="modal-input">
                {{ csrf_field() }}
                <input type="hidden" name="resident_idv" id="resident_idv">











































                <div class="row">
                    <div class="col-sm-6">





                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-6" >
                      <label >Last Name</label>
                      <input type="text" class="form-control" readonly id="lastnamev" name="lastnamev"   readonly>

                    </div>
                    <div class="col-sm-6 ">
                      <label >First Name</label>
                      <input  type="text" class="form-control" id="firstnamev" name="firstnamev"  readonly >

                    </div>
                  </div>

                  <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-6" >
                      <label >Middle Name</label>
                      <input type="text"  readonly class="form-control" name="middlenamev" id="middlenamev" >

                    </div>
                    <div class="col-sm-6 ">
                      <label >Alias</label>
                      <input type="text" class="form-control" readonly name="aliasv" id="aliasv" >

                    </div>
                  </div>





                  <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-6" >
                      <label >Birthday</label>
                      <input type="date" id="birthdayv" name="birthdayv" readonly required="required" class="form-control ">

                    </div>
                    <div class="col-sm-6 ">
                      <label >Age</label>
                      <input type="text" id="agev" name="agev" readonly required="required" class="form-control ">

                    </div>
                  </div>










                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Birth of Place
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="birthplacev" readonly name="birthplacev"  class="form-control ">
                    </div>
                 </div>


                 <div class="item form-group border solid " style="margin-left: 15px;margin-right: 15px;">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Gender
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                        <input readonly type="radio" id="male" name="genderv" value="Male">
                        <label for="male">Male</label><br>
                        <input readonly type="radio" id="female" name="genderv" value="Female">
                        <label for="female">Female</label><br>    </div>
                 </div>





                 <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-6" >
                      <label >Voter Status</label>
                      <input type="text" class="form-control" readonly id="voterstatusv" name="voterstatusv"   readonly>

                    </div>
                    <div class="col-sm-6 ">
                      <label >Civil Status</label>
                      <input readonly  type="text" class="form-control" name="civilstatusv" id="civilstatusv" >

                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">CitizenShip
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" readonly  id="citizenshipv" name="citizenshipv" placeholder="Ex: Filipino"  required="required" class="form-control ">
                    </div>
                 </div>




                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                   <div class="col-sm-6" >
                     <label >Telephone</label>
                     <input type="text" class="form-control"  readonly name="telephonev" id="telephonev" >

                   </div>
                   <div class="col-sm-6 ">
                     <label >Mobile</label>
                     <input type="text" class="form-control" readonly name="mobilev" id="mobilev"  >

                   </div>
                 </div>
                 <div class="item form-group">
                   <label class="col-form-label col-md-3 col-sm-3 label-align" >Area
                   </label>
                   <div class="col-md-12 col-sm-12 ">
                    <input type="text" class="form-control" readonly name="areav" id="areav"  >
                      </div>
                </div>

            </div>

            <div class="col-sm-6">
                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-6" >
                      <label >Height</label>
                      <input type="number" class="form-control" readonly name="heightv" id="heightv" >

                    </div>
                    <div class="col-sm-6 ">
                      <label >Weight</label>
                      <input type="number" class="form-control" readonly name="weightv" id="weightv" >

                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="email" id="emailv" name="emailv" readonly   class="form-control ">
                    </div>
                 </div>







                  <div class="row" style="margin-left: 0px;margin-right: 0px;">
                   <div class="col-sm-6" >
                     <label >PAG-IBIG</label>
                     <input type="text" class="form-control" readonly  name="PAG_IBIGv" id="PAG_IBIGv" >

                   </div>
                   <div class="col-sm-6 ">
                     <label >PHILHEALTH</label>
                     <input type="text" class="form-control" readonly name="PHILHEALTHv" id="PHILHEALTHv" >

                   </div>
                 </div>


                 <div class="row" style="margin-left: 0px;margin-right: 0px;">
                   <div class="col-sm-6" >
                     <label >SSS</label>
                     <input type="text" class="form-control" readonly name="SSSv" id="SSSv" >

                   </div>
                   <div class="col-sm-6 ">
                     <label >TIN</label>
                     <input type="text" class="form-control"  readonly name="TINv" id="TINv" >

                   </div>
                 </div>







                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Spouse
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="spousev" readonly name="spousev"  class="form-control ">
                    </div>
                 </div>



                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Father
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="fatherv" readonly name="fatherv"  class="form-control ">
                    </div>
                 </div>



                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Mother
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="motherv" readonly name="motherv"  class="form-control ">
                    </div>
                 </div>



                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 1
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="address_1v" readonly  name="address_1v" class="form-control ">
                    </div>
                 </div>



                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Address 2
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="address_2v" readonly  name="address_2v"  class="form-control ">
                    </div>
                 </div>









            </div>


        <!----------------
        -->






            </div>



























































                <div class="row">


            <div class="col-sm-12">



                <table  id="blotter-resident" class="bulk_action dataTables_info table blotter-resident datatable-element resident table-striped jambo_table bulk_action text-center border border-modal dataTable no-footer">
                    <thead>
                       <tr class="headings">

                          <th class="column-title">Blotter-ID</th>
                          <th class="column-title">Incident Type</th>
                          <th class="column-title">Status </th>
                          <th class="column-title">Date Reported </th>
                          <th class="column-title">Date Incident </th>
                          <th class="column-title">Incident Location</th>



                       </tr>
                    </thead>

                 </table>
            </div>






        </div>
                <div class="ln_solid"></div>

             </form>
          </div>
          <div class="modal-footer text-white">
          </div>
       </div>
    </div>
 </div>











@endsection


