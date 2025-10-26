<x-layout>

    <x-slot:title>
        Register
    </x-slot:title>

    <section class="min-h-screen flex items-center justify-center bg-light py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-6">
                    <i class="fas fa-cross text-5xl text-primary"></i>
                </div>
                <h2 class="text-3xl font-bold text-primary">
                    Join Faith Journey
                </h2>
                {{-- <p class="mt-2 text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="/login" class="font-medium text-secondary hover:text-primary transition duration-300">
                        Masuk di sini
                    </a>
                </p> --}}
            </div>

            <div class="bg-white rounded-lg shadow-lg p-8">
                <!-- Display validation errors -->
                {{-- @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <div class="flex">
                            <i class="fas fa-exclamation-circle text-red-400 mr-2 mt-1"></i>
                            <div>
                                <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan:</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif --}}

                <!-- Registration Form -->
                <form class="space-y-6" action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-user mr-2"></i>Full Name
                        </label>
                        <input id="name" name="name" type="text"
                            class="@error('name') border-red-500 @enderror w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                            placeholder="Enter your full name" value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-envelope mr-2"></i>Email
                        </label>
                        <input id="email" name="email" type="email"
                            class="@error('email') border-red-500 @enderror w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                            placeholder="Enter your email" value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone-number" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-phone mr-2"></i>Phone Number<span
                                class="text-gray-400 text-xs">(Optional)</span>
                        </label>
                        <input id="phone_number" name="phone_number" type="tel"
                            class="@error('phone_number') border-red-500 @enderror w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                            placeholder="Enter your phone number" value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-lock mr-2"></i>Password
                        </label>
                        <div class="relative">
                            <input id="password" name="password" type="password"
                                class="@error('password') border-red-500 @enderror  w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                                placeholder="Enter your password">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                @@click="togglePassword('password')">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="password-toggle"></i>
                            </button>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="mt-1 text-xs text-gray-500">
                            Minimal 8 karakter, kombinasi huruf dan angka
                        </div> --}}
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-lock mr-2"></i>Confirm Password
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="@error('password_confirmation') border-red-500 @enderror w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                                placeholder="Repeat your password">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                @@click="togglePassword('password_confirmation')">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600"
                                    id="password_confirmation-toggle"></i>
                            </button>
                            @error('password_confirmation')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div>
                        <label for="church" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-church mr-2"></i>Gereja <span
                                class="text-gray-400 text-xs">(Opsional)</span>
                        </label>
                        <input id="church" name="church" type="text"
                            class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                            placeholder="Nama gereja Anda" value="{{ old('church') }}">
                    </div> --}}

                    <div>
                        <div class="flex items-start">
                            <input id="terms-checkbox" name="terms-checkbox" type="checkbox"
                                class="h-4 w-4 text-secondary focus:ring-secondary border-gray-300 rounded mt-1"
                                @@click="updateCheckboxValue('terms')">
                            <input type="hidden" id="terms" name="terms" value="false" />
                            <label for="terms-checkbox" class="ml-3 text-sm text-gray-700">
                                {{-- Saya setuju dengan
                                <a href="#" class="text-secondary hover:text-primary transition duration-300">Syarat &
                                    Ketentuan</a>
                                dan
                                <a href="#"
                                    class="text-secondary hover:text-primary transition duration-300">Kebijakan
                                    Privasi</a> --}}
                                I agree to the
                                <a href="#"
                                    class="text-secondary hover:text-primary transition duration-300">Terms &
                                    Conditions</a>
                                and
                                <a href="#"
                                    class="text-secondary hover:text-primary transition duration-300">Privacy
                                    Policy</a>
                            </label>
                        </div>
                        @error('terms')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-start">
                        <input id="subscribe-checkbox" name="subscribe-checkbox" type="checkbox"
                            class="h-4 w-4 text-secondary focus:ring-secondary border-gray-300 rounded mt-1"
                            @@click="updateCheckboxValue('subscribe')">
                        <input type="hidden" id="subscribe" name="subscribe" value="false" />
                        <label for="subscribe-checkbox" class="ml-3 text-sm text-gray-700">
                            Subscribe to our newsletter for daily devotions and updates
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-secondary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition duration-300">
                            <i class="fas fa-user-plus mr-2"></i>
                            Register Now
                        </button>
                    </div>

                    {{-- <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Atau daftar dengan</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <button type="button"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition duration-300">
                                <i class="fab fa-google text-red-500 mr-2"></i>
                                Google
                            </button>

                            <button type="button"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition duration-300">
                                <i class="fab fa-facebook text-blue-600 mr-2"></i>
                                Facebook
                            </button>
                        </div>
                    </div> --}}
                </form>
            </div>

            <!-- Inspirational Quote -->
            <div class="text-center bg-white rounded-lg shadow-md p-6">
                <i class="fas fa-quote-left text-2xl text-accent mb-4"></i>
                <blockquote class="text-gray-700 italic mb-4">
                    "For I know the thoughts that I think toward you, saith the LORD, thoughts of peace, and not of
                    evil, to give you an expected end."
                </blockquote>
                <cite class="text-secondary font-semibold">Jeremiah 29:11</cite>
            </div>
        </div>
    </section>
</x-layout>
