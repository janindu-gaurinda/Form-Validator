<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Specifies the character encoding for the HTML document -->
    <meta charset="UTF-8">
    <!-- Ensures proper scaling on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Offline</title>

    <!-- Links to the local Bootstrap CSS file for styling -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

    <!-- Internal CSS for styling the error messages -->
    <style>
        .error-message {
            color: red; /* Error messages will be displayed in red */
            font-size: 12px; /* Error message font size */
        }
    </style>

    <!-- JavaScript function for form validation -->
    <script>
        function validateForm() {
            let form = document.forms["registrationForm"];
            let username = form["username"].value;
            let email = form["email"].value;
            let password = form["password"].value;
            let confirmPassword = form["confirm_password"].value;
            let phone = form["phone"].value;
            let firstError = null;

            // Clear all previous error messages
            let errorElements = document.querySelectorAll('.error-message');
            errorElements.forEach(function(element) {
                element.innerHTML = ""; // Clear error message content
            });

            // Validate Username
            if (username == "") {
                showError(form["username"], "Please choose a username.");
                if (!firstError) firstError = form["username"];
            } else if (!/^[a-zA-Z0-9]+$/.test(username)) {
                showError(form["username"], "Only letters and numbers are allowed in the username.");
                if (!firstError) firstError = form["username"];
            }

            // Validate Email
            if (email == "") {
                showError(form["email"], "Email is required.");
                if (!firstError) firstError = form["email"];
            } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                showError(form["email"], "Invalid email format.");
                if (!firstError) firstError = form["email"];
            }

            // Validate Password
            if (password == "") {
                showError(form["password"], "Password is required.");
                if (!firstError) firstError = form["password"];
            } else if (password.length < 6) {
                showError(form["password"], "Password must be at least 6 characters long.");
                if (!firstError) firstError = form["password"];
            }

            // Validate Confirm Password
            if (confirmPassword == "") {
                showError(form["confirm_password"], "Confirm Password is required.");
                if (!firstError) firstError = form["confirm_password"];
            } else if (confirmPassword != password) {
                showError(form["confirm_password"], "Passwords do not match.");
                if (!firstError) firstError = form["confirm_password"];
            }

            // Validate Phone Number
            if (phone == "") {
                showError(form["phone"], "Phone number is required.");
                if (!firstError) firstError = form["phone"];
            } else if (!/^\d{10}$/.test(phone)) {
                showError(form["phone"], "Phone number must be exactly 10 digits.");
                if (!firstError) firstError = form["phone"];
            }

            // If there is an error, scroll to the first error and prevent form submission
            if (firstError) {
                firstError.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });
                return false; // Prevent form submission
            }

            return true; // Form is valid, allow submission
        }

        // Function to display an error message next to the input element
        function showError(inputElement, message) {
            let errorElement = inputElement.nextElementSibling;
            if (errorElement && errorElement.classList.contains('error-message')) {
                errorElement.innerHTML = message; // Set the error message content
            }
        }
    </script>
</head>

<body>
<div class="container m-5"> <!-- Bootstrap container with margin -->
<div class="col-5"> <!-- Bootstrap column spanning 5 of 12 columns -->
    <h2>Registration Form</h2>
    <!-- Form with POST method that triggers the validateForm() JavaScript function on submission -->
    <form action="register.php" method="POST" name="registrationForm" onsubmit="return validateForm()">
        <!-- Form group for username input -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control">
            <small class="error-message"></small> <!-- Placeholder for error message -->
        </div>
        <br>

        <!-- Form group for email input -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            <small class="error-message"></small> <!-- Placeholder for error message -->
        </div>
        <br>

        <!-- Form group for password input -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="error-message"></small> <!-- Placeholder for error message -->
        </div>
        <br>

        <!-- Form group for confirm password input -->
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            <small class="error-message"></small> <!-- Placeholder for error message -->
        </div>
        <br>

        <!-- Form group for phone number input -->
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" class="form-control">
            <small class="error-message"></small> <!-- Placeholder for error message -->
        </div>
        <br>

        <!-- Submit button -->
        <input type="submit" value="Register" class="btn btn-primary">
    </form>
    </div>
    </div>

    <!-- Include jQuery and then Bootstrap Bundle JS (includes Popper.js) -->
    <script src="./bootstrap/jquery-3.7.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
