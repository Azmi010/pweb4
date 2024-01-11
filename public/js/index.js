const BASEURL = 'https://fasilkompoint.simaport.net/public';

const dateCheckBox = '#checkbox_enddate';
const endDateInput = '#tanggal_berakhir';
$(dateCheckBox).click(function (e) { 
    let isChecked = $(this).is(':checked')

    if (isChecked) {
        $(endDateInput).removeAttr('disabled');
        $(endDateInput).attr('required', '');
    } else {
        $(endDateInput).attr('disabled', '');
        $(endDateInput).removeAttr('required');
    }
});
