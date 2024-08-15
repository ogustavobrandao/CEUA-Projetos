@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">CALENDÁRIO DAS REUNIÕES 2024</span>
    </div>

    <div class="calendar-section">
        <br>
        <h2 class="text-center">CEUA</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle">Data das Reuniões</th>
                        <th class="align-middle">Data Limite para Submissão</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">14 de junho de 2024</td>
                        <td class="align-middle">15 de maio de 2024</td>
                    </tr>
                    <tr>
                        <td class="align-middle">15 de julho de 2024</td>
                        <td class="align-middle">15 de junho de 2024</td>
                    </tr>
                    <tr>
                        <td class="align-middle">15 de agosto de 2024</td>
                        <td class="align-middle">15 de julho de 2024</td>
                    </tr>
                    <tr>
                        <td class="align-middle">16 de setembro de 2024</td>
                        <td class="align-middle">15 de agosto de 2024</td>
                    </tr>
                    <tr>
                        <td class="align-middle">16 de outubro de 2024</td>
                        <td class="align-middle">15 de setembro de 2024</td>
                    </tr>
                    <tr>
                        <td class="align-middle">14 de novembro de 2024</td>
                        <td class="align-middle">15 de outubro de 2024</td>
                    </tr>
                    <tr>
                        <td class="align-middle">16 de dezembro de 2024</td>
                        <td class="align-middle">15 de dezembro de 2024</td>
                    </tr>
                    <tr>
                        <td class="align-middle">14 de fevereiro de 2025</td>
                        <td class="align-middle">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
