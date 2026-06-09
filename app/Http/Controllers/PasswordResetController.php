<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PasswordResetController extends Controller
{
    /**
     * Forgot Password စာမျက်နှာကို ပြပေးခြင်း
     */
    public function create()
    {
        return view('forgot-password');
    }

    /**
     * Password ကို တိုက်ရိုက် Update လုပ်ခြင်း
     */
    public function updateDirectly(Request $request)
    {
        // 1. Validation စစ်ဆေးခြင်း
        $request->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. အသုံးပြုသူကို ရှာဖွေခြင်း
        $user = User::where('email', $request->email)->first();

        // 3. Password အသစ်ကို Hash လုပ်၍ သိမ်းဆည်းခြင်း
        $user->password = Hash::make($request->password);
        $user->save();

        // 4. အောင်မြင်ကြောင်း သတင်းစကားဖြင့် ပြန်လည်စေလွှတ်ခြင်း
        return back()->with('status', 'သင့် Password ကို အောင်မြင်စွာ ပြောင်းလဲပြီးပါပြီ။ Login ပြန်ဝင်နိုင်ပါသည်။');
    }
}