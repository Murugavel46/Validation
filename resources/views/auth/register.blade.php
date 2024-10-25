<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</head>

<body>
    <h2>Register</h2>
    <form action="{{ route('register') }}" method="POST" id="registerform">
        @csrf
        <label>First Name:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"><br>

        @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Last Name:</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"><br>

        @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"><br>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date_of_birth"><br>

        @error('date_of_birth')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="submit" value="Register">
    </form>

    <x-back-button />

    <script>
        const today = new Date();
        const eighteenYearsAgo = new Date(today.setFullYear(today.getFullYear() - 18));
        const maxDate = eighteenYearsAgo.toISOString().split('T')[0];

        const dateInput = document.getElementById('date');
        dateInput.setAttribute('max', maxDate);

        $(document).ready(function () {
            $('#registerform').validate({
                rules: {
                    first_name: {
                        required: true,
                        maxlength: 25,
                        
                    },
                    last_name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    date_of_birth: {
                        required: true,
                        date: true
                    }
                },
                messages: {
                    first_name: {
                        required: 'First name is a required field.',
                        maxlength: 'First name cannot exceed 25 characters.'
                    },
                    last_name: {
                        required: 'Last name is a required field.'
                    },
                    email: {
                        required: 'Email is a required field.',
                        email: 'Please enter a valid email address.'
                    },
                    date_of_birth: {
                        required: 'Date of birth is a required field.',
                        date: 'Please enter a valid date.'
                    }
                }
            });
        });
    </script>
</body>

</html>
