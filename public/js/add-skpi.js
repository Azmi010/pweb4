$(document).ready(() => {
  $('#prestasi-form').submit(function (e) {
    e.preventDefault();

    let data = new FormData($(this)[0]);
    console.log(data);
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
