<?php

namespace Modules\Qlythietbi\Repositories\Cache;

use Modules\Qlythietbi\Repositories\QlythietbiRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheQlythietbiDecorator extends BaseCacheDecorator implements QlythietbiRepository
{
    public function __construct(QlythietbiRepository $qlythietbi)
    {
        parent::__construct();
        $this->entityName = 'qlythietbi.qlythietbis';
        $this->repository = $qlythietbi;
    }
}
