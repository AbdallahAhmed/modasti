<?php

namespace Dot\Posts\Models;

use Cache;
use Dot\Media\Models\Media;
use Dot\Platform\Model;
use Dot\Users\Models\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as OModel;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;


/**
 * Class Post
 * @package Dot\Posts\Models
 */
class Brand extends Model
{

    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'brands';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var array
     */
    protected $searchable = ['title', 'excerpt'];

    /**
     * @var int
     */
    protected $perPage = 20;

    /**
     * @var array
     */
    protected $sluggable = [
        'slug' => 'title',
    ];

    /**
     * @var array
     */
    protected $creatingRules = [
        'title' => 'required',

    ];

    /**
     * @var array
     */
    protected $updatingRules = [
        'title' => 'required',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new class implements Scope
        {
            /**
             * Apply the scope to a given Eloquent query builder.
             *
             * @param  \Illuminate\Database\Eloquent\Builder $builder
             * @param  \Illuminate\Database\Eloquent\Model $model
             * @return Builder
             */
            public function apply(Builder $builder, OModel $model)
            {

                if (GUARD == "api" && Auth::guard("api")->check()) {
                    $lang = Auth::guard("api")->user()->lang;
                } else {

                }
                $lang = app()->getLocale();
                if ($lang) {
                    return $builder->where('brands.lang', $lang);
                }

            }
        });
    }


    /**
     * Image relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(Media::class, "id", "image_id");
    }

    /**
     * Items relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function posts()
    {
        return $this->hasMany(\App\Model\Post::class, "brand_id");
    }

    /**
     * User relation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

//    public function
}
