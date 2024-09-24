<?php

namespace App\Http\Controllers\Auth\Traits;

use App\Services\OTPService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegistersUsers
{
    use RedirectsUsers;
    protected $otpService;



    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }



    public function sendOtp(Request $request)
    {

        $this->otpService = new OTPService();

        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);


        $otp = random_int(100000, 999999); // Use random_int for better randomness
        $this->otpService->sendOTP($request->contact_phone, $otp);
        
        // Store the OTP in session or temporary storage for validation later
        session([
            'otp' => $otp, 
            'otp_data' => $request->only(['company_name', 'email', 'contact_phone', 'password']),
        ]);
        return redirect()->route('otp.verify'); // Redirect to OTP verification page
    }



    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6', // Ensure OTP is 6 digits
        ]);

        if ($request->otp == session('otp')) {
            $registrationData = session('otp_data');

            event(new Registered($user = $this->create($registrationData)));
            session()->forget(['otp', 'otp_data']);
            $this->guard()->login($user);

            if ($response = $this->registered($request, $user)) {
                return $response;
            }

            return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());

        }



        return redirect()->back();
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
