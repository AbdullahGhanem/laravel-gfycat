<?php

namespace Ewa\Tokeet\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'tokeet:install';

    protected $description = 'Install the Tokeet package';

    public function handle()
    {
        $this->info('Installing Tokeet...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => 'Ewa\Tokeet\TokeetServiceProvider',
            '--tag' => 'config',
        ]);

        $this->info('Tokeet installed successfully.');
    }
}
