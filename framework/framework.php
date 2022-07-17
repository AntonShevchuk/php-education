<?php
namespace Framework;

use Attribute;

#[Attribute(Attribute::TARGET_FUNCTION)]
class Privilege {
    public function __construct (
        public string $privilege
    ) {
    }
}

#[Attribute(Attribute::TARGET_FUNCTION)]
class Permission {
    public const NONE = 0;
    public const READ = 1;
    public const WRITE = 2;
    public const EXEC = 4;

    public function __construct (
        public int $permission
    ) {
    }
}

#[Attribute(Attribute::TARGET_FUNCTION)]
class Method {
    public const NONE = 0;
    public const CLI = 1;
    public const GET = 2;
    public const POST = 4;
    public const PUT = 8;
    public function __construct (
        public int $method
    ) {
    }
}

#[Attribute(Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class Route {
    public function __construct (
        public string $path
    ) {
    }
}

#[Attribute(Attribute::TARGET_FUNCTION)]
class Cache {
    public function __construct (
        public int $ttl
    ) {
    }
}


