<?php

class PubSub
{
    /**
     * @var array
     */
    private static $handlers = [];

    /**
     * @param string $event
     * @param array $data
     */
    public static function emit(string $event, array $data) {
        if (!isset(self::$handlers[$event])) {
            return;
        }
        foreach (self::$handlers[$event] as $handler) {
            $handler($data);
        }
    }

    /**
     * @param string $event
     * @param callable $handler
     */
    public static function on(string $event, callable $handler) {
        if (!isset(self::$handlers[$event])) {
            self::$handlers[$event] = [];
        }
        self::$handlers[$event][] = $handler;
    }
}

$someEventHandler = function (array $data) {
    var_dump($data);
};

PubSub::on('some_event', $someEventHandler);

PubSub::emit('some_event', ['foo' => 'bar']);
