<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use /* HasApiTokens, */ HasFactory, Notifiable, HasRoles, SoftDeletes;

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@admin.hu');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'new_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function creators_worksheets(): HasMany
    {
        return $this->hasMany(Worksheet::class, 'creator_id');
    }
    public function repairers_worksheets(): HasMany
    {
        return $this->hasMany(Worksheet::class, 'repairer_id');
    }
    
    public function creators_report(): HasMany
    {
        return $this->hasMany(Report::class, 'creator_id');
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
        ];
    }
}
