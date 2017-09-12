<?php

namespace Gayly\Leaf\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class UninstallCommand extends Command
{
    protected $files;

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

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
        $this->files->deleteDirectory(config('admin.directory'));
        $this->files->deleteDirectory(public_path('vendor/'));
        $this->files->delete(config_path('admin.php'));
    }
}
