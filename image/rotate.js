var deg = 0;
            $("#turn").on("click", function() {
                if ($(this).is("#turn")) {
                    deg = deg - 90;
                } else {
                    deg = deg + 90;
                }
                $("rotation").css({
                    "-webkit-transform": "rotate(" + deg + "deg)",
                    "-moz-transform": "rotate(" + deg + "deg)",
                    transform: "rotate(" + deg + "deg)"
                });
                let rotation = $("rotai").val(deg);
                console.log(rotation);
            });