<!DOCTYPE html>
<html>
<head>
	<title>CLAS12 MC Files</title>
	<script src="jquery.min.js"></script>
	<script src="list.js"></script>
	<script src="list.fuzzysearch.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>CLAS12 Monte Carlo Files</h2>

<?php

echo <<< HEREDOC
<div id="datasetsDiv">
	Search:
	<input class="fuzzy-search" />
	<button class="sort" data-sort="reaction"> Sort by reaction </button>
	<button class="sort" data-sort="energy"> Sort by energy </button>
	<button class="sort" data-sort="gemcVersion"> Sort by GEMC version </button>
	<button class="sort" data-sort="torusScale"> Sort by torus scale </button>
	<button class="sort" data-sort="solenoidScale"> Sort by solenoid scale </button>
	<button class="sort" data-sort="coatVersion"> Sort by COAT version </button>
	<button class="sort" data-sort="runNo"> Sort by runNo </button>
	<button class="sort" data-sort="variation"> Sort by variation </button>
	<button class="sort" data-sort="creationDate"> Sort by date </button>
	<br>
	<br>

	<table>
	 <tr style="background-color: #ffffff;">
	  <td> <b>Reaction</b> </td>
	  <td> <b>Energy (GeV)</b> </td>
	  <td> <b>GEMC version</b> </td>
	  <td> <b>Torus scale</b> </td>
	  <td> <b>Solenoid scale</b> </td>
	  <td> <b>COAT version</b> </td>
	  <td> <b>runNo</b> </td>
	  <td> <b>variation</b> </td>
	  <td> <b>Date</b> </td>
	  <td> <b>More info</b> </td>
	  <td> <b>Comment</b> </td>
	 </tr>
	</table>

	<table>
	<tbody class="list">
HEREDOC;

	
	$dir = "OLDmcdata";
	//$dir = "/work/clas/clas12/web/clas12mcfiles/";
	//$dir = "mcdata";
	$subDirs = scandir($dir);
	
	for($j = 0; $j < count($subDirs); $j++)
	{
		if(substr($subDirs[$j], 0, 1) != ".") // check if first character is "." (removes the "." and ".." directories)
		{
			$infoFile = $dir . "/" . $subDirs[$j] . "/info.xml";
			if(file_exists($infoFile)) // require the dataset directory to have an info.xml file
			{
				$xml=simplexml_load_file($infoFile);

				echo "<tr>";
				echo ' <td class="reaction">' . $xml->reaction . '</td>';
				echo ' <td class="energy">' . $xml->energy . '</td>';
				echo ' <td class="gemcVersion">' . $xml->gemcVersion . '</td>';
				echo ' <td class="torusScale">' . $xml->torusScale . '</td>';
				echo ' <td class="solenoidScale">' . $xml->solenoidScale . '</td>';
				echo ' <td class="coatVersion">' . $xml->coatVersion . '</td>';
				echo ' <td class="runNo">' . $xml->runNo . '</td>';
				echo ' <td class="variation">' . $xml->variation . '</td>';
				echo ' <td class="creationDate">' . date("Y/m/d", filectime($infoFile)) . '</td>';
				echo ' <td><a href="' . $dir . '/' . $subDirs[$j] . '">click</a></td>';
				echo ' <td class="comment">' . $xml->comment . '</td>';
				echo "</tr>";
			}
		}
	}


echo <<< HEREDOC
	</tbody>
	</table>
</div>

	<script type="text/javascript">
	var monkeyList = new List('datasetsDiv', { 
	valueNames: ['reaction', 'energy', 'gemcVersion', 'torusScale', 'solenoidScale', 'coatVersion', 'runNo', 'variation', 'creationDate', 'comment'], 
	plugins: [ ListFuzzySearch() ] 
	});
	</script>
HEREDOC;
	
?>

</body>
</html>
