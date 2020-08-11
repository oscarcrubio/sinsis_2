@extends('admin.layout')
@section('title', Auth::user()->name.' | Panel de Administación SinSis')
@section('body')
  <!-- start section -->
  <section class="wow fadeIn main-admin-container">
    <header class="main-admin-header position-fixed">
       <a href={{ route('create-enterprise') }} class="">+ Crear Nueva Empresa</a> 
    </header>
    <div class="container projects-container">        
        <div class="row">
            <div class="col-12 wow fadeIn"> 
            @if (@$side_enterprises != null)         
                <div class="row pricing-box-style1">
                @foreach ($side_enterprises as $side_enterprise) 
                    <!-- start pricing item -->
                    <div class="col-12 col-md-4 text-center md-margin-30px-bottom wow fadeInUp odit">
                        <div class="pricing-box border border-color-extra-light-gray">
                            <div class="padding-55px-all bg-very-light-gray md-padding-30px-all sm-pading-40px-all">
                                <!-- start pricing title -->
                                <div class="pricing-title text-center">
                                    <i class="ti-user icon-large text-deep-pink d-inline-block padding-30px-all bg-white box-shadow-light rounded-circle margin-25px-bottom"></i>
                                </div>
                                <!-- end pricing title -->
                                <!-- start pricing price -->
                                <div class="pricing-price">
                                    <h4 class="text-extra-dark-gray alt-font font-weight-600 mb-0 oditt">{{ $side_enterprise->name }}</h4>
                                </div>
                                <!-- end pricing price -->
                            </div>
                            <!-- start pricing features -->
                            <div class="padding-45px-all pricing-features md-padding-20px-all sm-padding-30px-all">
                                <ul class="list-style-11">
                                    <li>Dirección: {{ $side_enterprise->location }}</li>
                                </ul>
                                <!-- start pricing action -->
                                <div class="pricing-action margin-35px-top md-no-margin-top">
                                    <a href={{ route('enterprise-projects',$side_enterprise->slug) }} class="btn btn-dark-gray btn-small text-extra-small">Ver datos</a>                                        
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
                @else
                <h2>No hay no existe</h2>
               @endif
            </div>
        </div>
    </div>
</section>
<!-- end section -->
@endsection