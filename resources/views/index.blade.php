<!DOCTYPE html>
<html>
<head>
    <title>Invoice Numbers</title>
</head>
<body>
    <h1>Invoice Numbers</h1>
    <ul>
        @foreach ($invoiceNumbers as $invoiceNumber)
            <li>{{ $invoiceNumber }}</li>
        @endforeach
    </ul>
</body>
</html>
