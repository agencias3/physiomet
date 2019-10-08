<?php

namespace AgenciaS3\Repositories;

use AgenciaS3\Entities\BannerMobile;
use AgenciaS3\Entities\Segment;
use AgenciaS3\Validators\BannerMobileValidator;
use AgenciaS3\Validators\SegmentValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SegmentRepositoryEloquent.
 *
 * @package namespace AgenciaS3\Repositories;
 */
class SegmentRepositoryEloquent extends BaseRepository implements SegmentRepository, CacheableInterface
{

    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Segment::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return SegmentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
