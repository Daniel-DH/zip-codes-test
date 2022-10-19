<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Federal_entity;
use App\models\Municipality;
use App\models\Zip_codes;
use App\models\Settlements;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = @simplexml_load_file(public_path('CPdescarga.xml'));

        $tableData = $file->table;
        $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
        $accentVowels = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú");
        foreach($tableData as $table){

            try{
                $findOne = Federal_entity::find($table->c_estado);
                if(!$findOne)
                    Federal_entity::create([
                        'key' => $table->c_estado,
                        'name' => strtoupper(str_replace($accentVowels,$vowels,$table->d_estado))
                    ]);
            }catch (Exception $ex){

            }

            try{
                $findOne = Municipality::find($table->c_mnpio);
                if(!$findOne)
                    Municipality::create([
                        'key' => $table->c_mnpio,
                        'name' => strtoupper(str_replace($accentVowels,$vowels,$table->D_mnpio))
                    ]);
            }catch (Exception $ex){

            }

            try{
                $findOne = Zip_codes::find($table->d_codigo);
                if(!$findOne)
                Zip_codes::create([
                    'zip_code' => $table->d_codigo,
                    'locality' => strtoupper(str_replace($accentVowels,$vowels,$table->d_ciudad)),
                    'federal_entity_key' => $table->c_estado,
                    'municipality_key' => $table->c_mnpio
                ]);
            }catch (Exception $ex){

            }

            try{
                $findOne = Settlements::find($table->id_asenta_cpcons);
                if(!$findOne)
                Settlements::create([
                    'key' => $table->id_asenta_cpcons,
                    'name' => strtoupper(str_replace($accentVowels,$vowels,$table->d_asenta)),
                    'zone_type'  => strtoupper(str_replace($accentVowels,$vowels,$table->d_zona)),
                    'settlement_type'  => json_encode(['name' => str_replace($accentVowels,$vowels,$table->d_tipo_asenta)]),
                    'zip_code'  => $table->d_codigo
                ]);
            }catch (Exception $ex){

            }
        }
    }
}
