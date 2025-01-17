@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => 'Login - ' . ($settings_g['title'] ?? ''),
    ])
@endsection

@section('master')
<div>
    <div class=" flex fle-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full">
            <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
            <form class="space-y-4" method="POST" action="{{route('login')}}">
                @csrf
                <div class="mb-8">
                <h3 class="text-gray-800 text-3xl font-extrabold">Login</h3>
                <p class="text-gray-500 text-sm mt-4 leading-relaxed">Log in to your account to access your shopping cart, view order history, and enjoy personalized recommendations.</p>
                </div>

                <div>
                <label class="text-gray-800 text-sm mb-2 block">Phone Number</label>
                <div class="relative flex items-center">
                    <input type="number" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Enter number" name="number" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                    <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                    </svg>
                </div>
                </div>
                <div>
                <label class="text-gray-800 text-sm mb-2 block">Password</label>
                <div class="relative flex items-center">
                    <input name="password" type="password" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Enter password" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                    <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                    </svg>
                </div>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                    <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                    Remember me
                    </label>
                </div>

                <div class="text-sm">
                    <a href="#" class="text-blue-600 hover:underline font-semibold">
                    Forgot your password?
                    </a>
                </div>
                </div>

                <div class="!mt-8">
                    <button type="submit" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Log in
                    </button>
                </div>

                <div class="flex items-center gap-1">
                    <div class="w-full h-[1px] bg-neutral-300"></div>
                    <p>or</p>
                    <div class="w-full h-[1px] bg-neutral-300"></div>
                </div>

                <div class="flex items-center justify-center flex-col gap-2">
                    <button class="flex items-center gap-2 border px-4 py-2 rounded-lg hover:bg-slate-200 transition-all justify-center max-w-[300px] w-full">
                        <span>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/480px-Google_%22G%22_logo.svg.png" alt="google logo" class="w-5">
                        </span>
                        <span class="mt-1">Continue with Google</span>
                    </button>
                    <button class="flex items-center gap-2 border px-4 py-2 rounded-lg hover:bg-slate-200 transition-all justify-center max-w-[300px] w-full">
                        <span>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/800px-Facebook_logo_%28square%29.png" alt="facebook logo" class="w-5">
                        </span>
                        <span class="mt-1">Continue with Facebook</span>
                    </button>
                </div>

                <p class="text-sm !mt-8 text-center text-gray-800">Don't have an account? <a href="{{route('register')}}" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register here</a></p>
            </form>
            </div>
            <div class="lg:h-[400px] md:h-[300px] max-md:mt-8">
            <img src="https://readymadeui.com/login-image.webp" class="w-full h-full max-md:w-4/5 mx-auto block object-cover" alt="Dining Experience" />
            </div>
        </div>
    </div>
</div>
@endsection
