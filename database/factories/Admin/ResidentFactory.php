<?php

namespace Database\Factories\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\Barangay;
use App\Models\Admin\Resident;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resident::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName,
            'mname' => 'test',
            'lname' => $this->faker->lastName,
            'suffix' => $this->faker->firstName,
            'gender' => 'male',
            'birthdate' => $this->faker->date,
            'address' => $this->faker->address,
            'barangay_id' => Barangay::all()->random()->id,
            'contact' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }

    public function getGender()
    {
       return $this->faker->randomElements($array = array('male','female'));
        
    }
}
