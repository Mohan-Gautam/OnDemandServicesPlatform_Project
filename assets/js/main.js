$(document).ready(function(){
    $('#reg_username').keyup(function(){
        let val = $(this).val();
        if(val.length > 0) {
            $.ajax({
                url: 'backend/check_user.php',
                data: {'username': val},
                method: 'post',
                success: function(r){ $('#err_username').html(r); }
            });
        }
    });

    $('#reg_email').keyup(function(){
        let val = $(this).val();
        if(val.length > 0) {
            $.ajax({
                url: 'backend/check_user.php',
                data: {'email': val},
                method: 'post',
                success: function(r){ $('#err_email').html(r); }
            });
        }
    });
});