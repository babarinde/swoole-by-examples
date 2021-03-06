#!/usr/bin/env php
<?php
/**
 * This example shows how to wait for a collection of coroutines to finish in PHP applications. It has 3 coroutines
 * executed, and takes about 3 seconds to finish.
 *
 * How to run this script:
 *     docker exec -t $(docker ps -qf "name=client") bash -c "time ./csp/waitgroup.php"
 *
 * Class \Swoole\Coroutine\WaitGroup is defined in this file:
 *     https://github.com/swoole/swoole-src/blob/master/library/core/Coroutine/WaitGroup.php
 */

use Swoole\Coroutine\WaitGroup;

go(function () {
    $wg = new WaitGroup();

    go(function () use ($wg) {
        $wg->add();
        co::sleep(1);
        $wg->done();
    });

    $wg->add(2); // You don't have to increase the counter one by one.
    go(function () use ($wg) {
        co::sleep(2);
        $wg->done();
    });
    go(function () use ($wg) {
        co::sleep(3);
        $wg->done();
    });

    $wg->wait(); // Wait those 3 coroutines to finish.

    // Any code here won't be executed until all 3 coroutines created in this function finish execution.
});
