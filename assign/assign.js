

var data='';
var action = '';
/*var savebutton = "<input type='button' class='ajaxsave' value='Save'>";*/
var updatebutton = "<input type='button' class='ajaxupdate' value='Update'>";
var cancel = "<input type='button' class='ajaxcancel' value='Cancel'>";
var pre_tds; 
var field_arr = new Array('text','text','text','text');
var field_pre_text= new Array('Enter Firstname','Enter lastname','Enter your email','Enter your city');
var field_name = new Array('id','fname','email','city');
var update_field = new Array('ID','FNAME','EMAIL','CITY');
$(function()
{
	$.ajax({
		url : "update.php",
		type : "POST",
		data : "actionfunction=showData",
		cache : false,

		success : function(response) {
			$('#demoajax').html(response);
			
		}
	});

	$( '.ajaxsave').click(function(event){
		var id = $("input[name = '"+field_name[0]+"']");
		var fname = $("input[name = '"+field_name[1]+"']");
		var email = $("input[name = '"+field_name[2]+"']");
		var city = $("input[name = '"+field_name[3]+"']");
		data = "fname="+fname.val()+"&email="+email.val()+"&city="+city.val()+"&actionfunction=saveData";
		$.ajax({
			url : "update.php",
			type:"POST",
			data:data,
			cache: false,


			success : function(response) {
				console.log(data);
				if (response!='error') {
					$('#demoajax').html(response);
					
				}
			}
		});
	});

	$('#demoajax').on('click','.ajaxedit',function(){
		var edittrid  = $(this).parent().parent().attr('id');
		var tds = $('#'+edittrid).children('td');
		var tdstr = '';
		var td = '';
		pre_tds = tds;
		for (var j = 0; j < field_arr.length; j++) {
			tdstr += "<td><input type='"+field_arr[j]+"' name='"+update_field[j]+"' value='"+$(tds[j]).html()+"' placeholder='"+field_pre_text[j]+"'></td>";
		}
		tdstr += "<td>"+updatebutton+" "+cancel+"</td>";
		$('#createinput').remove();
		$('#'+edittrid).html(tdstr);
	});



	$('#demoajax').on('click','.ajaxupdate',function() {
		var edittrid  = $(this).parent().parent().attr('id');
		var id = $("input[name = '"+update_field[0]+"']");
		var name = $("input[name = '"+update_field[1]+"']");
		var Email = $("input[name = '"+update_field[2]+"']");
		var City = $("input[name = '"+update_field[3]+"']");

		data = "fname="+name.val()+"&email="+Email.val()+"&city="+City.val()+"&editid="+edittrid+"&actionfunction=updateData";
		$.ajax({
			url: "update.php",
			type : "POST",
			data : data,
			cache : false,

			success : function(response){
				console.log(data);
				if (response != 'error') {
					$('#demoajax').html(response);
					
				}
			}
		});
	}); 
	$('#demoajax').on('click','.delete',function()
	{
		var editrid = $(this).parent().parent().attr('id');
	  data = 'deleteid= '+editrid+"&actionfunction=deleteData";
		console.log(data);
		$.ajax(
		{
			type : "POST",
			url : "update.php",
			data : data,
			cache : false,


			success : function(response)
			{
				console.log(data);
				if(response != 'error') {
					console.log(data);
					$('#demoajax').html(response);
					
				} /*else {
					console.log(data);
					parent.fadeOut(300, function() { $(this).parent('tr').remove();});
				}*/
			}
		});
	});
	$('#demoajax').on('click','.ajaxcancel',function(){
		var edittrid = $(this).parent().parent().attr('id');

		$('#'+edittrid).html(pre_tds);
		
	});
	
	
});
/*function createInput(){
	var blankrow = "<tr id='createinput'>";   
	for(var i=0;i<field_arr.length;i++){
		blankrow+= "<td class='ajaxreq'><input type='"+field_arr[i]+"' name='"+field_name[i]+"' placeholder='"+field_pre_text[i]+"' /></td>";
	}
	blankrow+="<td class='ajaxreq'>"+savebutton+"</td></tr>";
	$('#demoajax').append(blankrow);	
}*/