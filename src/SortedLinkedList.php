<?php

declare(strict_types=1);

namespace App;

/**
 * A sorted linked list that accepts either integers or strings,
 * but not both at the same time.
 */
class SortedLinkedList implements \IteratorAggregate, \Countable
{
    private ?Node $head = null;
    private ?string $type = null;
    private int $count = 0;

    /**
     * Insert a value into the list, maintaining sorted order.
     *
     * @param int|string $value
     */
    public function insert(int|string $value): void
    {
        $this->validateType($value);

        $newNode = new Node($value);

        if ($this->head === null || $value < $this->head->value) {
            $newNode->next = $this->head;
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null && $current->next->value <= $value) {
                $current = $current->next;
            }
            $newNode->next = $current->next;
            $current->next = $newNode;
        }

        $this->count++;
    }

    /**
     * Returns the number of items in the list.
     */
    public function count(): int
    {
        return $this->count;
    }

    /**
     * Returns an iterator for foreach support.
     */
    public function getIterator(): \Traversable
    {
        $current = $this->head;
        while ($current !== null) {
            yield $current->value;
            $current = $current->next;
        }
    }

    /**
     * Returns all elements as an array.
     *
     * @return array<int|string>
     */
    public function toArray(): array
    {
        return iterator_to_array($this);
    }

    /**
     * Validates the type consistency of the list.
     *
     * @param int|string $value
     */
    private function validateType(int|string $value): void
    {
        if ($this->type === null) {
            $this->type = gettype($value);
        }

        if ($this->type !== gettype($value)) {
            throw new \InvalidArgumentException(
                "This list only accepts {$this->type} values."
            );
        }
    }
}

