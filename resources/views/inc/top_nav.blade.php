

<nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom text-white">
   <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-arrows-h "></i></button>
   <button class="  btn btn-primary navbar-toggler navbar-light"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon navbar-light"></span>
   
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

         {{-- <li class="nav-item active">
            <p class="nav-link text-white text-center" id="nav_bar_display">Welcome, {{session("user.firstname")}}</p>
         </li> --}}

         <li class="nav-item active">
            <a class="nav-link text-white text-center" id="firstname_topnav" href="#"> Welcome, {{session("user.firstname")}} <span class="sr-only">(current)</span></a>
         </li>

         
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            </a>
            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
               
               <div class="dropdown-divider"></div>
               <a class="dropdown-item text-center" href="/dashboard"><i class="fa fa-home" aria-hidden="true"></i>  Home</a>
               <a class="dropdown-item text-center" href="/logout"><i class="fa fa-user-times" aria-hidden="true"></i>  Logout</a>
            </div>
         </li>
      </ul>
   </div>
</nav>

