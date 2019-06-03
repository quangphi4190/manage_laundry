<?php

namespace Modules\Qlygoithang\Repositories\Cache;

use Modules\Qlygoithang\Repositories\QlygoithangRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlygoithangDecorator extends BaseCacheDecorator implements QlygoithangRepository
{
    public function __construct(QlygoithangRepository $qlygoithang)
    {
        parent::__construct();
        $this->entityName = 'qlygoithang.qlygoithangs';
        $this->repository = $qlygoithang;
    }
}
