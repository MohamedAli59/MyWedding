
$(document).ready(function () {
    $(".flip").click(function () {
        $(".panel").slideToggle("slow");
    });
    $(".flip1").click(function () {
        $(".panel1").slideToggle("slow");
    });

    if (screen.width <= 760) {

        $(".mariage").click(function () {
            var id =$(this).children('td').html();

            document.location.href = "/admin/mariages/"+id;
        })

        $(".client").click(function () {
            var id =$(this).children('td').html();

            document.location.href = "/admin/clients/"+id;
        })

        $(".presta").click(function () {
            var id =$(this).children('td').html();

            document.location.href = "/admin/prestations/"+id;
        })
    }
});

