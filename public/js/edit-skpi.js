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

  let fileSection = '.file_sect';
  let addfileBtn = '#add_file'; 
  let fileInput = '.file_input';

  let nfile = $(fileInput).length;

  $(addfileBtn).click(function (e) {
    e.preventDefault();
    if (nfile < maxInputs) {
      nfile++;
      $(fileSection).append(
        '<div class="mt-1"><input required type="file" accept="image/*,.pdf" name="file_bukti[]" class="file_input border border-black rounded py-1 px-2"/> <button type="button" class="remove_file bg-red-600 text-gray-50 px-3 py-1 rounded w-min">Hapus</button></div>'
      ); 
    }
  });

  $(fileSection).on('click', '.remove_file', function (e) {
    let idFileBukti = $(this).attr('data-idfb');
    $.get(`${BASEURL}/?url=skpi/deleteFileBukti/${idFileBukti}`);
    $(this).parent('div').remove();
    nfile--;
  });

  $('#prestasi-form').submit(function (e) {
    e.preventDefault();

    let data = new FormData($(this)[0]);
    data.append('kategori', idKategori);

    $.ajax({
      type: 'post',
      url: `${BASEURL}/?url=skpi/editItem/`,
      data: data,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        location.replace(`${BASEURL}/?url=skpi/index/${kategori}/`);
      },
    });
  });
});
