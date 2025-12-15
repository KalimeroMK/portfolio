<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthentication;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthenticationRecovery;
use Filament\Auth\MultiFactor\Email\Contracts\HasEmailAuthentication;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, HasAppAuthentication, HasAppAuthenticationRecovery, HasEmailAuthentication
{
    /** @use HasFactory<UserFactory> */

    use HasFactory, Notifiable;


    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'custom_fields',
        'app_authentication_secret',
        'app_authentication_recovery_codes',
        'email_authentication_enabled',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'app_authentication_secret',
        'app_authentication_recovery_codes',
    ];

    /*
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasVerifiedEmail();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
            'custom_fields' => 'array',
            'app_authentication_secret' => 'encrypted',
            'app_authentication_recovery_codes' => 'array',
            'email_authentication_enabled' => 'boolean',
        ];
    }

    // HasAppAuthentication interface methods
    public function getAppAuthenticationSecret(): ?string
    {
        return $this->app_authentication_secret;
    }

    public function saveAppAuthenticationSecret(?string $secret): void
    {
        $this->app_authentication_secret = $secret;
        $this->save();
    }

    public function getAppAuthenticationHolderName(): string
    {
        return $this->email;
    }

    // HasAppAuthenticationRecovery interface methods
    public function getAppAuthenticationRecoveryCodes(): ?array
    {
        return $this->app_authentication_recovery_codes;
    }

    public function saveAppAuthenticationRecoveryCodes(?array $codes): void
    {
        $this->app_authentication_recovery_codes = $codes;
        $this->save();
    }

    // HasEmailAuthentication interface methods
    public function hasEmailAuthentication(): bool
    {
        return $this->email_authentication_enabled ?? false;
    }

    public function toggleEmailAuthentication(bool $condition): void
    {
        $this->email_authentication_enabled = $condition;
        $this->save();
    }
}
