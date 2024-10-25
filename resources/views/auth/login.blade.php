<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST" id="login">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"><br>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label>Password:</label>
        <input type="password" id="password" name="password"><br>

        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="submit" value="Login">
    </form>


    <x-back-button />



    <script>
        function PasswordValidator() {
            var passwordvalid = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])$/;
            var passwordstrength = document.getElementById("<%=txtPassword.ClientID%>");
            if (passwordstrength != passwordvalid) {
                alert("Password must contain at least 1 capital letter,\n\n1 small letter, 1 number and 1 special character.\n\nFor special characters you can pick one of these -,(,!,@,#,$,),%,<,>");
                return false;
            }
        }


        $(document).ready(function() {
            $('#login').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,

                    },

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