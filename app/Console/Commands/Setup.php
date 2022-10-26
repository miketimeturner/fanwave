<?php

namespace App\Console\Commands;

use App\Models\User;
use Fanwave\ApiService\Models\Credential;
use Fanwave\ApiService\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->line('Hi! Welcome to Fanwave. We need some information to get you set up');
        $name = $this->getUsersName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $apiKey = $this->getApiKey();

        User::query()->updateOrCreate(
            [
                'email' => $email,
            ],
            [
                'name' => $name,
                'password' => bcrypt($password),
            ]
        );

        $this->integrate($apiKey);
    }

    public function getUsersName()
    {
        $name = $this->ask('Enter your name');

        if (!$name) {
            $this->error('Please provide your name');
            return $this->getUsersName();
        }

        return $name;
    }

    public function getEmail()
    {
        $email = $this->ask('Enter your email address');

        if (!$email) {
            $this->error('Please provide an email address');
            return $this->getEmail();
        }

        return $email;
    }

    public function getPassword()
    {
        $password = $this->secret('Enter your password');

        if (!$password) {
            $this->error('Please enter a valid password');
            return $this->getPassword();
        }

        return $password;
    }

    public function getApiKey()
    {
        $key = $this->secret('To use our service you need an X-RapidAPI-Key');

        if (!$key) {
            $this->error('Please enter a valid X-RapidAPI-Key');
            return $this->getApiKey();
        }

        return $key;
    }

    public function integrate($token)
    {
        DB::transaction(function () use ($token) {
            $service = Service::query()->updateOrCreate([
                'name' => 'API Football',
                'key' => 'ApiFootball'
            ]);

            $integration = $service->integration()->firstOrNew();

            $credentials = Credential::query()->updateOrCreate(
                [
                    'access_token' => $token
                ]
            );

            $integration->credentials()->associate($credentials);

            $integration->save();
        });
    }
}
