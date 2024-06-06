<?php

namespace App\Domain\Echocloud\Http\Controllers ;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Domain\Core\Rule\MediaRule;
use App\Support\Dashboard\Crud\WithMedia;
use App\Support\Dashboard\Crud\WithUpdate ; 

class ProfileController extends Controller
{
    use WithMedia , WithUpdate ;
    function __Construct() {
        SEOMeta::setTitleDefault('Echocloud');
    }
    public function profile()  {
        
        SEOMeta::setTitle(trans('Profile'));
        
        $data['model'] = Auth::user() ; 
        
        return view('echocloud.profile')->with($data);
    }

    
    public function update(Request $request)
    {
        $model = Auth::user();
        
        $validated = $request->validate($this->rules()) ; 
    

        $avatar = Arr::pull($validated, 'avatar');

        $avatar_old = Arr::pull($validated, 'old_avatar');


        if ($validated['new_password'] != null){
            $validated['password'] = Hash::make($validated['new_password']) ; 
        }


        $action = $this->updateAction($validated, $model);

        $this->updateMediaCSV($avatar , $avatar_old , $model  , 'avatar');
        
        toastr()->success(__('Request executed successfully'), 'Congrats');
        return redirect(route("echocloud.profile"));

    }


    protected function rules()
    {
        $user = Auth::user();
        return [
            'name' => 'required|string|max:20|min:5',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|string|max:14|min:10|unique:users,phone,' . Auth::user()->id,
            'current_password' => ['nullable', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => ['nullable', 'confirmed', 'different:old_password', 'required_with:current_password',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
            'new_password_confirmation' => ['nullable', 'required_with:new_password', 'required_with:current_password', 'same:new_password',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
            'avatar' => [new MediaRule] ,
            'old_avatar' => ['nullable'] 
        
        ];
    }


}
