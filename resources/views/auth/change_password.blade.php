@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>

    <h2>Change Password</h2>

    <form action="{{ route('change_password.form') }}" method="POST" id="changePasswordForm">
        @csrf

        <div>
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required>
        </div>

        <div>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required>
        </div>

        <div>
            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" required>
        </div>

        <div>
            <button type="submit">Change Password</button>
        </div>

    </form>


    
   
<x-back-button />


<script>
$(document).ready(function () {
    $('#changePasswordForm').on('submit', function (e) {
        let isValid = true;
        const currentPassword = $('#current_password').val().trim();
        const newPassword = $('#new_password').val().trim();
        const confirmPassword = $('#new_password_confirmation').val().trim();

        if (!currentPassword || !newPassword || !confirmPassword) {
            alert('All fields are required.');
            isValid = false;
        } else if (newPassword.length < 6) {
            alert('New password must be at least 6 characters long.');
            isValid = false;
        } else if (newPassword !== confirmPassword) {
            alert('Passwords do not match.');
            isValid = false;
        }

        return isValid;
    });
});
</script>

</body>
</html>
