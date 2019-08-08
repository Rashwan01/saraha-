$(document).ready(function () {

    $(".arrow svg").on("click", function () {

        $(".slider").animate({

            "left": "-250px"
        }, 1000);


    });


    $(".copy").click(function () {

        $(".url").select();


        document.execCommand("copy");

    });


    $(".share").click(function () {

        $(this).animate({
            fontSize: "12px"

        }, 400, function () {

            $(this).animate({
                fontSize: "14px"
            }, 300, function () {
                $(".copied").removeClass("toggle");
            });
        });


    });

    $(".imgoo").hover(function () {

        $(this).find(".edit").animate({

            bottom: 0
        }, 400)


    }, function () {


        $(this).find(".edit").animate({

            bottom: "-102px"
        }, 400)
    });
    $(".imgoo .edit").click(function () {

        $(".upload").click();
    });

    $("input[type=file]").on('change', function () {

        $("form").submit();
    });

});
