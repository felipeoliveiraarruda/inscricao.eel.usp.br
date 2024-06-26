<?php

namespace App\Http\Controllers\PAE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Utils;
use App\Models\Arquivo;
use App\Models\Inscricao;
use App\Models\Edital;
use App\Models\PAE\Conceito;
use App\Models\PAE\Pae;
use App\Models\PAE\DesempenhoAcademico;
use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Posgraduacao;

class DesempenhoController extends Controller
{
    public function index($codigoPae)
    {
        if ((session('level') != 'manager') && (session('level') != 'admin') )
        {
            return redirect("/");
        }

        $inscricao   = Pae::obterPae($codigoPae);
        $conceitos   = Conceito::where('statusConceito', '=', 'S')->get();
        $anosemestre = Edital::obterSemestreAno($inscricao->codigoEdital);
        $vinculo     = Posgraduacao::obterVinculoAtivo($inscricao->codpes);
        $total       = DesempenhoAcademico::obterTotalDesempenho($codigoPae);
        $lattes      = Arquivo::listarArquivosPae($codigoPae, 9);
        $ficha       = Arquivo::listarArquivosPae($codigoPae, 22);
        $historico   = Arquivo::listarArquivosPae($codigoPae, 5);

        return view('admin.pae.desempenho',
        [
            'utils'        => new Utils,
            'conceitos'    => $conceitos,
            'codigoPae'    => $codigoPae,
            'codigoEdital' => $inscricao->codigoEdital,
            'editar'       => ($total == 0 ? false : true),
            'inscricao'    => $inscricao,
            'vinculo'      => $vinculo,
            'ficha'        => $ficha[0],
            'lattes'       => (empty($lattes[0]) ? '' : $lattes[0]),
            'historico'    => (count($historico) == 0 ? '' : $historico[0]),
            'nota'         => 0,            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->codigoConceito as $conceito)
        {
            if ($request->quantidadeDesempenhoAcademico[$conceito] != "")
            {
                $tipo  = Conceito::find($conceito);

                $total = (float)$request->quantidadeDesempenhoAcademico[$conceito] * (float)$tipo->valorConceito;
                
                $desempenho = DesempenhoAcademico::create([
                    'codigoPae'                     => $request->codigoPae,
                    'codigoConceito'                => $conceito,
                    'quantidadeDesempenhoAcademico' => $request->quantidadeDesempenhoAcademico[$conceito],
                    'totalDesempenhoAcademico'      => (float)$total,
                    'codigoPessoaAlteracao'         => Auth::user()->codpes,
                ]); 
            }
        }

        request()->session()->flash('alert-success', 'Desempenho Acadêmico cadastrado com sucesso.');   

        return redirect("admin/listar-inscritos/{$request->codigoEdital}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach($request->codigoDesempenhoAcademico as $temp)
        {
            $desempenho = DesempenhoAcademico::find($temp);

            $tipo  = Conceito::find($desempenho->codigoConceito);

            $total = (float)$request->quantidadeDesempenhoAcademico[$temp] * (float)$tipo->valorConceito;

            $desempenho->totalDesempenhoAcademico      = (float)$total;
            $desempenho->quantidadeDesempenhoAcademico = $request->quantidadeDesempenhoAcademico[$temp];
            $desempenho->save();
        }

        if (isset($request->codigoConceito))
        {
            foreach($request->codigoConceito as $conceito)
            {
                if ($request->quantidadeDesempenhoAcademico[$conceito] != "")
                {
                    $tipo  = Conceito::find($conceito);

                    $total = (float)$request->quantidadeDesempenhoAcademico[$conceito] * (float)$tipo->valorConceito;

                    $desempenho = DesempenhoAcademico::create([
                        'codigoPae'                     => $request->codigoPae,
                        'codigoConceito'                => $conceito,
                        'quantidadeDesempenhoAcademico' => $request->quantidadeDesempenhoAcademico[$conceito],
                        'totalDesempenhoAcademico'      => (float)$total,
                        'codigoPessoaAlteracao'         => Auth::user()->codpes,
                    ]); 
                }
            }
        }

        request()->session()->flash('alert-success', 'Desempenho Acadêmico atualizado com sucesso.');    
        return redirect("admin/listar-inscritos/{$request->codigoEdital}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
