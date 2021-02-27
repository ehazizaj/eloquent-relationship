<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User  extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'active',
    ];


    /**
     * Get the details associated with the user.
     */
    public function details(): HasOne
    {
        return $this->hasOne(UserDetail::class);
    }
}
