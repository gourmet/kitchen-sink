<?php

namespace Gourmet\KitchenSink\Model\Table\Traits;

use Cake\ORM\Query;

trait CachedFinderTrait
{
    public function findCached(Query $query, array $options)
    {
        if ($conditions = $query->clause('where')) {
            $query->cache(function($q) use ($conditions) {
                return $this->table() . '-' . md5(serialize($conditions));
            });
        }
        return $query;
    }
}
