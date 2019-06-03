<?php

namespace Modules\Qlyloaiquanao\Repositories\Cache;

use Modules\Qlyloaiquanao\Repositories\QlyloaiquanaoRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlyloaiquanaoDecorator extends BaseCacheDecorator implements QlyloaiquanaoRepository
{
    public function __construct(QlyloaiquanaoRepository $qlyloaiquanao)
    {
        parent::__construct();
        $this->entityName = 'qlyloaiquanao.qlyloaiquanaos';
        $this->repository = $qlyloaiquanao;
    }
}
