<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Customs
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->success()
                ->subject('Verifikasi akun ANORA')
                ->greeting('Halo Stats!!!')
                ->line('Klik link dibawah ini untuk melakukan verifikasi')
                ->action('Verifikasi email', $url)
                ->line('Bila merasa tidak mendaftar ANORA, hiraukan.');
        });
    }
}
