<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ContestComment extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='contests_comments';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'comment', 'contest_id', 'user_id'
    ];


    /**
     * User relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
