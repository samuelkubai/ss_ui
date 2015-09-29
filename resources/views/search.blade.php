<?php

/**if(isset($results))
{
    foreach($results as $r){
        ?>

        <a href="#id"><?php echo $r['_source']['title'] ?></a>
        <br>
        <div><?php echo implode(', ', $r['_source']['keywords'])?></div>
    <?php
    }
}*/

if(isset($results))
{
foreach($results as $r){
?>

<a href="#id"><?php echo $r['name'] ?></a>
<br>
    <div><?php echo $r['path'] ?></div>
    <div><?php echo $r['type'] ?></div>
<?php
}
}



?>