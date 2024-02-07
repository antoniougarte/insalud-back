<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Roles;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Obtener todos los IDs de usuarios existentes en la tabla users
        $userIds = User::pluck('id')->toArray();

        // Roles disponibles
        $roles = Roles::pluck('id')->toArray();

        // Definir los datos de la fila
        return [
            'user_id' => $this->faker->randomElement($userIds),
            'role_id' => $this->faker->randomElement($roles),
        ];
    }
}
