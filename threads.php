<?php

class Thread {

	private $run = null;
	private $threads = [];

	private function fork($param){

		$PID = pcntl_fork();

		if($PID == -1){

			throw new exception('pcntl_fork not supported');

		}else if($PID == 0){

			if(!is_callable($this->run)){

				return false;

			}

			$function = $this->run;

			$function($param);

			exit;

		}else{

			return $PID;

		}

	}

	public function set($function){

		$this->run = $function;

	}

	public function spawn($param){

		if(is_array($param)){

			foreach($param as $p){

				$this->threads[] = self::fork($p);

			}

		}else{

			$this->threads[] = self::fork($param);

		}

	}

	public function wait(){

		if(!$this->threads){

			return false;

		}

		foreach($this->threads as $thread){

			pcntl_waitpid($thread, $status);
			unset($this->threads[$thread]);

		}

	}

	public function clear(){

		self::wait();

		$this->run = null;

	}

}
