<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Invoker;

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\Command\Commands\Command;

/**
 * The Queue class acts as an Invoker. It stacks the command objects and
 * executes them one by one. If the script execution is suddenly terminated, the
 * queue and all its commands can easily be restored, and you won't need to
 * repeat all of the executed commands.
 *
 * Note that this is a very primitive implementation of the command queue, which
 * stores commands in a local SQLite database. There are dozens of robust queue
 * solution available for use in real apps.
 */
class Queue
{
    private \SQLite3 $db;

    public function __construct()
    {
        $this->db = new \SQLite3('./commands.sqlite',
            SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

        $this->db->query('CREATE TABLE IF NOT EXISTS "commands" ("id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, "command" TEXT, "status" INTEGER)');
    }

    public function isEmpty(): bool
    {
        $query = 'SELECT COUNT("id") FROM "commands" WHERE status = 0';

        return $this->db->querySingle($query) === 0;
    }

    public function add(Command $command): void
    {
        $query = 'INSERT INTO commands (command, status) VALUES (:command, :status)';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':command', base64_encode(serialize($command)));
        $statement->bindValue(':status', $command->getStatus());
        $statement->execute();
    }

    public function getCommand(): Command
    {
        $query = 'SELECT * FROM "commands" WHERE "status" = 0 LIMIT 1';
        $record = $this->db->querySingle($query, true);
        $command = unserialize(base64_decode($record["command"]));
        $command->id = $record['id'];

        return $command;
    }

    public function completeCommand(Command $command): void
    {
        $query = 'UPDATE commands SET status = :status WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':status', $command->getStatus());
        $statement->bindValue(':id', $command->getId());
        $statement->execute();
    }

    public function work(): void
    {
        while (!$this->isEmpty()) {
            $command = $this->getCommand();
            $command->execute();
        }
    }

    /**
     * For our convenience, the Queue object is a Singleton.
     */
    public static function get(): Queue
    {
        static $instance;
        if (!$instance) {
            $instance = new Queue();
        }

        return $instance;
    }
}
