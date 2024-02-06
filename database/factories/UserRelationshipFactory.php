<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserRelationship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRelationship>
 */
class UserRelationshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = UserRelationship::class;

    public function definition()
    {
        $firstUser = User::first();
        $usersExceptFirst = User::where('id', '!=', $firstUser->id)->get();
        $randomUser = $usersExceptFirst->random();

        return [
            'user_id' => $randomUser->id,
            'created_by' => $firstUser->id,
            'updated_by' => $firstUser->id,
        ];
    }

}
