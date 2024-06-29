<?php

class GTKLockManager 
{
    private $locks = [];
    private static $instance = null;

    // Private constructor to prevent direct instantiation
    private function __construct() {}

    // Method to get the single instance of GTKLockManager
    private static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new GTKLockManager();
        }
        return self::$instance;
    }

    // Method to acquire a lock by name
    public static function acquireLock($lockName) {
        $instance = self::getInstance();
        $lockFile = sys_get_temp_dir() . '/' . $lockName . '.lock';
        $fp = fopen($lockFile, 'w');
        if (!$fp) {
            throw new Exception("Unable to open or create lock file: $lockFile");
        }

        // Acquire an exclusive lock (LOCK_EX) and wait indefinitely if the lock is not available
        if (!flock($fp, LOCK_EX)) {
            throw new Exception("Unable to acquire lock on file: $lockFile");
        }

        $instance->locks[$lockName] = $fp;
    }

    // Method to check if a lock exists by name
    public static function hasLock($lockName) {
        $instance = self::getInstance();
        return isset($instance->locks[$lockName]);
    }

    // Method to get a lock file pointer by name
    public static function getLock($lockName) {
        $instance = self::getInstance();
        if (isset($instance->locks[$lockName])) {
            return $instance->locks[$lockName];
        }
        return null; // Or handle the case when the lock does not exist
    }

        // Method to execute a closure with a lock
    public static function withLockDo($lockName, callable $closure) 
    {
        try {
            self::acquireLock($lockName);
            $closure();
        } catch (Exception $e) {
            throw $e;
        } finally {
            self::releaseLock($lockName);
        }
    }

    
    // Method to release a lock by name
    public static function releaseLock($lockName) 
    {
        $instance = self::getInstance();
        if (isset($instance->locks[$lockName])) {
            $fp = $instance->locks[$lockName];
            // Release the lock
            flock($fp, LOCK_UN);
            fclose($fp);
            unset($instance->locks[$lockName]);
        } 
        else 
        {
            error_log("No lock found with name: $lockName");
        }
    }
}


/*
// Example usage
try {
    GTKLockManager::acquireLock('myLock');

    if (GTKLockManager::hasLock('myLock')) {
        $lock = GTKLockManager::getLock('myLock');
        echo "Lock 'myLock' acquired.\n";

        // Perform operations while the lock is held

        GTKLockManager::releaseLock('myLock');
        echo "Lock 'myLock' released.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
*/
