$(document).ready(function () {
    $(".accButton").on("click", function () {
        var id = $(this).data("id");
        sendVerificationRequest(id, $(this));
    });

    $(".cancelButton").on("click", function () {
        var id = $(this).data("id");
        sendRevertedRequest(id, $(this));
    });

    $('input[name="status"]').change(function () {
        filterRows();
    });
});

function sendVerificationRequest(id, button) {
    $.ajax({
        type: "POST",
        url: "http://localhost/pweb4/public/?url=Verifikasi/updateVerification",
        data: { id: id },
        success: function (response) {
            console.log(response);
            if (response.includes("Success")) {
                Swal.fire({
                    title: "Terima Kasih!",
                    text: "Status Verifikasi Berhasil Diperbarui!",
                    icon: "success"
                  });
                var statusElement = button.closest("tr").find(".status");
                statusElement.text("Sudah Disetujui").removeClass("bg-red-500").addClass("bg-green-500");

                button.prop("disabled", true).removeClass("bg-green-500").addClass("bg-gray-400");
            } else {
                Swal.fire({
                    title: "Oops...",
                    text: "Status Verifikasi Gagal Diperbarui!",
                    icon: "error"
                  });
            }
        }
    });
}

function sendRevertedRequest(id, button) {
    $.ajax({
        type: "POST",
        url: "http://localhost/pweb4/public/?url=Verifikasi/revertVerification",
        data: { id: id, revert: true },
        success: function (response) {
            console.log(response);
            if (response.includes("Reverted")) {
                Swal.fire({
                    title: "Terima Kasih!",
                    text: "Status Verifikasi Berhasil Diperbarui!",
                    icon: "success"
                  });
                var statusElement = button.closest("tr").find(".status");
                statusElement.text("Belum Disetujui").removeClass("bg-green-500").addClass("bg-red-500");

                var accButton = button.closest("tr").find(".accButton");
                accButton.prop("disabled", false).addClass("bg-green-500").removeClass("bg-gray-400");
            } else {
                Swal.fire({
                    title: "Oops...",
                    text: "Status Verifikasi Gagal Diperbarui!",
                    icon: "error"
                  });
            }
        }
    });
}
function filterRows() {
    const statusFilter = $('input[name="status"]:checked').val();
    $('.status').each(function () {
        const status = $(this).text().trim();
        $(this).closest('tr').toggle(status === statusFilter);
    });
}