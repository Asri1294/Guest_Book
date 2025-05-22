<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-header {
            background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
        }
        .hover-effect tr:hover {
            background-color:rgb(252, 251, 251);
            transition: all 0.3s ease;
        }
        .search-box {
            max-width: 500px;
            border-radius: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table thead th {
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header gradient-header text-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 text-center"><i class="fas fa-users me-2"></i>DAFTAR TAMU MEI 2025</h3>
                    <a href="form.php" class="btn btn-light">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Tamu
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                <!-- Search Form Modern -->
                <form class="mb-4">
                    <div class="input-group search-box">
                        <input type="text" 
                               class="form-control border-0 py-2" 
                               name="search" 
                               placeholder="Cari nama atau instansi..."
                               value="<?= $_GET['search'] ?? '' ?>">
                        <button class="btn btn-success px-4">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Responsive Table -->
                <div class="table-responsive">
                    <table class="table table-striped hover-effect">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th><i class="fas fa-user me-2"></i>Nama</th>
                                <th><i class="fas fa-building me-2"></i>Instansi</th>
                                <th><i class="fas fa-bullseye me-2"></i>Tujuan</th>
                                <th><i class="fas fa-calendar-day me-2"></i>Tanggal</th>
                                <th><i class="fas fa-clock me-2"></i>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $search = $_GET['search'] ?? '';
                            $query = "SELECT * FROM buku_tamu 
                                    WHERE nama LIKE '%$search%' OR instansi LIKE '%$search%' 
                                    ORDER BY id DESC";
                            $result = mysqli_query($conn, $query);
                            
                            if (mysqli_num_rows($result) > 0):
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= htmlspecialchars($row['instansi']) ?></td>
                                <td><?= htmlspecialchars($row['tujuan']) ?></td>
                                <td><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                                <td><?= date('H:i', strtotime($row['waktu'])) ?></td>
                            </tr>
                            <?php endwhile; else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-exclamation-circle me-2"></i>Tidak ada data
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>