<div class="card p-3 bg-white" style="border-radius: 0px 0px 10px 10px">
    <form id="form0" method="POST" action="{{route('solicitacao.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <div class="row">
            <div class="col-12">
                <h3 class="subtitulo">Finalidade</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="tipo">Tipo:</label>
                <input class="form-control" type="text" value="{{ $solicitacao->tipo  }}" disabled>
            </div>

            <div class="col-sm-4">
                <label for="inicio">Início:<strong style="color: red">*</strong></label>
                <input class="form-control @error('inicio') is-invalid @enderror" id="inicio" type="date"
                       name="inicio"
                       @if(!empty($solicitacao) && $solicitacao->inicio != null) value="{{$solicitacao->inicio}}"
                       @else value="{{old('inicio')}}" @endif
                       required
                       autocomplete="inicio" autofocus>
                @error('inicio')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">

                <label for="inicio">Fim:<strong style="color: red">*</strong></label>
                <input class="form-control @error('fim') is-invalid @enderror" id="fim" type="date" name="fim"
                       @if(!empty($solicitacao) && $solicitacao->fim != null) value="{{$solicitacao->fim}}"
                       @else value="{{old('fim')}}" @endif
                       required
                       autocomplete="fim" autofocus>
                @error('fim')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <h3 class="subtitulo">Titulo do Projeto / Aula Prática / Treinamento</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="titulo_pt">Título em Português:<strong style="color: red">*</strong></label>
                <input class="form-control @error('titulo_pt') is-invalid @enderror" id="titulo_pt" type="text"
                       name="titulo_pt"
                       value="@if(!empty($solicitacao) && $solicitacao->titulo_pt != null) {{$solicitacao->titulo_pt}} @else {{ old('titulo_pt') }} @endif"
                       required
                       autocomplete="titulo_pt" autofocus>
                @error('titulo_pt')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-sm-4">
                <label for="titulo_en">Titulo em Inglês (apenas para projeto):</label>
                <input class="form-control @error('titulo_en') is-invalid @enderror" id="titulo_en" type="text"
                       name="titulo_en"
                       value="@if(!empty($solicitacao) && $solicitacao->titulo_en != null) {{$solicitacao->titulo_en}} @else {{ old('titulo_en') }} @endif"
                       autocomplete="titulo_en" autofocus>
                @error('titulo_en')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="col-12 mt-2">
                <h3 class="subtitulo">Área e Subárea do Conhecimento
                    <a target="_blank"
                    href="http://lattes.cnpq.br/documents/11871/24930/TabeladeAreasdoConhecimento.pdf/d192ff6b-3e0a-4074-a74d-c280521bd5f7"
                    title="Para mais informações sobre das áreas e subáreas de conhecimento, acessar documento do CNPQ." style="color: darkred">
                     <i class="fa-solid fa-circle-info fa-lg"></i>
                    </a>
                </h3>
            </div>
            <div class="form-group col-md-4">
              <label for="grandeArea" class="col-form-label">{{ __('Grande Área') }} <span style="color: red; font-weight:bold">*</span></label>
                <select class="form-control @error('grandeArea') is-invalid @enderror" id="grandeArea" name="grandeArea" onchange="areas()" >
                  <option value="" disabled selected hidden>Selecione a Grande Área</option>
                  @foreach($grandeAreas as $grandeArea)
                  <option @if(old('grandeArea') !== null ? old('grandeArea') : (isset($solicitacao) ? $solicitacao->grande_area_id : '')
                          == $grandeArea->id ) selected @endif value="{{$grandeArea->id}}">{{$grandeArea->nome}}</option>
                  @endforeach
                </select>
                @error('grandeArea')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
              <div class="form-group col-md-4">
                <label for="area" class="col-form-label">{{ __('Área') }} <span style="color: red; font-weight:bold">*</span></label>
                  <input type="hidden" id="oldArea" value="{{ old('area') }}">
                  <select class="form-control @error('area') is-invalid @enderror" id="area" name="area" onchange="subareas()" >
                    <option value="" disabled selected hidden>Selecione a Área</option>
                    @foreach($areas as $area)
                  <option @if(old('area') !== null ? old('area') : (isset($solicitacao) ? $solicitacao->area_id : '')
                          == $area->id ) selected @endif value="{{$area->id}}">{{$area->nome}}</option>
                  @endforeach
                  </select>
                  @error('area')
                  <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="subArea" class="col-form-label">{{ __('Subárea') }} <span style="color: red; font-weight:bold">*</span></label>
                  <input type="hidden" id="oldSubArea" value="{{ old('subArea') }}">
                  <select class="form-control @error('subArea') is-invalid @enderror" id="subArea" name="subArea" >
                    <option value="" disabled selected hidden>Selecione a Subárea</option>
                    @foreach($subAreas as $subArea)
                      <option @if(old('subArea') !== null ? old('subArea') : (isset($solicitacao) ? $solicitacao->sub_area_id : '')
                              ==$subArea->id ) selected @endif value="{{$subArea->id}}">{{$subArea->nome}}</option>
                    @endforeach
                  </select>

                  @error('subArea')
                  <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
        </div>

        @include('component.botoes_new_form')
    </form>

</div>

<script>
    @if(!empty($solicitacao) && $solicitacao->outra_area_conhecimento != null)
    $(function () {
        if($('#area_conhecimento').val() == 'outras')
        {
            $('#outra_area_conhecimento_div').show();
        }
    })
    @endif

    $('#area_conhecimento').on('change', function () {
        if ($('#area_conhecimento').val() != 'outras') {
            $('#outra_area_conhecimento_div').hide();
            $('#outra_area_conhecimento').prop('required', false);
        } else {
            $('#outra_area_conhecimento_div').show();
            $('#outra_area_conhecimento').prop('required', true);

        }
    });

     /*
  * FUNCAO: Gerar as areas
  *
  */
  function areas() {
      var grandeArea = $('#grandeArea').val();
      $.ajax({
          type: 'POST',
          url: '{{ route('area.consulta') }}',
          data: 'id='+grandeArea ,
          headers:
          {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: (dados) => {

          if (dados.length > 0) {
            if($('#oldArea').val() == null || $('#oldArea').val() == ""){
              var option = '<option selected disabled>-- Área --</option>';
            }
            $.each(dados, function(i, obj) {
              if($('#oldArea').val() != null && $('#oldArea').val() == obj.id){
                option += '<option selected value="' + obj.id + '">' + obj.nome + '</option>';
              }else{
                option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
              }
            })
          } else {
            var option = "<option selected disabled>-- Área --</option>";
          }
          $('#area').html(option).show();
          subareas();
        },
          error: (data) => {
              console.log(data);
          }

      })
    }
  /*
  * FUNCAO: Gerar as subareas
  *
  */
  function subareas() {
      var area = $('#area').val();
      $.ajax({
          type: 'POST',
          url: '{{ route('subarea.consulta') }}',
          data: 'id='+area ,
          headers:
          {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: (dados)=> {
          if (dados.length > 0) {
            if($('#oldSubArea').val() == null || $('#oldSubArea').val() == ""){
              var option = '<option selected disabled>-- Subárea --</option>';
            }
            $.each(dados, function(i, obj) {
              if($('#oldSubArea').val() != null && $('#oldSubArea').val() == obj.id){
                option += '<option selected value="' + obj.id + '">' + obj.nome + '</option>';
              }else{
                option += '<option value="' + obj.id + '">' + obj.nome + '</option>';
              }
            })
          } else {
            var option = "<option selected disabled>-- Subárea --</option>";
          }
          $('#subArea').html(option).show();
        },
          error: (dados) => {
              console.log(dados);
          }

      })

    }

</script>
