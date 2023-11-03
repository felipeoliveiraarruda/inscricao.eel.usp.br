<div class="form-group">  
    <label for="escolaResumoEscolar" class="font-weight-bold">Escola<span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="escolaResumoEscolar" name="escolaResumoEscolar" value="{{ old('escolaResumoEscolar') ?? $escolar->escolaResumoEscolar ?? '' }}" maxlength="255" required />
</div>

<div class="form-group">  
    <label for="especialidadeResumoEscolar" class="font-weight-bold">Título/Especialidade<span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="especialidadeResumoEscolar" name="especialidadeResumoEscolar" value="{{ old('especialidadeResumoEscolar') ?? $escolar->especialidadeResumoEscolar ?? '' }}" maxlength="255" required />
</div>

<div class="form-group">  
    <div class="form-row">
        <div class="col">
            <label for="inicioResumoEscolar" class="font-weight-bold">Início<span class="text-danger">*</span></label>
            <input type="date" step="1" class="form-control" id="inicioResumoEscolar" name="inicioResumoEscolar" value="{{ old('inicioResumoEscolar') ?? $escolar->inicioResumoEscolar ?? '' }}" required />
        </div>

        <div class="col">
            <label for="finalResumoEscolar" class="font-weight-bold">Final<span class="text-danger">*</span></label>
            <input type="date" step="1" class="form-control" id="finalResumoEscolar" name="finalResumoEscolar" value="{{ old('finalResumoEscolar') ?? $escolar->finalResumoEscolar ?? '' }}" required />
        </div> 
    </div>
</div> 

<div class="form-group">  
    <div class="form-row">
        <div class="col">
            <label for="codigoTipoDocumento" class="font-weight-bold">Histórico Escolar <span class="text-danger">*</span></label>
            <div class="form-group">
                <input type="file" class="form-control-file" id="historicoEscolar" name="historicoEscolar" required data-show-upload="false" data-show-caption="true" accept="image/jpeg,image/png,application/pdf">
            </div>
           <small id="arquivoHelp" class="form-text text-muted">Cópia digital do Histórico Escolar da Graduação conforme item 3.1.7 do edital no formato PDF</small>
        </div>
    
        <div class="col">            
            <div class="form-group">
                <label for="codigoTipoDocumento" class="font-weight-bold">Diploma / Certificado</label><br/>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineDocumentos" id="inlineDocumentosDiploma" value="6">
                    <label class="form-check-label" for="inlineRadio1">Diploma</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineDocumentos" id="inlineDocumentosCertificado" value="7">
                    <label class="form-check-label" for="inlineRadio2">Certificado de Conclusão</label>
                </div>

                <input type="file" class="form-control-file mt-2" id="diplomaEscolar" name="diplomaEscolar" data-show-upload="false" data-show-caption="true" accept="application/pdf">
            </div>
            <small id="arquivoHelp" class="form-text text-muted">Cópia digital (frente/verso) do Diploma ou Declaração de Conclusão do curso de graduação, contendo a data de colação de grau, conforme item 3.1.7 do edital no formato PDF</small>
        </div>
    </div>    
</div> 

<input type="hidden" name="codigoInscricao" value="{{ $codigoInscricao }}">