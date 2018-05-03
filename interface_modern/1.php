<?php 
	interface IMethodHolder{
		public function getInfo($info);
		public function sendInfo($info);
		public function calculate($first,$second);
	}
	abstract class ImplementAlpha implements IMethodHolder{
		public function getInfo($info){
			echo 'This is News'.$info.'<br>';
		}
		public function sendInfo($info){
			return $info;
		}
        abstract public function calculate($first,$second);
//		public function calculate($first,$second){
//			$calculate=$first*$second;
//			return $calculate;
//		}
		public function useMethods(){
			$this->getInfo('this sky is falling....');
			echo $this->sendInfo('vote for senator snort!').'<br>';
//			echo $this->calculate(20,15);
		}
	}
//	$work=new ImplementAlpha();
//	$work->useMethods();
    class Alpha extends ImplementAlpha{
        public function calculate($first,$second){
            $calculate=$first*$second;
			return $calculate;
        }
    }
    $work= new Alpha();
    echo $work->calculate(10,10);

?>