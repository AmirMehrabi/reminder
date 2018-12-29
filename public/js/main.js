        $( document ).ready(function() {

        $("#finalPrice").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#calculate").click();
            }
        });





            setTimeout(function(){ $('.alert').hide(); }, 8000);
        });
