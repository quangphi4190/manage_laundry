<?php

namespace Modules\Qlythuebaocuakhach\Repositories\Cache;

use Modules\Qlythuebaocuakhach\Repositories\QlythuebaocuakhachRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlythuebaocuakhachDecorator extends BaseCacheDecorator implements QlythuebaocuakhachRepository
{
    public function __construct(QlythuebaocuakhachRepository $qlythuebaocuakhach)
    {
        parent::__construct();
        $this->entityName = 'qlythuebaocuakhach.qlythuebaocuakhaches';
        $this->repository = $qlythuebaocuakhach;
    }
}
