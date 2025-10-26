<x-layout>
    <x-slot:title>
        Sign In
    </x-slot>

    <section class="min-h-screen flex items-center justify-center bg-light py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-6">
                    <i class="fas fa-cross text-5xl text-primary"></i>
                </div>
                <h2 class="text-3xl font-bold text-primary">Welcome Back! Please Sign In</h2>
                {{-- <p class="mt-2 text-sm text-gray-600">
                    Don't have an account?
                    <a href="/register" class="font-medium text-secondary hover:text-primary transition duration-300">
                        Register now
                    </a>
                </p> --}}
            </div>

            <div class="bg-white rounded-lg shadow-lg p-8">
                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <div class="flex">
                            <i class="fas fa-exclamation-circle text-red-400 mr-2 mt-1"></i>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <h3 class="text-sm font-medium text-red-800">{{ $error }}</h3>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form class="space-y-6" action="{{ route('auth.login') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-envelope mr-2"></i>Email
                        </label>
                        <input id="email" name="email" type="email"
                            class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                            placeholder="Input Email" value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-primary mb-2">
                            <i class="fas fa-lock mr-2"></i>Password
                        </label>
                        <div class="relative">
                            <input id="password" name="password" type="password"
                                class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition duration-300"
                                placeholder="Input Password">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                @@click="togglePassword('password')">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="password-toggle"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-checkbox" type="checkbox"
                                class="h-4 w-4 text-secondary focus:ring-secondary border-gray-300 rounded"
                                @@click="updateCheckboxValue('remember')">
                            <input id="remember" name="remember" type="hidden" value="false" />
                            <label for="remember-checkbox" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#"
                                class="font-medium text-secondary hover:text-primary transition duration-300">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-secondary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </button>
                    </div>

                    {{-- <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Atau masuk dengan</span>
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
                    "Come unto me, all ye that labour and are heavy laden, and I will give you rest."
                </blockquote>
                <cite class="text-secondary font-semibold">Matthew 11:28</cite>
            </div>
        </div>
    </section>
</x-layout>
