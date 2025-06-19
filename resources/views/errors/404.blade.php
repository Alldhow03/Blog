<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 - Halaman Tidak Ditemukan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #e0f5e9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://www.svgrepo.com/show/419909/forest-tree.svg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.85);
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 90%;
        }

        h1 {
            font-size: 4rem;
            color: #388e3c;
        }

        p {
            font-size: 1.2rem;
            margin: 1rem 0;
            color: #4b4b4b;
        }

        a.button {
            text-decoration: none;
            background: #4caf50;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background: #388e3c;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2.5rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! Halaman yang kamu cari tidak ditemukan.</p>
        <a href="{{ route('member.blogs.index') }}" class="button">Kembali ke Beranda</a>
    </div>
</body>

</html>