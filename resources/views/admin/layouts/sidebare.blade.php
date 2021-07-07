<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <div class="logo-img">
                   <img src="{{asset('template/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite"> 
                </div>
                <span class="text">DocBook</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    {{-- <div class="nav-item">
                        <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                    </div> --}}

                    
                    @if( auth()->check() && auth()->user()->role->name === 'admin')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Doctor</span></a>
                            <div class="submenu-content">
                                <a href="{{ route('doctors.demande') }}" class="menu-item">Demandes</a>
                                <a href="{{ route('doctors.create') }}" class="menu-item">Create</a>
                                <a href=" {{route('doctors.index')}} " class="menu-item">View</a>
                            </div>
                        </div>
                    @endif


                    
                    @if( auth()->check() && auth()->user()->role->name === 'doctor')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Appointment Time</span></a>
                            <div class="submenu-content">
                                <a href="{{ route('appointment.create') }}" class="menu-item">Create</a>
                                <a href=" {{route('appointment.index')}} " class="menu-item">Check / Update</a>
                            </div>
                        </div>
                    @endif

                    @if( auth()->check() && auth()->user()->role->name === 'doctor')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients</span></a>
                            <div class="submenu-content">
                                <a href="{{ route('patientDoctor') }}" class="menu-item">Patients</a>
                                <a href="{{ route('patients.today') }}" class="menu-item">Patients du jour</a>
                                <a href=" {{route('prescription.patients')}} " class="menu-item">tout les patients(Prescription)</a>
                            </div>
                        </div>
                    @endif

                    @if( auth()->check() && auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Spécialités</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('department.create') }}" class="menu-item">Ajouter Spécialités</a>
                            <a href=" {{route('department.index')}} " class="menu-item">Spécialités</a>
                        </div>
                    </div>
                @endif


                    
                    @if( auth()->check() && auth()->user()->role->name === 'admin')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient Appointment</span></a>
                            <div class="submenu-content">
                                <a href="{{ route('patient') }}" class="menu-item">Today Appointment</a>
                                <a href=" {{route('all.appointments')}} " class="menu-item">All Time Appointment</a>
                            </div>
                        </div>
                    @endif

                    <div class="nav-item ">
                        <a  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                           
                </div>


                </nav>
            </div>
        </div>
    </div>
