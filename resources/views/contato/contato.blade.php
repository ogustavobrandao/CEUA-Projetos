@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">CONTATO</span>
    </div>

    <div class="members-section">
        <h5 class="text-center">A CEUA-UFAPE terá composição multidisciplinar e multiprofissional e será composta por docentes titulares:</h5>
        <br>
        <div class="member">
            <h3>CEUA</h3>
            <h4><a href="mailto:ceua@ufape.edu.br" class="col-md-1 p-0">ceua@ufape.edu.br</a></h4>
        </div>

        <div class="member">
            <h3>LMTS</h3>
            <h4><a href="mailto:lmts@ufrpe.br" class="col-md-1 p-0">lmts@ufrpe.br</a></h4>
        </div>

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

    .member h3 {
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
