<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employe';

    /**
     * The table fillable with the model.
     *
     * @var string
     */
    protected $fillable = ['name', 'email', 'company_id'];

    /**
     * Method Belongs To Relationships employe -> company
     * 
     * @return void
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
