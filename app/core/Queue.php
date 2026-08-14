<?php

namespace App\Core;

class Queue
{
    protected static function getQueueFile(): string
    {
        $dir = dirname(__DIR__, 2) . '/storage/framework/queue';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir . '/jobs.json';
    }

    /**
     * Push a new job onto the queue.
     *
     * @param Job|object $job
     */
    public static function push(object $job): bool
    {
        $queueFile = static::getQueueFile();
        $jobs = static::getPendingJobs();

        $jobs[] = [
            'id' => bin2hex(random_bytes(8)),
            'class' => get_class($job),
            'payload' => serialize($job),
            'pushed_at' => date('Y-m-d H:i:s'),
        ];

        return file_put_contents($queueFile, json_encode($jobs, JSON_PRETTY_PRINT)) !== false;
    }

    /**
     * Get all pending jobs in queue.
     */
    public static function getPendingJobs(): array
    {
        $queueFile = static::getQueueFile();
        if (!file_exists($queueFile)) {
            return [];
        }

        $raw = file_get_contents($queueFile);
        $data = json_decode($raw, true);
        return is_array($data) ? $data : [];
    }

    /**
     * Pop and process the next job in queue.
     */
    public static function popAndWork(): ?array
    {
        $jobs = static::getPendingJobs();
        if (empty($jobs)) {
            return null;
        }

        $jobData = array_shift($jobs);
        static::saveQueue($jobs);

        try {
            $job = unserialize($jobData['payload']);
            if (is_object($job) && method_exists($job, 'handle')) {
                $job->handle();
                return ['status' => 'success', 'job' => $jobData['class'], 'id' => $jobData['id']];
            }
        } catch (\Throwable $e) {
            return ['status' => 'failed', 'job' => $jobData['class'], 'id' => $jobData['id'], 'error' => $e->getMessage()];
        }

        return ['status' => 'invalid', 'job' => $jobData['class'], 'id' => $jobData['id']];
    }

    /**
     * Process all queued jobs.
     */
    public static function workAll(): int
    {
        $count = 0;
        while (static::popAndWork() !== null) {
            $count++;
        }
        return $count;
    }

    protected static function saveQueue(array $jobs): void
    {
        file_put_contents(static::getQueueFile(), json_encode(array_values($jobs), JSON_PRETTY_PRINT));
    }
}
