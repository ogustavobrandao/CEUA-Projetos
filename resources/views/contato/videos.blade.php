@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">GALERIA DE VÍDEOS</span>
    </div>

    <br>
    <div class="legislation-section">
        <h3 class="">Vídeos</h3>
        <br>
        <ul class="legislation-list">
            <li>
                <a href="{{'https://drive.google.com/file/d/1Vej5O-ZuyyJSzH5l4qxPRJu450P0CD1_/view?usp=sharing' }}" target="_blank" class="legislation-link">Diretrizes do Concea para aulas práticas em zootecnia</a>
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
