<?php

namespace App\Repositories\Phim;

use App\Models\Phim;
use App\Repositories\BaseRepository;

class PhimRepository extends BaseRepository implements PhimRepositoryInterface
{
  public function getModel()
  {
    return Phim::class;
  }

}
