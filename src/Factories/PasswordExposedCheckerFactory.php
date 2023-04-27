<?php

namespace developeraamirkhan\LaravelPasswordExposedValidationRule\Factories;

use developeraamirkhan\DOFileCachePSR6\CacheItemPool;
use developeraamirkhan\PasswordExposed\PasswordExposedChecker;

/**
 * Class PasswordExposedCheckerFactory.
 */
class PasswordExposedCheckerFactory
{
    /**
     * Creates and returns an instance of PasswordExposedChecker.
     *
     * @return PasswordExposedChecker
     */
    public function instance()
    {
        $cache = new CacheItemPool();

        $cache->changeConfig([
            'cacheDirectory' => $this->getCacheDirectory(),
        ]);

        return new PasswordExposedChecker(null, $cache);
    }

    /**
     * Gets the directory to store the cache files.
     *
     * @return string
     */
    private function getCacheDirectory()
    {
        if (function_exists('storage_path')) {
            return storage_path('app/password-exposed-cache/');
        }

        return sys_get_temp_dir().'/password-exposed-cache/';
    }
}
