@extends('admin.layout')
@section('title', Auth::user()->name.' | Panel de Administación SinSis')
@section('body')
  <!-- start section -->
  <section class="wow fadeIn main-admin-container">
    <header class="main-admin-header position-fixed">
       <a href={{ route('create-project') }} class="">+ Crear Nuevo Proyecto</a> Proyecto encontrados: {{ count($side_projects) }}
    </header>
    <div class="container projects-container">        
        <div class="row">
            <div class="col-12 wow fadeIn">
                @if (isset($enterprise) || isset($manager))
                    @php
                        $side_projects = $projects;
                    @endphp
                @endif
               @if (count($side_projects) > 0)               
                   <!-- start pricing table style 01 section -->             
                <div class="row pricing-box-style1">                                       
                    @foreach ($side_projects as $side_project) 
                    <!-- start pricing item -->
                    <div class="col-12 col-md-4 text-center md-margin-30px-bottom wow fadeInUp edit">
                        <div class="pricing-box border border-color-extra-light-gray">
                            <div class="padding-55px-all bg-very-light-gray md-padding-30px-all sm-pading-40px-all">
                                <!-- start pricing title -->
                                <div class="pricing-title text-center">
                                    <i class="ti-briefcase icon-large text-deep-pink d-inline-block padding-30px-all bg-white box-shadow-light rounded-circle margin-25px-bottom"></i>
                                </div>
                                <!-- end pricing title -->
                                <!-- start pricing price -->
                                <div class="pricing-price">
                                    <span class="alt-font text-extra-dark-gray font-weight-600 text-uppercase">proyecto:</span>
                                    <h4 class="text-extra-dark-gray alt-font font-weight-600 mb-0 editt">{{ $side_project->name }}</h4>
                                    <!-- <div class="text-extra-small text-uppercase alt-font margin-5px-top">Per Month</div> -->
                                </div>
                                <!-- end pricing price -->
                            </div>
                            <!-- start pricing features -->
                            <div class="padding-45px-all pricing-features md-padding-20px-all sm-padding-30px-all">
                                <ul class="list-style-11">
                                    <li>Entrevistas: {{ count($side_project->enterviews) }}</li>
                                    <li>Diagnosticos: {{ count($side_project->diagnostics) }}</li>
                                    <li>Propuestas: {{ count($side_project->proposals) }}</li>
                                    <li>Estado: {{ $side_project->status == 1 ? 'Activo' : 'Cerrado'}}</li>
                                    <strong><li>{{ str_limit($side_project->description,50) }}</li></strong>
                                    <!-- <li>Unlimited Styles</li>
                                    <li>Customer Service</li>
                                    <li>Manual Backup</li> -->
                                </ul>
                                <!-- start pricing action -->
                                <div class="pricing-action margin-35px-top md-no-margin-top">
                                    <a href="{{ route('set-project-view',$side_project->slug) }}" class="btn btn-dark-gray btn-small text-extra-small">Proyecto</a>                                        
                                </div>
                                <!-- end pricing action -->
                            </div>
                            <!-- end pricing features -->
                        </div>
                    </div>
                    <!-- end pricing item -->
                    @endforeach
                </div>
        <!-- end pricing table style 01 section -->
               @elseif(count($projects) == 0 && isset($manager))
               <div class="text-center">
                <h2><i class="far fa-frown"></i></h2>
                <h2>{{ $manager->name }} aun no tiene proyectos asignados</h2>
                <span>Puedes crear uno nuevo haciendo click en el boton de arriba.</span>
            </div>
            @elseif(count($projects) == 0 && isset($enterprise))
               <div class="text-center">
                <h2><i class="far fa-frown"></i></h2>
                <h2>Aun no se han creado proyectos para {{ $enterprise->name }}</h2>
                <span>Puedes crear uno nuevo haciendo click en el boton de arriba.</span>
            </div>
                @else
                <div class="text-center">
                    <h2><i class="far fa-frown"></i></h2>
                    <h2>No se han encontrado Proyectos.</h2>
                    <span>Puedes crear uno nuevo haciendo click en el boton de arriba.</span>
                </div>
               @endif
            </div>
        </div>
    </div>
</section>
<!-- end section -->
@endsection