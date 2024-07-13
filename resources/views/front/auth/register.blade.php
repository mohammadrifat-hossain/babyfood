@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => 'Register - ' . ($settings_g['title'] ?? ''),
    ])
@endsection

@section('master')
<div class="container">
    <!-- <div class="flex justify-center">
        <div class="w-full max-w-md py-16">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-100" method="POST" action="{{route('register')}}">
                @csrf

                <div class="text-center mb-4">
                    <h4 class="text-xl">Register new Account</h4>
                </div>

                <div class="mb-4">
                    <label class="block text-font-color-dark text-sm font-bold mb-2">Full Name*</label>

                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-font-color-dark leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" value="{{old('name')}}" name="name" required>

                    @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-font-color-dark text-sm font-bold mb-2">Email Address*</label>

                    <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-font-color-dark leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{old('email')}}" name="email" required>

                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-font-color-dark text-sm font-bold mb-2">Mobile Number*</label>

                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-font-color-dark leading-tight focus:outline-none focus:shadow-outline @error('mobile_number') border-red-500 @enderror" value="{{old('mobile_number')}}" name="mobile_number" required>

                    @error('mobile_number')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-font-color-dark text-sm font-bold mb-2">Full Address*</label>

                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-font-color-dark leading-tight focus:outline-none focus:shadow-outline @error('address') border-red-500 @enderror" value="{{old('address')}}" name="address" required>

                    @error('address')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-font-color-dark text-sm font-bold mb-2">Password*</label>

                    <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-font-color-dark leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" required>

                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-font-color-dark text-sm font-bold mb-2">Confirm Password*</label>

                    <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-font-color-dark leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-primary hover:bg-primary-light text-font-color-light font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
                </div>
                <p>Already have account? <a href="{{route('login')}}" class="inline-block align-baseline font-bold text-sm text-primary hover:text-primary-light">Login Now</a></p>
            </form>
        </div>
    </div> -->
    <div class=" flex fle-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full">
            <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
            <form class="space-y-4 flex flex-col" method="POST" action="{{route('register')}}">
                @csrf
                <div class="mb-8">
                    <h3 class="text-gray-800 text-3xl font-extrabold">Register</h3>
                    <p class="text-gray-500 text-sm mt-4 leading-relaxed">Join us for a personalized shopping experience, exclusive offers, and more.</p>
                </div>

                <div>
                <label class="text-gray-800 text-sm mb-2 block">Full Name</label>
                    <div class="relative flex items-center flex-col">
                        <input type="text" required class="w-full text-sm text-gray-800 border  px-4 py-3 rounded-lg outline-blue-600 bg-slate-100 @error('name') border-red-500 @enderror" placeholder="Enter Fullname" name="name" />
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 top-3" viewBox="0 0 24 24">
                        <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                        <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                        </svg>

                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                <label class="text-gray-800 text-sm mb-2 block">Email</label>
                    <div class="relative flex items-center flex-col">
                        <input type="email" required class="w-full text-sm text-gray-800 border  px-4 py-3 rounded-lg outline-blue-600 bg-slate-100 @error('email') border-red-500 @enderror" placeholder="Enter email" name="email" />
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 top-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                <label class="text-gray-800 text-sm mb-2 block">Mobile Number</label>
                    <div class="relative flex items-center flex-col">
                        <input type="number" required class="w-full text-sm text-gray-800 border  px-4 py-3 rounded-lg outline-blue-600 bg-slate-100 @error('mobile_number') border-red-500 @enderror" placeholder="Enter Number" name="mobile_number" />
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 top-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>

                        @error('mobile_number')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                <label class="text-gray-800 text-sm mb-2 block">Full Address</label>
                    <div class="relative flex items-center flex-col">
                        <input type="text" required class="w-full text-sm text-gray-800 border  px-4 py-3 rounded-lg outline-blue-600 bg-slate-100 @error('address') border-red-500 @enderror" placeholder="Enter Address" name="address" />
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 top-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                        </svg>

                        @error('address')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                <label class="text-gray-800 text-sm mb-2 block">Password</label>
                <div class="relative flex items-center flex-col">
                    <input type="password" required class="w-full text-sm text-gray-800 border  px-4 py-3 rounded-lg outline-blue-600 @error('password') border-red-500 @enderror" placeholder="Enter password"  name="password"/>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 top-3 cursor-pointer" viewBox="0 0 128 128">
                    <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                    </svg>
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                </div>

                <div>
                <label class="text-gray-800 text-sm mb-2 block">Confirm Password</label>
                <div class="relative flex items-center flex-col">
                    <input type="password" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600 bg-slate-100" placeholder="Enter password"  name="password_confirmation"/>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 top-3 cursor-pointer" viewBox="0 0 128 128">
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

                </div>

                <div class="!mt-8">
                    <button type="submit" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Register
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

                <p class="text-sm !mt-8 text-center text-gray-800">Already have an account? <a href="{{route('login')}}" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Login here</a></p>
            </form>
            </div>
            <div class="lg:h-[400px] md:h-[300px] max-md:mt-8">
            <img src="https://readymadeui.com/login-image.webp" class="w-full h-full max-md:w-4/5 mx-auto block object-cover" alt="Dining Experience" />
            </div>
        </div>
    </div>
</div>
@endsection

