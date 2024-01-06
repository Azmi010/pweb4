$(document).ready(function () {
  // Delete row confirmation
  $('.item_row').on('click', '.delete_item', function (e) {
    let id = $(this).attr('data-id');

    Swal.fire({
      title: 'Apakah anda yakin untuk menghapus?',
      // text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya, Hapus!',
    }).then((result) => {
      if (result.isConfirmed) {
        console.log(id);
        $.get(
          `http://localhost/pweb4/public/?url=Skpi/delete/${id}`,
          function (data, textStatus, jqXHR) {
            if (textStatus == 'success') {
              Swal.fire({
                title: 'Deleted!',
                text: 'Berhasil dihapus',
                icon: 'success',
              }).then(() => {
                location.reload();
              });
            }
          }
        );
        // $(this).parents('.item_row').remove();
      }
    });
  });
});
