<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Hash;
use Illuminate\Console\Command;

class AddAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-admin';

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

        Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $this->info("Account created for {$name}!");
    }
}
