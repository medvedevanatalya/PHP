<?php


class Matrix
{

    private $rows, $cols;
    private $matrix = [];

    public function __construct($rows, $cols)
    {
        $this->cols = $cols;
        $this->rows = $rows;
        $this->matrix = $this->getMatrix($this->rows, $this->cols);
    }

    function getMatrix($rows, $cols): array
    {
        $matrix = [];

        for($i = 0; $i < $rows; $i++)
        {
            for($j = 0; $j < $cols; $j++)
            {
                $matrix[$i][$j] = rand(1, 100);
            }
        }
        return $matrix;
    }

    function add($value)
    {
        for ($i = 0; $i < $this->rows; $i++)
        {
            for($j = 0; $j < $this->cols; $j++)
            {
                $this->matrix[$i][$j] += $value;
            }
        }
        return $this->matrix;
    }

    function diff($value)
    {
        for ($i = 0; $i < $this->rows; $i++)
        {
            for($j = 0; $j < $this->cols; $j++)
            {
                $this->matrix[$i][$j] -= $value;
            }
        }
        return $this->matrix;
    }

    function mult($value)
    {
        for ($i = 0; $i < $this->rows; $i++)
        {
            for($j = 0; $j < $this->cols; $j++)
            {
                $this->matrix[$i][$j] *= $value;
            }
        }
        return $this->matrix;
    }

    function toArray()
    {
        return get_object_vars((object)$this->matrix);
    }

}