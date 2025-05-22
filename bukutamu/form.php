<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku Tamu Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-form {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(118,75,162,0.25);
        }
    </style>
</head>
<body class="gradient-bg vh-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card card-form">
                    <div class="card-header text-center py-4">
                        <h2 class="text-white mb-0">
                            <i class="fas fa-book-open me-2"></i>BUKU TAMU DIGITAL
                        </h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="proses.php" method="POST">
                            <!-- Input Group dengan Floating Label -->
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="nama" name="nama" 
                                       placeholder="Nama Lengkap" required>
                                <label for="nama"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="instansi" name="instansi" 
                                       placeholder="Instansi" required>
                                <label for="instansi"><i class="fas fa-building me-2"></i>Instansi</label>
                            </div>

                            <div class="form-floating mb-4">
                                <textarea class="form-control" id="tujuan" name="tujuan" 
                                          placeholder="Tujuan Kunjungan" style="height: 100px" required></textarea>
                                <label for="tujuan"><i class="fas fa-bullseye me-2"></i>Tujuan Kunjungan</label>
                            </div>
                    <!-- Di dalam <form> sebelum tombol submit -->
                    <input type="hidden" name="tanggal" id="tanggal">
                    <input type="hidden" name="waktu" id="waktu">

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const now = new Date();
                        
                        // Format tanggal: YYYY-MM-DD (sesuai format MySQL DATE)
                        const tanggal = now.toISOString().split('T')[0];
                        
                        // Format waktu: HH:MM:SS (sesuai format MySQL TIME)
                        const waktu = now.toTimeString().substring(0, 8);
                        
                        // Set nilai ke input hidden
                        document.getElementById('tanggal').value = tanggal;
                        document.getElementById('waktu').value = waktu;
                        
                        // Opsional: Menampilkan preview untuk pengunjung
                        const options = { 
                            weekday: 'long', 
                            year: 'numeric', 
                            month: 'long', 
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        };
                        const waktuFormatted = now.toLocaleDateString('id-ID', options);
                        alert(`Waktu kunjungan Anda: ${waktuFormatted}`);
                    });
                    </script>
                            <button type="submit" class="btn btn-lg btn-primary w-100 py-3">
                                <i class="fas fa-save me-2"></i> SIMPAN DATA
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

                    
