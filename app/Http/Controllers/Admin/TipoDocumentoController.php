<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\TipoDocumento;
use App\Models\Utils;

class TipoDocumentoController extends Controller
{    
    public function index()
    {
        if (!Gate::allows('admin'))
        {
            $item = array();

            $item['title'] = 'AVISO';
            $item['story'] = 'Você não tem permissão para acessar essa página';

            return view('components.modal', compact('item'));
        }

        $tipos = TipoDocumento::all();
        
        return view('admin.tipo_documento.index',
        [
            'tipos' => $tipos
            //'utils' => new Utils
        ]);
    }

    public function create()
    {
        return view('admin.tipo_documento.create');
    }

    public function store(Request $request)
    {        
        TipoDocumento::create([
            'tipoDocumento'         => $request->tipoDocumento,
            'codigoPessoaAlteracao' => Auth::user()->codpes,
        ]);        

        request()->session()->flash('alert-success','Tipo de Documento cadastrado com sucesso');
        return redirect("/admin/tipo-documento");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
