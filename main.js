$('#novaKnjiga').submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenuto");

    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const $serijalizacija = $form.serialize();
    console.log($serijalizacija);

    request = $.ajax({
        url:'operacije/dodajKnjigu.php',
        type: 'post',
        data: $serijalizacija
    });

    request.done(function (response, textStatus, jqXHR) {
        if (response === "Success") {
            location.reload(true);
        }

        else
            console.log("Greška");

        console.log(response);
    });

});