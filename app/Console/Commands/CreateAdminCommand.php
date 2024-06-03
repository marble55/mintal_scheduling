<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mss:admin {username} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will generate a new Admin user for the app';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('username');
        $email = $this->argument('email');
        $password = $this->argument('password');

        $data = [
            'name' => $name, 
            'email'=> $email,
            'password'=> $password, 
            'is_admin' => 1
        ];
        $user = User::createWithFaculty($data);

        $user->is_admin = 1;
        $user->save();

        $this->info('New admin is created!');
        $this->info('Username: '.$user->name.'| Email: '. $user->email.'| Password:'.$password);
    }
}
