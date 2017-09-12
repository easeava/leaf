<?php

namespace Gayly\Leaf\Console;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeCommand extends ControllerMakeCommand
{
    protected $name = 'leaf:make';

    protected $description = 'Make empty admin controller';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $directory = config('admin.directory');
        $namespace = ucfirst(basename($directory));
        return $rootNamespace . '\\' . $namespace . '\Controllers';
    }
}
