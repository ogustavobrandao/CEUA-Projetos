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
    protected $signature = 'update:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =
        'Atualiza o tipo do usuário, deixando de utilizar o atributo tipo_usuario_id para utilizar o relacionamento de roles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todos = User::orderBy('id')->get()->unique('cpf');

        foreach ($todos as $user) {
            $perfis = User::where('cpf', $user->cpf)->pluck('tipo_usuario_id');
            $user->roles()->attach($perfis);
        }
        return Command::SUCCESS;
    }
}
