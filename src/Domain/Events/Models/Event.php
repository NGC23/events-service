<?php

declare(strict_types=1);

namespace App\Domain\Events\Models;

use DateTimeImmutable;

class Event
{
    public function __construct(
        private string $name,
        private string $description,
        private int $userId,
        private DateTimeImmutable $startTime,
        private DateTimeImmutable $endTime,
        private DateTimeImmutable $createdAt,
        private ?int $id = null
    ) {
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the value of userId
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Get the value of startTime
     */
    public function getStartTime(): DateTimeImmutable
    {
        return $this->startTime;
    }

    /**
     * Get the value of endTime
     */
    public function getEndTime(): DateTimeImmutable
    {
        return $this->endTime;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function withId(int $id): self
    {
        $event = clone $this;
        $event->id = $id;

        return $event;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId() ?? null,
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'startTime' => $this->getStartTime()->format('Y-m-d H:s:i'),
            'endTime' =>  $this->getEndTime()->format('Y-m-d H:s:i'),
            'createdAt' => $this->getCreatedAt()->format('Y-m-d H:s:i'),
            'userId' => $this->getUserId(),
        ];
    }
}
