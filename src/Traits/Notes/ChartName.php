<?php
namespace Zanson\SMParser\Traits\Notes;

use Zanson\SMParser\SMException;

trait ChartName {
    private $ChartName='';
    
    /**
     * @return string
     */
    public function getChartName() {
        return $this->ChartName;
    }

    /**
     * @param string $ChartName
     *
     * @return $this
     * @throws SMException
     */
    public function setChartName($ChartName) {
        if (!is_string($ChartName)) {
            throw new SMException("ChartName must be a string");
        }
        $this->ChartName = $ChartName;

        return $this;
    }
}