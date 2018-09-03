<?php
/**
 * Created by PhpStorm.
 * User: omarf
 * Date: 9/2/2018
 * Time: 7:44 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'github', 'twitter', 'location', 'latest_article_published'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}