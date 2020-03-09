<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<!--<tbody>
	<tr>
	<td></td>
	<td><textarea name="data[1][description]" class="m-wrap  description required" rows="2" ></textarea></td>
	<td><input name="data[1][quantity]" class=""></td>
	<td><input name="data[1][unit_price]"  class=""></td>
	
</tr>

</tbody>-->

<tbody>
	<tr>
		<td><input type="button" value="x" class="btn mini green addbutton"></td>

		<td>
			<div id="thetext" class="description_edit">
				This is the description that will be edited.Just click on it.
			</div>
			<div id="description_editor" style="display:none;">
			    <textarea id="ta1" name="data[1][description]"></textarea>
			</div>
		</td>
		<td>
			<div id="quantitytext" class="quantity_edit">
			    This is the quantity.
			</div>
			<div id="quantity_editor">
			    <input id="quantity" name="data[1][quantity]" class="">
			</div>
		</td>
		<td>
			<div id="pricetext" class="price_edit">
			    This is the unit price.
			</div>
			<div id="price_editor">
			    <input id="price" name="data[1][unit_price]" class="">
			</div>
		</td>
	</tr>
</tbody>

</table>


<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="/Dewtouch-interview/video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>




<style>
	div#editor,#quantity_editor,#price_editor {
   		display: none;
	}

</style>


<?php $this->start('script_own');?>
<script>
$(document).ready(function(){
	var counter = 1;
	$("#add_item_button").click(function(){
		counter++;
	    var newRow = jQuery('<tr><td><input type="button" value="x" class="btn mini green addbutton"></td><td><div id="multirowtext" class="description_multirow">A</div><div id="multirow_editor"><textarea id="description_multirow_editor" name="data[' + counter +'][description]" style="display:none;"></textarea></div></td><td><div id="quantitytext" class="quantity_edit">B</div><div id="quantity_editor"><input type="text" name="data['+
        counter +'][quantity]'+'" class="" /></div></td><td><div id="pricetext" class="price_edit">C</div><div id="price_editor"><input type="text" name="data[' +
        counter +'][unit_price]'+ '" class=""/></div></td></tr>');
	    jQuery('table.table-hover').append(newRow);
		
	});

	$('table').on('click', 'input[type="button"]', function(e){
   		$(this).closest('tr').remove()
	})



	$('.description_edit').on('click', function(event) {
	   var theText = document.getElementById('thetext');
	   var theEditor = document.getElementById('ta1');	   
	   var editorArea = document.getElementById('description_editor');
	   console.log(editorArea);
	 
	   //set text in text div to input
	   //correct line breaks, prevent HTML injection
	   var subject = theText.innerHTML;
	   theEditor.value = subject;
	 
	   //hide text, show editor
	   theText.style.display = 'none';
	   editorArea.style.display = 'inline';
	});


	$('.description_multirow').on('click', function(event) {
	   var theText = document.getElementById('multirowtext');
	   var theEditor = document.getElementById('description_multirow_editor');	   
	   var editorArea = document.getElementById('multirow_editor');
	   console.log(editorArea);
	 
	   //set text in text div to input
	   //correct line breaks, prevent HTML injection
	   var subject = theText.innerHTML;
	   theEditor.value = subject;
	 
	   //hide text, show editor
	   theText.style.display = 'none';
	   editorArea.style.display = 'inline';
	});


	$('.quantity_edit').on('click', function(event) {
	   var theText = document.getElementById('quantitytext');
	   var theEditor = document.getElementById('quantity');	   
	   var editorArea = document.getElementById('quantity_editor');
	   console.log(editorArea);
	 
	   //set text in text div to input
	   //correct line breaks, prevent HTML injection
	   var subject = theText.innerHTML;
	   theEditor.value = subject;
	 
	   //hide text, show editor
	   theText.style.display = 'none';
	   editorArea.style.display = 'inline';
	});

	$('.price_edit').on('click', function(event) {
	   var theText = document.getElementById('pricetext');
	   var theEditor = document.getElementById('price');
	   var editorArea = document.getElementById('price_editor');
	 
	   //set text in text div to input
	   //correct line breaks, prevent HTML injection
	   var subject = theText.innerHTML;
	   theEditor.value = subject;
	 
	   //hide text, show editor
	   theText.style.display = 'none';
	   editorArea.style.display = 'inline';
	});




	
});
</script>
<?php $this->end();?>

