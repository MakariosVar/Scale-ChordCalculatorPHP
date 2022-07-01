<!DOCTYPE html>
<head>
	<title>mak</title>
	<style>.main{text-align:center;}</style>

</head>


<body style="display:flex;flex-direction:column;align-items:center;background:linear-gradient(to right,#C5C5C5 ,#488CF8 );"> 

<!--///////////////////////////////////////////////////////////////

///////////////    THIS IS THE PHP FUNCTIONS     ////////
////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////-->



<?php
	const BR = '<br>';
	$notes = array('A','A#','B','C','C#','D','D#','E','F','F#','G','G#'); ///all the notes
	$input=null;
	
	function Keyset($steps, $new)  ///setting note key as 0 key in array
		{
			$notes = array('A','A#','B','C','C#','D','D#','E','F','F#','G','G#');
			$move=array();
			
			
		
				
				
				
				
				for($i=0;$i<$steps;$i++)
					{
					$move=array_shift($notes);
					array_push($notes, $move);
					
					}
					
				$i=0;
					while ($i<12)
					{
					
						$new[$i] = $notes[$i];
						
						$i++;
					}
				
				
 		
			return $new;
       
		}

		function Major($keyselect)
		{
	//	first   00
	//	step	02
	//	step	04
	//	half	05
	//	step	07	
	//	step	09
	//	step	11

	
	for($i=0;$i<12;$i=$i+2)
	{
		if($i==6)
		{
				$i= $i-1;
		}
	
	$ret[$i] = $keyselect[$i];
	}
	
	
	$ret=array_values($ret);
		return $ret;
		
		
		
		
		}
	function Minor($key)
		{
	//	first   00
	//	step	02
	//	step	03
	//	half	05
	//	step	07	
	//	step	08
	//	step	10


			for($i=0;$i<12;$i=$i+2)
			{
			if($i==4 || $i==9 )
				{
					$i= $i-1;
				}
	
				$ret[$i] = $key[$i];
			}
	
	

	$ret=array_values($ret);
			return $ret;


		}
	
	////////////////////////////////////////////////////////////////

	///////////////    THIS IS THE HTML OUTPOUT     ////////
	////////////////////////////////////////////////////////////////
	
	/////////////////////////////////////////////////////////////

?>

 <h1>>MUSICA<</h1>

	 <h2>Επιλέξτε Νότα</h2>		
	
	 

 <form method="post" style="display:flex;">
<select name="input" value=<?php echo $_POST['input'];?>>
 	<option value="0" selected>A</option>
	<option value="1" <?php if($_POST['input'] ==1){echo "selected";}?>>A#</option>
	<option value="2" <?php if($_POST['input'] ==2 ){echo "selected";}?>>B</option>
	<option value="3" <?php if($_POST['input'] ==3){echo "selected";}?>>C</option>
	<option value="4" <?php if($_POST['input'] ==4 ){echo "selected";}?>>C#</option>
	<option value="5" <?php if($_POST['input'] ==5 ){echo "selected";}?>>D</option>
	<option value="6" <?php if($_POST['input'] ==6 ){echo "selected";}?>>D#</option>
	<option value="7" <?php if($_POST['input'] ==7 ){echo "selected";}?>>E</option>
	<option value="8" <?php if($_POST['input'] ==8 ){echo "selected";}?>>F</option>
	<option value="9" <?php if($_POST['input'] ==9 ){echo "selected";}?>>F#</option>
	<option value="10" <?php if($_POST['input'] ==10 ){echo "selected";}?>>G</option>
	<option value="11" <?php if($_POST['input'] ==11 ){echo "selected";}?>>G#</option>
	

</select>

    <input type="submit" name="submit" value="Submit">
	</form>
<?php





	
	if(isset($_POST['submit']))
{
	$input=$_POST['input'];
}
	
    //*********INPUT********\
    //0 => a
    //1 => a#
    //2 => b
    //3 => c
    //4 => c#
    //5 => d
    //6 => d#
    //7 => e
    //8 => f
    //9 => f#
    //10 => g
    //11 => g#
			
	$steps=$input;
	$new= array();
	

	

	
	echo '<div class="main"><h3>SELECTED KEY / STEPS: <big>'.$notes[$input%12].'</big></h3>';

	
	
	If($steps !=0)
	{ 
		
			
			$new= Keyset($steps,$new);		
			
	}
	
	else
	{

		
		$i=0;
		while ($i<12)
					{
					
						$new[$i] = $notes[$i];
						
						$i++;
					}
		
	}	


	
	
	echo '<h1>Major scale</h1>';
	$major=Major($new);
	echo '<pre>';print_r($major);echo '</pre>';
	echo '<h4>MAJOR CHORD</h4>';
	echo '<strong>'.$major[0].'</strong>'.BR;
	echo '<strong>'.$major[2].'</strong>'.BR;
	echo '<strong>'.$major[4].'</strong>';
	
	
	echo '<h1>Minor scale</h1>';
	$minor=Minor($new);
	echo '<pre>';print_r($minor);echo '</pre>';	
	echo '<h4>MINOR CHORD</h4>';
	echo '<strong>'.$minor[0].'</strong>'.BR;
	echo '<strong>'.$minor[2].'</strong>'.BR;
	echo '<strong>'.$minor[4].'</strong>'.BR;
	
	
	echo '<h1> Popular Progressions </h1>';
	 echo 'major:';
	
		echo '<h2><strong>I-V-vi-IV => </strong>';
		echo '<small>'.$major[0].'-'.$major[4].'-'.$major[5].'m-'.$major[3].'(optimistic)</small></h2>'.BR;
	
	
		echo '<h2><strong>V-vi-IV-I => </strong>';
		echo '<small>'.$major[4].'-'.$major[5].'m-'.$major[3].'-'.$major[0].'</small></h2>'.BR;
		
		echo '<h2><strong>vi–IV–I–V => </strong>';
		echo '<small>'.$major[5].'m-'.$major[3].'-'.$major[0].'-'.$major[4].'(pessimistic)</small></h2>'.BR;	
		
		
		echo '<h2><strong>IV–I–V–vi => </strong>';
		echo '<small>'.$major[3].'-'.$major[0].'-'.$major[4].'-'.$major[5].'m</small></h2>'.BR;
	
	 echo 'minor:';
	
		echo '<h2><strong>i–iv–v => </strong>';
		echo '<small>'.$minor[0].'m-'.$minor[3].'m-'.$minor[4].'m</small></h2>'.BR;


		echo '<h2><strong> i–ii dim–V–i => </strong>';
		echo '<small>'.$minor[0].'m-'.$minor[1].'m/dim-'.$minor[4].'-'.$minor[0].'m</small></h2>'.BR;
	
	
		echo '<h2><strong>i–VI–III–VII => </strong>';
		echo '<small>'.$minor[0].'m-'.$minor[5].'-'.$minor[2].'-'.$minor[6].'</small></h2> </div>'.BR;


	?> 
</body>
</html>