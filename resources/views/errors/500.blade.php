<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 — Server Error</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .error-box { text-align: center; padding: 2rem; }
        .error-num {
            font-size: 8rem;
            font-weight: 700;
            line-height: 1;
            color: #ff3e1d;
            letter-spacing: -4px;
        }
        .error-title { font-size: 1.5rem; font-weight: 600; margin: 1rem 0 .5rem; }
        .error-sub { color: #6c757d; margin-bottom: 2rem; }
        .btn-home {
            background: #696cff;
            color: #fff;
            border: none;
            padding: .7rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: opacity .2s;
        }
        .btn-home:hover { opacity: .85; color: #fff; }
    </style>
</head>
<body>
    <div class="error-box">
        <div class="error-num">500</div>
        <h1 class="error-title">Server Error</h1>
        <p class="error-sub">কিছু একটা ঠিকমতো কাজ করছে না। একটু পরে আবার চেষ্টা করো।</p>
        <a href="{{ url('/') }}" class="btn-home">Go to Homepage</a>
    </div>
</body>
</html>