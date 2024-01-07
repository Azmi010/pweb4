$(document).ready(function () {

    $(".layakButton").on("click", function () {
        var id = $(this).data("id");
        sendValidationRequest(id, $(this));
    });

    $(".tidakLayakButton").on("click", function () {
        var id = $(this).data("id");
        sendInvalidationRequest(id, $(this));
    });
    $(".simpanButton").on("click", function() {
        var id = $(this).data("mahasiswa-id");
        getPointById(id, $(this));
    });

    var idOnPageLoad = $(".simpanButton").data("mahasiswa-id");
    getPointById(idOnPageLoad, $(".simpanButton"));
});

function sendValidationRequest(id, button) {
    $.ajax({
        type: "POST",
        url: "http://localhost/pweb4/public/?url=Validasi/updateValidation",
        data: { id: id },
        success: function (response) {
            console.log(response);
            if (response.includes("Success")) {
                Swal.fire({
                    title: "Terima Kasih!",
                    text: "Status Validasi Berhasil Diperbarui!",
                    icon: "success"
                  });

                button.prop("disabled", true).removeClass("bg-blue-500").removeClass("hover:bg-blue-700").addClass("bg-gray-300");
            } else {
                Swal.fire({
                    title: "Oops...",
                    text: "Status Validasi Gagal Diperbarui!",
                    icon: "error"
                  });
            }
        }
    });
}

function sendInvalidationRequest(id, button) {
    $.ajax({
        type: "POST",
        url: "http://localhost/pweb4/public/?url=Validasi/updateInvalidation",
        data: { id: id },
        success: function (response) {
            console.log(response);
            if (response.includes("Reverted")) {
                Swal.fire({
                    title: "Terima Kasih!",
                    text: "Status Validasi Berhasil Diperbarui!",
                    icon: "success"
                  });

                  var layakButton = button.closest("tr").find(".layakButton");
                  layakButton.prop("disabled", false).removeClass("bg-gray-300").addClass("bg-blue-500").addClass("hover:bg-blue-700");
            } else {
                Swal.fire({
                    title: "Oops...",
                    text: "Status Validasi Gagal Diperbarui!",
                    icon: "error"
                  });
            }
        }
    });
}

function getPointById(id, button) {
    $.ajax({
        type: "POST",
        url: "http://localhost/pweb4/public/?url=Validasi/getPoint",
        data: { id: id },
        dataType: 'json',
        success: function (response) {
            // Swal.fire({
            //     title: "Berhasil!",
            //     text: "Semua Perubahan Berhasil Disimpan!",
            //     icon: "success"
            //   });
            console.log(response)
            console.log(response.totalPoin);
            console.log(id);

            $('#labelPoin').html("Total Poin : " + response.totalPoin)
            // button.prop("disabled", true).removeClass("bg-green-400").removeClass("hover:bg-green-600").addClass("bg-gray-300");
        }
    });
}