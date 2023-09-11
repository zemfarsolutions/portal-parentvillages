<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scholarship_id',
        'slug',
        'name',
        'email',
        'date',
        'appartment',
        'city',
        'state',
        'postal_code',
        'phone',
        'award_letter',
        'transcript_letter',
        'high_school',
        'plan',
        'acceptance_letter',
        'status'

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id', 'id');
    }
    public function guardians(){

        return $this->hasMany(UserApplicationGuardian::class, 'user_application_id', 'id');

    }
    public function answers(){

        return $this->hasMany(UserApplicationAnswer::class, 'user_application_id', 'id');

    }
    public function references(){
        
        return $this->hasMany(UserApplicationReference::class, 'user_application_id', 'id');
    }

}
