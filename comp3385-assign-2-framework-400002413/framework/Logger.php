<?php
	namespace Framework;
	
	class Logger {
		protected $data;

		function __construct() {
			$this->data = array();
		}

		public function setData(string $key, $val) {
            $this->data[$key] = $val;
        }

		public function getData() {
			return $this->data;
		}
	}

?>