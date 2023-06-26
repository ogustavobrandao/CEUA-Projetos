@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">MEMBROS</span>
    </div>

    <div class="members-section">
        <h5 class="text-center">A CEUA-UFAPE terá composição multidisciplinar e multiprofissional e será composta por docentes titulares:</h5>
        <br>

        <h4>Docentes</h4>
        <br>

        <ul class="member-list">
            <li>DENISE GRANATO CHUNG - <strong>Coordernadora</strong></li>
            <li>RACHEL MARIA DE LYRA NEVES - <strong>Vice coordenadora</strong></li>
            <li>DENISE FONTANA FIGUEIREDO</li>
            <li>OMER CAVALCANTI DE ALMEIDA</li>
            <li>SÍLVIA ELAINE RODOLFO DE SÁ LORENA</li>
            <li>WALLACE RODRIGUES TELINO JÚNIOR</li>
            <li>SAMMARA DRINNY DE SIQUEIRA CORREIA</li>
        </ul>

        <h4>Suplentes</h4>
        <br>

        <ul class="member-list">
            <li>DANIELA OLIVEIRA</li>
            <li>JORGE EDUARDO CAVALCANTE LUCENA</li>
            <li>MARCELO MENDONÇA</li>
        </ul>

    </div>
</div>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .text-center {
        text-align: center;
    }

    .members-section {
        margin-top: 40px;
    }

    .member-list {
        list-style-type: none;
        margin-left: 0;
        padding-left: 0;
        font-size: 1.1em;
    }
</style>

@endsection
