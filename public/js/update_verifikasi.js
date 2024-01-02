document.querySelectorAll(".accButton").forEach(function (button) {
    button.addEventListener("click", function () {
        var id = this.getAttribute("data-id");
        sendVerificationRequest(id, this);
    });
});

document.querySelectorAll(".cancelButton").forEach(function (button) {
    button.addEventListener("click", function () {
        var id = this.getAttribute("data-id");
        sendRevertedRequest(id, this);
    });
});

function sendVerificationRequest(id, button) {
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "../app/views/verifikasi_skpi/ajax_verif.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            console.log(response);
            if (response.startsWith("Success")) {
                alert("Status verifikasi diperbarui!");
                var statusElement = button.closest("tr").querySelector(".status");
                statusElement.innerText = "Sudah Disetujui";
                statusElement.classList.remove("bg-red-500");
                statusElement.classList.add("bg-green-500");

                button.disabled = true;
                button.classList.remove("bg-green-500");
                button.classList.add("bg-gray-400");
            } else {
                alert("Gagal memperbarui status verifikasi " + response);
            }
        }
    };

    xhr.send("id=" + id);
}

function sendRevertedRequest(id, button) {
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "../app/views/verifikasi_skpi/ajax_verif.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            console.log(response);
            if (response.startsWith("Reverted")) {
                alert("Status verifikasi diperbarui!");
                var statusElement = button.closest("tr").querySelector(".status");
                statusElement.innerText = "Belum Disetujui";
                statusElement.classList.remove("bg-green-500");
                statusElement.classList.add("bg-red-500");

                var accButton = button.parentElement.querySelector(".accButton");
                accButton.disabled = false;
                accButton.classList.remove("bg-gray-400");
                accButton.classList.add("bg-green-500");
            } else {
                alert("Gagal memperbarui status verifikasi. " + response);
            }
        }
    };

    xhr.send("id=" + id + "&revert=true");
}