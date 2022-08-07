<?php

namespace Database\Seeders;

use App\Models\Admin\Barangay;
use Illuminate\Database\Seeder;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangays = array(
            ['name' => 'Apil','lat' => '8.4395','long' => '123.7718', 'created_at' => now()],
            ['name' => 'Binuangan ','lat' => '8.50177557673','long' => '121.12935304254324', 'created_at' => now()],
            ['name' => 'Bolibol','lat' => '8.4556','long' => '123.7856', 'created_at' => now()],
            ['name' => 'Buenavista','lat' => '8.4459','long' => '123.7893', 'created_at' => now()],
            ['name' => 'Bunga','lat' => '8.4468','long' => '123.7233', 'created_at' => now()],
            ['name' => 'Buntawan','lat' => '8.4520','long' => '123.7454', 'created_at' => now()],
            ['name' => 'Burgos','lat' => '8.4863','long' => '123.7066', 'created_at' => now()],
            ['name' => 'Canubay','lat' => '8.4952','long' => '123.7961', 'created_at' => now()],
            ['name' => 'Ciriaco C. Pastrano','lat' => '8.4767','long' => '123.7381', 'created_at' => now()],
            ['name' => 'Clarin Settlement','lat' => '8.4653','long' => '123.7081', 'created_at' => now()],
            ['name' => 'Dolipos Alto','lat' => '8.4393','long' => '123.7534', 'created_at' => now()],
            ['name' => 'Dolipos Bajo','lat' => '8.4604','long' => '123.7778', 'created_at' => now()],
            ['name' => 'Dulapo','lat' => '8.5004','long' => '123.7763', 'created_at' => now()],
            ['name' => 'Dullan Norte','lat' => '8.4216','long' => '123.7322', 'created_at' => now()],
            ['name' => 'Dullan Sur','lat' => '8.4281','long' => '123.7462', 'created_at' => now()],
            ['name' => 'Lamac Lower','lat' => '8.4839','long' => '123.7953', 'created_at' => now()],
            ['name' => 'Lamac Upper','lat' => '8.4816','long' => '123.7893', 'created_at' => now()],
            ['name' => 'Langcangan Lower','lat' => '8.4805','long' => '123.8014', 'created_at' => now()],
            ['name' => 'Langcangan Proper','lat' => '8.4802','long' => '123.7979', 'created_at' => now()],
            ['name' => 'Langcangan Upper','lat' => '8.4779','long' => '123.7994', 'created_at' => now()],
            ['name' => 'Layawan','lat' => '8.4798','long' => '123.8035', 'created_at' => now()],
            ['name' => 'Loboc Lower','lat' => '8.4912','long' => '123.8019', 'created_at' => now()],
            ['name' => 'Loboc Upper','lat' => '8.4921','long' => '123.7991', 'created_at' => now()],
            ['name' => 'Malindang','lat' => '8.4205','long' => '123.7554', 'created_at' => now()],
            ['name' => 'Mialen','lat' => '8.4105','long' => '123.6852', 'created_at' => now()],
            ['name' => 'Mobod','lat' => '8.4963','long' => '123.7891', 'created_at' => now()],
            ['name' => 'Paypayan','lat' => '8.5130','long' => '123.7659', 'created_at' => now()],
            ['name' => 'Pines','lat' => '8.4502','long' => '123.8038', 'created_at' => now()],
            ['name' => 'Poblacion I','lat' => '8.4884','long' => '123.8045', 'created_at' => now()],
            ['name' => 'Poblacion II','lat' => '8.4850','long' => '123.8077', 'created_at' => now()],
            ['name' => 'Rizal Lower','lat' => '8.4627','long' => '123.7312', 'created_at' => now()],
            ['name' => 'Rizal Upper','lat' => '8.4649','long' => '123.7231', 'created_at' => now()],
            ['name' => 'San Vicente Alto','lat' => '8.4603','long' => '123.8025', 'created_at' => now()],
            ['name' => 'San Vicente Bajo','lat' => '8.4607','long' => '123.8145', 'created_at' => now()],
            ['name' => 'Sebucal','lat' => '8.4119','long' => '123.6625', 'created_at' => now()],
            ['name' => 'Senote','lat' => '8.4936','long' => '123.7257', 'created_at' => now()],
            ['name' => 'Taboc Norte','lat' => '8.4828','long' => '123.8097', 'created_at' => now()],
            ['name' => 'Taboc Sur','lat' => '8.4777','long' => '123.8142', 'created_at' => now()],
            ['name' => 'Talairon','lat' => '8.4655','long' => '123.8006', 'created_at' => now()],
            ['name' => 'Talic','lat' => '8.4774','long' => '123.8064', 'created_at' => now()],
            ['name' => 'Tipan','lat' => '8.5058','long' => '123.7628', 'created_at' => now()],
            ['name' => 'Toliyok','lat' => '8.4297','long' => '123.7073', 'created_at' => now()],
            ['name' => 'Tuyabang Alto','lat' => '8.4793','long' => '123.7532', 'created_at' => now()],
            ['name' => 'Tuyabang Bajo','lat' => '8.4967','long' => '123.7676', 'created_at' => now()],
            ['name' => 'Tuyabang Proper','lat' => '8.4907','long' => '123.7673', 'created_at' => now()],
            ['name' => 'Victoria','lat' => '8.4548','long' => '123.7206', 'created_at' => now()],
            ['name' => 'Villaflor','lat' => '8.4719','long' => '123.7818', 'created_at' => now()],
        );

        Barangay::insert($barangays);
    }
}
