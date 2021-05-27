// public function popularProductServices(Request $request)
    // {
    //     if ($request->service_category == 'all') {
    //         $category = "All Category";
    //         $services = Service::where('status', 1)->where('subscription_end_date', '>', now())->inRandomOrder()->limit(6)->get();

    //         if ($services->isEmpty()) {
    //             return redirect()->back()->with([
    //                 'message' => 'No service available in that category, probably not approved yet!',
    //                 'alert-type' => 'error'
    //             ]);
    //         }
    //     }
    //     else {
    //         $category = Category::find($request->service_category);
    //         $services = Service::where('status', 1)->where('subscription_end_date', '>', now())->where('category_id', $request->service_category)->inRandomOrder()->limit(6)->get();

    //         if ($services->isEmpty()) {
    //             return redirect()->back()->with([
    //                 'message' => 'No service available in that category, probably not approved yet!',
    //                 'alert-type' => 'error'
    //             ]);
    //         }
    //     }

    //     if ($request->user_type == 'all') {
    //         $users = User::all();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new Newsletter($user->name, $category, $request->subject, $request->header_title, $request->intro, $services));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }
    //     elseif ($request->user_type == 'providers') {
    //         $users = User::where('role', 'seller')->get();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new Newsletter($user->name, $category, $request->subject, $request->header_title, $request->intro, $services));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }

    //     elseif ($request->user_type == 'seekers') {
    //         $users = User::where('role', 'buyer')->get();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new Newsletter($user->name, $category, $request->subject, $request->header_title, $request->intro, $services));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }
    //     elseif ($request->user_type == 'agents') {
    //         $users = Agent::all();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new Newsletter($user->name, $category, $request->subject, $request->header_title, $request->intro, $services));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }


    //     return redirect()->back()->with([
    //         'message' => 'Newsletter has been sent successfully!',
    //         'alert-type' => 'success'
    //     ]);
    // }



    // public function earnExtraMoneyUI(Request $request)
    // {
    //     if ($request->user_type == 'all') {
    //         $users = User::all();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new EarnMoney($user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }
    //     elseif ($request->user_type == 'providers') {
    //         $users = User::where('role', 'seller')->get();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new EarnMoney($user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }

    //     elseif ($request->user_type == 'seekers') {
    //         $users = User::where('role', 'buyer')->get();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new EarnMoney($user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }
    //     elseif ($request->user_type == 'agents') {
    //         $users = Agent::all();
    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new EarnMoney($user->name, $request->subject, $request->header_title, $request->intro, $request->body, $request->tagline, $request->link));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //     }

    //     return redirect()->back()->with([
    //         'message' => 'E-mail has been sent successfully!',
    //         'alert-type' => 'success'
    //     ]);
    // }



    // public function earnExtraMoney($password)
    // {
    //     if ($password == 'Jul1anA2EF') {
    //         $users = User::all();

    //         foreach ($users as $user) {
    //             try {
    //                 Mail::to($user->email)->send(new EarnMoney($user->name));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }

    //         return redirect()->route('home')->with([
    //             'message' => 'E-mail has been sent successfully!',
    //             'alert-type' => 'success'
    //         ]);
    //     } else {
    //         return redirect()->route('home')->with([
    //             'message' => 'You are not authorised to perform this action!',
    //             'alert-type' => 'error'
    //         ]);
    //     }
    // }

    // public function Newsletter($password)
    // {
    //     if ($password == 'Jul1anA2EF') {
    //         $users = User::all();

    //         foreach ($users as $user) {
    //             $category = Category::inRandomOrder()->first();
    //             $services = Service::where('status', 1)->inRandomOrder()->limit(6)->get();

    //             try {
    //                 Mail::to($user->email)->send(new Newsletter($user->name, $category, $services));
    //             } catch (\Exception $e) {
    //                 $failedtosendmail = 'Failed to Mail!.';
    //             }
    //         }
    //         return redirect()->route('home')->with([
    //             'message' => 'Newsletter has been sent successfully!',
    //             'alert-type' => 'success'
    //         ]);
    //     } else {
    //         return redirect()->route('home')->with([
    //             'message' => 'You are not authorised to perform this action!',
    //             'alert-type' => 'error'
    //         ]);
    //     }
    // }

    // public function CredentialsReset($user_id)
    // {
    //     $user = User::find($user_id);
    //     $user_name = $user->name;
    //     $name = explode(' ', trim($user_name))[0];
    //     $password = 'jaDewooo';

    //     try{
    //         Mail::to('adeolewfb@gmail.com')->send(new CredentialsReset($name, $user->email, $password));
    //     }
    //     catch(\Exception $e){
    //         $failedtosendmail = 'Failed to Mail!.';
    //     }
    // }
}
