$(document).ready(() => {
  let maxInputs = 10; 

  let pesertaSection = '.peserta_sect';
  let addPesertaBtn = '#add_peserta'; 
  let pesertaInput = '.peserta_input';

  let nPeserta = $(pesertaInput).length;
  
  console.log(nPeserta);
  $(addPesertaBtn).click(function (e) {
    e.preventDefault();
    if (nPeserta < maxInputs) {
      nPeserta++;
      $(pesertaSection).append(
        '<div class="mt-1"><input required type="number" name="peserta[]" class="peserta_input border-black border rounded focus:bg-slate-50 py-1 px-2"/> <button type="button" class="remove_peserta bg-red-600 text-gray-50 px-3 py-1 rounded w-min">Hapus</button></div>'
      ); 
    }
  });

  $(pesertaSection).on('click', '.remove_peserta', function (e) {
    let idPesertaItem = $(this).attr('data-idpi');
    $.get(`${BASEURL}/?url=skpi/deletePeserta/${idPesertaItem}`);
    $(this).parent('div').remove();
    nPeserta--;
  });


  $('#prestasi-form').submit(function (e) {
    e.preventDefault();

    let data = new FormData($(this)[0]);
    data.append('kategori', idKategori);
    data.append('unsur', idUnsur);

    $.ajax({
      type: 'post',
      url: `${BASEURL}/?url=skpi/editprestasi/`,
      data: data,
      contentType: false,
      processData: false,
      success: function (response) {
        // console.log(response);
        location.replace(`${BASEURL}/?url=skpi/prestasi/`);
      },
    });
  });
});
