<?php

namespace Modules\Qlydotkhuyenmai\Repositories\Cache;

use Modules\Qlydotkhuyenmai\Repositories\QlydotkhuyenmaiRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlydotkhuyenmaiDecorator extends BaseCacheDecorator implements QlydotkhuyenmaiRepository
{
    public function __construct(QlydotkhuyenmaiRepository $qlydotkhuyenmai)
    {
        parent::__construct();
        $this->entityName = 'qlydotkhuyenmai.qlydotkhuyenmais';
        $this->repository = $qlydotkhuyenmai;
    }
}
