<?php
/**
 * retrieve a configuration file written in yaml format and provide access to its data.
 * access keys are defined as / separated paths.
 */
namespace Aoloe;

// use function Aoloe\debug as debug;

class Configuration {
    private $path = '../configuration/';
    public function set_path($path) {$this->path = $path;}
    private $file = null;
    public function set_file($file) {$this->file = $this->path.$file;}
    private $registry = null;

    public function read() {
        if (file_exists($this->file)) {
            $configuration = file_get_contents($this->file);
            $this->registry = \Spyc::YAMLLoadString($configuration);
        }
    }

    public function get($key) {
        $data = $this->registry;
        foreach (explode('/', $key) as $item) {
            if (array_key_exists($item, $data)) {
                $data = $data[$item];
            } else {
                $data = null;
            }
        }
        return $data;
    }
}

