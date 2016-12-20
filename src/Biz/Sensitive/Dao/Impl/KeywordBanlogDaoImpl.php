<?php

namespace Biz\Sensitive\Dao\Impl;

use Codeages\Biz\Framework\Dao\GeneralDaoImpl;
use Biz\Sensitive\Dao\KeywordBanlogDao;

class KeywordBanlogDaoImpl extends GeneralDaoImpl implements KeywordBanlogDao
{
    protected $table = 'keyword_banlog';

    public function searchBanlogsByUserIds($userIds, $orderBy, $start, $limit)
    {
        if (empty($userIds)) {
            return array();
        }

        $marks = str_repeat('?,', count($userIds) - 1).'?';
        $sql   = "SELECT * FROM {$this->table} WHERE userId IN ({$marks}) ORDER BY id DESC LIMIT {$start}, {$limit};";
        return $this->db()->fetchAll($sql, $userIds);
    }

    protected function _createQueryBuilder($conditions)
    {
        $conditions = array_filter($conditions, function ($v) {
            if ($v === 0) {
                return true;
            }

            if (empty($v)) {
                return false;
            }
            return true;
        });
        if (isset($conditions['keyword'])) {
            if ($conditions['searchBanlog'] == 'id') {
                $conditions['id'] = $conditions['keyword'];
            } elseif ($conditions['searchBanlog'] == 'name') {
                $conditions['keywordName'] = "%{$conditions['keyword']}%";
            }
        }

        return $this->createDynamicQueryBuilder($conditions)
            ->from($this->table, 'keyword_banlog')
            ->andWhere('id = :id')
            ->andWhere('userId = :userId')
            ->andWhere('state = :state')
            ->andWhere('keywordId = :keywordId')
            ->andWhere('UPPER(keywordName) LIKE :keywordName');
    }
}
