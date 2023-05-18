@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="row" style="border-bottom: #131833 2px solid">
        <span class="titulo text-center">CALENDÁRIO DAS REUNIÕES 2023</span>
    </div>

    <div class="calendar-section">
        <br>
        <h2 class="text-center">CEUA</h2>
        <br>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="align-middle">Dia</th>
                        <th class="align-middle">Prazo de Submissão</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">15 de Junho - Quinta-Feira</td>
                        <td class="align-middle">15 de Maio - Segunda-Feira</td>
                    </tr>
                    <tr>
                        <td class="align-middle">14 de Julho - Sexta-Feira</td>
                        <td class="align-middle">14 de Junho - Quarta-Feira</td>
                    </tr>
                    <tr>
                        <td class="align-middle">15 de Agosto - Terça-Feira</td>
                        <td class="align-middle">15 de Julho - Sábado</td>
                    </tr>
                    <tr>
                        <td class="align-middle">15 de Setembro - Sexta-Feira</td>
                        <td class="align-middle">15 de Agosto - Terça-Feira</td>
                    </tr>
                    <tr>
                        <td class="align-middle">16 de Outubro - Segunda-Feira</td>
                        <td class="align-middle">15 de Setembro - Sexta-Feira</td>
                    </tr>
                    <tr>
                        <td class="align-middle">20 de Novembro - Segunda-Feira</td>
                        <td class="align-middle">20 de Outubro - Sexta-Feira</td>
                    </tr>
                    <tr>
                        <td class="align-middle">13 de Dezembro - Quarta-Feira</td>
                        <td class="align-middle">13 de Novembro - Segunda-Feira</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
