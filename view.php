<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css"
    />
    <style>
      body {
        font-size: 140%;
      }

      h2 {
        text-align: center;
        padding: 20px 0;
      }

      table caption {
        padding: 0.5em 0;
      }

      table.dataTable th,
      table.dataTable td {
        white-space: nowrap;
      }

      .p {
        text-align: center;
        padding-top: 140px;
        font-size: 14px;
      }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
    <title>Document</title>
  </head>
  <body>
    

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <table class="table table-bordered table-hover dt-responsive">
            
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Payment Description</th>
                <th>Amount</th>
                <th>Payment Id.</th>
              </tr>
            </thead>
            <tbody id="recordFetch"></tbody>
          </table>
        </div>
      </div>
    </div>

    <script>
      $("table").DataTable();
    </script>
    <script>
      // fetch record
      function loadRecord() {
        $.ajax({
          url: "loadRecord.php",
          dataType: "json",
          success: function (data) {
            //console.log(data);
            if (data.status == false) {
              $("#recordFetch").append("<b>" + data.message + "</b>");
            } else {
              var i = 1;
              $.each(data, function (key, value) {
                $("#recordFetch").append(`
                     <tr>
                        <td>${value.name}</td>
                        <td>${value.email}</td>
                        <td>${value.contact}</td>
                        <td>${value.payment_description}</td>
                        <td>${value.amount}</td>
                        <td>${value.payment_id}</td>
                     </tr>`);
              });
              i++;
            }
          },
        });
      }
      loadRecord();
    </script>
  </body>
</html>
