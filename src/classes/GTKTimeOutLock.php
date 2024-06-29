<?php


class GTKTimeOutLock
{
    public $locks = [];
    private static $instance = null;

    // Private constructor to prevent direct instantiation
    private function __construct() {}

    // Method to get the single instance of GTKLockManager
    private static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new GTKTimeOutLock();
        }
        return self::$instance;
    }

        // Method to acquire a lock by name with timeout
    public static function acquireLockWihTimeout($lockName, $timeoutSeconds = 10) {
        $instance = self::getInstance();
        $lockFile = sys_get_temp_dir() . '/' . $lockName . '.lock';
        $startTime = time();

        while (true) {
            $fp = fopen($lockFile, 'w');
            if (!$fp) {
                throw new Exception("Unable to open or create lock file: $lockFile");
            }

            // Attempt to acquire an exclusive lock (LOCK_EX)
            if (flock($fp, LOCK_EX | LOCK_NB)) 
            {
                $instance->locks[$lockName] = $fp;
                return; // Lock acquired successfully
            }

            // Check if timeout exceeded
            if (time() - $startTime >= $timeoutSeconds) {
                fclose($fp); // Close the file pointer
                throw new Exception("Timeout while acquiring lock on file: $lockFile");
            }

            // Sleep for a short time before trying again
            usleep(100000); // 100 milliseconds (adjust as needed)
        }
    }

    // Method to release a lock by name
    public static function releaseLock($lockName) {
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
    public static function withLockDo($lockName, callable $closure, $timeoutSeconds = 10, callable $onTimeout = null) 
    {
        try 
        {
            self::acquireLockWihTimeout($lockName, $timeoutSeconds);
            $closure();
        } 
        catch (Exception $e) 
        {
            if ($onTimeout)
            {
                $onTimeout();
            }
            else
            {
                throw $e;
            }
        } 
        finally 
        {
            self::releaseLock($lockName);
        }
    }
}
