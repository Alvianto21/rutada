<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'nik',
        'place_of_birth',
        'date_of_birth',
        'address',
        'phone',
        'photo',
        'job',
        'marital_status',
        'gender',
        'religion',
        'is_admin',
        'blood_type',
    ];

    /**
     * The attributes that are protected.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * The attributes that should be appended to the model's array form.
     *
     * @return string
     */
    public function getDateOfBirthFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->date_of_birth)->format('d-m-Y');
    }

    /**
     * the attributes for search feature
     */
    public function scopeSearch(Builder $query, $search)
    {
        return $query->where('nik', 'like', '%' . $search . '%')
                     ->orWhere('name', 'like', '%' . $search . '%')
                     ->orWhere('email', 'like', '%' . $search . '%')
                     ->orWhere('username', 'like', '%' . $search . '%');
    }

    /**
     * the attributes for filter feature
     */
    public function scopeFilter(Builder $query, array $filter){
        $query->when($filter['gender'] ?? false, function($query, $gender) {
            return $query->where('gender', $gender);
        })->when($filter['marital_status'] ?? false, function($query, $marital_status) {
            return $query->where('marital_status', $marital_status);
        })->when($filter['blood_type'] ?? false, function($query, $blood_type) {
            return $query->where('blood_type', $blood_type);
        })->when($filter['religion'] ?? false, function($query, $religion) {
            return $query->where('religion', $religion);
        });
    }
}
