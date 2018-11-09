$(document).ready(function(){

  $("#swap").on("click",function(){
    $(".reg").hide();
    $(".log").show();
  });

  $("#backswap").on("click",function(){
    $(".reg").hide();
    $(".log").show();
  });

  $("#regbtn").on('click', function (e) {
    e.preventDefault();

    var regForm = $("#form_reg").serialize();
    $.ajax({
        type: 'POST',
        url: '/core/actions/register.action.php',
        data: regForm,
        success: function (result) {
            var res = JSON.parse(result);
            if (res.success == true) {
                alert(res.text);
               window.location = "/";
            } else {
                alert(res.text);
            }
        },
        error: function (xhr, code) {
            alert(xhr + code);
        }
    });
});


    $("#logbtn").on('click', function (e) {
        e.preventDefault();

        var regForm = $("#log").serialize();
        $.ajax({
            type: 'POST',
            url: '/core/actions/login.action.php',
            data: regForm,
            success: function (result) {
                var res = JSON.parse(result);
                if (res.success == true) {
                  window.location = "/";
                } else {
                  alert(res.text);
                }
            },
            error: function (xhr, code) {
                alert(xhr + code);
            }
        });
    });

    $("#addLot").on('click', function (e) {
        e.preventDefault();

        var addForm = $("#addLotForm").serialize();

        $.ajax({
            type: 'POST',
            url: '/core/actions/addLot.action.php',
            data: addForm,
            success: function (result) {
                var res = JSON.parse(result);
                if (res.success == true) {
                    alert(res.text);
                    window.location = "/";
                } else {
                    alert(res.text);
                }
            },
            error: function (xhr, code) {
                alert(xhr + code);
            }
        });
    });
});

function deleteLot(id) {
  $.ajax({
    type: "POST",
    url: '/core/actions/deleteLot.action.php',
    data: "lot_id=" + id,
    success: function (result) {
      var res = JSON.parse(result);
      if (res.success == true) {
        alert(res.text);
        window.location = "/profile";
      } else {
        alert(res.text);
      }
    },
    error: function (xhr, code) {
      alert(xhr + code);
    }
  });
}
