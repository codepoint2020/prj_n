<?php

include "../php/connection.php"; 
include "../php/functions.php";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>NSSTC e-Library Powerpoint Viewer</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css/pptxjs.css">
<link rel="stylesheet" href="./css/nv.d3.min.css">

<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="./js/jszip.min.js"></script>
<script type="text/javascript" src="./js/filereader.js"></script>
<script type="text/javascript" src="./js/d3.min.js"></script>
<script type="text/javascript" src="./js/nv.d3.min.js"></script>
<script type="text/javascript" src="./js/pptxjs.js"></script>
<script type="text/javascript" src="./js/divs2slides.js"></script>

<script type="text/javascript" src="./js/jquery.fullscreen-min.js"></script>

<script type="text/javascript">
    $(function() {
		var oldWidth, oldMargin ,isFullscreenMode=false;
		$("#fullscreen-btn").on("click", function(){
			 			
			if(!isFullscreenMode){
				oldWidth = $("#result .slide").css("width");
				oldMargin = $("#result .slide").css("margin");
				$("#result .slide").css({
					"width": "99%",
					"margin": "0 auto"
				})
				$("#result").toggleFullScreen();
				isFullscreenMode = true;
			}else{
				$("#result .slide").css({
					"width": oldWidth,
					"margin": oldMargin
				})
				$("#result").toggleFullScreen();
				isFullscreenMode = false;
			}		
		});
		$(document).bind("fullscreenchange", function() {
			if(!$(document).fullScreen()){
				$("#result .slide").css({
					"width": oldWidth,
  					"margin": oldMargin
				})
			}
		});
    });
</script>
<style>
	html, body { margin: 0; padding: 0; }
	#warper { margin-right: auto; margin-left: auto; width: 900px; }


</style>
</head>

<?php
	if (isset($_GET['powerpoint'])) {
		$x = "file/".$_GET['powerpoint'];
		$file_name = $_GET['powerpoint'];
		$title = $_GET['title'];
		$book_id = intval($_GET['id']);
		log_view($book_id);
		
		if (isset($_GET['saved'])) {
			$book_id = intval($_GET['id']);
			add_to_list($book_id);
			$_SESSION['prevent_reload'] = 'set';
			redirect("pptx_viewer.php?powerpoint=".$file_name."&title=".$title."&id=".$book_id."&save_complete=true");
			
		}
	}

	if (isset($_GET['save_complete']) && isset($_SESSION['prevent_reload'])) {
		echo '
		<script>
		alert("Success! This reference was added to your study list");
	</script>
		';
	
		unset($_SESSION['prevent_reload']);

	}

?>
<body>
	
	<div id="warper">
		<!-- <input id="uploadFileInput" type="file" />
		<br><br>
		<div id="container">
			<input id="fullscreen-btn" type="button" value="Fullscreen" />
			<br> -->
			<h3 class="text-center mt-4"><?php echo $title; ?></h3> 
			<a class="btn btn-primary mb-4" href="<?php echo $x; ?>">Download</a>
			<a id="add_to_list" disabled class="btn btn-dark mb-4" href="pptx_viewer.php?powerpoint=<?php echo $file_name; ?>&id=<?php echo $book_id; ?>&saved=true&title=<?php echo $title; ?>">Add To My Study List</a>
			<div  id="result"></div>
		<!-- </div> -->
	</div>

<?php





// $x = "file/id_40_jVMeg720Dickinson_Sample_Slides.pptx";

$pptx = <<<DELIMETER

<script>
$("#result").pptxToHtml({
	pptxFileUrl: "{$x}",
	fileInputId: "uploadFileInput",
	slideMode: false,
	keyBoardShortCut: false,
	slideModeConfig: {  //on slide mode (slideMode: true)
	    first: 1, 
	    nav: false, /** true,false : show or not nav buttons*/
	    navTxtColor: "white", /** color */
	    navNextTxt:"&#8250;", //">"
	    navPrevTxt: "&#8249;", //"<"
	    showPlayPauseBtn: false,/** true,false */
	    keyBoardShortCut: false, /** true,false */
	    showSlideNum: false, /** true,false */
	    showTotalSlideNum: false, /** true,false */
	    autoSlide: false, /** false or seconds (the pause time between slides) , F8 to active(keyBoardShortCut: true) */
	    randomAutoSlide: false, /** true,false ,autoSlide:true */ 
	    loop: false,  /** true,false */
	    background: "black", /** false or color*/
	    transition: "default", /** transition type: "slid","fade","default","random" , to show transition efects :transitionTime > 0.5 */
	    transitionTime: 1 /** transition time in seconds */
	}
});
</script>

DELIMETER;

echo $pptx;


?>

</body>
</html>
