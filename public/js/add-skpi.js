$(document).ready(() => {
  $('#prestasi-form').submit(function (e) {
    e.preventDefault();

    let data = new FormData($(this)[0]);
    data.append('kategori', idKategori);
    data.append('unsur', idUnsur);

    $.ajax({
      type: 'post',
      url: `${BASEURL}/?url=skpi/addprestasi/`,
      data: data,
      contentType: false,
      processData: false,
      success: function (response) {
        location.replace(`${BASEURL}/?url=skpi/prestasi/`);
      },
    });
  });
});
