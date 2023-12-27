<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'fname',
        'mname',
        'lname',
        'dob',
        'sex',
        'occupation',
        'province',
        'address',
        'education',
        'sector',
        'contact',
        'email',
    ];

    public static function boot()
    {
        parent::boot();

        // Event listener to generate a unique form code before creating a new record
        static::creating(function ($model) {
            $model->id = self::generateUniqueFormCode();
        });
    }

    private static function generateUniqueFormCode()
    {
        $table = 'forms';

        for ($i = 0; $i < 100; $i++) {
            $formCode = mt_rand(1000000, 9999999);

            // Check if the generated form_code already exists in the table
            if (!self::where('id', $formCode)->exists()) {
                // If it doesn't exist, return the unique value
                return $formCode;
            }
        }

        throw new \Exception('Unable to generate a unique form code');
    }

    public function attended()
    {
        return $this->hasOne(Attendance::class, 'form_id');
    }
}
