<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        // * FEDERAIS *

        //RECIFE
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Universidade Federal de Pernambuco (UFPE)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Universidade Federal Rural de Pernambuco (UFRPE)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Federal de Pernambuco (IFPE), antigo CEFET-PE']);
        
        //PETROLINA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Universidade Federal do Vale do São Francisco (UNIVASF)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Federal do Sertão Pernambucano (IFSertão-PE), antigo (CEFET-Petrolina)']);

        //VITÓRIA DE SANTO ANTÃO
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Federal de Pernambuco (IFPE)']);
        // UFPE 

        //CARUARU
        // IF E UFPE

        //BARREIROS
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Federal de Pernambuco (IFPE), antiga EAF-Barreiros']);

        //BELO JARDIM
        // UFRPE
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Federal de Pernambuco (IFPE), antiga (EAFBJ)']);

        //GARANHUNS
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Universidade Federal do Agreste de Pernambuco (UFAPE)']);
        // IFPE
        
        //SERRA TALHADA
        // UFRPE
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Federal do Sertão Pernambucano (IF sertão-PE)']);

        //CABO DE SANTO AGOSTINHO
        // UFRPE
        //IFPE

        // * ESTADUAIS *
        
        //RECIFE 
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Escola Politécnica de Pernambuco (POLI)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências da Administração de Pernambuco (FCAP)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências Médicas de Pernambuco (FCM)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Enfermagem Nossa Senhora das Graças (FENSG)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto de Ciências Biológicas (ICB)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Escola Superior de Educação Física (ESEF)']);
       
        //CAMARAGIBE
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Odontologia de Pernambuco (FOP)']);
        
        //GARANHUNS
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências, Educação e Tecnologia de Garanhuns (FACETEG)']);

        //NAZARÉ DA MATA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Formação de Professores de Nazaré da Mata (FFPNM)']);

        //CARUARU
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências e Tecnologia de Caruaru (FACITEC)']);

        //SERRA TALHADA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Universidade de Pernambuco (UPE)']);


        // * MUNICIPAIS *

        //ARARIPINA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências Agrárias de Araripina (FACIAGRA)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências Humanas e Sociais de Araripina (FACISA)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Formação de Professores de Araripina (FAFOPA)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Educacional Vitória (INEVI)']);

        //ARCOVERDE
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Escola Superior de Saúde de Arcoverde (ESSA)']);
        
        //AFOGADOS DA INGAZEIRA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Formação de Professores de Afogados da Ingazeira (FAFOPAI)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Superior de Educação do Sertão do Pajeú (ISESP)']);

        //GARANHUNS
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências da Administração de Garanhuns (FAGA)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Direito de Garanhuns (FDG)']);

        //GOIANA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências e Tecnologia Prof. Dirson Maciel de Barros (FADIMAB)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Superior de Educação de Goiana (ISEG)']);

        //PALMARES
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências Sociais dos Palmares (FACIP)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Formação de Professores da Mata Sul (FAMASUL)']);

        //SERRA TALHADA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Formação de Professores de Serra Talhada (FAFOPST)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências e Saúde de Serra Talhada (FACISST)']);

        //BELEM DE SAO FRANCISCO
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Centro de Ensino Superior do Vale do São Francisco (CESVASF)']);

        //BELO JARDIM
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Formação de Professores de Belo Jardim (FABEJA)']);

        //CABO DE SANTO AGOSTINHO
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências Humanas e Sociais Aplicadas do Cabo de Santo Agostinho (FACHUCA)']);

        //LIMOEIRO
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências da Administração do Limoeiro (FACAL)']);

        //PETROLINA
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências Aplicadas e Sociais de Petrolina (FACAPE)']);

        //SALGUEIRO
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Faculdade de Ciências Humanas do Sertão Central (FACHUSC)']);

        // * INSTITUTOS DE PESQUISA *
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto Agronômico de Pernambuco (IPA)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Embrapa caprino e ovinos (EMBRAPA)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Embrapa Semiárido (EMBRAPA)']);
        \App\Models\Instituicao::factory(1)->create(['nome' => 'Instituto de Tecnologia de Pernambuco (ITEP)']);
    }
}
