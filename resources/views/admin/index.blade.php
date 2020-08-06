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
                <div class="display-4">
                Panel de administracion    
                </div>               
            </div>
        </div>
        <div class="row mt-5 pr-3 pl-3">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Proyectos</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="" class="small text-white stretched-link">Ver todos</a>
                        <span class="small text-white"> > </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Empresas</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="" class="small text-white stretched-link">Ver todos</a>
                        <span class="small text-white"> > </span>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Diagnosticos</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="" class="small text-white stretched-link">Ver todos</a>
                        <span class="small text-white"> > </span>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Propuestas</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="" class="small text-white stretched-link">Ver todos</a>
                        <span class="small text-white"> > </span>
                    </div>
                </div>
            </div> 

        </div>
    </div>
</section>
<section>
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
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Otto</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
</section>
<!-- end section -->
@endsection