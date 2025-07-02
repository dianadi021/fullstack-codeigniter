<?php
class Redis {

    private $redis;

    public function __construct() {
        $this->redis = new \Redis();
        $this->redis->connect('redis', 6379); // docker service name
    }

    public function set($key, $value, $expire = 3600) {
        return $this->redis->setex($key, $expire, $value);
    }

    public function get($key) {
        return $this->redis->get($key);
    }

    public function delete($key) {
        return $this->redis->del($key);
    }

    public function flushAll() {
        return $this->redis->flushAll();
    }
}
