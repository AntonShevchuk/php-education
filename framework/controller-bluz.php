<?php

/**
 * @privilege Test
 * @acl       Read
 * @acl       Write
 * @cache     5 min
 * @method CLI
 * @method GET
 * @route     /example/
 * @route     /example/{$a}/{$b}/{$c}
 *
 * @param int    $a
 * @param float  $b
 * @param string $c
 *
 * @return array
 */
return function ($a, $b, $c = null) {
    /**
     * @var Controller $this
     */
    return [];
};