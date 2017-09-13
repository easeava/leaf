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

    /**
     * build html content
     * @return [type] [description]
     */
    public function build()
    {
        ob_start();

        foreach ($this->rows as $row) {
            $row->build();
        }

        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    public function render()
    {
        $items = [
            'header'        =>    $this->header,
            'description'    =>    $this->description,
            'content'        =>    $this->build(),
        ];

        return view('leaf::content', $items)->render();
    }

    public function __toString()
    {
        return $this->render();
    }
}
