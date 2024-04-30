<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Student extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';
    protected $guarded = [];

    public function billings()
    {
        return $this->hasMany(Billing::class, ['year', 'payment_category'], ['registered', 'category']);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'ids', 'id');
    }
}
