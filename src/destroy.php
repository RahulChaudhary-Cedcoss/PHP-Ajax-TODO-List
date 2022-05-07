<?php 
session_start();
session_unset();
session_destroy();

echo "<div style='text-align:center;'>
<h1>Go Back</h1>
<h2><a href='index.php'>Back</a></h2>
</div>";
?>