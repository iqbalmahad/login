<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>User Dashboard</title>
</head>
<body>
    @yield('content')

    <script>
        // Script untuk menghilangkan notifikasi setelah beberapa detik dengan animasi fade
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.classList.add('fade');
                setTimeout(function() {
                    alert.remove();
                }, 500); // Waktu animasi fade (500 milidetik)
            });
        }, 2000); // Notifikasi akan dihapus setelah 2 detik (2000 milidetik)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>