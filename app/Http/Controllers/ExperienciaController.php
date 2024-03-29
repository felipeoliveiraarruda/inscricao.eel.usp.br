<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\Utils;
use App\Models\Inscricao;
use App\Models\Experiencia;
use App\Models\InscricoesExperiencias;
use Carbon\Carbon;


class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $temp = '';
        
        $voltar             = ($request->codigoTipoExperiencia == 2 ? '/profissional' : '/ensino');
        $inscricaoExperiencia = true;
        
        \DB::beginTransaction();

        if ($request->codigoTipoExperiencia == 2)
        {   
            $profissional = Experiencia::create([
                'codigoUsuario'         => Auth::user()->id,
                'codigoTipoExperiencia' => $request->codigoTipoExperiencia,            
                'entidadeExperiencia'   => $request->entidadeExperiencia,
                'posicaoExperiencia'    => $request->posicaoExperiencia,
                'inicioExperiencia'     => $request->inicioExperiencia,
                'finalExperiencia'      => $request->finalExperiencia,
                'codigoPessoaAlteracao' => Auth::user()->codpes,
            ]);
        }
        else
        {
            $profissional = Experiencia::create([
                'codigoUsuario'         => Auth::user()->id,
                'codigoTipoExperiencia' => $request->codigoTipoExperiencia,            
                'codigoTipoEntidade'    => $request->codigoTipoEntidade,
                'entidadeExperiencia'   => $request->entidadeExperiencia,
                'posicaoExperiencia'    => $request->posicaoExperiencia,
                'inicioExperiencia'     => $request->inicioExperiencia,
                'finalExperiencia'      => $request->finalExperiencia,
                'codigoPessoaAlteracao' => Auth::user()->codpes,
            ]);
        }

        if(!empty($request->codigoInscricao))
        {
            $inscricaoExperiencia = InscricoesExperiencias::create([
                'codigoInscricao'       => $request->codigoInscricao,
                'codigoExperiencia'     => $profissional->codigoExperiencia,
                'codigoPessoaAlteracao' => Auth::user()->codpes,
            ]);

            $voltar = ($request->codigoTipoExperiencia == 2 ? "inscricao/{$request->codigoInscricao}/profissional" : "inscricao/{$request->codigoInscricao}/ensino");            
        }

        if($profissional && $inscricaoExperiencia) 
        {
            \DB::commit();
        } 
        else 
        {
            \DB::rollBack();
        }

        request()->session()->flash('alert-success', 'Experiência Profissional cadastrada com sucesso.');
        
        return redirect($voltar); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function show(Experiencia $experiencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Experiencia $experiencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experiencia $experiencia)
    {
        $temp = '';
        
        $voltar             = ($request->codigoTipoExperiencia == 2 ? '/profissional' : '/ensino');
        $inscricaoExperiencia = true;
        
        \DB::beginTransaction();

        $profissional = Experiencia::find($request->codigoExperiencia);

        if ($request->codigoTipoExperiencia == 2)
        {   
            $profissional->codigoUsuario         = Auth::user()->id;
            $profissional->codigoTipoExperiencia = $request->codigoTipoExperiencia;
            $profissional->entidadeExperiencia   = $request->entidadeExperiencia;
            $profissional->posicaoExperiencia    = $request->posicaoExperiencia;
            $profissional->inicioExperiencia     = $request->inicioExperiencia;
            $profissional->finalExperiencia      = $request->finalExperiencia;
            $profissional->codigoPessoaAlteracao = Auth::user()->codpes;
            $profissional->save();
        }
        else
        {
            $profissional->codigoUsuario         = Auth::user()->id;
            $profissional->codigoTipoExperiencia = $request->codigoTipoExperiencia;
            $profissional->codigoTipoEntidade    = $request->codigoTipoEntidade;
            $profissional->entidadeExperiencia   = $request->entidadeExperiencia;
            $profissional->posicaoExperiencia    = $request->posicaoExperiencia;
            $profissional->inicioExperiencia     = $request->inicioExperiencia;
            $profissional->finalExperiencia      = $request->finalExperiencia;
            $profissional->codigoPessoaAlteracao = Auth::user()->codpes;
            $profissional->save();
        }

        if(!empty($request->codigoInscricao))
        {
            if(empty($request->codigoInscricaoExperiencia))
            {
                $inscricaoExperiencia = InscricoesExperiencias::create([
                    'codigoInscricao'       => $request->codigoInscricao,
                    'codigoExperiencia'     => $request->codigoExperiencia,
                    'codigoPessoaAlteracao' => Auth::user()->codpes,
                ]);
            }
            else
            {
                $inscricaoExperiencia = InscricoesExperiencias::find($request->codigoInscricaoExperiencia);

                $inscricaoExperiencia->codigoInscricao       = $request->codigoInscricao;
                $inscricaoExperiencia->codigoExperiencia     = $request->codigoExperiencia;
                $inscricaoExperiencia->codigoPessoaAlteracao = Auth::user()->codpes;
                $inscricaoExperiencia->save();
            }

            $voltar = ($request->codigoTipoExperiencia == 2 ? "inscricao/{$request->codigoInscricao}/profissional" : "inscricao/{$request->codigoInscricao}/ensino");            
        }

        if($profissional && $inscricaoExperiencia) 
        {
            \DB::commit();
        } 
        else 
        {
            \DB::rollBack();
        }

        request()->session()->flash('alert-success', 'Experiência Profissional cadastrada com sucesso.');
        
        return redirect($voltar); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experiencia $experiencia)
    {
        //
    }
}
