<?php

/**
 * Backwards copatible CsvBulkLoader
 * Almost api equivelant to CSVBulkLoader
 */
class CsvBetterBulkLoader extends BetterBulkLoader{

    /**
     * @var string
     */
	public $delimiter = ',';
    /**
     * @var string
     */
	public $enclosure = '"';
    /**
     * @var bool
     */
	public $hasHeaderRow = true;

    /**
     * @param string $filepath
     * @param bool $preview
     * @return BulkLoader_Result
     */
	protected function processAll($filepath, $preview = false) {
		//configre a CsvBulkLoaderSource
		$source = new CsvBulkLoaderSource();
		$source->setFilePath($filepath);
		$source->setHasHeader($this->hasHeaderRow);
		$source->setFieldDelimiter($this->delimiter);
		$source->setFieldEnclosure($this->enclosure);
		$this->setSource($source);

		return parent::processAll($filepath, $preview);
	}

    /**
     * @return bool
     */
	public function hasHeaderRow() {
		return ($this->hasHeaderRow || isset($this->columnMap));
	}

}