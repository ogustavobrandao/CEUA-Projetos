<?php

namespace App\Console\Commands;

use App\Mail\AvisoContaDuplicadaDeletada;
use App\Models\Avaliacao;
use App\Models\Solicitacao;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class JuntarPerfis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:juntarperfis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Agrupa todos os relacionamentos de usuários com mais de uma conta em uma só';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::select('cpf')->groupBy('cpf')->havingRaw('COUNT(*) > 1')->get();
        foreach ($users as $user) {
            $user = User::where('cpf', $user->cpf)->has('roles')->first();
            $outros = User::where('cpf', $user->cpf)->doesntHave('roles')->pluck('id');
            Avaliacao::whereIn('user_id', $outros)->update(['user_id' => $user->id]);
            Solicitacao::whereIn('user_id', $outros)->update(['user_id' => $user->id]);

            Mail::to($user)->send(new AvisoContaDuplicadaDeletada($user));
            User::whereIn('id', $outros)->delete();
        }
        return Command::SUCCESS;
    }
}
