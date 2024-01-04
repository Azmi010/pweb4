$(document).ready(() => {
  let maxInputs = 10;

  let pesertaSection = '.peserta_sect';
  let addPesertaBtn = '#add_peserta';

  let nPeserta = 1;
  $(addPesertaBtn).click(function (e) {
    e.preventDefault();
    if (nPeserta < maxInputs) {
      nPeserta++;
      $(pesertaSection).append(
        '<div class="mt-1"><input required type="number" name="peserta[]" class="border-black border rounded focus:bg-slate-50 py-1 px-2"/> <button class="remove_peserta bg-red-600 text-gray-50 px-3 py-1 rounded w-min">Hapus</button></div>'
      );
    }
  });

  $(pesertaSection).on('click', '.remove_peserta', function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    nPeserta--;
  });

  let fileSection = '.file_sect';
  let addfileBtn = '#add_file';

  let nfile = 1;
  $(addfileBtn).click(function (e) {
    e.preventDefault();
    if (nfile < maxInputs) {
      nfile++;
      $(fileSection).append(
        '<div class="mt-1"><input required type="file" accept="image/*,.pdf" name="file_bukti[]" class="border border-black rounded py-1 px-2"/> <button class="remove_file bg-red-600 text-gray-50 px-3 py-1 rounded w-min">Hapus</button></div>'
      );
    }
  });

  $(fileSection).on('click', '.remove_file', function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    nfile--;
  });

  $('#prestasi-form').submit(function (e) {
    e.preventDefault();

    let data = new FormData($(this)[0]);
    data.append('kategori', idKategori);

    let defaultOption = "-- Pilih Opsi --"
    let unsur = data.get('unsur');
    let butir = data.get('butir');
    let sub_butir = data.get('sub_butir');
    if (unsur == defaultOption) console.log(unsur);
    if (butir == defaultOption) console.log(butir);
    if (sub_butir == defaultOption) console.log(sub_butir);
    $.ajax({
      type: 'post',
      url: `${BASEURL}/?url=Skpi/addItem/`,
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
