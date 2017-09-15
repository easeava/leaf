<?php

namespace Gayly\Leaf\Layout;

use Closure;
use Illuminate\Contracts\Support\Renderable;

class Content implements Renderable
{
    /**
     * 头部标题
     * @var [string]
     */
    protected $header = '';

    /**
     * 描述
     * @var [string]
     */
    protected $description = '';

    protected $item;

    protected $beforeBuild = '<div class="container no-padding container-fixed-lg">';

    protected $afterBuild = '</div>';

    /**
     * Row
     */
    protected $rows = [];

    public function __construct(Closure $callback = null)
    {
        if ($callback instanceof Closure) {
            $callback($this);
        }
    }

    public function header(String $header = '')
    {
        $this->header = $header;

        return $this;
    }

    public function description(String $description = '')
    {
        $this->description = $description;

        return $this;
    }

    public function item($item)
    {
        $this->item = $item;

        return $this;
    }

    public function body($content)
    {
        $this->row($content);
    }

    /**
     * add row for content body
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function row($content)
    {
        if ($content instanceof Closure) {
            $row = new Row();
            call_user_func($content, $row);

            $this->addRow($row);
        } else {
            $this->addRow(new Row($content));
        }

        return $this;
    }

    protected function addRow($content)
    {
        $this->rows[] = $content;
    }

    public function setBeforeBuild($beforeBuild = '')
    {
        $this->beforeBuild = $beforeBuild;
    }

    public function setAfterBuild($afterBuild = '')
    {
        $this->afterBuild = $afterBuild;
    }

    protected function beforeBuild()
    {
        echo $this->beforeBuild;
    }

    protected function afterBuild()
    {
        echo $this->afterBuild;
    }

    /**
     * build html content
     * @return [type] [description]
     */
    public function build()
    {
        ob_start();
        $this->beforeBuild();
        foreach ($this->rows as $row) {
            $row->build();
        }
        $this->afterBuild();
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    public function render()
    {
        $items = [
            'header'        =>    $this->header,
            'description'    =>    $this->description,
            'item'          =>      $this->item,
            'content'        =>    $this->build(),
        ];

        return view('leaf::content', $items)->render();
    }

    public function __toString()
    {
        return $this->render();
    }
}
