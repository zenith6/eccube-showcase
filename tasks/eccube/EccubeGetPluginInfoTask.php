<?php

/**
 * @author Seiji Nitta
 */
class EccubeGetPluginInfoTask extends Task
{

    /**
     * @var PhingFile
     */
    protected $pluginDir;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $outputProperty;

    public function main()
    {
        $plugin_dir = $this->pluginDir->getAbsolutePath();
        $info_file = $plugin_dir . '/plugin_info.php';
        if (!file_exists($info_file)) {
            throw new BuildException("Unable to read plugin_info.php file at " . $info_file);
        }

        require_once $info_file;
        $class = new ReflectionClass('plugin_info');
        $value = $class->getStaticPropertyValue($this->key);

        if ($this->outputProperty != '') {
            $this->project->setProperty($this->outputProperty, $value);
        } else {
            echo $value;
        }
    }

    public function setPluginDir(PhingFile $dir)
    {
        $this->pluginDir = $dir;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function setOutputProperty($outputProperty)
    {
        $this->outputProperty = $outputProperty;
    }
}
