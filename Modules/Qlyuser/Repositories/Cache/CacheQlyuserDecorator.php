<?php

namespace Modules\Qlyuser\Repositories\Cache;

use Modules\Qlyuser\Repositories\QlyuserRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlyuserDecorator extends BaseCacheDecorator implements QlyuserRepository
{
    public function __construct(QlyuserRepository $qlyuser)
    {
        parent::__construct();
        $this->entityName = 'qlyuser.qlyusers';
        $this->repository = $qlyuser;
    }
}
