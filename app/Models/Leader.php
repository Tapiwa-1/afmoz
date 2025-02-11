<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'phone',
        'bio',
        'church_id',
    ];

    /**
     * Get the church that the leader belongs to.
     */
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
