<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Set up the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        // Don't run the parent setup which tries to connect to the database
        // parent::setUp();

        $this->createApplication();
    }
}
