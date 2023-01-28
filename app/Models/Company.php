<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'logo',
        'address',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
