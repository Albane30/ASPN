//Upload multiple
$('.add-another-collection-widget').click(function (e) {
    var list = $($(this).attr('data-list-selector'));
    // Try to find the counter of the list or use the length of the list
    var counter = list.data('widget-counter') | list.children().length;

    // grab the prototype template
    var newWidget = list.attr('data-prototype');
    // replace the "__name__" used in the id and name of the prototype
    // with a number that's unique to your pictures
    // end name attribute looks like name="team[pictures][2]"
    newWidget = newWidget.replace(/__name__/g, counter);
    // Increase the counter
    counter++;
    // And store it, the length cannot be used if deleting widgets is allowed
    list.data('widget-counter', counter);

    // create a new list element and add it to the list
    var newElem = $(list.attr('data-widget-tags')).html(newWidget);
    newElem.appendTo(list);
});

//Convocations
var $team = $('#convocation_team');
var $token = $('#convocation__token');

// When team gets selected ...
$team.change(function() {
  // ... retrieve the corresponding form.
  var $form = $(this).closest('form');
  // Simulate form data, but only include the selected team value.
  var data = {};
  data[$team.attr('name')] = $team.val();
  data[$token.attr('name')] = $token.val();
 
  // Submit data via AJAX to the form's action path.
  $.ajax({
    url : $form.attr('action'),
    type: $form.attr('method'),
    data : data,
    success: function(html) {
        
      // Replace current user field ...
      $('#convocation_user').replaceWith(
        // ... with the returned one from the AJAX response.
        $(html).find('#convocation_user')
      );
      // User field now displays the appropriate users.
    }
  });
});

//Tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })