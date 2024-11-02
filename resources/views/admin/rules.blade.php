<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main id="main">
        <div class="internal-header">
            <div class="internal-logo">
                <h4 style="font-weight: bolder">ChalanManagment</h4>
            </div>
            <div class="internal-right"></div>
            <button class="menu" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
                <svg width="400" height="40" viewBox="0 0 100 100">
                    <path class="line line1"
                        d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line2" d="M 20,50 H 80" />
                    <path class="line line3"
                        d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                </svg>
            </button>
        </div>
        <div class="d-aside-right-bar bg-grey">
            @include('admin.sidebar')
            <div class="admin-content-right">
                <div class="section-title">
                    <h4>Rules & Regulations</h4>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <div class="box-right">
                            <div class="withdraw">
                                <a href="{{ route('admin.createrules') }}" class="button button-outline-primary button-round">Create Rules</a>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="box-heading mt-3">Rules List</h2>
                <div class="transaction-table shadow-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Fine Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rules as $rule) <!-- Loop through each rule -->
                            <tr>
                                <td>{{ $rule->name }}</td>
                                <td>{{ $rule->description }}</td>
                                <td>{{ number_format($rule->fine_amount, 2) }}</td> <!-- Format fine amount -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
