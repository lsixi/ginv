# 说明
`ginv`是一个简单干净的php微服务框架.

# 安装
创建一个`demo`的服务(项目), 命令如下:
```bash
composer create-project --prefer-dist ginv/ginv demo
```
# 版本要求
* php7以上

# 依赖
* [yar](http://pecl.php.net/package/yar "yar扩展PECL安装地址")
* [SeasLog](http://pecl.php.net/package/SeasLog "SeasLog扩展PECL安装地址")


# 一个简单的例子
```php
<?php

namespace api\v1;
use api\Base;

class Blog extends Base
{
    /**
     * 分页获取博客列表
     * @param string $account_uuid 用户uuid
     * @param int    $page 当前页
     * @param int    $limit 每页数量
     *
     * @return array
     */
    public function blogList($account_uuid = '',$page = 1, $limit = 10) {
        $offset = ($page-1) * $limit;
        $db = db();
        $params = [
            'account_uuid' => $account_uuid,
            'limit' => $limit,
            'offset' => $offset
        ];
        $count = $db->count('account.count',$params);
        $list = $db->query('account.list',$params);
        $account_uuid_array = array_column($list,'account_uuid');
        // 获取用户的用户名
        $account_array = $this->rpc('demo_account','account')->call('accountList',$account_uuid_array);
        foreach ($list as &$item) {
            foreach ($account_array as $account) {
                if ($item['account_uuid'] == $account['account_uuid']) {
                    $item['account_name'] = $account['account_name'];
                }
            }
        }
        $result = compact('count', 'list');
        return $this->set($result)->response();
    }
}
```
