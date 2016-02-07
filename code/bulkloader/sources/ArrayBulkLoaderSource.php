<?php

/**
 * Array Bulk Loader Source
 * Useful for testing bulk loader. The output is the same as input.
 */
class ArrayBulkLoaderSource extends BulkLoaderSource{

    /**
     * @var
     */
	protected $data;

    /**
     * ArrayBulkLoaderSource constructor.
     * @param $data
     */
	public function __construct($data) {
		$this->data = $data;
	}

    /**
     * @return ArrayIterator
     */
	public function getIterator() {
		return new ArrayIterator($this->data);
	}

    /**
     * @param $data
     * @return $this
     */
	public function setData($data){
		$this->data = $data;

		return $this;
	}

    /**
     * @return mixed
     */
	public function getData(){
		return $this->data;
	}

}
