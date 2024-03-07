<?php

namespace Raider\DesignPatternsPHP\BehavioralDesignPatterns\ChainOfResponsibility\Middleware;

/**
 * The base Middleware class declares an interface for linking middleware
 * objects into a chain.
 */
abstract class Middleware
{

    private Middleware $next;

    /**
     * This method can be used to build a chain of middleware objects.
     */
    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;

        return $next;
    }

    /**
     * Subclasses must override this method to provide their own checks. A
     * subclass can fall back to the parent implementation if it can't process a
     * request.
     */
    public function check(string $email, string $password): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($email, $password);
    }
}