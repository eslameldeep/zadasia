<?php

namespace App\Domain\Core\Http\Controllers;

use App\Domain\Core\Datatables\UserDatatable;
use App\Domain\Core\Models\User;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Support\Dashboard\Crud\WithDatatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Domain\Core\Enums\CorePermissions ;
use App\Domain\Core\Rule\MediaRule;
use App\Domain\Core\Services\RolesAndPermissions\RolesEnum;
use App\Support\Dashboard\Crud\WithMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserController extends MainController
{
    use WithForm, WithStore, WithUpdate, WithDatatable , WithDestroy ,WithMedia;
    
    protected string $name          = 'Users' ;
    protected string $path          = 'dashboard.core.users' ;
    protected string $routes        = 'dashboard.core.users' ;
    protected array  $permissions   = [CorePermissions::class, 'users'] ;
    protected string $datatable     = UserDatatable::class;

    protected string $model = User::class ;
    protected array $routeParameters = ['user'] ;
    protected array $routeList = [] ;
    protected array $mediaField = ['avatar'] ; 
   
    protected function formData(?Model $model = null): array
    {
        return [
            'selected' => $model?->getRoleNames(),
            'roles'    => Role::where('guard_name', 'web')
                            ->where('id' , '!=' , '1')   ->pluck('name', 'id')
                                    ->toArray() ,
        ];

    }
    protected function rules()
    {
         
        $user = Auth::user();
        $rules =  [
            'name' =>  'required|string|max:20|min:5', 
            'email' => 'required|email|unique:users,email,' . request()->user,
            'phone'  =>  'required|string|max:14|min:10' , 
            'roles'    => ['nullable' , 'array'],
            'password' => ['nullable','confirmed','different:old_password', 
            Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()],
            'password_confirmation' => ['nullable','required_with:new_password','same:password' , 
            Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()] , 
            'avatar' => [new MediaRule] ,
            'old_avatar' => ['nullable'] 
        ];

        
        // if (request()->isMethod('post')) {
        //     $rules['avatar'] = [new MediaRule];
        // }
        return $rules ; 
    }
    
    protected function storeAction(array $validated)
    {   
        
        $roles = Arr::pull($validated, 'roles', []);
        
        $avatar = Arr::pull($validated, 'avatar');


        

        $validated['password'] = Hash::make($validated['password']) ; 
        $model = ($this->model)::create($validated);
        $model ->syncRoles($roles);
        
        $this->storeMediaCSV($avatar , $model);

        return null;
    }
    

    public function edit($id)
    {

        $model = ($this->model)::where('id' , '!=' , 1)->findOrFail($id);

        
        return $this->formPage(model: $model);
    }


    protected function updateAction(array $validated, Model $model)
    {
       
        $roles = Arr::pull($validated, 'roles', []);

        $avatar = Arr::pull($validated, 'avatar');
        
        $avatar_old = Arr::pull($validated, 'old_avatar');

        if ($validated['password'] != null){
            $validated['password'] = Hash::make($validated['password']) ; 
        }else{
            unset($validated['password']);
        }
        $model->update($validated) ;
        $model->syncRoles($roles);

        $this->updateMediaCSV($avatar , $avatar_old , $model , 'avatar' );
        

        // dd($avatar_old->pluck('id')->toArray());

        
        return null;
    }

}
