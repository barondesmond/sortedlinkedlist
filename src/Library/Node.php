<?php

declare(strict_types=1);

namespace App\Library;

/**
 * Node structure for SortedLinkedList.
 *
 * @internal
 */
class Node
{
    /**
     * @param int|string $value
     * @param Node|null $next
     */
    public function __construct(
        public int|string $value,
        public ?Node $next = null
    ) {
    }
}
