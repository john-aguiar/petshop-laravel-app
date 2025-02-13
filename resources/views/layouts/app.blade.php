<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            display: flex;
        }
        #sidebar {
            width: 250px;
            transition: 0.3s;
        }
        #content {
            margin-left: 250px; /* Largura da sidebar */
            width: 100%;
            padding: 20px;
            transition: 0.3s;
        }
        .text-orange {
            color: #ff7700;
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            #sidebar {
                width: 0;
                overflow: hidden;
                position: fixed;
                height: 100vh;
                z-index: 1000;
                background: #212529;
            }
            #content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    @include('partials.sidebar')

    <div id="content">
        <button class="btn btn-outline-dark d-md-none" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>

        @yield('content')
    </div>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            let sidebar = document.getElementById('sidebar');
            if (sidebar.style.width === '250px' || sidebar.style.width === '') {
                sidebar.style.width = '0';
            } else {
                sidebar.style.width = '250px';
            }
        });
    </script>

</body>
</html>
