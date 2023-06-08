<?php

namespace App\Services\Phim;

use App\Repositories\Phim\PhimRepositoryInterface;
use App\Services\BaseService;

class PhimService extends BaseService implements PhimServiceInterface
{
    public $repository;

    public function __construct(PhimRepositoryInterface $PhimRepository)
    {
        $this->repository = $PhimRepository;
    }

}
