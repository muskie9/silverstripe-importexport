<?php

/**
 * A visual interface for mapping field names.
 */
class CSVFieldMapper extends CSVPreviewer{

    /**
     * @var
     */
	protected $mappablecols;

    /**
     * @var
     */
	protected $mappingvalues;

    /**
     * @param $cols
     * @return $this
     */
	public function setMappableCols($cols) {
		$this->mappablecols = $cols;

		return $this;
	}

	/**
	 * Set the values for the dropdowns
     *
     * @return $this
	 */
	public function loadDataFrom($values) {
		$this->mappingvalues = $values;

		return $this;
	}
	
	/**
	 * Provide heading dropdowns for creating mappings
	 * @return ArrayList
	 */
	public function getMapHeadings(){
		if(!$this->headings && !$this->mappablecols) return;
		$out = new Arraylist();
		foreach ($this->headings as $heading) {
			$dropdown = $this->createHeadingDropdown($heading);
			if(is_array($this->mappingvalues) &&
				isset($this->mappingvalues[$heading])
			){
				$dropdown->setValue($this->mappingvalues[$heading]);
			}
			$out->push(new ArrayData(array(
				"Heading" => $heading,
				"Dropdown" => $dropdown
			)));
		}

		return $out;
	}

    /**
     * @param $heading
     * @return mixed
     */
	protected function createHeadingDropdown($heading) {
		return DropdownField::create("mappings[".$heading."]", 
			"Dropdown", $this->mappablecols
		)->setHasEmptyDefault(true)
		->setEmptyString("Unmapped");
	}

}