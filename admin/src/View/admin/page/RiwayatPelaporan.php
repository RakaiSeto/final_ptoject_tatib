<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />

    
  </head>
  <body>
  <div class="main-container">
      <!-- Sidebar -->
      <?php require_once 'sidebar.php'; ?>

      <!-- Navbar -->
      <?php require_once 'navbar.php'; ?>

        <!-- Dashboard Content -->
        <div class="content px-3 pt-3">
        <button class="btn btn-success mb-4"><i class="bi bi-plus me-2"></i>Tambah</button>
          <div class="table-responsive mb-4">
            <table class="table table-bordered table-hover" id="tabel-awal">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pelanggaran</th>
                  <th>Status</th>
                  <th>File</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Merokok di kawasan kampus</td>
                  <td>Menunggu</td>
                  <td><button class="btn btn-secondary">Download</button></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Merusak sarana dan prasarana</td>
                  <td>Selesai</td>
                  <td><button class="btn-generate btn btn-primary">Download</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
      $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      });

      $(".open-btn").on("click", function () {
        $(".sidebar").addClass("active");
      });

      $(".close-btn").on("click", function () {
        $(".sidebar").removeClass("active");
      });
    </script>
  </body>
</html>



