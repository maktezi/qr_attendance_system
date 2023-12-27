<!DOCTYPE html>
<html>
    <head>
        <title>QR Scan</title>
        <!-- Add this to the head of your HTML file -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

        <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #preview {
            width: 100%; /* Adjust the width as needed */
            max-width: 600px; /* Set a max-width for better responsiveness */
        }
        </style>
        <script type="text/javascript" src="{{ asset('qr/instascan.min.js') }}"></script>
    </head>

    <body>
        <div>
            <a style="padding: 5px 15px;" href="{{ route('forms.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            <h1>QR SCAN</h1>
            <video id="preview"></video>
        </div>

        <script>
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            scanner.addListener('scan', function(content) {
                // Remove the double quotes from the content
                content = content.replace(/"/g, '');

                // Send the QR data to the Laravel backend
                fetch('/attendances/scan/' + content, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Use SweetAlert2 for success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Attended Successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        // Optionally, you can redirect the user or perform other actions
                    } else {
                        // Use SweetAlert2 for error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Not registered!',
                            // text: data.error,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
            });

            Instascan.Camera.getCameras().then(cameras => {
                if(cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error("No camera found on the device!");
                }
            });
        </script>

        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
    </body>

</html>
