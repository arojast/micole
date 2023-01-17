<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /**
         * select a city randomly and bring the region and country of that city with the relationship
         */
        $cityId = City::all()->random();
        $city = City::find($cityId->id);
        
        /**
         * Get option of field plan_preferences
         */
        $planPreferences = School::getPlanPreferences();
        /**
         * Get option of field bussiness_status
         */
        $bussinessStatus = School::bussinessStatus();

        /**
         * Using the Faker library for PHP, see documentation at https://fakerphp.github.io/
         */

        return [
            'hs_id' => fake()->numberBetween(10000000,100000000),
            
            //Get user with director role
            'director_id' => User::where('role','Director')->get()->random(),
            'mec_id' => fake()->numberBetween(10000000,100000000),
            'country_id' => $city->region->id,
            'region_id' => $city->region->country_id,
            'city_id' => $city->id,
            'name' => fake()->name(),
            'postal' => fake()->numberBetween(100000,999999),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->freeEmail(),
            'email2' => fake()->freeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'website' => fake()->url(),
            'fax' => fake()->phoneNumber(),
            'addres' => fake()->address(),
            'addres_short' => fake()->address(),
            'latitude' => fake()->latitude($min = -90, $max = 90),
            'longitude' => fake()->longitude($min = -90, $max = 90),
            
            //Get random option for plan_preferences
            'plan_preference' => $planPreferences[array_rand($planPreferences,1)],
            'leads' => fake()->numberBetween(0,100),
            
            //Get random option for bussiness_status
            'bussiness_status' => $bussinessStatus[array_rand($bussinessStatus,1)],
            'google_user_ratings_total' => fake()->numberBetween(0,99),
            'google_rating' => fake()->randomFloat(2, 0, 9999),
            'revisor' => fake()->name(),
            'active' => rand(0,1),
        ];
    }
}
