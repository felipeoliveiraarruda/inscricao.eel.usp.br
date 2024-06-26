@extends('layouts.app')

@section('content')

<main role="main" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @if (Session('level') == 'user')
                @include('inscricao.menu')
            @else
                @include('inscricao.visualizar.admin.menu')
            @endif
        </div>
        <div class="col-md-9">
            <div class="card bg-default">
                <h5 class="card-header">Documentos Obrigatórios @if(Session::get('level') == 'manager') - {{ Session::get('total')['inscricao'] }} @endif</h5>

                <div class="card-body">                    
                    <div class="row justify-content-center">

                        <table class="table table-striped">
                            @foreach($arquivos as $arquivo)
                            <tr>
                                <td>{{ $arquivo->ordemTipoDocumento}} {{ $arquivo->tipoDocumento }}</td>
                                <td class="text-center">            
                                    <a href="{{ asset('storage/'.$arquivo->linkArquivo) }}" role="button" aria-pressed="true" class="btn btn-primary btn-sm" target="_new" data-toggle="tooltip" data-placement="bottom" title="Visualizar">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection