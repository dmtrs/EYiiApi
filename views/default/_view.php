<?php
foreach($results as $model)
{
    echo "<div class='myiiapi-item' >";
    $header = "";
    if($prefix != "cl") {
        $header = $model->cl_name."::";
        if($prefix == "pr")
            $header .="$";
    }         
    echo "<span id='myiiapi-item-header' >".$header.$model->{$prefix."_name"}."</span>";
    $this->widget('zii.widgets.CDetailView', array(
         'data'=>$model,
              'attributes'=>$attributes,
         )
    );
    echo "<p>".$model->{$prefix."_description"}."</p>";
    echo "</div>";
}
?>
