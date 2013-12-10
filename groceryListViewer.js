//double check this base url for .php file
var url_base = "http://wwwp.cs.unc.edu/Courses/comp426-f13/seaustin/project/testing/";

$(document).ready(function () {

//I'm referring to lists.php... might not be right 
	$.ajax(url_base + "/lists.php", 
	//should GET lists and load them
		{type: "GET",
			dataType: "json",
			success: function(groceryList_ids, status, jqXHR) {
			for (var i=0; i<groceryList_ids.length; i++) {
			load_groceryList_item(groceryList_ids[i]);
			}
		}
		});
	//makes sure these divs line up	
	$('#new_list_form').on('submit', 
				function (e) {
				e.preventDefault();
				//double check this url for .php file
				$.ajax(url_base + "/lists.php",
					{type: "POST",
						dataType: "json",
						data: $(this).serialize(),
						success: function(groceryList_json, status, jqXHR) {
						var g = new groceryList(groceryList_json);
	$('#groceryListViewer').append(g.makeCompactDiv());
						},
						error: function(jqXHR, status, error) {
						alert(jqXHR.responseText);
						}});
					});
	//make sure this div lines up 
	$('#groceryListViewer').on('dblclick',
	//I'm referring to lists.php... might not be right
			'div.lists', 
			null,
			function (e) {
	//I'm referring to lists.php... might not be right 
				var g = $(this).data('lists');
				$(this).replaceWith(g.makeEditDiv());
				});
	
	//make sure this div lines up 
	$('#groceryListViewer').on('submit',
			'form.edit_form',
			null,
			function (e) {
				e.preventDefault();
				var edit_div = $(this).parent();
				//I'm referring to lists.php... might not be right 
				var g = edit_div.data('lists');
				//I'm referring to lists.php... might not be right  
				$.ajax(url_base + "/lists.php/" + g.id, 
					{type: "POST",
						dataType: "json",
						data: $(this.serialize(),
						success: function (groceryList_json, status, jqXHR) {
						var g = new groceryList(groceryList_json);
						edit_div.replaceWith(g.makeCompactDiv());
						},
							error: function(jqXHR, status, error) {
							alert(jqXHR.responseText);
						}});
					});
	var load_groceryList_item = function (id) {
		$.ajax(url_base + "/lists.php/" + id,
	{type: "GET",
	dataType: "json",
	success: function(groceryList_json, status, jqXHR) {
		var g = new groceryList (groceryList_json.list_id);
		$('#groceryListViewer').append(g.makeCompactDiv());
		}
	});
	}
						