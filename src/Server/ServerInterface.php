<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2020
 *
 * @see      https://www.github.com/fastdlabs
 * @see      http://www.fastdlabs.com/
 */

namespace FastD\Swoole\Server;


use FastD\Swoole\Handlers\HandlerInterface;
use Swoole\Process;

interface ServerInterface
{
    const VERSION = '5.0.0';

    /**
     * ServerInterface constructor.
     *
     * @param string $host
     * @param int $port
     * @param int $sock_type
     * @param int $mode
     */
    public function __construct(
        string $host = '0.0.0.0',
        int $port = 0,
        int $sock_type = SWOOLE_SOCK_TCP,
        int $mode = SWOOLE_PROCESS
    );

    /**
     * @param array $config
     * @return void
     */
    public function config(array $config): void;

    /**
     * @param string $event
     * @param object $handle
     * @return ServerInterface
     */
    public function on(string $event, object $handle): ServerInterface;

    /**
     * @param string $host
     * @param int $port
     * @param $type
     * @return ServerInterface
     */
    public function listen(string $host, int $port, $type = SWOOLE_SOCK_TCP): ServerInterface;

    /**
     * @param Process $process
     * @return ServerInterface
     */
    public function process(Process $process);

    public function close(): bool;

    public function send(): bool;

    public function pipeline(): bool;

    public function check(): bool;

    public function task(): int;

    public function finish(): int;

    /**
     * @param HandlerInterface $handler
     * @return ServerInterface
     */
    public function handle(HandlerInterface $handler): ServerInterface;
}