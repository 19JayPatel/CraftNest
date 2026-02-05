document.addEventListener("DOMContentLoaded", () => {
    // Get form fields
    const usernameField = document.getElementById("username");
    const emailField = document.getElementById("email");
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm_password");
    const fileInput = document.getElementById("selectimg");

    const errorMessage = document.getElementById("jsErrorMessage");

    function validateUsername() {
        if (usernameField.value.trim() === "") {
            return "Username is required.";
        }
        return "";
    }

    function validateEmail() {
        const email = emailField.value.trim();
        if (email === "") {
            return "Email is required.";
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            return "Invalid email format.";
        }
        return "";
    }

    function validatePassword() {
        const password = passwordField.value;
        if (password === "") {
            return "Password is required.";
        } else if (password.length < 8) {
            return "Password must be at least 8 characters long.";
        }
        return "";
    }

    function validateConfirmPassword() {
        if (confirmPasswordField.value === "") {
            return "Confirm Password is required.";
        } else if (passwordField.value !== confirmPasswordField.value) {
            return "Passwords do not match.";
        }
        return "";
    }

    function checkAllFieldsEmpty() {
        if (
            usernameField.value.trim() === "" &&
            emailField.value.trim() === "" &&
            passwordField.value === "" &&
            confirmPasswordField.value === "" &&
            fileInput.files.length === 0
        ) {
            return "All fields are required.";
        }
        return "";
    }

    function showErrorMessage(message) {
        errorMessage.textContent = message;
    }

    function clearErrorMessage() {
        errorMessage.textContent = "";
    }

    function validateField(field, validationFunction) {
        const message = validationFunction();
        if (message) {
            showErrorMessage(message);
            field.focus();
            return false;
        }
        clearErrorMessage();
        return true;
    }

    usernameField.addEventListener("blur", () => validateField(usernameField, validateUsername));
    emailField.addEventListener("blur", () => validateField(emailField, validateEmail));
    passwordField.addEventListener("blur", () => validateField(passwordField, validatePassword));
    confirmPasswordField.addEventListener("blur", () => validateField(confirmPasswordField, validateConfirmPassword));
    fileInput.addEventListener("change", () => validateField(fileInput, validateFile));

    window.validateForm = function () {
        const allFieldsEmptyMessage = checkAllFieldsEmpty();
        if (allFieldsEmptyMessage) {
            showErrorMessage(allFieldsEmptyMessage);
            return false;
        }

        if (
            !validateField(usernameField, validateUsername) ||
            !validateField(emailField, validateEmail) ||
            !validateField(passwordField, validatePassword) ||
            !validateField(confirmPasswordField, validateConfirmPassword) ||
            !validateField(fileInput, validateFile)
        ) {
            return false;
        }

        return true;
    };
});
