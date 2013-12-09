
var recipe = function(recipe_json) {
    this.id = recipe_json.id;
    this.recipename = recipe_json.recipename;
    this.user_id = recipe_json.user_id;
    this.url = recipe_json.url;
};



recipe.prototype.makeEditDiv = function() {
    var ediv = $("<div></div>");

    var ediv_form = $("<form></form>");
    ediv_form.addClass('edit_form');
    
    ediv_form.append($("<input type='text' name='title'>").val(this.title));
    ediv_form.append("<br>");

    ediv_form.append($("<textarea name='url'></textarea>").val(this.url));
    ediv_form.append("<br>");


    ediv_form.append("<button type='submit'>Save</button><button type='button' class='cancel'>Cancel</button>");
    ediv.append(ediv_form);
    
    ediv.data('recipe', this);
    return ediv;
}
