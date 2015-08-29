<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\SMException;

trait ChartStyle
{
    private $ChartStyle = '';

    /**
     * @return string
     */
    public function getChartStyle() {
        return $this->ChartStyle;
    }

    /**
     * @param string $ChartStyle
     *
     * @return $this
     * @throws SMException
     */
    public function setChartStyle($ChartStyle) {
        if (!is_string($ChartStyle)) {
            throw new SMException("ChartName must be a string");
        }
        $this->ChartStyle = $ChartStyle;

        return $this;
    }
}