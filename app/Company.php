<?php

namespace App;

use App\Employe;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company';

    /**
     * The table fillable with the model.
     *
     * @var string
     */
    protected $fillable = ['name', 'website', 'email', 'logo'];

    /**
     * Method One To Many company -> employe
     * 
     * @return void
     */
    public function employe()
    {
        return $this->hasMany(Employe::class);
    }
}
