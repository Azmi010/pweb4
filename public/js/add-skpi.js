$(document).ready(() => {
  $('#prestasi-form').submit(function (e) {
    e.preventDefault();
    // judul=test&tanggal=0001-11-11&tingkat=Nasional&jenis=Peserta&juara=1&peserta=Ivan%20Try%20Wicaksono
    // let data = $(this).serialize() + `&id_kategori=${idKategori}`;

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
