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
    public function set_file($file) {$ths->file = $this->path.$file;}
    private $registry = null;

    public function read() {
        $configuration = file_get_contents($this->file);
        $site_structure = Spyc::YAMLLoadString($site_structure);
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

