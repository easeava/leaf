<?php

namespace Gayly\Leaf\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{

	protected $name			=	'leaf:install';

	protected $description	=	'Install leaf console package';

	protected $directory 	=	'';

	protected $file;

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

	public function handle()
	{
		echo $this->laravel->getNamespace();

		// 初始化安装数据表
		$this->initInstallDatabase();

		// 初始化创建后台目录
		$this->initInstallAdminDirectory();

		$this->info("Leaf Console Installed");
	}

	protected function initInstallDatabase()
	{
		$this->call('migrate');
	}

	protected function initInstallAdminDirectory()
	{
		$this->directory = config('admin.directory');

		if ($this->alreadyExists($this->directory)) {
			$this->error($this->directory . ' ' . trans('command.exists_directory'));
			return false;
		}

		$this->makeDirectory($this->directory, true);

		$this->createDashController();
		$this->createRoutesFile();
	}

	protected function createDashController()
	{
		$dashController = $this->directory . '/Controllers/DashController.php';
		$contents = $this->getStub('DashController');

		$this->files->put(
			$dashController,
			str_replace('Namespace', config('admin.route.namespace'), $contents)
		);

		$this->info("DashController file was created: " . str_replace(base_path(), '', $dashController));
	}

	protected function createRoutesFile()
	{
		$routes = $this->directory . '/routes.php';
		$contents = $this->getStub('routes');

		$this->files->put(
			$routes,
			$contents
		);

		$this->info("Routes file was created:" . str_replace(base_path(), $routes));
	}

	protected function getStub($name)
	{
		return $this->files->get(__DIR__ . "/stubs/{$name}.stub");
	}

	/**
	 * already exists
	 * @param  [type] $directory [description]
	 * @return [type]            [description]
	 */
    protected function alreadyExists($directory)
    {
        return $this->files->exists($directory);
    }

	/**
	 * build directory
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
    protected function makeDirectory($path, $controller = false)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0755, true, true);
			$controller && $this->files->makeDirectory($path.'/Controllers', 0755, true, true);
        }

        return $path;
    }

}
