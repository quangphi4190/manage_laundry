<?php

namespace Modules\Qlytiems\Repositories\Cache;

use Modules\Qlytiems\Repositories\QlytiemsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlytiemsDecorator extends BaseCacheDecorator implements QlytiemsRepository
{
    public function __construct(QlytiemsRepository $qlytiems)
    {
        parent::__construct();
        $this->entityName = 'qlytiems.qlytiems';
        $this->repository = $qlytiems;
    }
}
