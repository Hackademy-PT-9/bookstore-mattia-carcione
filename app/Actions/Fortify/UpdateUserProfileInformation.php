<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {

        // dd($user);
        $path_image = $user->image;
        if (isset($input['image'])) {
            // Se è stato fornito un nuovo file immagine, salvalo e aggiorna il percorso
            $path_image = $input['image']->store('public/storage');
        }

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string',],
            'country' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'skype' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'gender' => $input['gender'],
                'birthday' => $input['birthday'],
                'image' => $path_image,
                // 'phone' => $input['phone'],
                'address' => $input['address'],
                'city' => $input['city'],
                'country' => $input['country'],
                'state' => $input['state'],
                // 'skype' => $input['skype'],
                // 'twitter' => $input['twitter'],
                // 'linkedin' => $input['linkedin'],
                // 'instagram' => $input['instagram'],
                // 'github' => $input['github'],
                // 'facebook' => $input['facebook'],
                'description' => $input['description'],
            ])->save();

        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}