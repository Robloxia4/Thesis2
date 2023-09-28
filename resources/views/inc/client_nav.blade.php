<header class="header-blue" style="padding-bottom: 0px;">
    <nav class="navbar navbar-primary navbar-expand-md navigation-clean-search">
        <div class="container-fluid"><a class="navbar-brand" href="/barangay/home" style="font-size: 45px;font-family: bodoni mt;"><img src="{{ URL::asset('images/logos.png')}}" style="resize: both;width: 100px;margin-right: 30px;"><p class="navbar-brand" id="client_navbar" style="font-size: 45px;">{{ $image->barangay_name ?? 'Brgy.Tan-awan Management System' }}</p></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group mb-0"><label for="search-field"></label></div>
                </form>
                <p class="navbar-text" id="navbar-firstname" style="margin-top: 15px;margin-right: 11px;color: white;font-size: 20px;"><i class="fa fa-user" style="margin-right: 5px;"></i>{{session("resident.firstname")}}</p><span class="navbar-text"> </span>
                <div class="dropdown" style="font-size: 20px;"><a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown" href="#" style="color: white;"><i class="fa fa-cog" style="margin-right: 5px;"></i>Settings</a>
                    <div class="dropdown-menu dropleft" style="resize: both;width: 80px;padding: 0px;"><a class="dropdown-item" href="/barangay/accountsetting" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Account Settings</a>
                        <a class="dropdown-item" href="/barangay/logout" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Log-out</a>
                    </div>
                </div>
                <div class="dropdown-menu dropleft" style="resize: both;width: 80px;padding: 0px;"><a class="dropdown-item" href="#" style="resize: both;width: 80px;padding: 5px;font-size: 75%;">Account Settingt</a></div>
            </div>
            </div>
        </div>
    </nav>
</header>
<ul class="nav nav-tabs" style="margin-left: 20px;">
    <li class="nav-item"><a class="nav-link active" href="/barangay/home"><i class="fa fa-home" style="margin-right: 5px;"></i>Home</a></li>
    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link " aria-expanded="false" data-toggle="dropdown" href="#"><i class="fa fa-server" style="margin-right: 5px;"></i>Services</a>
        <div class="dropdown-menu"><a class="dropdown-item" href="/barangay/schedule">Schedule</a><a class="dropdown-item" href="/barangay/blotter/{{ session("resident.id") }}">Blotter</a><a class="dropdown-item" href="/barangay/certificate">Certificates</a></div>
    </li>
    <li class="nav-item"><a class="nav-link" href="/barangay/news">News</a></li>
    <li class="nav-item"><a class="nav-link" href="/barangay/info">Info</a></li>
</ul>
