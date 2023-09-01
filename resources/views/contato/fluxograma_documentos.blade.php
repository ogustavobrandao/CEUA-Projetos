@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">FLUXOGRAMA DE SUBMISSÃO E DOCUMENTOS</span>
    </div>

    <br>
    <object data="images/fluxograma.svg" type="image/svg+xml" width="100%" height="600px"> </object>

    <br><br>
    <div class="legislation-section">
        <h3 class="">Arquivos</h3>
        <br>
        <ul class="legislation-list">

            <li>
                <a href="" class="legislation-link">Modelo de Relatório de Acompanhamento de Projeto</a>
            </li>

            <li>
                <a href="{{route('declaracao.consentimento.download')}}" class="legislation-link">Modelo de Termo Livre de Consentimento</a>
            </li>

            <li>
                <a href="{{route('modelo.termo.responsabilidade.download')}}" class="legislation-link">Modelo de Termo de Responsabilidade</a>
            </li>

            <li>
                <a href="{{route('declaracao.isencao.download')}}" class="legislation-link">Solicitação de Certificado de Isenção</a>
            </li>

            <li>
                <a href="" class="legislation-link">Avaliação do Projeto de Pesquisa com uso de Animais pelo Consultor AD-HOC</a>
            </li>

            <li>
                <a href="https://docs.google.com/document/d/1ld-R2B0aX2kjPKBSWmdJg0nhfddc-GaD/edit?usp=sharing&ouid=107356873840947650097&rtpof=true&sd=true" class="legislation-link">Modelo de Ofício de Encaminhamento</a>
            </li>

            <li>
                <a href="https://docs.google.com/document/d/1OGSYRgq3aw3ikb8p0cIWejGIUYY-z3xB/edit?usp=sharing&ouid=107356873840947650097&rtpof=true&sd=true" class="legislation-link">Relatório Parcial/Final</a>
            </li>
        </ul>
    </div>
    <br>
</div>

<style>
.legislation-section {
    background-color: #f7f7f7;
    padding: 20px;
    border-radius: 5px;
}

.legislation-list {
    list-style-type: none;
    padding-left: 0;
}

.legislation-link {
    color: #1e90ff;
    text-decoration: none;
    font-size: 17px;
}

.legislation-link:hover {
    text-decoration: underline;
}
</style>

@endsection
