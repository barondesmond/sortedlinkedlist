<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\SortedLinkedList;

class SortedLinkedListTest extends TestCase
{
    public function testInsertAndOrderWithIntegers(): void
    {
        $list = new SortedLinkedList();
        $list->insert(5);
        $list->insert(1);
        $list->insert(3);

        $this->assertSame([1, 3, 5], $list->toArray());
        $this->assertCount(3, $list);
    }

    public function testInsertAndOrderWithStrings(): void
    {
        $list = new SortedLinkedList();
        $list->insert("banana");
        $list->insert("apple");
        $list->insert("cherry");

        $this->assertSame(["apple", "banana", "cherry"], $list->toArray());
    }

    public function testThrowsOnMixedTypes(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $list = new SortedLinkedList();
        $list->insert(1);
        $list->insert("string"); // should fail
    }
}
