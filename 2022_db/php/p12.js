$(document).ready(function() {
    $('#aname').change(function() {

        var data = { aname: $('.tpart').val() };

        $.ajax({
            type: "POST",
            url: "p12db_2022.php",
            data: data,
            success: function(html) {
                $('#message').html(html);
            }
        });
        return false;
    });
});
