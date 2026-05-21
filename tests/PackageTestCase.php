<?php

abstract class PackageTestCase extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return ['UsinaTech\BrValidator\ValidatorProvider'];
    }
}