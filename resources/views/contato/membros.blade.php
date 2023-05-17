@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">MEMBROS</span>
    </div>

    <div class="members-section">
        <h5 class="text-center">A CEUA-UFAPE terá composição multidisciplinar e multiprofissional e será composta por docentes titulares:</h5>
        <br>
        <div class="member">
            <h4>DENISE GRANATO CHUNG</h4>
            <p class="member-role">Coordenadora</p>
        </div>

        <div class="member">
            <h4>RACHEL MARIA DE LYRA NEVES</h4>
            <p class="member-role">Vice coordenadora</p>
        </div>

        <div class="member">
            <h4>DENISE FONTANA FIGUEIREDO</h4>
        </div>

        <div class="member">
            <h4>OMER CAVALCANTI DE ALMEIDA</h4>
        </div>

        <div class="member">
            <h4>SÍLVIA ELAINE RODOLFO DE SÁ LORENA</h4>
        </div>

        <div class="member">
            <h4>WALLACE RODRIGUES TELINO JÚNIOR</h4>
        </div>

        <div class="member">
            <h4>SAMMARA DRINNY DE SIQUEIRA CORREIA</h4>
        </div>

        <h4>Membros suplentes os docentes</h4>
        <br>

        <div class="member">
            <h4>DANIELA OLIVEIRA</h4>
        </div>

        <div class="member">
            <h4>JORGE EDUARDO CAVALCANTE LUCENA</h4>
        </div>

        <div class="member">
            <h4>MARCELO MENDONÇA</h4>
        </div>

        <!-- Adicione mais membros conforme necessário -->

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

    .member {
        padding: 20px;
        background-color: #f5f5f5;
        margin-bottom: 20px;
    }

    .member h4 {
        margin-bottom: 10px;
    }

    .member-role {
        font-weight: bold;
    }

    .member-description {
        color: #555;
    }
</style>

@endsection