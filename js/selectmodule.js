//FORMULAIRE AJAX POUR APPEL MODULE

$(function () {
  $("#formselect").submit(function (e) {
    
    e.preventDefault();
    location.reload();
    const id = $(this).find("select option:selected").val();
    const name = $(this).find("select option:selected").text();
    const ajax = true;

    $.post(
      "CONTROLLER/selected_module.php",
      { id: id, name: name, ajax: ajax },
      function () {

      }
    );

    return false;
  });
});
