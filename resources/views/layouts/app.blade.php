{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Toko Sport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            padding:0;
        }

        .sidebar{
            width:230px;
            min-height:100vh;
            background:#212529;
            position:fixed;
            left:0;
            top:0;
            padding-top:20px;
        }

        .sidebar a{
            display:block;
            color:white;
            padding:12px 20px;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#343a40;
        }

        .content{
            margin-left:230px;
            padding:30px;
        }
    </style>
</head>
<body>

@if(Auth::check())

<div class="sidebar">
    <h4 class="text-white text-center mb-4">TOKO SPORT</h4>

    <a href="{{ url('/product') }}">Produk</a>
    <a href="{{ url('/supplier') }}">Supplier</a>
    <a href="{{ url('/logout') }}">Logout</a>
</div>

@endif

<div class="content">

    {{-- NOTIF SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- NOTIF ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- VALIDASI ERROR --}}
    @if($errors->any())
        <div class="alert alert-warning">
            <ul class="mb-0">
                @foreach($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>