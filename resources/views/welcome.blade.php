@extends('layouts.template')

@section('content')
@foreach( $cuchillos as $cuchillo)
        
            
            
            
            
            
            
            
            
        

                    <div class="col-lg-4 col-sm-6 mb-4">
                        
                            <div class="portfolio-item ">
                                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{ $cuchillo->id }}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('storage').'/'.$cuchillo->foto }}" alt="" />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{ $cuchillo->tipo }}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{ $cuchillo->modelo }}</div>
                                </div>
                            </div>
                          
                    </div>

                    <!-- Portfolio Modals-->
        <!-- Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal{{ $cuchillo->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="text-uppercase">Modelo: {{ $cuchillo->modelo }}</h2>
                                    <p class="item-intro text-muted">{{ $cuchillo->tipo }}</p>
                                    <img class="img-fluid d-block mx-auto" src="{{ asset('storage').'/'.$cuchillo->foto }}" alt="{{ $cuchillo->tipo }}" />
                                    <p>Stock: {{ $cuchillo->stock }}</p>
                                    <p>{{ $cuchillo->descripcion }}</p>
                                    <p class="text-left">{{ $cuchillo->caracteristica }}</p>
                                    
                                    
                                        
                                    
                                    <a class="btn btn-success a" href="https://api.whatsapp.com/send?phone=+595986550235&text=Estoy%20interesado%20en%20el%20{{ $cuchillo->tipo }}:%20{{ $cuchillo->modelo }}">Pedido <i class="fas fa-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection