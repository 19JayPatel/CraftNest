document.addEventListener("DOMContentLoaded", () => {

    // Get form fields
    const emailField = document.getElementById("email");
    const passwordField = document.getElementById("password");
    const errorMessage = document.getElementById("jsErrorMessage");

    // ============================
    // VALIDATION FUNCTIONS
    // ============================

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
        if (passwordField.value.trim() === "") {
            return "Password is required.";
        }
        return "";
    }

    function validateAllFields() {
        if (emailField.value.trim() === "" && passwordField.value.trim() === "") {
            return "Please fill all fields.";
        }
        return "";
    }

    // ============================
    // ERROR HANDLER
    // ============================

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

    // ============================
    // BLUR VALIDATION
    // ============================

    emailField.addEventListener("blur", () =>
        validateField(emailField, validateEmail)
    );

    passwordField.addEventListener("blur", () =>
        validateField(passwordField, validatePassword)
    );

    // ============================
    // FORM SUBMIT VALIDATION
    // ============================

    document.querySelector("form").addEventListener("submit", (event) => {

        const allFieldsError = validateAllFields();
        if (allFieldsError) {
            showErrorMessage(allFieldsError);
            event.preventDefault();
            return false;
        }

        if (
            !validateField(emailField, validateEmail) ||
            !validateField(passwordField, validatePassword)
        ) {
            event.preventDefault();
            return false;
        }

        return true; // All good → allow submission
    });
});
