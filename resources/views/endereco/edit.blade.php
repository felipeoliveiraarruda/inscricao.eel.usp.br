@extends('layouts.app')

@auth
    @php redirect()->intended('index'); @endphp
@endauth

@section('content')
<main role="main" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <br/>        
            <div class="card bg-default">
                <h5 class="card-header">Editar Endereço</h5>
                
                <div class="card-body">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="text-danger mb-4" :errors="$errors" />
                    
                    <form class="needs-validation" novalidate method="POST" action="endereco/update">
                        @csrf
                        @method('patch')

                        @include('endereco.partials.form')                          
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="cadastrar" value="cadastrar" style="background-color: #26385C;">Cadastrar</button>
                        <a href="inscricao/{{ $codigoInscricao }}/endereco" role="button" aria-pressed="true" class="btn btn-info btn-lg btn-block">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection