
var list = function(list_json) {
    this.id = todo_json.id;
    this.title = todo_json.title;
    this.note = todo_json.note;
    this.project = todo_json.project;
}

Todo.prototype.makeCompactDiv = function() {
    var cdiv = $("<div></div>");
    cdiv.addClass('todo');

    var title_div = $("<div></div>");
    title_div.addClass('title');
    title_div.html(this.title);
    cdiv.append(title_div);

    var due_date_div = $("<div></div>");
    due_date_div.addClass('due');
    if (this.due_date) {
	due_date_div.html(this.due_date.toDateString());
    } else {
	due_date_div.html("No due date");
    }
    cdiv.append(due_date_div);

    cdiv.data('todo', this);

    return cdiv;
};

Todo.prototype.makeEditDiv = function() {
    var ediv = $("<div></div>");

    var ediv_form = $("<form></form>");
    ediv_form.addClass('edit_form');
    
    ediv_form.append($("<input type='text' name='title'>").val(this.title));
    ediv_form.append("<br>");

    ediv_form.append($("<textarea name='note'></textarea>").val(this.note));
    ediv_form.append("<br>");

    ediv_form.append("Project: ");
    ediv_form.append($("<input type='text' name='project'>").val(this.project));
    ediv_form.append("<br>");

    ediv_form.append("<button type='submit'>Save</button><button type='button' class='cancel'>Cancel</button>");
    ediv.append(ediv_form);
    
    ediv.data('todo', this);
    return ediv;
}
