        $("#finalPrice").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#calculate").click();
            }
        });




        $("#calculate").click(function(){
          price = $("#finalPrice").val();
          final_price = parseFloat(Math.round(price / 1.09)).toFixed(0);
          final = Number(parseFloat(final_price).toFixed(2)).toLocaleString('en', {
                    minimumFractionDigits: 0
                  });

          $("#calculated-price").html("<hr><p class='h4 text-right font-weight-bold'>قیمت خام:<small> " + final + " ریال <small></p><hr> ");

        });
