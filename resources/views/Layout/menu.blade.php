<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="javascript:void(0)">
                    <div class="brand-logo"><img class="logo" src="{{ URL::asset('app-assets/images/logo/logo.svg')}}" /></div>
                    {{-- <h2 class="brand-text mb-0">Kosme Accounting</h2> --}}
                </a></li>
            {{-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class="disabled nav-item {{request()->segment(2) == ''?'active':''}}"><a href="javascript:void(0)"><i class="menu-livicon text-success" data-icon="desktop"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge-light-danger badge-pill badge-round float-right">Soon</span></a></li>
            <li class="navigation-header"><span>Menu</span>
            </li>
            <li class="disabled nav-item"><a href="javascript:void(0)"><i class="menu-livicon" data-icon="balance"></i><span class="menu-title" data-i18n="Piutang">Budgeting</span><span class="badge badge-light-danger badge-pill badge-round float-right">Soon</span></a>
            </li>
            <li class="disabled nav-item"><a href="javascript:void(0)"><i class="menu-livicon" data-icon="notebook"></i><span class="menu-title" data-i18n="Pengadaan Dana">Pengadaan dana</span><span class="badge badge-light-danger badge-pill badge-round float-right">Soon</span></a>
            </li>
            <li class="nav-item {{request()->segment(2) == 'account-payable'?'active':''}}"><a href="{{ url('/'.request()->segment(1).'/account-payable') }}"><i class="menu-livicon" data-icon="coins"></i><span class="menu-title" data-i18n="Account Payable">Account Payable</span></a>
            </li>
        </ul>
    </div>
</div>
