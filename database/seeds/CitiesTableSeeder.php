<?php


use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $cities = factory(CityCms::class, 10)->create();

        $file = (File::get(public_path().'/cities.txt'));
        foreach (explode("\n", $file) as $key=>$line){
            $array[$key] = explode('-', $line);
        }

        foreach($array as $item){
            $city = new \App\Models\City();
            $city->name = $item[0];
            $city->zip_code = $item[1];
            $city->slug = generateSlug($city->name);
            $city->country_id = 132; //Bosnia and Herzegovina
            $city->save();
        }




        $city = new \App\Models\City();
        $city->name = 'Split';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '21000';
        $city->country_id = 129; //Croatia
        $city->save();

        $city = new \App\Models\City();
        $city->name = 'Zagreb';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10000';
        $city->country_id = 129;
        $city->save(); //Croatia

        $city = new \App\Models\City();
        $city->name = 'Zadar';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '23000';
        $city->country_id = 129; //Croatia
        $city->save();

        $city = new \App\Models\City();
        $city->name = 'Pula';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '52100';
        $city->country_id = 129; //Croatia
        $city->save();

        $city = new \App\Models\City();
        $city->name = 'Dubrovnik';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '20000';
        $city->country_id = 129; //Croatia
        $city->save();

        $city = new \App\Models\City();
        $city->name = 'Šibenik';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '22000';
        $city->country_id = 129; //Croatia
        $city->save();

        $city = new \App\Models\City();
        $city->name = 'Belgrade';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '101801';
        $city->country_id = 97;
        $city->save(); //Serbia

        $city = new \App\Models\City();
        $city->name = 'Novi Sad';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '400107';
        $city->country_id = 97;
        $city->save(); //Serbia

        $city = new \App\Models\City();
        $city->name = 'Niš';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '700132';
        $city->country_id = 97;
        $city->save(); //Serbia

        $city = new \App\Models\City();
        $city->name = 'Beijing';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '100000';
        $city->country_id = 1;
        $city->save(); //China


        $city = new \App\Models\City();
        $city->name = 'New Delhi';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '110001';
        $city->country_id = 2;
        $city->save(); //India

        $city = new \App\Models\City();
        $city->name = 'Washington DC';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '20001';
        $city->country_id = 3;
        $city->save(); //United States

        $city = new \App\Models\City();
        $city->name = 'Jakarta';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10110';
        $city->country_id = 4;
        $city->save(); //Indonesia

        $city = new \App\Models\City();
        $city->name = 'Brasilia';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '38706-400';
        $city->country_id = 5;
        $city->save(); //Brazil

        $city = new \App\Models\City();
        $city->name = 'Islamabad';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '46000';
        $city->country_id = 6;
        $city->save(); //Pakistan

        $city = new \App\Models\City();
        $city->name = 'Abuja';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '900001';
        $city->country_id = 7;
        $city->save(); //Nigeria

        $city = new \App\Models\City();
        $city->name = 'Dhaka';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1208';
        $city->country_id = 8;
        $city->save(); //Bangladesh

        $city = new \App\Models\City();
        $city->name = 'Moscow';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '101000';
        $city->country_id = 9;
        $city->save(); //Russia

        $city = new \App\Models\City();
        $city->name = 'Mexico CityCms';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00810';
        $city->country_id = 10;
        $city->save(); //Mexico

        $city = new \App\Models\City();
        $city->name = 'Tokyo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '100-0000';
        $city->country_id = 11;
        $city->save(); //Japan

        $city = new \App\Models\City();
        $city->name = 'Addis Ababa';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1000';
        $city->country_id = 12;
        $city->save(); //Ethiopia

        $city = new \App\Models\City();
        $city->name = 'Manila';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1718';
        $city->country_id = 13;
        $city->save(); //Philippines

        $city = new \App\Models\City();
        $city->name = 'Cairo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '11311';
        $city->country_id = 14;
        $city->save(); //Egypt

        $city = new \App\Models\City();
        $city->name = 'Hanoi';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '150000';
        $city->country_id = 15;
        $city->save(); //Vietnam

        $city = new \App\Models\City();
        $city->name = 'Kinshasa';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '7948';
        $city->country_id = 16;
        $city->save(); //DR Congo

        $city = new \App\Models\City();
        $city->name = 'Ankara';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '06010';
        $city->country_id = 17;
        $city->save(); //Turkey

        $city = new \App\Models\City();
        $city->name = 'Tehran';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 18;
        $city->save(); //Iran

        $city = new \App\Models\City();
        $city->name = 'Berlin';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10115';
        $city->country_id = 19;
        $city->save(); //Germany

        $city = new \App\Models\City();
        $city->name = 'Bangkok';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10100';
        $city->country_id = 20;
        $city->save(); //Thailand

        $city = new \App\Models\City();
        $city->name = 'London';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '56273';
        $city->country_id = 21;
        $city->save(); //United Kingdom

        $city = new \App\Models\City();
        $city->name = 'Paris';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '75000';
        $city->country_id = 22;
        $city->save(); //France

        $city = new \App\Models\City();
        $city->name = 'Dodoma';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '11101';
        $city->country_id = 23;
        $city->save(); //Tanzania

        $city = new \App\Models\City();
        $city->name = 'Rome';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00100';
        $city->country_id = 24;
        $city->save(); //Italy

        $city = new \App\Models\City();
        $city->name = 'Pretoria';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '0001';
        $city->country_id = 25;
        $city->save(); //South Africa

        $city = new \App\Models\City();
        $city->name = 'Naypyidaw';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '15011';
        $city->country_id = 26;
        $city->save(); //Myanmar

        $city = new \App\Models\City();
        $city->name = 'Nairobi';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00100';
        $city->country_id = 27;
        $city->save(); //Kenya

        $city = new \App\Models\City();
        $city->name = 'Seoul';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '100-011';
        $city->country_id = 28;
        $city->save(); //Korea

        $city = new \App\Models\City();
        $city->name = 'Bogota';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '110111';
        $city->country_id = 29;
        $city->save(); //Colombia

        $city = new \App\Models\City();
        $city->name = 'Madrid';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '28001';
        $city->country_id = 30;
        $city->save(); //Spain

        $city = new \App\Models\City();
        $city->name = 'Kampala';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00256';
        $city->country_id = 31;
        $city->save(); //Uganda

        $city = new \App\Models\City();
        $city->name = 'Buenos Aires';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'B1675';
        $city->country_id = 32;
        $city->save(); //Argentina

        $city = new \App\Models\City();
        $city->name = 'Kyiv';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '03141';
        $city->country_id = 33;
        $city->save(); //Ukraine

        $city = new \App\Models\City();
        $city->name = 'Algiers';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '16000';
        $city->country_id = 34;
        $city->save(); //Algeria

        $city = new \App\Models\City();
        $city->name = 'Khartoum';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '79371';
        $city->country_id = 35;
        $city->save(); //Sudan

        $city = new \App\Models\City();
        $city->name = 'Baghdad';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10011';
        $city->country_id = 36;
        $city->save(); //Iraq

        $city = new \App\Models\City();
        $city->name = 'Warsaw';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '46580';
        $city->country_id = 37;
        $city->save(); //Poland

        $city = new \App\Models\City();
        $city->name = 'Ottawa';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '613350';
        $city->country_id = 38;
        $city->save(); //Canada

        $city = new \App\Models\City();
        $city->name = 'Kabul';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1001';
        $city->country_id = 39;
        $city->save(); //Afghanistan

        $city = new \App\Models\City();
        $city->name = 'Rabat';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10010';
        $city->country_id = 40;
        $city->save(); //Morocco

        $city = new \App\Models\City();
        $city->name = 'Riyadh';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '11543';
        $city->country_id = 41;
        $city->save(); //Saudi Arabia

        $city = new \App\Models\City();
        $city->name = 'Lima';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '07001';
        $city->country_id = 42;
        $city->save(); //Peru

        $city = new \App\Models\City();
        $city->name = 'Tashkent';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '100012';
        $city->country_id = 43;
        $city->save(); //Uzbekstan

        $city = new \App\Models\City();
        $city->name = 'Caracas';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1000';
        $city->country_id = 44;
        $city->save(); //Venezuela

        $city = new \App\Models\City();
        $city->name = 'Kuala Lumpur';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '43200';
        $city->country_id = 45;
        $city->save(); //Malaysia

        $city = new \App\Models\City();
        $city->name = 'Luanda';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '46703';
        $city->country_id = 46;
        $city->save(); //Angola

        $city = new \App\Models\City();
        $city->name = 'Maputo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1100';
        $city->country_id = 47;
        $city->save(); //Mozambique

        $city = new \App\Models\City();
        $city->name = 'Accra';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00233';
        $city->country_id = 48;
        $city->save(); //Ghana

        $city = new \App\Models\City();
        $city->name = 'Kathmandu';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '44600';
        $city->country_id = 49;
        $city->save(); //Nepal

        $city = new \App\Models\City();
        $city->name = 'Sana\'a';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 50;
        $city->save(); //Yemen

        $city = new \App\Models\City();
        $city->name = 'Antananarivo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '101';
        $city->country_id = 51;
        $city->save(); //Madagascar

        $city = new \App\Models\City();
        $city->name = 'Pyongyang';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '2381';
        $city->country_id = 52;
        $city->save(); //Korea,DPR

        $city = new \App\Models\City();
        $city->name = 'Yamoussoukro';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 53;
        $city->save(); //Cote d'lvoire

        $city = new \App\Models\City();
        $city->name = 'Yaoundé';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 54;
        $city->save(); //Cameroon

        $city = new \App\Models\City();
        $city->name = 'Canberra';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '2601';
        $city->country_id = 55;
        $city->save(); //Australia

        $city = new \App\Models\City();
        $city->name = 'Niamey';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '8001';
        $city->country_id = 56;
        $city->save(); //Niger

        $city = new \App\Models\City();
        $city->name = 'Colombo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00130';
        $city->country_id = 57;
        $city->save(); //Sri Lanka

        $city = new \App\Models\City();
        $city->name = 'Ouagadougou';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '621';
        $city->country_id = 58;
        $city->save(); //Burkina Faso

        $city = new \App\Models\City();
        $city->name = 'Lilongwe';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '537';
        $city->country_id = 59;
        $city->save(); //Malawi

        $city = new \App\Models\City();
        $city->name = 'Bamako';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '28002';
        $city->country_id = 60;
        $city->save(); //Mali

        $city = new \App\Models\City();
        $city->name = 'Bucharest';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '010164';
        $city->country_id = 61;
        $city->save(); //Romania

        $city = new \App\Models\City();
        $city->name = 'Astana';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '010000';
        $city->country_id = 62;
        $city->save(); //Kazakhstan

        $city = new \App\Models\City();
        $city->name = 'Damascus';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '20872';
        $city->country_id = 63;
        $city->save(); //Syria

        $city = new \App\Models\City();
        $city->name = 'Santiago';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '7591538';
        $city->country_id = 64;
        $city->save(); //Chile

        $city = new \App\Models\City();
        $city->name = 'Lusaka';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '50100';
        $city->country_id = 65;
        $city->save(); //Zambia

        $city = new \App\Models\City();
        $city->name = 'Guatemala CityCms';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '01001';
        $city->country_id = 66;
        $city->save(); //Guatemala

        $city = new \App\Models\City();
        $city->name = 'Harare';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00263';
        $city->country_id = 67;
        $city->save(); //Zimbabwe

        $city = new \App\Models\City();
        $city->name = 'Amsterdam';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1011';
        $city->country_id = 68;
        $city->save(); //Netherlands

        $city = new \App\Models\City();
        $city->name = 'Quito';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '170105';
        $city->country_id = 69;
        $city->save(); //Ecuador

        $city = new \App\Models\City();
        $city->name = 'Dakar';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '12500';
        $city->country_id = 70;
        $city->save(); //Senegal

        $city = new \App\Models\City();
        $city->name = 'Phnom Penh';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '12000';
        $city->country_id = 71;
        $city->save(); //Cambodia

        $city = new \App\Models\City();
        $city->name = 'N Djamena';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 72;
        $city->save(); //Chad

        $city = new \App\Models\City();
        $city->name = 'Mogadishu';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'JH09010';
        $city->country_id = 73;
        $city->save(); //Somalia

        $city = new \App\Models\City();
        $city->name = 'Conakry';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 74;
        $city->save(); //Guinea

        $city = new \App\Models\City();
        $city->name = 'Juba';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '767025';
        $city->country_id = 75;
        $city->save(); //South Sudan

        $city = new \App\Models\City();
        $city->name = 'Kigali';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '20093';
        $city->country_id = 76;
        $city->save(); //Rwanda

        $city = new \App\Models\City();
        $city->name = 'Porto-Novo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '9700605';
        $city->country_id = 77;
        $city->save(); //Benin

        $city = new \App\Models\City();
        $city->name = 'Tunis';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1002';
        $city->country_id = 78;
        $city->save(); //Tunisia

        $city = new \App\Models\City();
        $city->name = 'Bujumbura';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1323';
        $city->country_id = 79;
        $city->save(); //Burundi

        $city = new \App\Models\City();
        $city->name = 'Brussels';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1160';
        $city->country_id = 80;
        $city->save(); //Belgium

        $city = new \App\Models\City();
        $city->name = 'Hvana';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '62644';
        $city->country_id = 81;
        $city->save(); //Cuba

        $city = new \App\Models\City();
        $city->name = 'Sucre';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '703030';
        $city->country_id = 82;
        $city->save(); //Bolivia

        $city = new \App\Models\City();
        $city->name = 'Port-au-Prince';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '6110';
        $city->country_id = 83;
        $city->save(); //Haiti

        $city = new \App\Models\City();
        $city->name = 'Athens';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10431';
        $city->country_id = 84;
        $city->save(); //Greece

        $city = new \App\Models\City();
        $city->name = 'Santo Domingo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10103';
        $city->country_id = 85;
        $city->save(); //Dominican Republic

        $city = new \App\Models\City();
        $city->name = 'Prague';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '100000';
        $city->country_id = 86;
        $city->save(); //Czech

        $city = new \App\Models\City();
        $city->name = 'Lisbon';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1000-001';
        $city->country_id = 87;
        $city->save(); //Portugal

        $city = new \App\Models\City();
        $city->name = 'Amman';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '11118';
        $city->country_id = 88;
        $city->save(); //Jordan

        $city = new \App\Models\City();
        $city->name = 'Stockholm';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10465';
        $city->country_id = 89;
        $city->save(); //Sweden

        $city = new \App\Models\City();
        $city->name = 'Baku';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'AZ1033';
        $city->country_id = 90;
        $city->save(); //Azerbaijan

        $city = new \App\Models\City();
        $city->name = 'Abu Dhabi';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '51133';
        $city->country_id = 91;
        $city->save(); //United Arab Emirates

        $city = new \App\Models\City();
        $city->name = 'Budapest';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1007';
        $city->country_id = 92;
        $city->save(); //Hungary

        $city = new \App\Models\City();
        $city->name = 'Tegucigalpa';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '11101';
        $city->country_id = 93;
        $city->save(); //Honduras

        $city = new \App\Models\City();
        $city->name = 'Minsk';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '220015';
        $city->country_id = 94;
        $city->save(); //Belarus

        $city = new \App\Models\City();
        $city->name = 'Dushanbe';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '735450';
        $city->country_id = 95;
        $city->save(); //Tajikistan

        $city = new \App\Models\City();
        $city->name = 'Vienna';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1010';
        $city->country_id = 96;
        $city->save(); //Austria

        //Serbia is 97

        $city = new \App\Models\City();
        $city->name = 'Bern';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '2544';
        $city->country_id = 98;
        $city->save(); //Switzerland

        $city = new \App\Models\City();
        $city->name = 'Port Moresby';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '111';
        $city->country_id = 99;
        $city->save(); //Papua New Guinea

        $city = new \App\Models\City();
        $city->name = 'Jerusalem';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '94142';
        $city->country_id = 100;
        $city->save(); //Israel

        $city = new \App\Models\City();
        $city->name = 'Lomé';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 101;
        $city->save(); //Togo

        $city = new \App\Models\City();
        $city->name = 'Freetown';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 102;
        $city->save(); //Sierra Leone

        $city = new \App\Models\City();
        $city->name = 'Vientiane';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '0101';
        $city->country_id = 103;
        $city->save(); //Laos

        $city = new \App\Models\City();
        $city->name = 'Sofia';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '4000';
        $city->country_id = 104;
        $city->save(); //Bulgaria

        $city = new \App\Models\City();
        $city->name = 'Asunción';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '3690';
        $city->country_id = 105;
        $city->save(); //Paraguay

        $city = new \App\Models\City();
        $city->name = 'Tripoli';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 106;
        $city->save(); //Libya

        $city = new \App\Models\City();
        $city->name = 'San Salvador';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1120';
        $city->country_id = 107;
        $city->save(); //El Salvador

        $city = new \App\Models\City();
        $city->name = 'Managua';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '12005';
        $city->country_id = 108;
        $city->save(); //Nicaragua

        $city = new \App\Models\City();
        $city->name = 'Bishkek';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '720001';
        $city->country_id = 109;
        $city->save(); //Kyrgyzstan

        $city = new \App\Models\City();
        $city->name = 'Beirut';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '2038';
        $city->country_id = 110;
        $city->save(); //Lebanon

        $city = new \App\Models\City();
        $city->name = 'Ashgabat';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '744000';
        $city->country_id = 111;
        $city->save(); //Turkmenistan

        $city = new \App\Models\City();
        $city->name = 'Singapore';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '546080';
        $city->country_id = 112;
        $city->save(); //Singapore

        $city = new \App\Models\City();
        $city->name = 'Copenhagen';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1499';
        $city->country_id = 113;
        $city->save(); //Denmark

        $city = new \App\Models\City();
        $city->name = 'Helsinki';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00550';
        $city->country_id = 114;
        $city->save(); //Finland

        $city = new \App\Models\City();
        $city->name = 'Kinshasa';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 115;
        $city->save(); //DR Congo

        $city = new \App\Models\City();
        $city->name = 'Bratislava';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '2412';
        $city->country_id = 116;
        $city->save(); //Slovak

        $city = new \App\Models\City();
        $city->name = 'Oslo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '0010';
        $city->country_id = 117;
        $city->save(); //Norway

        $city = new \App\Models\City();
        $city->name = 'Asmara';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 118;
        $city->save(); //Eritrea

        $city = new \App\Models\City();
        $city->name = 'Ramallah';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '62451';
        $city->country_id = 119;
        $city->save(); //Palestine

        $city = new \App\Models\City();
        $city->name = 'Muscat';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '133';
        $city->country_id = 120;
        $city->save(); //Oman

        $city = new \App\Models\City();
        $city->name = 'San José';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '11801';
        $city->country_id = 121;
        $city->save(); //Costa Rica

        $city = new \App\Models\City();
        $city->name = 'Monrovia';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1000';
        $city->country_id = 122;
        $city->save(); //Liberia

        $city = new \App\Models\City();
        $city->name = 'Dublin';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'T37F8HK';
        $city->country_id = 123;
        $city->save(); //Ireland

        $city = new \App\Models\City();
        $city->name = 'Bangui';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 124;
        $city->save(); //Central African

        $city = new \App\Models\City();
        $city->name = 'Avarua';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 125;
        $city->save(); //Cook Is

        $city = new \App\Models\City();
        $city->name = 'Nouakchott';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 126;
        $city->save(); //Mauritania

        $city = new \App\Models\City();
        $city->name = 'Kuwait CityCms';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '54541';
        $city->country_id = 127;
        $city->save(); //Kuwait

        $city = new \App\Models\City();
        $city->name = 'Panama CityCms';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10801';
        $city->country_id = 128;
        $city->save(); //Panama

        //Croatia is 129

        $city = new \App\Models\City();
        $city->name = 'Chisinau';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '2012';
        $city->country_id = 130;
        $city->save(); //Moldova

        $city = new \App\Models\City();
        $city->name = 'Tbilisi';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10108';
        $city->country_id = 131;
        $city->save(); //Georgia

        //BiH is 132

        $city = new \App\Models\City();
        $city->name = 'Montevideo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '91000';
        $city->country_id = 133;
        $city->save(); //Uruguay

        $city = new \App\Models\City();
        $city->name = 'Ulan Bator';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '14200';
        $city->country_id = 134;
        $city->save(); //Mongolia

        $city = new \App\Models\City();
        $city->name = 'Tirana';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1001';
        $city->country_id = 135;
        $city->save(); //Albania

        $city = new \App\Models\City();
        $city->name = 'Yerevan';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '0002';
        $city->country_id = 136;
        $city->save(); //Armenia

        $city = new \App\Models\City();
        $city->name = 'Kingston';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 137;
        $city->save(); //Jamaica

        $city = new \App\Models\City();
        $city->name = 'Vilnius';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '04340';
        $city->country_id = 138;
        $city->save(); //Lithuania

        $city = new \App\Models\City();
        $city->name = 'Doha';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 139;
        $city->save(); //Qatar

        $city = new \App\Models\City();
        $city->name = 'Windhoek';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '12056';
        $city->country_id = 140;
        $city->save(); //Namibia

        $city = new \App\Models\City();
        $city->name = 'Gaborone';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 141;
        $city->save(); //Botswana

        $city = new \App\Models\City();
        $city->name = 'Maseru';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '100';
        $city->country_id = 142;
        $city->save(); //Lesotho

        $city = new \App\Models\City();
        $city->name = 'Basse-Terre';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 143;
        $city->save(); //Gambia

        $city = new \App\Models\City();
        $city->name = 'Libreville';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '13210';
        $city->country_id = 144;
        $city->save(); //Gabon

        $city = new \App\Models\City();
        $city->name = 'Skopje';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1000';
        $city->country_id = 145;
        $city->save(); //North Macedonia

        $city = new \App\Models\City();
        $city->name = 'Ljubljana';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1210';
        $city->country_id = 146;
        $city->save(); //Slovenia

        $city = new \App\Models\City();
        $city->name = 'Bissau';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1000';
        $city->country_id = 147;
        $city->save(); //Guinea Bissau

        $city = new \App\Models\City();
        $city->name = 'Riga';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1073';
        $city->country_id = 148;
        $city->save(); //Latvia

        $city = new \App\Models\City();
        $city->name = 'Manama';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '317';
        $city->country_id = 149;
        $city->save(); //Bahrian

        $city = new \App\Models\City();
        $city->name = 'Lobamba';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'H100';
        $city->country_id = 150;
        $city->save(); //Swaziland

        $city = new \App\Models\City();
        $city->name = 'Port of Spain';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 151;
        $city->save(); //Trinidad and Tobago

        $city = new \App\Models\City();
        $city->name = 'Malabo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 152;
        $city->save(); //Equatorial Guinea

        $city = new \App\Models\City();
        $city->name = 'Dili';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '73641';
        $city->country_id = 153;
        $city->save(); //Timor-Leste

        $city = new \App\Models\City();
        $city->name = 'Tallinn';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10111';
        $city->country_id = 154;
        $city->save(); //Estonia

        $city = new \App\Models\City();
        $city->name = 'Port Louis';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 155;
        $city->save(); //Mauritius

        $city = new \App\Models\City();
        $city->name = 'Nicosia';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '2008';
        $city->country_id = 156;
        $city->save(); //Cyprus

        $city = new \App\Models\City();
        $city->name = 'Djibouti';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 157;
        $city->save(); //Djibouti

        $city = new \App\Models\City();
        $city->name = 'Suva';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 158;
        $city->save(); //Fiji

        $city = new \App\Models\City();
        $city->name = 'Moroni';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 159;
        $city->save(); //Comoros

        $city = new \App\Models\City();
        $city->name = 'Thimphu';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '11001';
        $city->country_id = 160;
        $city->save(); //Bhutan

        $city = new \App\Models\City();
        $city->name = 'Georgetown';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 161;
        $city->save(); //Guyana

        $city = new \App\Models\City();
        $city->name = 'Honiara';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 162;
        $city->save(); //Solomon Is

        $city = new \App\Models\City();
        $city->name = 'Podgorica';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '81000';
        $city->country_id = 163; //Montenegro
        $city->save();

        $city = new \App\Models\City();
        $city->name = 'Luxembourg';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '1234';
        $city->country_id = 164;
        $city->save(); //Luxembourg

        $city = new \App\Models\City();
        $city->name = 'Paramaribo';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 165;
        $city->save(); //Suriname

        $city = new \App\Models\City();
        $city->name = 'Praia';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '7600';
        $city->country_id = 166;
        $city->save(); //Cape Verde

        $city = new \App\Models\City();
        $city->name = 'Palikir';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 167;
        $city->save(); //Micronesia

        $city = new \App\Models\City();
        $city->name = 'Malé';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 168;
        $city->save(); //Maldives

        $city = new \App\Models\City();
        $city->name = 'Bandar Seri Begawan';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'BT2328';
        $city->country_id = 169;
        $city->save(); //Brunei

        $city = new \App\Models\City();
        $city->name = 'Valletta';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 170;
        $city->save(); //Malta

        $city = new \App\Models\City();
        $city->name = 'Nassau';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 171;
        $city->save(); //Bahamas

        $city = new \App\Models\City();
        $city->name = 'Belmopan';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 172;
        $city->save(); //Belize

        $city = new \App\Models\City();
        $city->name = 'Reykjavik';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '101';
        $city->country_id = 173;
        $city->save(); //Iceland

        $city = new \App\Models\City();
        $city->name = 'Port Vila';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 174;
        $city->save(); //Vanuatu

        $city = new \App\Models\City();
        $city->name = 'Bridgetown';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '26028';
        $city->country_id = 175;
        $city->save(); //Barbados

        $city = new \App\Models\City();
        $city->name = 'São Tomé';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 176;
        $city->save(); //Sao Tome and Principe

        $city = new \App\Models\City();
        $city->name = 'Apia';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '38360';
        $city->country_id = 177;
        $city->save(); //Samoa

        $city = new \App\Models\City();
        $city->name = 'Castries';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '34160';
        $city->country_id = 178;
        $city->save(); //Saint Lucia

        $city = new \App\Models\City();
        $city->name = 'South Tarawa';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 179;
        $city->save(); //Kiribati

        $city = new \App\Models\City();
        $city->name = 'Kingstown';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'VC1410';
        $city->country_id = 180;
        $city->save(); //Saint Vincent and the Grenadines

        $city = new \App\Models\City();
        $city->name = 'Nukualofa';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 181;
        $city->save(); //Tonga

        $city = new \App\Models\City();
        $city->name = 'St. Georges';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '38901';
        $city->country_id = 182;
        $city->save(); //Grenada

        $city = new \App\Models\City();
        $city->name = 'Saint Johns';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 183;
        $city->save(); //Antigua and Barbuda

        $city = new \App\Models\City();
        $city->name = 'Victoria';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 184;
        $city->save(); //Seychelles

        $city = new \App\Models\City();
        $city->name = 'Andorra La Vella';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'AD500';
        $city->country_id = 185;
        $city->save(); //Andorra

        $city = new \App\Models\City();
        $city->name = 'Roseau';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 186;
        $city->save(); //Dominica

        $city = new \App\Models\City();
        $city->name = 'Basseterre';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 187;
        $city->save(); //St Kitts-Nevis

        $city = new \App\Models\City();
        $city->name = 'Majuro';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 188;
        $city->save(); //Marshal Islands

        $city = new \App\Models\City();
        $city->name = 'Monaco';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '98000';
        $city->country_id = 189;
        $city->save(); //Monaco

        $city = new \App\Models\City();
        $city->name = 'Vaduz';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '9485';
        $city->country_id = 190;
        $city->save(); //Liechtenstein

        $city = new \App\Models\City();
        $city->name = 'CityCms of San Marino';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '91108';
        $city->country_id = 191;
        $city->save(); //San Marino

        $city = new \App\Models\City();
        $city->name = 'Ngerulmud';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 192;
        $city->save(); //Palau

        $city = new \App\Models\City();
        $city->name = 'Funafuti';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00000';
        $city->country_id = 193;
        $city->save(); //Tuvalu

        $city = new \App\Models\City();
        $city->name = 'Yaren';
        $city->slug = generateSlug($city->name);
        $city->zip_code = 'NRY68';
        $city->country_id = 194;
        $city->save(); //Nauru

        $city = new \App\Models\City();
        $city->name = 'Vatican CityCms';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '00120';
        $city->country_id = 195;
        $city->save(); //Vatican CityCms

        $city = new \App\Models\City();
        $city->name = 'Pristina';
        $city->slug = generateSlug($city->name);
        $city->zip_code = '10000';
        $city->country_id = 196;
        $city->save(); //Kosovo

    }
}
