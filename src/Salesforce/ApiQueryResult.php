<?php

namespace App\Salesforce;

class ApiQueryResult implements ApiQueryResultInterface
{
    /**
     * @var int
     */
    private int $totalSize;

    /**
     * @var bool
     */
    private bool $done;

    /**
     * @var string
     */
    private string $nextRecordsUrl;

    /**
     * @var array|null
     */
    private array|null $records;

    /**
     * @return int
     */
    public function getTotalSize(): int
    {
        return $this->totalSize;
    }

    /**
     * @param int $totalSize
     */
    public function setTotalSize(int $totalSize): void
    {
        $this->totalSize = $totalSize;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->done;
    }

    /**
     * @param bool $done
     */
    public function setDone(bool $done): void
    {
        $this->done = $done;
    }

    /**
     * @return string
     */
    public function getNextRecordsUrl(): string
    {
        return $this->nextRecordsUrl;
    }

    /**
     * @param string $nextRecordsUrl
     */
    public function setNextRecordsUrl(string $nextRecordsUrl): void
    {
        $this->nextRecordsUrl = $nextRecordsUrl;
    }

    /**
     * @return array
     */
    public function getRecords(): array
    {
        return $this->records;
    }

    /**
     * @param array $records
     */
    public function setRecords(array $records): void
    {
        $this->records = $records;
    }
}
