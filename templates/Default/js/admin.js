var user_id = 0;

$("#confirmDel").on('show.bs.modal', function (e) {
  var button = $(e.relatedTarget);
  var rec = button.data('whatever');

  user_id = rec;
});

$("#confirmBtnDelete").on('click', function (e) {
  e.preventDefault();
  $.ajax({
    url: '/core/actions/deleteUserAdm.action.php',
    type: 'POST',
    data: 'user_id=' + user_id,
    success: function (result) {
      var res = JSON.parse(result);
      if (res.success == true) {
        alert(res.text);
        window.location = "/admin/users";
      } else {
        alert(res.text);
      }
    },
    error: function (xhr, code) {
      alert(xhr + code);
    }
  });
  user_id = 0;
});
