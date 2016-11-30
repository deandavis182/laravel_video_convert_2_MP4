<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
class PostsController extends Controller {


public function index(){
	$a = Request() ;

	$d = new DateTime();

	$x = $d->getTimestamp();

	$b = $a->file('userfile');


	$output = array();
	$return_var = 0;
	$last_line =  exec("ffmpeg -i " . $b . " -strict -2 ".$x."-output.mp4", $output, $return_var);
	//echo "<pre>$b</pre>";

	if ($return_var === 0) {
		echo "Success!!";
		return "<video width='320' height='240' controls><source src='/".$x."-output.mp4' type='video/mp4'></video><br><br><a href='".$x."-output.mp4'>Download Converted File</a>";

	}  else{
	 // fail or other exceptions
	    return "[-] Failed!" . "<br>" . "Exit code:" . $return_var;
}

}
}
//ffmpeg $b -strict -2 output.mp4
//ffmpeg -i '{input}' -ac 2 -b:v 2000k -c:a aac -c:v libx264 -b:a 160k -vprofile high -bf 0 -strict experimental -f mp4 'output.mp4'
