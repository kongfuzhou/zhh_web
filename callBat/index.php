<?php
 exec('exec.bat', $results);
 echo '<pre>';
 $results = implode("\n", $results);
 echo $results;
 echo '</pre>';
?>