document.addEventListener("DOMContentLoaded", function () {
    var Idmahasiswa = document.getElementById("mahasiswaId").getAttribute("data-mahasiswa-id");
    var mahasiswaId = Idmahasiswa || sessionStorage.getItem("mahasiswaId");

    if (!mahasiswaId) {
        console.error("ID mahasiswa tidak valid. Periksa cara Anda mendapatkan ID mahasiswa.");
        return;
    }

    var savedPoin = sessionStorage.getItem("totalPoin_" + mahasiswaId);

    if (savedPoin !== null) {
        document.getElementById("totalPoin").innerText = "Total Poin : " + savedPoin;
    }

    sessionStorage.clear();

    document.querySelectorAll(".layakButton").forEach(function (button) {
        button.addEventListener("click", function () {
            var id = this.getAttribute("data-id");
            sendValidationRequest(id, this);
        });
    });

    document.querySelectorAll(".tidakLayakButton").forEach(function (button) {
        button.addEventListener("click", function () {
            var id = this.getAttribute("data-id");
            sendInvalidationRequest(id, this);
        });
    });

    function sendValidationRequest(id, button) {
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "../app/views/validasi_skpi/ajax_handler.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                console.log(response);
                if (response.startsWith("Success")) {
                    var parts = response.split("|");
                    var poinBaru = parseInt(parts[1]);
                    alert("Status validasi diperbarui! Poin baru: " + poinBaru);

                    var totalPoin = parseInt(sessionStorage.getItem("totalPoin_" + mahasiswaId)) || 0;
                    var totalPoinUpdated = totalPoin + poinBaru;

                    document.getElementById("totalPoin").innerText = "Total Poin : " + totalPoinUpdated;
                    sessionStorage.setItem("totalPoin_" + mahasiswaId, totalPoinUpdated);

                    button.disabled = true;
                    button.classList.remove("bg-blue-500");
                    button.classList.remove("hover:bg-blue-700");
                    button.classList.add("bg-gray-300");
                } else {
                    alert("Gagal memperbarui status validasi. " + response);
                }
            }
        };

        xhr.send("id=" + id);
    }

    function sendInvalidationRequest(id, button) {
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "../app/views/validasi_skpi/ajax_handler.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                console.log(response);
                if (response.startsWith("Reverted")) {
                    var parts = response.split("|");
                    var poinKurang = parseInt(parts[1]);
                    alert("Status validasi diubah! Poin dikurangi: " + poinKurang);

                    var totalPoin = parseInt(sessionStorage.getItem("totalPoin_" + mahasiswaId)) || 0;
                    var totalPoinUpdated = totalPoin - poinKurang;

                    document.getElementById("totalPoin").innerText = "Total Poin : " + totalPoinUpdated;
                    sessionStorage.setItem("totalPoin_" + mahasiswaId, totalPoinUpdated);

                    var layakButton = button.parentElement.querySelector(".layakButton");
                    if (layakButton) {
                        layakButton.disabled = false;
                        layakButton.classList.remove("bg-gray-300");
                        layakButton.classList.add("bg-blue-500");
                        layakButton.classList.add("hover:bg-blue-700");
                    }
                } else if (response.startsWith("Success")) {
                    alert("Status validasi diubah! Poin dikurangi.");
                } else {
                    alert("Gagal memperbarui status validasi. " + response);
                }
            }
        };

        xhr.send("id=" + id + "&revert=true");
    }
});
