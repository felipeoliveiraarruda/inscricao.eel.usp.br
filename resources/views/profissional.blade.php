@extends('layouts.app')

@section('content')

<main role="main" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('inscricao.menu')  
        </div>
        <div class="col-md-9">
            <div class="card bg-default">
                <h5 class="card-header">Experiência Profissional
                    @if ($status == 'N')
                    <a href="inscricao/{{ $codigoInscricao }}/profissional/create/" role="button" aria-pressed="true" class="btn btn-success btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Novo">
                        <i class="fa fa-plus"></i>  
                    </a>
                    @endif
                </h5>

                <div class="card-body">                    
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        @if ($msg == 'success')
                                        <div class="alert alert-success" id="success-alert">
                                            {{ Session::get('alert-' . $msg) }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @else
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                            <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a>
                                        </p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            
                            <div class="row">                             
                                <div class="col-sm-12"> 
                                    @if (!empty($profissionais[0]->codigoExperiencia))
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Entidade</th>
                                                <th scope="col">Posição Ocupada</th>
                                                <th scope="col">Início</th>
                                                <th scope="col">Fim</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        @foreach($profissionais as $profissional)                                
                                        <tr>
                                            <td>{{ $profissional->entidadeExperiencia }}</td>
                                            <td>{{ $profissional->posicaoExperiencia }}</td>
                                            <td>{{ $profissional->inicioExperiencia->format('d/m/Y') }}</td>
                                            <td>{{ ($profissional->finalExperiencia == '' ? '' : $profissional->finalExperiencia->format('d/m/Y')) }}</td>
                                            <td>
                                            <td>
                                                @if ($status == 'N')
                                                <a href="inscricao/{{ $codigoInscricao }}/profissional/create/{{ $profissional->codigoExperiencia }}" role="button" aria-pressed="true" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Atualizar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                @endif                                               
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>                                  
                                    @endif                                    
                                </div>                                 
                            </div>                                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection