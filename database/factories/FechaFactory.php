<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FechaFactory extends Factory
{
    protected $ubicaciones = [1, 2, 3, 4, 5, 6, 7];
    protected $fechas = ['20/08/2011:23:00:02', '20/08/2012:22:00:02', '20/08/2013:21:00:02', '20/08/2014:20:00:02', '20/08/2015:19:00:02', '20/08/2016:18:00:02', '20/08/2017:17:00:02'];

    public function definition()
    {
        return [
                'fechaHora' => $this->faker->randomElement($this->fechas),
                'id_ubicacion' => $this->faker->randomElement($this->ubicaciones),
        ];
    }
}
