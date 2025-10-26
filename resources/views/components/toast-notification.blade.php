<!-- Toast Container -->
<div id="toast-container" class="fixed top-20 right-4 z-50 space-y-4 max-w-sm w-full">
    <!-- Toasts akan ditambahkan di sini via JavaScript -->
</div>

<!-- Toast Styles & Script -->
<style>
    @keyframes slideInRight {
        from {
            transform: translateX(400px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }

        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }

    .toast-enter {
        animation: slideInRight 0.3s ease-out forwards;
    }

    .toast-exit {
        animation: slideOutRight 0.3s ease-in forwards;
    }

    .toast-progress {
        height: 4px;
        background: rgba(255, 255, 255, 0.3);
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        animation: progressBar 5s linear forwards;
    }

    @keyframes progressBar {
        from {
            width: 100%;
        }

        to {
            width: 0%;
        }
    }
</style>

{{-- <script>
    // Toast Notification System
    class ToastNotification {
        constructor() {
            this.container = document.getElementById('toast-container');
            this.toasts = [];
        }

        show(message, type = 'info', duration = 5000) {
            const toast = this.createToast(message, type, duration);
            this.container.appendChild(toast);
            this.toasts.push(toast);

            // Trigger animation
            setTimeout(() => toast.classList.add('toast-enter'), 10);

            // Auto remove after duration
            if (duration > 0) {
                setTimeout(() => this.remove(toast), duration);
            }

            return toast;
        }

        createToast(message, type, duration) {
            const toast = document.createElement('div');
            toast.className =
                `toast-item relative bg-white rounded-lg shadow-2xl overflow-hidden border-l-4 ${this.getBorderColor(type)}`;

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
            ${duration > 0 ? '<div class="toast-progress"></div>' : ''}
        `;

            return toast;
        }

        getIcon(type) {
            const icons = {
                success: '<i class="fas fa-check-circle text-2xl" style="color: #B2CD9C;"></i>',
                error: '<i class="fas fa-times-circle text-2xl text-red-500"></i>',
                warning: '<i class="fas fa-exclamation-triangle text-2xl" style="color: #CA7842;"></i>',
                info: '<i class="fas fa-info-circle text-2xl" style="color: #4B352A;"></i>'
            };
            return icons[type] || icons.info;
        }

        getTitle(type) {
            const titles = {
                success: 'Berhasil!',
                error: 'Error!',
                warning: 'Peringatan!',
                info: 'Informasi'
            };
            return titles[type] || titles.info;
        }

        getBorderColor(type) {
            const colors = {
                success: 'border-accent',
                error: 'border-red-500',
                warning: 'border-secondary',
                info: 'border-primary'
            };
            return colors[type] || colors.info;
        }

        remove(toast) {
            if (!toast || !toast.parentNode) return;

            toast.classList.remove('toast-enter');
            toast.classList.add('toast-exit');

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
            return this.show(message, 'success', duration);
        }

        error(message, duration = 5000) {
            return this.show(message, 'error', duration);
        }

        warning(message, duration = 5000) {
            return this.show(message, 'warning', duration);
        }

        info(message, duration = 5000) {
            return this.show(message, 'info', duration);
        }

        clear() {
            this.toasts.forEach(toast => this.remove(toast));
        }
    }

    // Initialize toast system
    const toastSystem = new ToastNotification();

    // Laravel Session Flash Messages (otomatis tampilkan jika ada)
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            toastSystem.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastSystem.error("{{ session('error') }}");
        @endif

        @if (session('warning'))
            toastSystem.warning("{{ session('warning') }}");
        @endif

        @if (session('info'))
            toastSystem.info("{{ session('info') }}");
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastSystem.error("{{ $error }}");
            @endforeach
        @endif
    });
</script> --}}

<!-- CONTOH PENGGUNAAN:

1. Dari JavaScript:
   toastSystem.success('Data berhasil disimpan!');
   toastSystem.error('Terjadi kesalahan saat menyimpan data.');
   toastSystem.warning('Password Anda akan kadaluarsa dalam 7 hari.');
   toastSystem.info('Anda memiliki 3 pesan baru.');

2. Dari Laravel Controller:
   return redirect()->back()->with('success', 'Login berhasil!');
   return redirect()->back()->with('error', 'Email atau password salah.');
   return redirect()->route('home')->with('warning', 'Profil Anda belum lengkap.');
   return redirect()->back()->with('info', 'Verifikasi email telah dikirim.');

3. Custom Duration (0 = tidak auto close):
   toastSystem.success('Pesan penting!', 10000); // 10 detik
   toastSystem.error('Error kritis!', 0); // Tidak auto close

4. Manual Close:
   const toast = toastSystem.success('Loading...');
   // Lakukan sesuatu...
   toastSystem.remove(toast);

5. Clear All Toasts:
   toastSystem.clear();
-->

<!-- Demo Buttons (hapus saat production) -->
{{-- <div class="fixed bottom-4 left-4 z-50 space-y-2">
    <button onclick="toastSystem.success('Artikel berhasil disimpan!')"
        class="block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
        <i class="fas fa-check mr-2"></i>Demo Success
    </button>
    <button onclick="toastSystem.error('Gagal memuat data. Silakan coba lagi.')"
        class="block bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
        <i class="fas fa-times mr-2"></i>Demo Error
    </button>
    <button onclick="toastSystem.warning('Sesi Anda akan berakhir dalam 5 menit.')"
        class="block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
        <i class="fas fa-exclamation-triangle mr-2"></i>Demo Warning
    </button>
    <button onclick="toastSystem.info('Ada pembaruan sistem yang tersedia.')"
        class="block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
        <i class="fas fa-info-circle mr-2"></i>Demo Info
    </button>
</div> --}}
