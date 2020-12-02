<?php

namespace Codenom\Midtrans\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Autoload;

class MidtransCommand extends BaseCommand
{
    protected $group = 'Midtrans';
    protected $name = 'codenom:midtrans';
    protected $description = 'Midtrans config file publisher';

    /**
     * Private or protected function.
     *
     * @var string
     */
    protected $sourcePath;

    //--------------------------------------------------------------------

    /**
     * Copy config file.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $this->determineSourcePath();
        $this->publishConfig();
        CLI::write('Config file was successfully generated.', 'green');
    }

    /**
     * Determines the current source path from which all other files are located.
     */
    protected function determineSourcePath()
    {
        $this->sourcePath = \realpath(__DIR__ . '/../');
        if ($this->sourcePath == '/' || empty($this->sourcePath)) {
            CLI::error('Unable to determine the correct source directory. Bailing.');
            exit();
        }
    }

    //--------------------------------------------------------------------

    /**
     * Publish config file.
     */
    protected function publishConfig()
    {
        $path = "{$this->sourcePath}/Config/Midtrans.php";
        $content = \file_get_contents($path);
        $content = \str_replace('use CodeIgniter\Config\BaseConfig', "use Codenom\Midtrans\Config\Midtrans as MidtransConfig", $content);
        $content = \str_replace('namespace Codenom\Midtrans\Config', 'namespace Config', $content);
        $content = \str_replace('extends BaseConfig', 'extends MidtransConfig', $content);
        $this->writeFile('Config/Midtrans.php', $content);
    }

    //--------------------------------------------------------------------

    /**
     * Write a file, catching any exceptions and showing a nicely formatted error.
     *
     * @param string $path
     * @param string $content
     */
    protected function writeFile(string $path, string $content)
    {
        $config = new Autoload();
        $appPath = $config->psr4[APP_NAMESPACE];
        $directory = \dirname($appPath . $path);
        if (!\is_dir($directory)) {
            \mkdir($directory, 0777, true);
        }
        if (\file_exists($appPath . $path) && CLI::prompt('Config file already exists, do you want to replace it?', ['y', 'n']) == 'n') {
            CLI::error('Cancelled');
            exit();
        }

        try {
            write_file($appPath . $path, $content);
        } catch (\Exception $e) {
            $this->showError($e);
            exit();
        }
        $path = \str_replace($appPath, '', $path);
        CLI::write(CLI::color('Created: ', 'yellow') . $path);
    }

    //--------------------------------------------------------------------
}
