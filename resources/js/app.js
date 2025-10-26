import "./bootstrap";
import Alpine from "alpinejs";
import ToastNotification from "./System/ToastNotification";

function createQueryParams(url, name, value) {
    url.searchParams.set(name, value);
}

function redirect(to, queryParams) {
    const currentUrl = new URL(to);

    if (queryParams.length) {
        queryParams.map((item) => {
            if (item.value.length) {
                createQueryParams(currentUrl, item.name, item.value);
            } else {
                currentUrl.searchParams.delete(item.name);
            }
        });
    }

    window.location.href = currentUrl.toString();
}

function getQueryParams(url, name) {
    const currentUrl = new URL(url);

    const currentQueryParams = currentUrl.searchParams;

    return currentQueryParams.get(name);
}

function togglePassword(inputId) {
    const passwordInput = document.getElementById(inputId);
    const passwordToggle = document.getElementById(inputId + "-toggle");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggle.className =
            "fas fa-eye-slash text-gray-400 hover:text-gray-600";
    } else {
        passwordInput.type = "password";
        passwordToggle.className =
            "fas fa-eye text-gray-400 hover:text-gray-600";
    }
}

function updateCheckboxValue(checkboxId) {
    const checkbox = document.getElementById(`${checkboxId}-checkbox`);

    const checkboxValue = document.getElementById(checkboxId);

    if (checkbox) {
        checkboxValue.value = true;
    } else {
        checkboxValue.value = false;
    }
}

function copyToClipboard(value) {
    navigator.clipboard.writeText(value);

    showToastNotification("Successfully copied to clipboard!", "success", 3000);
}

function showToastNotification(message, type, duration) {
    const toastNotification = new ToastNotification();

    toastNotification.show(message, type, duration);
}

document.addEventListener("DOMContentLoaded", () => {
    const appError = window.app_error;

    if (appError) {
        showToastNotification(appError, "error", 5000);
    }
});

Alpine.data("app", () => ({
    redirect,
    getQueryParams,
    togglePassword,
    updateCheckboxValue,
    copyToClipboard,
}));

window.Alpine = Alpine;

Alpine.start();
