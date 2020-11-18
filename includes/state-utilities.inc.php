<?php
function readStates($filename) {
   // read the file into memory; if there is an error then stop processing
   $arr = file($filename) or die('ERROR: Cannot find file');

   // our data is semicolon-delimited
   $delimiter = ';';

   // loop through each line of the file
   foreach ($arr as $line) {  
      // returns an array of strings where each element in the array
      // corresponds to each substring between the delimiters
      $splitcontents = explode($delimiter, $line);
      
      $aState = array();
      
      $aState['id'] = $splitcontents[0];
      $aState['name'] = utf8_encode($splitcontents[1]);
      $aState['capitol'] = utf8_encode($splitcontents[2]);
      $aState['candidate'] = utf8_encode($splitcontents[3]);
      $aState['party'] = utf8_encode($splitcontents[4]);
      $aState['population'] = utf8_encode($splitcontents[5]);
      $aState['numVotes'] = utf8_encode($splitcontents[6]);

      // add customer to array of customers
      $states[$aState['id']] = $aState;
   }
   return $states;
}

?>