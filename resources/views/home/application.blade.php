<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venpic Agencies</title>
    <link rel="stylesheet" href="/home/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,
    wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto+Condensed:ital,wght@0,300;0,400;
    0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(9, 100, 204, 0.2);

        }

        form h4 {
            text-align: center;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="tel"],
        form input[type="email"],
        form input[type="date"],
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            transform: translateX(-10px);
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        form input[type='submit'] {
            padding: 10px 20px;
            background-color: #5d3cf1;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type='submit']:hover {
            background-color: #462be6;
        }
    </style>
</head>

<body>
    <!-- Header start -->
    {{-- @include('home.header') --}}
    <!-- End of Header Section -->
    <section>

        <form action="{{ route('rent_application', ['home_id' => $home->id]) }}" method="POST">
            @csrf

            @if (session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message') }}

                </div>
            @endif

            <h4>Application Form</h4>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="name" required value="{{ auth()->user()->name }}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="{{ auth()->user()->email }}">

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required value="{{ auth()->user()->phone }}">

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required value="{{ auth()->user()->dob }}">

            <label for="national_id">ID Number:</label>
            <input type="number" id="national_id" name="national_id" required value="{{ auth()->user()->id_number }}">

            <label for="move_in_date">Desired Move-in Date:</label>
            <input type="date" id="move_in_date" name="move_in_date" required>

            <label for="rental_duration">Preferred Rental Duration (months):</label>
            <input type="number" id="rental_duration" name="rental_duration" required>

            <label for="total_rent">Total Rent (KES):</label>
            <input type="number" id="total_rent" name="total_rent" readonly>




            <label for="comments">Additional Comments:</label>
            <textarea id="comments" name="comments" rows="4"></textarea>

            <input type="submit" value="Submit Application">
        </form>
    </section>















    <hr style="opacity:0.1;">

    <!-- Footer start -->

    @include('home.footer')

    <!-- Footer End -->
    <script>
        var logoutTimer;

        function startLogoutTimer() {
            var timeoutDuration = 30 * 60 * 1000; // Set timeout

            logoutTimer = setTimeout(function() {
                // Perform AJAX logout request or redirect to the logout endpoint
                window.location.href = '/logout';
            }, timeoutDuration);
        }

        function resetLogoutTimer() {
            clearTimeout(logoutTimer);
            startLogoutTimer();
        }

        // Calls the resetLogoutTimer() function whenever the user performs any activity, such as clicking a button or making an AJAX request.
        document.addEventListener('click', function() {
            if (document.visibilityState === "visible") {
                resetLogoutTimer();
            }
        });

        // Starts the logout timer initially when the page loads
        if (document.visibilityState === "visible") {
            startLogoutTimer();
        }

        // Listens for changes in the visibility state
        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === "visible") {
                // Page is now active
                startLogoutTimer();
            } else {
                // Page is not active
                clearTimeout(logoutTimer);
            }
        });
    </script>

    <script src="/home/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        // Get the rent price from your controller or model
        var rentPrice = {{ $home->rent_price }}; // Replace with your actual variable

        // Add an event listener to the rental duration input
        var rentalDurationInput = document.getElementById('rental_duration');
        rentalDurationInput.addEventListener('input', function() {
            // Get the selected rental duration
            var rentalDuration = parseInt(this.value);

            // Calculate the total rent
            var totalRent = rentalDuration * rentPrice;

            // Update the total rent input field
            document.getElementById('total_rent').value = totalRent;
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#move_in_date').on('input', function() {
                var selectedDate = new Date($(this).val());
                var currentDate = new Date();

                if (selectedDate < currentDate) {
                    alert("Please select a future date.");
                    $(this).val('');
                }
            });
        });
    </script>

</body>

</html>