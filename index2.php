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
</head>

<body>
    <div class="container m-5"> <!-- Bootstrap container with margin -->
        <div class="col-5"> <!-- Bootstrap column spanning 5 of 12 columns -->
            <h2>Registration Form</h2>
            <!-- Form with Bootstrap validation and custom validation -->
            <form class="row g-3 needs-validation" name="registrationForm" novalidate onsubmit="return validateForm()">
                
                <!-- Form group for Username -->
                <div class="col-md-4 position-relative">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" id="validationTooltip01" required>
                    <div class="invalid-tooltip">
                        Please choose a unique and valid username.
                    </div>
                    <small class="error-message"></small>
                </div>
                
                <!-- Form group for Last Name -->
                <div class="col-md-4 position-relative">
                    <label for="validationTooltip02" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="validationTooltip02" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                
                <!-- Form group for Email -->
                <div class="col-md-4 position-relative">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="validationTooltipUsername" required>
                    <div class="invalid-tooltip">
                        Please enter a valid email address.
                    </div>
                    <small class="error-message"></small>
                </div>
                
                <!-- Form group for Password -->
                <div class="col-md-6 position-relative">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="validationTooltip03" required>
                    <div class="invalid-tooltip">
                        Password must be at least 6 characters long.
                    </div>
                    <small class="error-message"></small>
                </div>
                
                <!-- Form group for Confirm Password -->
                <div class="col-md-6 position-relative">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" name="confirm_password" class="form-control" id="validationTooltip05" required>
                    <div class="invalid-tooltip">
                        Passwords do not match.
                    </div>
                    <small class="error-message"></small>
                </div>

                <!-- Form group for Phone Number -->
                <div class="col-md-6 position-relative">
                    <label for="phone" class="form-label">Phone Number:</label>
                    <input type="tel" name="phone" pattern="[0-9]{10}" class="form-control" required>
                    <div class="invalid-tooltip">
                        Phone number must be exactly 10 digits.
                    </div>
                    <small class="error-message"></small>
                </div>

                <!-- Form group for City -->
                <div class="col-md-6 position-relative">
                    <label for="validationTooltip03" class="form-label">City:</label>
                    <input type="text" class="form-control" id="validationTooltip03" required>
                    <div class="invalid-tooltip">
                        Please provide a valid city.
                    </div>
                </div>

                <!-- Form group for State -->
                <div class="col-md-3 position-relative">
                    <label for="validationTooltip04" class="form-label">State:</label>
                    <select class="form-select" id="validationTooltip04" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                    </select>
                    <div class="invalid-tooltip">
                        Please select a valid state.
                    </div>
                </div>

                <!-- Form group for Zip -->
                <div class="col-md-3 position-relative">
                    <label for="validationTooltip05" class="form-label">Zip:</label>
                    <input type="text" class="form-control" id="validationTooltip05" required>
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
                    </div>
                </div>

                <!-- Submit button -->
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include jQuery and then Bootstrap Bundle JS (includes Popper.js) -->
    <script src="./bootstrap/jquery-3.7.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom form validation script -->
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

        // Bootstrap form validation script
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission if invalid
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
