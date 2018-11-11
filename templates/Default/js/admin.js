var user_id = null;
var lot_id = null;

$("#confirmDel").on('show.bs.modal', function (e) {
  var button = $(e.relatedTarget);
  var rec = button.data('whatever');

  user_id = rec;
});

$("#confirmDelLot").on('show.bs.modal', function (e) {
  var button = $(e.relatedTarget);
  var rec = button.data('whatever');

  lot_id = rec;
});

$("#confirmBtnDelLot").on('click', function (e) {
  e.preventDefault();
  $.ajax({
    url: '/core/actions/deleteLotAdm.action.php',
    type: 'POST',
    data: 'lot_id=' + lot_id,
    success: function (result) {
      var res = JSON.parse(result);
      if (res.success == true) {
        window.location = "/admin/lots";
      } else {
        alert(res.text);
      }
    },
    error: function (xhr, code) {
      alert(xhr + code);
    }
  });
  lot_id = null;
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
        window.location = "/admin/users";
      } else {
        alert(res.text);
      }
    },
    error: function (xhr, code) {
      alert(xhr + code);
    }
  });
  user_id = null;
});
