@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="row" style="border-bottom: #131833 2px solid">
        <h3 class="titulo text-center">SOBRE</h3>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <h3><strong>Apresentação</strong></h3>
            <h5 style="text-align: justify;">
                <p>A CEUA é uma plataforma online dedicada à promoção e regulamentação do uso ético de animais em pesquisas científicas e atividades acadêmicas.</p>
            </h5>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h3><strong>Código-fonte</strong></h3>
                    <h5><a href="https://github.com/lmtsufape/CEUA-Projetos">GitHub</a></h5>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                        <h3><strong>Equipe</strong></h3>
                        <h4 class="mb-3">Docentes</h4>
                        <ul style="font-size: larger; list-style-type: none; padding-left: 0;">
                            <li>Dr. Anderson Fernandes de Alencar (professor)</li>
                            <li>Dr. Felipe Guedes de Araújo (professor)</li>
                            <li>Dr. Ícaro Lins Leitão da Cunha (professor)</li>
                            <li>Dr. Igor Medeiros Vanderlei (professor)</li>
                            <li>Dr. Jean Carlos Teixeira de Araújo (professor)</li>
                            <li>Dr. Mariel José Pimentel de Andrade (professor)</li>
                            <li>Dr. Rodrigo Gusmão de Carvalho Rocha (professor)</li>
                        </ul>

                        <h4 class="mb-3">Desenvolvedores</h4>
                        <ul style="font-size: larger; list-style-type: none; padding-left: 0;">
                            <li>Edgar Vinicius</li>
                            <li>Guilherme Silva de Souza</li>
                            <li>Inês Alessandra</li>
                            <li>José Daniel Florêncio Duarte Filho</li>
                            <li>José Fernando Mendes da Costa</li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
