

<div class="bg-light border-right" id="sidebar-wrapper">

      @include('layouts.image')

   <div class="list-group list-group-flush w-100 pt-3 bg-light">
      <li class="list-none"><a href="/dashboard"  class="list-group-item list-group-item-action bg-light text-adjust {{ (request()->is('dashboard*')) ? 'active-page' : '' }}"><i class="fa fa-home fa-lg icon-adjust"></i> Dashboard</a> </li>
      <li class="list-none"><a href="/resident"       class="list-group-item list-group-item-action bg-light text-adjust {{ (request()->is('resident*')) ? 'active-page' : '' }}"><i class="fa fa-user-o fa-lg icon-adjust"></i> Resident Information</a> </li>
      <li class="list-none"><a href="/blotter" class="list-group-item list-group-item-action bg-light text-adjust {{ (request()->is('blotter*')) ? 'active-page' : '' }}"><i class="fa fa-folder fa-lg icon-adjust"></i> Blotters Record</a> </li>
      <li class="list-none"><a href="/schedule" class="list-group-item list-group-item-action bg-light text-adjust {{ (request()->is('schedule*')) ? 'active-page' : '' }}"><i class="fa fa-suitcase fa-lg icon-adjust"></i> Settlement Schedule</a> </li>
      <li class="list-none"><a href="/certificate" class="list-group-item list-group-item-action bg-light text-adjust {{ (request()->is('certificate*')) ? 'active-page active' : '' }}"><i class="fa fa-certificate fa-lg icon-adjust"></i> Certificate Issurance</a> </li>
      <li class="list-none" >
         <button id="dropdown-btn" class="dropdown-btn list-group-item list-group-item-action bg-light text-adjust  {{ (request()->is('setting*')) ? 'active-page' : '' }}"><i class="fa fa-wrench fa-lg icon-adjust"></i>Setting
         <span class="fa fa-caret-down align"></span>
         </button>
         <div class="dropdown-container  list-group {{ (request()->is('setting*')) ? 'active' : '' }}" id="dropdown-btns">
            <a href="/setting/account" class="list-group-item list-group-item-action bg-light text-adjust {{ (request()->is('setting/account*')) ? 'active-page' : '' }}"><i class="fa fa-address-card fa-lg icon-adjust"></i>Account</a>
            <a href="/setting/maintenance" class="list-group-item list-group-item-action bg-light text-adjust {{ (request()->is('setting/maintenance*')) ? 'active-page' : '' }}"><i class="fa fa-cog fa-lg icon-adjust "></i> Barangay </a>


         </div>

      </li>

   </div>
</div>


<script>
    /*
  function routeToDashboard(){
        console.log("asdsa")
        event.preventDefault();
        $('#dashboards').click(function() {
     window.location.hash = 'dashboard';
     return false;
     });

        $.ajax({

            url:"/dashboard",
            type:'get',
            data:{


            },
             success:function(data){
                $("#body").html(data);

             }



        })

    }

    function addclasss(){
        alert(1);
        $( "#dashboards" ).addClass( 'asdasd');
        $("dashboards").attr("class", "asdasd");

    }

*/


</script>
