<?php

namespace Gayly\Leaf\Layout;

class Row implements Buildable
{

    protected $columns = [];

    public function __construct($content = '')
    {
        if (!empty($content)) {
            $this->column(12, $content);
        }
    }

    public function column($num, $content)
    {
        $column = new Column($content, $num);

        $this->addColumn($column);
    }

    protected function addColumn(Column $column)
    {
        $this->columns[] = $column;
    }

    public function build()
    {
        $this->startRow();

        foreach ($this->columns as $column) {
            $column->build();
        }

        $this->endRow();
    }

    protected function startRow()
    {
        echo '<div class="row">';
    }

    protected function endRow()
    {
        echo '</div>';
    }
}
