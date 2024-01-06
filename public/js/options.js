const unsurSelect = '#unsur';
const butirSelect = '#butir';

let kategori;
if (idKategori) {
  switch (idKategori) {
    case 'k1':
      kategori = 'prestasi';
      break;
    case 'k2':
      kategori = 'kegiatan';
      break;
    case 'k3':
      kategori = 'sertifikasi';
      break;
    case 'k4':
      kategori = 'mbkm';
      break;
    default:
      kategori = '';
      break;
  }
}

function setOptions(postData, selector) {
  $.post(`${BASEURL}/?url=Skpi/getOptions/`, postData, function (data) {
    let element = selector;

    try {
      let result = JSON.parse(data);
      element = `#${result.type}`;
      $(element).html(result.options);
      $(element).trigger('change');
      $(element).trigger('click');
    } catch (error) {
      $(element).html('');
    }
  });
}

$(document).ready(function () {
  $(unsurSelect).on('click', function () {
    let selectVal = idKategori;
    selectVal += $(this).val();

    let data = {
      select_val: selectVal,
    };

    setOptions(data);
  });

  if (!$(unsurSelect).val()) setOptions({ select_val: idKategori });

  $(butirSelect).on('change', function () {
    let unsurVal = $(unsurSelect).val();
    let selectVal = idKategori;
    selectVal += unsurVal;
    selectVal += $(this).val();

    let data = {
      select_val: selectVal,
    };

    setOptions(data);
  });
});
