<?php
namespace Application;

use Framework\Cache;
use Framework\Method;
use Framework\Permission;
use Framework\Privilege;
use Framework\Route;

/**
 * @param int $amount
 * @param float $price
 * @param string|null $comment
 * @return array|null
 */
return

#[Privilege('Management')]
#[Permission(Permission::READ | Permission::WRITE)]
#[Method(Method::CLI | Method::GET)]
#[Route('/example/{$amount}/{$price}/')]
#[Route('/example/{$amount}/{$price}/{$comment}')]
#[Cache(5*60)]

function (
    int $amount,
    float $price,
    ?string $comment = null
): ?array {
    $total = $amount * $price;
    return [
        'total' => $total,
        'comment' => $comment
    ];
};
