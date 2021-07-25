<?php

namespace Adroit11\Whmcs\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallWhmcs extends Command
{   
    protected $signature = 'whmcs:install';

    protected $description = 'Install the WHMCS config';

    public function handle()
    {
        $this->info('Installing WHMCS...');

        $this->info('Publishing configuration...');

        if (! $this->configExists('whmcs.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed WHMCS');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Adroit11\Whmcs\WhmcsServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = '--force';
        }

       $this->call('vendor:publish', $params);
    }
}