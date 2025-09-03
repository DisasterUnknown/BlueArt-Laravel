<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

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
        // ✅ Validate input
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,Email'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'in:customer,seller'],
            'contact' => [$input['role'] === 'seller' ? 'required' : 'nullable', 'string', 'max:20'],
            'address' => [$input['role'] === 'seller' ? 'required' : 'nullable', 'string', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Create the user with custom fields
        $user =  User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
            'role'     => $input['role'],
            'status'   => 'active',           // default status
            'OAUTH'    => 'application',      // default OAuth type
            'pFPdata'  => 'null',             // default profile photo
        ]);

        if ($input['role'] === 'seller') {
            Seller::create([
                'user_id'   => $user->id,
                'address'  => $input['address'],
                'contact'  => $input['contact'],
            ]);
        }

        return $user;
    }
}
