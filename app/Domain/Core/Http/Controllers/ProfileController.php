<?php

namespace App\Domain\Core\Http\Controllers;

use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Models\User;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use App\Support\Dashboard\Crud\WithMedia;
use Carbon\Carbon;
use App\Domain\Core\Rule\MediaRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Arr;

class ProfileController extends MainController
{
    use WithForm, WithStore, WithUpdate , WithMedia;

    protected string $name = 'Profile';
    protected string $path = 'dashboard.core.profile';
    protected array $permissions = [CorePermissions::class, 'profile'];
    protected string $model = User::class;
    protected array $routeParameters = ['user'];
    protected array $mediaField = ['avatar'] ; 

    protected string $Routes;
    public array $routeList = [];

    protected function rules()
    {
        $user = Auth::user();
        return [
            'name' => 'required|string|max:20|min:5',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|string|max:14|min:10',
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

    protected function _viewPath()
    {
        return $this->path;
    }

    public function edit()
    {

        $this->routeList['update'] = route($this->path . '.update');

        $model = Auth::user();
        // dd($model->getMedia("*"));
        
        $this->Routes = route('dashboard.core.profile.edit');
        return $this->formPage(model: $model);
    }

    public function update()
    {
        $model = Auth::user();
        
        $validated = $this->validationAction();
    

        $avatar = Arr::pull($validated, 'avatar');

        $avatar_old = Arr::pull($validated, 'old_avatar');


        if ($validated['new_password'] != null){
            $validated['password'] = Hash::make($validated['new_password']) ; 
        }


        $action = $this->updateAction($validated, $model);

        $this->updateMediaCSV($avatar , $avatar_old , $model  , 'avatar');
        
        toastr()->success(__('Request executed successfully'), 'Congrats');
        return redirect(route($this->path . ".edit", $params ?? []));

    }

    public function notificationShow()
    {
     return redirect()->to('dashboard') ;
    }

    public function notificationUpdate()
    {

        
        $notifications = [];
        $notificationsCount  = 0 ;


        if(Auth::user()->can('read_chat')){

            
        $user = User::where('id' , Auth::user()->id)->with([
            'messagesTo' => function  ($q) {
                return $q->where('seen' , 0 )->limit(30)->orderBy('created_at' , 'desc') ; 
            }
        ])->first()  ;
        
            

        
        
        
        if ($user?->messagesTo?->count() > 0 ) {
            $notifications[] = [
                'icon' => 'fas fa-fw fa-comment',
                'text' => $user?->messagesTo?->count() .' '. trans('Unread messages'),
                'time' => Carbon::parse($user->messagesTo->first()->created_at)->diffForHumans() ,
                'link' => 'dashboard'
            ];

            $notificationsCount += $user?->messagesTo?->count() ;
        }else{
            
        }
        // Now, we create the notification dropdown main content.

        }
        

        $dropdownHtml = '';

        foreach ($notifications as $key => $not) {
            $icon = "<i class='mr-2 {$not['icon']}'></i>";

            $time = "<span class='float-right text-muted text-sm'>
                   {$not['time']}
                 </span>";

            $dropdownHtml .= "<a href='".route('dashboard.chat.index')."' class='dropdown-item'>
                            {$icon}{$not['text']}{$time}
                          </a>";

            if ($key < count($notifications) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
        }

        // Return the new notification data.

        return [
            'label' => $notificationsCount ,
            'label_color' => 'danger',
            'icon_color' => ($notificationsCount == 0) ? 'light' : 'warning' ,
            'dropdown' => $dropdownHtml,
        ];

    }

}
