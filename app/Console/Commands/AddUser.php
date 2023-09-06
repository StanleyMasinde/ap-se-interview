<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Full name');
        $email = $this->ask('Email');
        $password = $this->secret('password');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash ::make($password)
        ]);

        $this->info("Account created for {$name}!");
    }
}
