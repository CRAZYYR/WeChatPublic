<?php
/* OO API */
require_once('cache.class.php');
  $cache= new cache();

$rs=$cache->uploadTmp();
var_dump($rs);
?> 
<html>
<body>

<form action="" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>