<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigracaoRoleUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:modificacao';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todos = User::all();
        $processedCpfs = [];

        foreach ($todos as $user) {
            if (in_array($user->cpf, $processedCpfs)) {
                // CPF já processado, pule este usuário
                continue;
            }

            $contasComMesmoCpf = User::where('cpf', $user->cpf)->get();

            if ($contasComMesmoCpf->count() > 1) {
                foreach ($contasComMesmoCpf as $userextra) {
                    $user->roles()->attach($userextra->tipo_usuario_id);

                    // Adicione o CPF à lista de CPFs processados
                    $processedCpfs[] = $userextra->cpf;
                }
            } else {
                $user->roles()->attach($user->tipo_usuario_id);

                // Adicione o CPF à lista de CPFs processados
                $processedCpfs[] = $user->cpf;
            }
        }

    }
}
