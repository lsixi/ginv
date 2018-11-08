<?php

return [
    /*
    |--------------------------------------------------------------------------
    | 系统运行模式
    |--------------------------------------------------------------------------
    |
    | 系统运行模式model可以是调试模式或线上模式. 调试模式时,可以通过web模式访问test文件的test
    | 函数,用于以web浏览器调试服务, 路径:http://{host}/{version}/{class}/{method},
    | test 方法内可以针对性的自行修改以调用服务
    |
    */
    'model' => 'debug',
    /*
    |--------------------------------------------------------------------------
    | 系统编号
    |--------------------------------------------------------------------------
    |
    | 系统编号code用于在多个系统之间进行简单区分.
    | 期望返回的错误中带上系统编号,以更好的跟踪错误
    |
    */
    'code'  => 10,
    /*
    |--------------------------------------------------------------------------
    | 系统代号
    |--------------------------------------------------------------------------
    |
    | 系统代号name用于在多个系统之间进行区分.
    | 相比于code, 代号更直观
    |
    */
    'name'  => 'demo',
];
