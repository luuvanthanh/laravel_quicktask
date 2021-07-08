window.setTimeout(function() {
    $("#thongbao").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 1000);