<?php

namespace api\v1;
use api\Base;

class Demo extends Base
{
    /**
     * 一个简单的例子
     * @param int $page
     * @param int $limit
     *
     * @return array
     */
    public function index($page=1, $limit = 10) {
        $db = db();
        $account_list = $db->query('account.list',['page' => $page, 'limit' => $limit]);
        return $this->set($account_list)->response();
    }
}