@extends('layouts.app')

@auth
    @php redirect()->intended('index'); @endphp
@endauth

@section('content')

<main role="main" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
                <a href="inscricao/{{ $codigoEdital }}/pae" class="list-group-item list-group-item-action ">Voltar</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card bg-default">
                <h5 class="card-header">PAE - Análise do Currículo Lattes</h5>
                
                <div class="card-body">                                            
                    <x-auth-validation-errors class="text-danger mb-4" :errors="$errors" />
            
                    <form class="needs-validation" novalidate method="POST" action="inscricao/{{ $codigoPae }}/pae/analise">
                        @csrf
                        
                        @if ($editar)
                            @method('patch')
                        @endif
                        
                        @include('pae.partials.form_analise')                        
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="cadastrar" value="cadastrar" style="background-color: #26385C;">Inserir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection