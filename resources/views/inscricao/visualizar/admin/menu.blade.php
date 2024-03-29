<div class="list-group">
    <a href="inscricao/{{ $codigoInscricao }}/pessoal" class="list-group-item list-group-item-action">
        1.Dados Pessoais 
        <i class="fa @if (Session::get('total')['pessoal'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
    </a>
    <a href="inscricao/{{ $codigoInscricao }}/endereco" class="list-group-item list-group-item-action">
        1.1Endereço
        <i class="fa @if (Session::get('total')['endereco'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
    </a>
    <a href="inscricao/{{ $codigoInscricao }}/emergencia" class="list-group-item list-group-item-action">
        2.Emergência
        <i class="fa @if (Session::get('total')['emergencia'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
    </a>
    <a href="inscricao/{{ $codigoInscricao }}/escolar" class="list-group-item list-group-item-action">3.Resumo Escolar
        <i class="fa @if (Session::get('total')['escolar'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
    </a>
    <a href="inscricao/{{ $codigoInscricao }}/idioma" class="list-group-item list-group-item-action">4.Idiomas
        <i class="fa @if (Session::get('total')['idioma'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
    </a>
    <a href="inscricao/{{ $codigoInscricao }}/profissional" class="list-group-item list-group-item-action">5.Experiência Profissional
        <i class="fa @if (Session::get('total')['profissional'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
    </a>
    <a href="inscricao/{{ $codigoInscricao }}/ensino" class="list-group-item list-group-item-action">6.Experiência Em Ensino
        <i class="fa @if (Session::get('total')['ensino'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
    </a> 
    
    @if (Session::get('nivel') == 1)
        <a href="inscricao/{{ $codigoInscricao }}/expectativas" class="list-group-item list-group-item-action">7.Por que cursar disciplina como aluno especial?
            <i class="fa @if (Session::get('total')['expectativas'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
        </a> 

        <a href="inscricao/{{ $codigoInscricao }}/curriculo" class="list-group-item list-group-item-action">8.Currículo
            <i class="fa @if (Session::get('total')['curriculo'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
        </a>

        <a href="inscricao/{{ $codigoInscricao }}/disciplina" class="list-group-item list-group-item-action">9.Disciplinas
            <i class="fa @if (Session::get('total')['disciplina'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
        </a> 
        
        @if ($status == 'P')
        <a href="inscricao/{{ $codigoInscricao }}/obrigatorios" class="list-group-item list-group-item-action">10.Documentos Obrigatórios
            <i class="fa @if (Session::get('total')['disciplina'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
        </a> 
        @endif
    @else
        <a href="inscricao/{{ $codigoInscricao }}/financeiro" class="list-group-item list-group-item-action">7.Recursos Financeiros
            <i class="fa @if (Session::get('total')['financeiro'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
        </a>

        <a href="inscricao/{{ $codigoInscricao }}/expectativas" class="list-group-item list-group-item-action">8.Expectativas
            <i class="fa @if (Session::get('total')['expectativas'] > 0) fa-check text-success @else fa-exclamation-triangle text-warning @endif float-right"></i>
        </a>
    @endif

    @if(!empty($codigoEdital))
        <a href="admin/listar-inscritos/{{ $codigoEdital }}" class="list-group-item list-group-item-action">Voltar</a>
    @endif
</div>