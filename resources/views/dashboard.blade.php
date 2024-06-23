@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            <span>Employee Data</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                @guest
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>
<div class="container-fluid">
<div class="row">
    <aside id="sidebar" class="col-md-2 py-5 bg-light">
    <button class="btn btn-primary mb-3" id="toggleSidebar">
                <span id="toggleIcon" class="fas fa-arrow-left"></span>
            </button>
        <ul class="nav">
    <li class="nav-item">
        <a href="/employees" class="nav-link d-flex align-items-center">
            <i class="far fa-user nav-icon"></i>
            <span class="ms-2 p">Employee List</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="/employees/create" class="nav-link d-flex align-items-center">
            <i class="far fa-edit nav-icon"></i>
            <span class="ms-2 p">Add Employee</span>
        </a>
    </li>
    <li class="nav-item">
    <a href="{{ route('employees.allDetails') }}" class="nav-link d-flex align-items-center">
        <i class="fas fa-info-circle nav-icon"></i>
        <span class="ms-2 p">Employee Details</span>
    </a>
</li>
    </ul>
    </aside>
    <div class="col">
    @yield('mainContent') 

    </div>
</div>
<script>
    $(document).ready(function() {
        $('#toggleSidebar').click(function() {
            var sidebar = $('#sidebar');
            var icon = $('#toggleIcon');
            var textElements = $('#sidebar .p'); 

            if (sidebar.width() > 50) {
                sidebar.animate({width: '60px'}, 350, function() {
                    textElements.hide();
                });
                icon.removeClass('fa-arrow-left').addClass('fa-bars');
            } else {
                sidebar.animate({width: '250px'}, 350, function() {
                    textElements.show();
                });
                icon.removeClass('fa-bars').addClass('fa-arrow-left');
            }
        });
    });

    
</script>
@endsection