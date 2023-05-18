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
        border-radius: 8px;
    }

    .member h3 {
        margin-bottom: 10px;
        color: #131833;
    }

    .member h4 {
        margin-top: 5px;
    }

    .member a {
        color: #131833;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .member a:hover {
        color: #007bff;
    }
</style>

@endsection
