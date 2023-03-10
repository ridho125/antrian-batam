<!-- Aplikasi Antrian Berbasis Web 
**********************************************
* Developer   : Indra Styawantoro
* Company     : Indra Studio
* Release     : Juni 2021
* Update      : -
* Website     : www.indrasatya.com
* E-mail      : indra.setyawantoro@gmail.com
* WhatsApp    : +62-821-8686-9898
-->

<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="Indra Styawantoro">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->

  <!-- Font -->
  <link rel="stylesheet" href="../assets/css/google.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet"> -->

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="row justify-content-lg-center">
        <div class="col-lg-5 mb-4">
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian</h1>
            </div>
          </div>

          <div class="card border-0 shadow-sm" id = "capture">
            <div class="card-body text-center d-grid p-5">
              <div class="border border-success rounded-2 py-2 mb-5">
                <h3 class="pt-4">ANTRIAN TAKSI KONVENSIONAL</h3>
                <!-- menampilkan informasi jumlah antrian -->
                <h1 id="antrian" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
              </div>
              <!-- button pengambilan nomor antrian -->
              <a id="insert" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor Antrian
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2022 - <a href="https://supportsystemindonesia.com/" target="_blank" class="text-danger text-decoration-none">www.supportsystemindonesia.com</a>. All rights reserved.
      </div>
    </div>
  </footer>
  
  <!-- jQuery Core -->
  <script type="text/javascript"  src="../assets/js/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

  <!-- Popper and Bootstrap JS -->
  <script type="text/javascript"  src="../assets/js/popper.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
  <script type="text/javascript"  src="../assets/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> -->

  <script type="text/javascript"  src="../assets/js/html2canvas.js"></script>
  
  <script type="text/VBScript" language="VBScript">
        Sub Print()
               OLECMDID_PRINT = 6
               OLECMDEXECOPT_DONTPROMPTUSER = 2
               OLECMDEXECOPT_PROMPTUSER = 1
               call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER,1)
        End Sub
        document.write "<object ID='WB' WIDTH=0 HEIGHT=0 CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>"
</script>
  <script type="text/javascript">
    $(document).ready(function() {
      var ua = navigator.userAgent.toLowerCase();
      var isAndroid = ua.indexOf("android") > -1;
      // tampilkan jumlah antrian
      $('#antrian').load('get_antrian.php');

      // proses insert data
      $('#insert').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST
          url: 'insert.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian').load('get_antrian.php').fadeIn('slow');
              // window.print();
              
              // window.onload=function(){self.print();} 
              setTimeout(function() { 
                // html2canvas(document.querySelector("#capture")).then(canvas => {
                //     document.body.appendChild(canvas)
                // });
                if (isAndroid) {
                  // https://developers.google.com/cloud-print/docs/gadget
                  var gadget = new cloudprint.Gadget();
                  gadget.setPrintDocument("url", $('title').html(), window.location.href, "utf-8");
                  gadget.openPrintDialog();
                    window.print();
                } else {
                    window.print();
                    // self.close();
                }
              }, 1000);
            }
          },
        });
      });
    });
  </script>

<script type="text/javascript">
</script>
</body>

</html>