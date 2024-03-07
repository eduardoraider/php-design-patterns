<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\ChainOfResponsibility\Middleware;

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\ChainOfResponsibility\Server\Server;

/**
 * This Concrete Middleware checks whether a user with given credentials exists.
 */
class UserExistsMiddleware extends Middleware
{
    private Server $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->server->hasEmail($email)) {
            echo "UserExistsMiddleware: This email is not registered!\n";

            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo "UserExistsMiddleware: Wrong password!\n";

            return false;
        }

        return parent::check($email, $password);
    }
}