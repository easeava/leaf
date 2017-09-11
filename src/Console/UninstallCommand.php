<?php

namespace Gayly\Leaf\Console;

use Illuminate\Console\Command;

class UninstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'leaf:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uninstall the leaf package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->confirm('Are you sure to uninstall leaf console?')) {
            return;
        }

        $this->removeFilesAndDirectories();

        $this->info('Uninstalling leaf console');
    }

    /**
     * Remove files and directories.
     *
     * @return void
     */
    protected function removeFilesAndDirectories()
    {
        $this->laravel['files']->deleteDirectory(config('admin.directory'));
        $this->laravel['files']->deleteDirectory(public_path('vendor/'));
        $this->laravel['files']->delete(config_path('admin.php'));
    }
}
