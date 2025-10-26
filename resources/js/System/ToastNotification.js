export default class ToastNotification {
    constructor() {
        this.container = document.getElementById("toast-container");
        this.toasts = [];
    }

    show(message, type, duration = 5000) {
        const toast = this.createToast(message, type, duration);
        this.container.appendChild(toast);
        this.toasts.push(toast);

        // Trigger animation
        setTimeout(() => toast.classList.add("toast-enter"), 10);

        // Auto remove after duration
        if (duration > 0) {
            setTimeout(() => this.remove(toast), duration);
        }

        return toast;
    }

    createToast(message, type, duration) {
        const toast = document.createElement("div");
        toast.className = `toast-item relative bg-white rounded-lg shadow-2xl overflow-hidden border-l-4 ${this.getBorderColor(
            type
        )}`;

        toast.innerHTML = `
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        ${this.getIcon(type)}
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            ${this.getTitle(type)}
                        </p>
                        <p class="mt-1 text-sm text-gray-600">
                            ${message}
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button onclick="toastSystem.remove(this.closest('.toast-item'))" 
                                class="inline-flex text-gray-400 hover:text-gray-600 focus:outline-none transition duration-150">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            ${duration > 0 ? '<div class="toast-progress"></div>' : ""}
        `;

        return toast;
    }

    getIcon(type) {
        const icons = {
            success:
                '<i class="fas fa-check-circle text-2xl" style="color: #B2CD9C;"></i>',
            error: '<i class="fas fa-times-circle text-2xl text-red-500"></i>',
            warning:
                '<i class="fas fa-exclamation-triangle text-2xl" style="color: #CA7842;"></i>',
            info: '<i class="fas fa-info-circle text-2xl" style="color: #4B352A;"></i>',
        };
        return icons[type] || icons.info;
    }

    getTitle(type) {
        const titles = {
            success: "Success!",
            error: "Error!",
            warning: "Warning!",
            info: "Information",
        };
        return titles[type] || titles.info;
    }

    getBorderColor(type) {
        const colors = {
            success: "border-accent",
            error: "border-red-500",
            warning: "border-secondary",
            info: "border-primary",
        };
        return colors[type] || colors.info;
    }

    remove(toast) {
        if (!toast || !toast.parentNode) return;

        toast.classList.remove("toast-enter");
        toast.classList.add("toast-exit");

        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
                const index = this.toasts.indexOf(toast);
                if (index > -1) {
                    this.toasts.splice(index, 1);
                }
            }
        }, 300);
    }

    success(message, duration = 5000) {
        return this.show(message, "success", duration);
    }

    error(message, duration = 5000) {
        return this.show(message, "error", duration);
    }

    warning(message, duration = 5000) {
        return this.show(message, "warning", duration);
    }

    info(message, duration = 5000) {
        return this.show(message, "info", duration);
    }

    clear() {
        this.toasts.forEach((toast) => this.remove(toast));
    }
}
