$(document).ready(function() {
    $('#passwordForm').submit(function() {
        if($('#passwordForm_uppercase').is(':checked')) {
            var uppercase='on';
        } else {
            var uppercase='off';
        }
        if($('#passwordForm_lowercase').is(':checked')) {
            var lowercase='on';
        } else {
            var lowercase='off';
        }
        if($('#passwordForm_number').is(':checked')) {
            var number='on';
        } else {
            var number='off';
        }
        if($('#passwordForm_special').is(':checked')) {
            var special='on';
        } else {
            var special='off';
        }
        $.ajax({
            type: "POST",
            url: "generateurPW.php",
            data: "caracternumber="+$("#passwordForm_caracternumber").val()+"&uppercase="+uppercase+"&lowercase="+lowercase+"&number="+number+"&special="+special+"&generatepw="+$("#passwordForm_submit").val(),
            success: function(data){
                if(data!='') {
                    $("#passwordForm_password").val(data);
                } else {
                    $("#resultat").html("<p>Une erreur s'est produite. Veuillez réessayer.</p>");
                }
            }
        });
        return false;
    });
});