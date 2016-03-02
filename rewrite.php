<div class="list-group">
    <a href="/some-file/" class="list-group-item">URI: /some-file/</a>
    <a href="/some-file/?key=value" class="list-group-item">URI: /some-file/?key=value</a>
    <a href="/some-file/key/value" class="list-group-item">URI: /some-file/key/value</a>
</div>
<hr/>
<?php
echo "<h2>URI: ";
echo $_SERVER['REQUEST_URI'];
echo "</h2>";
echo "<h2>GET:</h2>";
echo "<pre>";
var_dump($_GET);
echo "</pre>";
?>