<?php

namespace Mmoreramerino\GearmanBundle\Workers;

use Mmoreramerino\GearmanBundle\Driver\Gearman;

/** @Gearman\Work(description="Worker test description", defaultMethod="doBackground") */
class EchoWorker
{

    /**
     * Test method to run as a job
     *
     * @param \GearmanJob $job Object with job parameters
     *
     * @return boolean
     *
     * @Gearman\Job(iterations=3, name="test", description="This is a description", defaultMethod="doHighBackground")     *
     */
    public function testA(\GearmanJob $job)
    {
        $data = unserialize($job->workload());
        echo end($data).'Job testA done!'.PHP_EOL;

        return true;
    }

    /**
     * Test method to run as a job
     *
     * @param \GearmanJob $job Object with job parameters
     *
     * @return boolean
     *
     * @Gearman\Job
     */
    public function testB(\GearmanJob $job)
    {
        $data = unserialize($job->workload());
        echo end($data).'Job testB done!'.PHP_EOL;

        return true;
    }
}
