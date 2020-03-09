
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>



<?php $options_new = array(
		
		'Type1' => __('<span class="showDialog" data-id="dialog_1" style="color:blue">Type1</span><div id="dialog_1" class="hide dialog" title="Type 1">
 				<span style="display:inline-block"><ul><li>Description .......</li>
 				<li>Description 2</li></ul></span>
 				</div>'),


 		'Type2' => __('<span class="showDialog" data-id="dialog_2" style="color:blue">Type2</span><div id="dialog_2" class="hide dialog" title="Type 2">
 				<span style="display:inline-block"><ul><li>Desc 1 .....</li>
 				<li>Desc 2...</li></ul></span>
 				</div>'),

		'Type3' => __('<span class="field-tip">
	 						<span class="field-tip" style="color:blue">Type3</span>
	 						<span class="tip-content">Type 3 Description.</span>
 						</span>')
		);?>



<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>


<!--<?php  
	echo $this->Html->link("Demo", array('controller' => 'Result','action'=> 'show', ), array( 'class' => 'btn btn-primary btn-save'))
?>-->

<?php  
	echo $this->Form->button('Save', array('type'=>'button','class' => 'btn btn-primary btn-save',));
?>

<br><br>
<div id="show-result"></div> 


<?php echo $this->Form->end();?>

</div>

<style>
.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}


body {
    padding:30px;
    font:normal 12px/1.5 Arial, sans-serif;
}

/* Hover tooltips */
.field-tip {
    position:relative;
}
.field-tip .tip-content {
    position:absolute;
    top:-22px; /* - top padding */
    right:9999px;
    width:200px;
    margin-right:-220px; /* width + left/right padding */
    padding:10px;
    color:#fff;
    background:#333;
    -webkit-box-shadow:2px 2px 5px #aaa;
       -moz-box-shadow:2px 2px 5px #aaa;
            box-shadow:2px 2px 5px #aaa;
    opacity:0;
    -webkit-transition:opacity 250ms ease-out;
       -moz-transition:opacity 250ms ease-out;
        -ms-transition:opacity 250ms ease-out;
         -o-transition:opacity 250ms ease-out;
            transition:opacity 250ms ease-out;
}

.field-tip .tip-content:before {
    content:' '; /* Must have content to display */
    position:absolute;
    top:50%;
    left:-16px; /* 2 x border width */
    width:0;
    height:0;
    margin-top:-8px; /* - border width */
    border:8px solid transparent;
    border-right-color:#333;
}
.field-tip:hover .tip-content {
    right:-20px;
    opacity:1;
}


</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){
	$(".dialog").dialog({
		autoOpen: false,
		width: '500px',
		modal: true,
		dialogClass: 'ui-dialog-blue'
	});

	
	$(".showDialog").click(function(){ var id = $(this).data('id'); $("#"+id).dialog('open'); });



	$('.btn-save').bind('click', function(event) {
		var ele = document.getElementsByName('data[Type][type]');
		for(i = 0; i < ele.length; i++) { 
            if(ele[i].checked) {
            var post_url = '<?php echo $this->Html->url(array('controller' => 'Result', 'action' => 'show')); ?>';
            var show_result = ele[i].value;
            	$.ajax({
			        type:"POST",
			        data: {"show_result": show_result },
			        url: post_url,
			        success : function(data) {
			           console.log(data);
			           
			        },
			        error : function() {
			           alert("false");
			        }
			    });
			    document.getElementById("show-result").innerHTML
                    = "Selection Result: "+ele[i].value; 
            }

            
        } 

	});

})


</script>
<?php $this->end()?>