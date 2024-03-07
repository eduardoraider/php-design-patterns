<?php

use Raider\DesignPatternsPHP\BehavioralDesignPatterns\ChainOfResponsibility\Middleware\RoleCheckMiddleware;
use Raider\DesignPatternsPHP\BehavioralDesignPatterns\ChainOfResponsibility\Middleware\ThrottlingMiddleware;
use Raider\DesignPatternsPHP\BehavioralDesignPatterns\ChainOfResponsibility\Middleware\UserExistsMiddleware;
use Raider\DesignPatternsPHP\BehavioralDesignPatterns\ChainOfResponsibility\Server\Server;

require_once __DIR__ . '/../../../vendor/autoload.php';


/**
 * The classic CoR pattern declares a single role for objects that make up a
 * chain, which is a Handler. In this example, differentiate between
 * middleware and a final application's handler, which is executed when a
 * request gets through all the middleware objects.
 *
 * The client code.
 */
$server = new Server();
$server->register("admin@example.com", "admin_pass");
$server->register("user@example.com", "user_pass");

// All middleware are chained. The client can build various configurations of
// chains depending on its needs.
$middleware = new ThrottlingMiddleware(2);
$middleware
    ->linkWith(new UserExistsMiddleware($server))
    ->linkWith(new RoleCheckMiddleware());

// The server gets a chain from the client code.
$server->setMiddleware($middleware);

// ...

do {
    echo "\nEnter your email:\n";
    $email = readline();
    echo "Enter your password:\n";
    $password = readline();
    $success = $server->logIn($email, $password);
} while (!$success);