<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\Post;
use AgenciaS3\Validators\PostValidator;
use Carbon\Carbon;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository, CacheableInterface
{

    use CacheableRepository;

    protected $fieldSearchable = [
        'name' => 'like',
        'description' => 'like',
        'postTags.tag.name' => 'like'
    ];

    public function getPostsRecent($post_id, $limit)
    {
        return $this->with('images')
            ->scopeQuery(function ($query) use ($post_id) {
                $query = $query->where('active', 'y')
                    ->where('date_publish', '<=', Carbon::now())
                    ->where('id', '<>', $post_id)
                    ->orderBy('date', 'desc');

                return $query;
            })->paginate($limit);
    }

    public function getPostsTag($tag, $limit)
    {
        return $this->with('images')
            ->scopeQuery(function ($query) use ($tag) {
                $query = $query->leftjoin('post_tags as pt', 'pt.post_id', '=', 'posts.id')
                    ->select('posts.*')
                    ->where('pt.tag_id', '=', $tag->id)
                    ->where('active', '=', 'y')
                    ->where('date_publish', '<=', Carbon::now())
                    ->orderBy('date', 'desc');
                return $query;
            })->paginate($limit);
    }

    public function getPostsSegment($segment_id, $limit)
    {
        return $this->with('images')
            ->scopeQuery(function ($query) use ($segment_id) {
                $query = $query->where('active', '=', 'y')
                    ->where('segment_id', $segment_id)
                    ->where('date_publish', '<=', Carbon::now())
                    ->orderBy('date', 'desc');
                return $query;
            })->paginate($limit);
    }

    public function getPostsService($service, $limit)
    {
        return $this->with('images')
            ->scopeQuery(function ($query) use ($service) {
                $query = $query->leftjoin('post_services as ps', 'ps.post_id', '=', 'posts.id')
                    ->select('posts.*')
                    ->where('ps.service_id', '=', $service->id)
                    ->where('active', '=', 'y')
                    ->where('date_publish', '<=', Carbon::now())
                    ->orderBy('date', 'desc');
                return $query;
            })->paginate($limit);
    }

    public function getPostsActive($limit)
    {
        return $this->with('images')
            ->scopeQuery(function ($query) {
                $query = $query->where('active', '=', 'y')
                    ->where('date_publish', '<=', Carbon::now())
                    ->orderBy('date', 'desc');
                return $query;
            })->paginate($limit);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return PostValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
