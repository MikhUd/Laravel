<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use \App\Filters\QueryFilter;


class PostsModel extends Model
{
    use HasFactory;
    protected $table = 'posts_models';

    public function comment()
    {

        return $this->hasMany(CommentModel::class, 'task_id', 'id')->get()->reverse();

    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
