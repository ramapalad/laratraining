<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $officeLocations = [
            'City Mayors Office',
            'Bids And Awards Office',
            'City Budget Office',
            'City Accounting Office',
            'City Treasurers Office',
            'City Legal Office',
            'City Planning And Development Office',
            'City Civil Registry Office',
            'City Accounting Office',
            'City Engineers Office',
            'City Health Office',
            'City Social Welfare And Development Office',
            'City Veterinary Office',
            'City Agriculture Office',
            'City Tourism Office',
            'City Environment And Natural Resources Office',
            'City Information And Communications Technology Office',
            'City Public Market Office',
            'City General Services Office',
            'City Human Resource Management Office',
            'City Library And Museum',
            'City Sports And Recreation Office',
            'City Fire Station',
            'City Jail',
            'City Auditorium',
            'City Convention Center',
            'City Hall Annex Building',
            'City Hall Main Building',
            'City Public Plaza',
            'City Public Park',
            'City Cemetery',
            'City Public Swimming Pool',
            'City Public Gymnasium',
            'City Public Playground',
            'City Public Restrooms',
            'City Public Transportation Terminal',
            'City Public Utility Vehicle (PUV) Terminal',
            'City Public Market',
            'City Public Library',
            'City Public Hospital',
            'City Public School',
            'City Public Works Department',
            'City Public Safety Department',
            'City Public Health Department',
            'City Public Information Office',
            'City Public Relations Office', 
            'City Public Affairs Office',
            'City Public Employment Service Office',
            'City Public Assistance And Social Welfare Office',
            'City Public Housing Office', 
        ];
        return [
            'name' => $this->faker->unique()->randomElement($officeLocations),
            'description' => $this->faker->sentence(),
        ];
    }
}
