<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datatables Limit - Server Side</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
</head>

<body>
  <div class="container mt-4 mb-4">
    <table id="table_id" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>No Invoice</th>
          <th>Tanggal Transaksi</th>
          <th>Klien</th>
          <th>No. Klien</th>
          <th>Nama Klien</th>
          <th>Opsi</th>
        </tr>
      </thead>
    </table>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.0/r-2.3.0/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

  <script>
    const t = $('#table_id').DataTable({
      dom: 'Bfrtip',
      buttons: ["copy", "csv", "excel", "pdf", "print"],
      processing: true,
      serverSide: true,
      ajax: "data/SampleData?d=transaction",
      responsive: true,
      deferRender: true,
      responsive: true,
      autoWidth: true,
      order: [
        [2, 'desc']
      ]
    });

    t.on('order.dt search.dt', function() {
      let i = 1;

      t.cells(null, 0, {
        search: 'applied',
        order: 'applied'
      }).every(function(cell) {
        this.data(i++);
      });
    }).draw();

    const onView = (data) => {
      alert(data);
    }
  </script>
</body>

</html>