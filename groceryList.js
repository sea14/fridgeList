var groceryList = function(groceryList_json) {
//names derived directly from the database
	this.list_id = groceryList_json.list_id;
	this.user_id = groceryList_json.user_id;
	this.items = groceryList_json.items;
	this.listName = groceryList_json.listName;
	}

groceryList.prototype.makeCompactDiv = function() {
	var cdiv = $("<div></div>");
	cdiv.addClass('todo');
	
	var listName = $("<div></div>");
	listName_div.addClass('listName');
	listName_div.html(this.listName);
	cdiv.append(listName_div);
	
	cdiv.data('groceryList', this);
	return cdiv
};	
	
groceryList.prototype.makeEditDiv = function() {
	var ediv = $("<div></div>");
	
	var ediv_form = $("<form></form>");
	ediv_form.addClass('edit_form');
	
	//should allow for editing name of the grocery list
	ediv_form.append($("<input type='text' name='listName'>").val(this.listName));
	ediv_form.append("<br>");
	
	//should allow for editing the names of the items on the grocery list 
	ediv_form.append($("<textarea name='items'></textarea>").val(this.items));
	ediv_form.append("<br>");
	
	//should allow for saving the list once the edits are completed
	ediv_form.append("<button type='submit' id='save'>Save</button><button type='button' class='cancel'>Cancel</button>");
	ediv.append(ediv_form);
	
	//make my edits to my grocery list! 
	ediv.('groceryList', this);
	
	//should display the list again once the edits have been made
	return ediv;
	}
	
	