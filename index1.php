<?php
header("Content-Type:text/html; charset=utf-8");	
class PostOffice{
	function mailFiler(){
		$delimiter="\n";
		$i=1;
		$fp=fopen('string.txt','r');
		while ( !feof ( $fp) )
		{
			$buffer = stream_get_line( $fp, 1024, $delimiter );
			echo $buffer;
			echo "<br>";
			$i++;
			$buffer = '';
		}
		fclose($fp);
	}

	function mailRegex(){
		$fp=fopen('string.txt','r');
		while(!feof($fp)){
			$char=fgets($fp);
			$arr1=str_split($char);
			$i=0;
			for($i=0;$i<50;$i++){
				if(preg_match("[^a-zA-Z0-9]",$arr1[$i])){
					echo $arr1[$i];
				}
			}
		}
		fclose($fp);
	}

	function spiltroad(){
		$fp=fopen('road.txt','r');
		$str=fgets($fp);
		$str_fp=explode(" ",$str,);
		echo $str_fp[0];
	}
}



$PostOffice=new PostOffice;
$PostOffice->spiltroad();
?>
