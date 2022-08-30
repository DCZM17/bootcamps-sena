<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bootcamp;
use File;


class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                //1.Leer el archivo de datos 
                $json=File::get('database/_data/bootcamps.json');
                //2.convertir los datos en un arreglo
                $arreglo_bootcamp=json_decode($json);
                //3.recorrer el arreglo
                //var_dump($arreglo_bootcamp);
                foreach($arreglo_bootcamp as $bootcamp){
                    //4. registrar el usuaario en bd
                    //se utiliza el metodo ::create
                    Bootcamp::create([
                        "name" => $bootcamp->name,
                        "description" => $bootcamp->description,
                        "website" => $bootcamp->website,
                        "phone" => $bootcamp->phone,
                        "user_id" => $bootcamp->user_id
                    ]);
                }
    }
}
