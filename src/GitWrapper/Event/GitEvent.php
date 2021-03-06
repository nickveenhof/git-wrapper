<?php

/**
 * A PHP wrapper around the Git command line utility.
 *
 * @license GNU General Public License, version 3
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @see https://github.com/cpliakas/git-wrapper
 * @copyright Copyright (c) 2013 Acquia, Inc.
 */

namespace GitWrapper\Event;

use GitWrapper\Command\GitCommandAbstract;
use GitWrapper\GitWrapper;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Process\Process;

/**
 * Event instance passed as a result of git.* commands.
 */
class GitEvent extends Event
{
    /**
     * The GitWrapper object that likely instantiated this class.
     *
     * @var GitWrapper
     */
    protected $_wrapper;

    /**
     * The Process object being run.
     *
     * @var Process
     */
    protected $_process;

    /**
     * The GitCommandAbstract object being executed.
     *
     * @var GitCommandAbstract
     */
    protected $_command;

    /**
     * Constructs a GitEvent object.
     *
     * @param GitWrapper $wrapper
     *   The GitWrapper object that likely instantiated this class.
     * @param Process $process
     *   The Process object being run.
     * @param GitCommandAbstract $command
     *   The GitCommandAbstract object being executed.
     */
    public function __construct(GitWrapper $wrapper, Process $process, GitCommandAbstract $command)
    {
        $this->_wrapper = $wrapper;
        $this->_process = $process;
        $this->_command = $command;
    }

    /**
     * Gets the GitWrapper object that likely instantiated this class.
     *
     * @return GitWrapper
     */
    public function getWrapper()
    {
        return $this->_wrapper;
    }

    /**
     * Gets the Process object being run.
     *
     * @return Process
     */
    public function getProcess()
    {
        return $this->_process;
    }

    /**
     * Gets the GitCommandAbstract object being executed.
     *
     * @return GitCommandAbstract
     */
    public function getCommand()
    {
        return $this->_command;
    }
}
