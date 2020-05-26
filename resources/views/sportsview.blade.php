<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<body>
[Top Ten Quiz PLayer]
<br>
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<label>Sport selection dropdown</label>
<select id="sports_category">\
<option value="">select option</option>
<?php
foreach($category as $key=>$value)
{
	?>
	<option value="<?=$value->category_id?>"><?=$value->category_title?></option>
	<?php
}
?>
</select>
<br>

<table class="table scoretable">
	<tr>
		<th>Rank</th>
		<th>Name</th>
		<th>Total Score</th>
	</tr>
	
</table>
</body>
</html>
<script>
jQuery(document).ready(function(){
	jQuery("#sports_category").change(function(){
		$(".trow").remove();
		if($(this).val() == "")
			return false;
		
		var cat_val = $(this).val();
		jQuery.ajax({
				url: "/getresult",
				type: "POST",
				data: {cat_val:cat_val,'_token':"{{ csrf_token() }}"},
				success: function(data){
					//jQuery("#butsave").removeAttr("disabled");
					console.log(data);
					
					var parsedata = jQuery.parseJSON(data);
					jQuery.each(parsedata,function(i,e){
						jQuery(".scoretable").append("<tr class='trow trow"+i+"'></tr>");
						var html = "<td>"+(i+1)+"</td><td>"+e.users.name+"</td><td>"+e.score+"</td>";
						jQuery(".trow"+i).append(html);
					});
					
				}
			});
	});
});
</script>