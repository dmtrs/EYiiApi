<?php
if(isset($_POST['myiiapi'])) {
    $this->failSearch();
} else {
    Yii::app()->clientScript->registerScript("summary", "
    $(function() {
        $('.myiiapi-content').toggle();
        $('#myiiapi-bar-toggle').click(function() {
            $('.myiiapi-content').toggle();

        });    
        searchSuccess = function(data) {
            $('.myiiapi-content').html($(data).find('.myiiapi-item'));
            $('.myiiapi-content').show();
        }
    });", CClientScript::POS_READY);

    $this->beginWidget('zii.widgets.jui.CJuiDraggable', array(
        "options"=>array(
            "handle"=>"div.myiiapi-header"
        )   
    ));
    ?>

    <div class="myiiapi">
	    <div class="myiiapi-header">
        <div class="myiiapi-bar">
            <span id="myiiapi-bar-toggle" style="background: white" >_</span>
        </div>
            <?php 
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'myiiapi-form'
            )); 
		    echo CHtml::textField('search','',
                array('maxlength'=>45,
                'id'=>'myiiapi-search-text',
            ));
		    echo CHtml::hiddenField('myiiapi','1');
		    echo CHtml::ajaxSubmitButton('Search',
                Yii::app()->createUrl('default/index'),
                array("success"=>"js: function(data) {
                    searchSuccess(data);
                }",
                ),
                array('id'=>'myiiapi-search-button')

            );
            $this->endWidget(); ?>
    	</div>
        <div class="myiiapi-content">
        </div>
    </div>
    <?php 
    $this->endWidget();
}
