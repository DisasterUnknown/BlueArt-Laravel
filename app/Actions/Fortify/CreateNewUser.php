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

        // Getting the last user ID
        $lastID = DB::table('id_counter')
            ->where('TableName', 'user')
            ->value('LastID');

        $nextID = str_pad($lastID + 1, 10, '0', STR_PAD_LEFT);

        // Updating the id table
        DB::table('id_counter')
            ->where('TableName', 'user')
            ->update(['LastID' => $lastID + 1]);

        // Create the user with custom fields
        $user =  User::create([
            'userID'   => $nextID,
            'name'     => $input['name'],
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
            'role'     => $input['role'],
            'status'   => 'active',           // default status
            'OAUTH'    => 'application',      // default OAuth type
            'pFPdata'  => 'null',             // default profile photo
        ]);

        if ($input['role'] === 'seller') {
            $lastID = DB::table('id_counter')
                ->where('TableName', 'seller')
                ->value('LastID');

            $nextID = str_pad($lastID + 1, 10, '0', STR_PAD_LEFT);

            // Updating the id table
            DB::table('id_counter')
                ->where('TableName', 'seller')
                ->update(['LastID' => $lastID + 1]);

            Seller::create([
                'sellerID' => $nextID, // generate ID
                'userID'   => $user->userID,
                'address'  => $input['address'],
                'contact'  => $input['contact'],
            ]);
        }

        return $user;
    }
}
