<?php

namespace Modules\Qlydichvu\Repositories\Cache;

use Modules\Qlydichvu\Repositories\QlydichvuRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlydichvuDecorator extends BaseCacheDecorator implements QlydichvuRepository
{
    public function __construct(QlydichvuRepository $qlydichvu)
    {
        parent::__construct();
        $this->entityName = 'qlydichvu.qlydichvus';
        $this->repository = $qlydichvu;
    }
}
