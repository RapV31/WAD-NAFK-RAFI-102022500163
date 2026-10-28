<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Form Pengemudi - Modul 2')</title>
    
    <style>
        
        body {
            background-color: lightblue; /* Latar belakang biru muda */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .kotak-form {
            background-color: white; 
            width: 400px; 
            margin: 50px auto; 
            padding: 20px; 
            border-radius: 10px; 
            border: 2px solid darkblue; 
        }

        h1 {
            color: darkblue; 
            text-align: center; 
        }

        input[type="text"], select {
            width: 90%; 
            padding: 8px; 
            margin-bottom: 10px; 
        }

        button.btn-simpan, button.btn-tambah {
            background-color: darkblue;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button.btn-simpan:hover, button.btn-tambah:hover {
            background-color: blue;
        }

        
        .kotak-tabel { 
            background-color: #ffffff; 
            width: 90%; 
            max-width: 1000px; 
            margin: 50px auto; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        .tabel-driver { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .tabel-driver th, .tabel-driver td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        .tabel-driver th { background-color: #f2f2f2; color: #333; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; margin: 2px; font-size: 14px; border:none; cursor:pointer;}
        .btn-tambah-baru { background-color: #28a745; margin-bottom: 15px; color: white; padding: 8px 15px; text-decoration:none; display:inline-block; border-radius: 5px;}
        .btn-detail { background-color: #007bff; color: white;}
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-kembali { background-color: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 15px; text-align: center; width: 90%;}
    </style>
</head>
<body>

    @yield('content')

</body>
</html>