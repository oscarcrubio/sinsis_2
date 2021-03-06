@extends('admin.layout')
@section('title', Auth::user()->name.' | Panel de Administación SinSis')
@section('body')
  <!-- start section -->
  <section class="wow fadeIn main-admin-container">
    <header class="main-admin-header position-fixed">
        Bienvenido&nbsp; {{ Auth::user()->name }}      
    </header>
    <div class="fluid-container projects-container">        
        <div class="row">
            <div class="col-12 wow fadeIn">
                <div class="display-4 pl-3">
                Panel de administracion    
                </div>               
            </div>
        </div>
        <div class="row mt-5 pr-3 pl-3">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Proyectos ({{ count(App\Project::all()) }})</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('projects') }}" class="small text-white stretched-link">Ver todos</a>
                        <span class="small text-white"> > </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Empresas ({{ count(App\Enterprise::all()) }})</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('enterprise') }}" class="small text-white stretched-link">Ver todos</a>
                        <span class="small text-white"> > </span>
                    </div>
                </div>
            </div> 
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    @php
                    if(Auth::user()->access_level == 2)
                        $count_users = App\User::where('access_level', '=', 1)->get();
                    else    {
                        $count_users = App\User::where('access_level', '!=', 3)->get();
                    }
                    @endphp
                    <div class="card-body">Usuarios ({{ count($count_users) }})</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('user') }}" class="small text-white stretched-link">Ver todos</a>
                        <span class="small text-white"> > </span>
                    </div>
                </div>
            </div>             
        </div>
    </div>
</section>
<section style="padding-top:0px ">
    <div class="flex-container p-5">
        <h6>Ultimos Usuarios Creados</h6>
        <table class="table border-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Empresa</th>
                <th scope="col">Cargo</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($side_users as $key => $user)                
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @php   
                        $enterprise = App\Enterprise::where('client_id',$user->id)->first();
                    @endphp                    
                    <td>{{ isset($enterprise->name) ? $enterprise->name : ''  }}</td>
                    <td>{{ $user->charge }}</td>
                </tr>
            @endforeach              
            </tbody>
          </table>
    </div>
</section>
<!-- end section -->
@endsection