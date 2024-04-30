<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\Iterator\Iterator;

use Exception;
use Iterator;

class CsvIterator implements Iterator
{
    const ROW_SIZE = 4096;

    /**
     * The pointer to the CSV file.
     *
     * @var resource
     */
    protected $filePointer = null;

    protected ?array $currentElement = null;

    protected ?int $rowCounter = null;

    protected ?string $delimiter = null;

    /**
     * @throws Exception
     */
    public function __construct($file, string $delimiter = ',')
    {
        try {
            $this->filePointer = fopen($file, 'rb');
            $this->delimiter = $delimiter;
        } catch (Exception $e) {
            throw new Exception('The file "' . $file . '" cannot be read.');
        }
    }

    /**
     * This method resets the file pointer.
     */
    public function rewind(): void
    {
        $this->rowCounter = 0;
        rewind($this->filePointer);
    }

    /**
     * This method returns the current CSV row as a 2-dimensional array.
     *
     * @return array The current CSV row as a 2-dimensional array.
     */
    public function current(): array
    {
        $this->currentElement = fgetcsv($this->filePointer, self::ROW_SIZE, $this->delimiter);
        $this->rowCounter++;

        return $this->currentElement;
    }

    /**
     * This method returns the current row number.
     *
     * @return int The current row number.
     */
    public function key(): int
    {
        return $this->rowCounter;
    }

    /**
     * This method checks if the end of file has been reached.
     *
     * @return bool Returns true on EOF reached, false otherwise.
     */
    public function next(): bool
    {
        if (is_resource($this->filePointer)) {
            return !feof($this->filePointer);
        }

        return false;
    }

    /**
     * This method checks if the next row is a valid row.
     *
     * @return bool If the next row is a valid row.
     */
    public function valid(): bool
    {
        if (!$this->next()) {
            if (is_resource($this->filePointer)) {
                fclose($this->filePointer);
            }

            return false;
        }

        return true;
    }
}