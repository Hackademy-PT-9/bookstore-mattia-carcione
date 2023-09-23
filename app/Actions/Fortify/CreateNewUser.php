<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $path_image = '';
        if (isset($input['image']) && $input['image']->isValid()) {
            $path_name = $input['image']->getClientOriginalName();
            $path_image = $input['image']->storeAs('public/storage', $path_name);
        }

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'email' => $input['email'],
            'gender' => $input['gender'],
            'birthday' => $input['birthday'],
            'image' => $path_image,
            'phone' => $input['phone'],
            'address' => $input['address'],
            'city' => $input['city'],
            'country' => $input['country'],
            'state' => $input['state'],
            'skype' => $input['skype'],
            'twitter' => $input['twitter'],
            'linkedin' => $input['linkedin'],
            'instagram' => $input['instagram'],
            'github' => $input['github'],
            'facebook' => $input['facebook'],
            'description' => $input['description'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
