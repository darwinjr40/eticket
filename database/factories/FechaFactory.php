<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FechaFactory extends Factory
{
    protected $ubicaciones = [1, 2, 3, 4, 5, 6, 7];
    protected $fechas = ['2011-08-17 23:00:02', '2012-08-18 22:00:02', '2013-08-19 21:00:02', '2014-08-20 20:00:02', '2015-08-21 19:00:02', '2016-08-22 18:00:02', '2023-08-23 17:00:02'];

    public function definition()
    {
        return [
                'fechaHora' => $this->faker->randomElement($this->fechas),
                'id_ubicacion' => $this->faker->randomElement($this->ubicaciones),
        ];
    }
}
