<html>
<body>
    <h1>Loan Created</h1>
    <p>Hi, {{ $loan->user->name }}!</p>
    <p>Your loan request of <strong>Rp{{ number_format($loan->amount, 2) }}</strong> has been created with status: <strong>{{ $loan->status }}</strong>.</p>
    <p>Notes: {{ $loan->notes }}</p>
</body>
</html>
