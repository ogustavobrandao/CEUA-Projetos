<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CorrigirTipo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'corrigir:tipo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Corrigi a coluna tipo na tabela solicitacoes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::table('solicitacaos')->where('tipo', 'Extencao')->update(['tipo' => 'Extensão']);

        return Command::SUCCESS;
    }
}
