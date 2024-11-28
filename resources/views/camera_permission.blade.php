<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Camera Permissions</title>
    <style>
        body {
            background-color: white;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .error {
            color: red;
        }
        .button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div id="error" class="error" style="display: none;">NotAllowedError - Permission dismissed</div>
    <div id="reader" style="width: 500px; height: 500px;"></div>
    <div id="fallback" style="display: none; color: red;">Unable to load QR scanner. Please check your connection or try again later.</div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            $('#result').val(decodedText);
            let id = decodedText;

            html5QrcodeScanner.clear().then(_ => {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('validasi') }}",
                    type: 'POST',
                    data: {
                        _method: "POST",
                        _token: CSRF_TOKEN,
                        qr_code: id
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 200) {
                            alert('berhasil');
                        } else {
                            alert('gagal');
                        }
                    }
                });

                // Send AJAX request to update status
                fetch(`{{ url('/member/update-status') }}/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ status: 'active' })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        alert('Status updated successfully.');
                        // Redirect to members page
                        window.location.href = "{{ route('members.index') }}";
                    } else {
                        alert('Failed to update status.');
                    }
                })
                .catch(err => {
                    console.error("Error updating status:", err);
                });
            }).catch(error => {
                alert('something wrong');
            });
        }

        function onScanFailure(error) {
            // Handle scan failure, usually better to ignore and keep scanning.
            // For example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: { width: 250, height: 250 } },
            /* verbose= */ false
        );
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</body>
</html>
