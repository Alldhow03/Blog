<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            width: 90%;
            text-align: center;
            padding: 2rem;
        }

        .container img {
            width: 100%;
            max-width: 300px;
            margin: 0 auto 1.5rem;
        }

        .error-code {
            font-size: 4rem;
            font-weight: 700;
            color: #ef4444;
            margin-bottom: 0.5rem;
        }

        .error-message {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .home-link {
            display: inline-block;
            text-decoration: none;
            background-color: #3b82f6;
            color: #ffffff;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .home-link:hover {
            background-color: #2563eb;
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 3rem;
            }

            .error-message {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="w-4 h-3" src="https://cdn-icons-png.flaticon.com/512/1828/1828490.png" alt="Akses Ditolak">
        <div class="error-code">403</div>
        <div class="error-message">Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.</div>
        <a href="{{ route('member.blogs.index') }}" class="home-link">Kembali ke Beranda</a>
    </div>
</body>

</html>