<?php

namespace Gayly\Leaf\Layout;

use Closure;
use Illuminate\Contracts\Support\Renderable;

class Column implements Buildable
{

    protected $num = 12;

    protected $contents = [];

    protected $class = '';

    public function __construct($content, $num = 12, $class = '')
    {
        if ($content instanceof Closure) {
            call_user_func($content, $this);
        } else {
            $this->append($content);
        }

        $this->num = $num;
        $this->class = $class;
    }

    public function append($content)
    {
        $this->contents[] = $content;

        return $this;
    }

    public function row($content)
    {
        if ($content instanceof Closure) {
            $row = new Row();

            call_user_func($content, $row);
        } else {
            $row = new Row($content);
        }

        ob_start();

        $row->build();
        $contents = ob_get_contents();

        ob_end_clean();
        return $this->append($contents);
    }

    public function build()
    {
        $this->startColumn();

        foreach ($this->contents as $content) {
            if ($content instanceof Renderable) {
                echo $content->render();
            } else {
                echo (string) $content;
            }
        }

        $this->endColumn();
    }

    protected function startColumn()
    {
        echo "<div class=\"col-md-{$this->num} {$this->class} \">";
    }

    protected function endColumn()
    {
        echo '</div>';
    }
}
