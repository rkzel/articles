<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel2') }}</title>

    <!-- Styles -->
    <style>
        .container {
            margin: auto;
            width: 800px;
            background-color: #EFF;
        }
        .card {
            height: 100%;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 0.9rem;
            line-height: 1.3;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .card-body {
            background-color: #DEF;
            padding: 12px;
            margin-bottom: 12px;
        }

        .pagination {
            margin-top: 2rem;
        }

        .text-muted {
            font-style: italic;
        }

        .form-group {
            padding: 12px;
        }

        .img-fluid {
            width: 120px;
            height: 120px;
            float: left;
            padding: 12px;
        }

        .art-body {
            display: flex;
        }

        .row {
            background-color: #DEE;
            padding: 12px;
        }

        .likes-and-views {
            display: flex;
            gap: 32px;
            justify-content: center;
            background-color: #ACD;
            padding: 8px;
        }

        .tag {
            padding: 2px 12px;
            border-radius: 12px;
            background-color: green;
            font-size: 13px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <!-- Navigation bar goes here -->
    </header>

    <main>
        <!-- Main content goes here -->
        @yield('content')
    </main>

    <footer>
        <!-- Footer content goes here -->
    </footer>
</body>
</html>
