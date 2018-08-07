<?php

use Illuminate\Database\Seeder;
use App\Data\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 101,
                'id' => 1,
                'name' => 'Andaman and Nicobar Islands',
            ),
            
            array (
                'country_id' => 101,
                'id' => 2,
                'name' => 'Andhra Pradesh',
            ),
            
            array (
                'country_id' => 101,
                'id' => 3,
                'name' => 'Arunachal Pradesh',
            ),
            
            array (
                'country_id' => 101,
                'id' => 4,
                'name' => 'Assam',
            ),
            
            array (
                'country_id' => 101,
                'id' => 5,
                'name' => 'Bihar',
            ),
            
            array (
                'country_id' => 101,
                'id' => 6,
                'name' => 'Chandigarh',
            ),
            
            array (
                'country_id' => 101,
                'id' => 7,
                'name' => 'Chhattisgarh',
            ),
            
            array (
                'country_id' => 101,
                'id' => 8,
                'name' => 'Dadra and Nagar Haveli',
            ),
            
            array (
                'country_id' => 101,
                'id' => 9,
                'name' => 'Daman and Diu',
            ),
            
            array (
                'country_id' => 101,
                'id' => 10,
                'name' => 'Delhi',
            ),
            
            array (
                'country_id' => 101,
                'id' => 11,
                'name' => 'Goa',
            ),
            
            array (
                'country_id' => 101,
                'id' => 12,
                'name' => 'Gujarat',
            ),
            
            array (
                'country_id' => 101,
                'id' => 13,
                'name' => 'Haryana',
            ),
            
            array (
                'country_id' => 101,
                'id' => 14,
                'name' => 'Himachal Pradesh',
            ),
            
            array (
                'country_id' => 101,
                'id' => 15,
                'name' => 'Jammu and Kashmir',
            ),
            
            array (
                'country_id' => 101,
                'id' => 16,
                'name' => 'Jharkhand',
            ),
            
            array (
                'country_id' => 101,
                'id' => 17,
                'name' => 'Karnataka',
            ),
            
            array (
                'country_id' => 101,
                'id' => 18,
                'name' => 'Kenmore',
            ),
            
            array (
                'country_id' => 101,
                'id' => 19,
                'name' => 'Kerala',
            ),
            
            array (
                'country_id' => 101,
                'id' => 20,
                'name' => 'Lakshadweep',
            ),
            
            array (
                'country_id' => 101,
                'id' => 21,
                'name' => 'Madhya Pradesh',
            ),
            
            array (
                'country_id' => 101,
                'id' => 22,
                'name' => 'Maharashtra',
            ),
            
            array (
                'country_id' => 101,
                'id' => 23,
                'name' => 'Manipur',
            ),
            
            array (
                'country_id' => 101,
                'id' => 24,
                'name' => 'Meghalaya',
            ),
            
            array (
                'country_id' => 101,
                'id' => 25,
                'name' => 'Mizoram',
            ),
            
            array (
                'country_id' => 101,
                'id' => 26,
                'name' => 'Nagaland',
            ),
            
            array (
                'country_id' => 101,
                'id' => 27,
                'name' => 'Narora',
            ),
            
            array (
                'country_id' => 101,
                'id' => 28,
                'name' => 'Natwar',
            ),
            
            array (
                'country_id' => 101,
                'id' => 29,
                'name' => 'Odisha',
            ),
            
            array (
                'country_id' => 101,
                'id' => 30,
                'name' => 'Paschim Medinipur',
            ),
            
            array (
                'country_id' => 101,
                'id' => 31,
                'name' => 'Pondicherry',
            ),
            
            array (
                'country_id' => 101,
                'id' => 32,
                'name' => 'Punjab',
            ),
            
            array (
                'country_id' => 101,
                'id' => 33,
                'name' => 'Rajasthan',
            ),
            
            array (
                'country_id' => 101,
                'id' => 34,
                'name' => 'Sikkim',
            ),
            
            array (
                'country_id' => 101,
                'id' => 35,
                'name' => 'Tamil Nadu',
            ),
            
            array (
                'country_id' => 101,
                'id' => 36,
                'name' => 'Telangana',
            ),
            
            array (
                'country_id' => 101,
                'id' => 37,
                'name' => 'Tripura',
            ),
            
            array (
                'country_id' => 101,
                'id' => 38,
                'name' => 'Uttar Pradesh',
            ),
            
            array (
                'country_id' => 101,
                'id' => 39,
                'name' => 'Uttarakhand',
            ),
            
            array (
                'country_id' => 101,
                'id' => 40,
                'name' => 'Vaishali',
            ),
            
            array (
                'country_id' => 101,
                'id' => 41,
                'name' => 'West Bengal',
            ),
            
            array (
                'country_id' => 1,
                'id' => 42,
                'name' => 'Badakhshan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 43,
                'name' => 'Badgis',
            ),
            
            array (
                'country_id' => 1,
                'id' => 44,
                'name' => 'Baglan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 45,
                'name' => 'Balkh',
            ),
            
            array (
                'country_id' => 1,
                'id' => 46,
                'name' => 'Bamiyan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 47,
                'name' => 'Farah',
            ),
            
            array (
                'country_id' => 1,
                'id' => 48,
                'name' => 'Faryab',
            ),
            
            array (
                'country_id' => 1,
                'id' => 49,
                'name' => 'Gawr',
            ),
            
            array (
                'country_id' => 1,
                'id' => 50,
                'name' => 'Gazni',
            ),
            
            array (
                'country_id' => 1,
                'id' => 51,
                'name' => 'Herat',
            ),
            
            array (
                'country_id' => 1,
                'id' => 52,
                'name' => 'Hilmand',
            ),
            
            array (
                'country_id' => 1,
                'id' => 53,
                'name' => 'Jawzjan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 54,
                'name' => 'Kabul',
            ),
            
            array (
                'country_id' => 1,
                'id' => 55,
                'name' => 'Kapisa',
            ),
            
            array (
                'country_id' => 1,
                'id' => 56,
                'name' => 'Khawst',
            ),
            
            array (
                'country_id' => 1,
                'id' => 57,
                'name' => 'Kunar',
            ),
            
            array (
                'country_id' => 1,
                'id' => 58,
                'name' => 'Lagman',
            ),
            
            array (
                'country_id' => 1,
                'id' => 59,
                'name' => 'Lawghar',
            ),
            
            array (
                'country_id' => 1,
                'id' => 60,
                'name' => 'Nangarhar',
            ),
            
            array (
                'country_id' => 1,
                'id' => 61,
                'name' => 'Nimruz',
            ),
            
            array (
                'country_id' => 1,
                'id' => 62,
                'name' => 'Nuristan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 63,
                'name' => 'Paktika',
            ),
            
            array (
                'country_id' => 1,
                'id' => 64,
                'name' => 'Paktiya',
            ),
            
            array (
                'country_id' => 1,
                'id' => 65,
                'name' => 'Parwan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 66,
                'name' => 'Qandahar',
            ),
            
            array (
                'country_id' => 1,
                'id' => 67,
                'name' => 'Qunduz',
            ),
            
            array (
                'country_id' => 1,
                'id' => 68,
                'name' => 'Samangan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 69,
                'name' => 'Sar-e Pul',
            ),
            
            array (
                'country_id' => 1,
                'id' => 70,
                'name' => 'Takhar',
            ),
            
            array (
                'country_id' => 1,
                'id' => 71,
                'name' => 'Uruzgan',
            ),
            
            array (
                'country_id' => 1,
                'id' => 72,
                'name' => 'Wardag',
            ),
            
            array (
                'country_id' => 1,
                'id' => 73,
                'name' => 'Zabul',
            ),
            
            array (
                'country_id' => 2,
                'id' => 74,
                'name' => 'Berat',
            ),
            
            array (
                'country_id' => 2,
                'id' => 75,
                'name' => 'Bulqize',
            ),
            
            array (
                'country_id' => 2,
                'id' => 76,
                'name' => 'Delvine',
            ),
            
            array (
                'country_id' => 2,
                'id' => 77,
                'name' => 'Devoll',
            ),
            
            array (
                'country_id' => 2,
                'id' => 78,
                'name' => 'Dibre',
            ),
            
            array (
                'country_id' => 2,
                'id' => 79,
                'name' => 'Durres',
            ),
            
            array (
                'country_id' => 2,
                'id' => 80,
                'name' => 'Elbasan',
            ),
            
            array (
                'country_id' => 2,
                'id' => 81,
                'name' => 'Fier',
            ),
            
            array (
                'country_id' => 2,
                'id' => 82,
                'name' => 'Gjirokaster',
            ),
            
            array (
                'country_id' => 2,
                'id' => 83,
                'name' => 'Gramsh',
            ),
            
            array (
                'country_id' => 2,
                'id' => 84,
                'name' => 'Has',
            ),
            
            array (
                'country_id' => 2,
                'id' => 85,
                'name' => 'Kavaje',
            ),
            
            array (
                'country_id' => 2,
                'id' => 86,
                'name' => 'Kolonje',
            ),
            
            array (
                'country_id' => 2,
                'id' => 87,
                'name' => 'Korce',
            ),
            
            array (
                'country_id' => 2,
                'id' => 88,
                'name' => 'Kruje',
            ),
            
            array (
                'country_id' => 2,
                'id' => 89,
                'name' => 'Kucove',
            ),
            
            array (
                'country_id' => 2,
                'id' => 90,
                'name' => 'Kukes',
            ),
            
            array (
                'country_id' => 2,
                'id' => 91,
                'name' => 'Kurbin',
            ),
            
            array (
                'country_id' => 2,
                'id' => 92,
                'name' => 'Lezhe',
            ),
            
            array (
                'country_id' => 2,
                'id' => 93,
                'name' => 'Librazhd',
            ),
            
            array (
                'country_id' => 2,
                'id' => 94,
                'name' => 'Lushnje',
            ),
            
            array (
                'country_id' => 2,
                'id' => 95,
                'name' => 'Mallakaster',
            ),
            
            array (
                'country_id' => 2,
                'id' => 96,
                'name' => 'Malsi e Madhe',
            ),
            
            array (
                'country_id' => 2,
                'id' => 97,
                'name' => 'Mat',
            ),
            
            array (
                'country_id' => 2,
                'id' => 98,
                'name' => 'Mirdite',
            ),
            
            array (
                'country_id' => 2,
                'id' => 99,
                'name' => 'Peqin',
            ),
            
            array (
                'country_id' => 2,
                'id' => 100,
                'name' => 'Permet',
            ),
            
            array (
                'country_id' => 2,
                'id' => 101,
                'name' => 'Pogradec',
            ),
            
            array (
                'country_id' => 2,
                'id' => 102,
                'name' => 'Puke',
            ),
            
            array (
                'country_id' => 2,
                'id' => 103,
                'name' => 'Sarande',
            ),
            
            array (
                'country_id' => 2,
                'id' => 104,
                'name' => 'Shkoder',
            ),
            
            array (
                'country_id' => 2,
                'id' => 105,
                'name' => 'Skrapar',
            ),
            
            array (
                'country_id' => 2,
                'id' => 106,
                'name' => 'Tepelene',
            ),
            
            array (
                'country_id' => 2,
                'id' => 107,
                'name' => 'Tirane',
            ),
            
            array (
                'country_id' => 2,
                'id' => 108,
                'name' => 'Tropoje',
            ),
            
            array (
                'country_id' => 2,
                'id' => 109,
                'name' => 'Vlore',
            ),
            
            array (
                'country_id' => 3,
                'id' => 110,
                'name' => '\'Ayn Daflah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 111,
                'name' => '\'Ayn Tamushanat',
            ),
            
            array (
                'country_id' => 3,
                'id' => 112,
                'name' => 'Adrar',
            ),
            
            array (
                'country_id' => 3,
                'id' => 113,
                'name' => 'Algiers',
            ),
            
            array (
                'country_id' => 3,
                'id' => 114,
                'name' => 'Annabah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 115,
                'name' => 'Bashshar',
            ),
            
            array (
                'country_id' => 3,
                'id' => 116,
                'name' => 'Batnah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 117,
                'name' => 'Bijayah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 118,
                'name' => 'Biskrah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 119,
                'name' => 'Blidah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 120,
                'name' => 'Buirah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 121,
                'name' => 'Bumardas',
            ),
            
            array (
                'country_id' => 3,
                'id' => 122,
                'name' => 'Burj Bu Arririj',
            ),
            
            array (
                'country_id' => 3,
                'id' => 123,
                'name' => 'Ghalizan',
            ),
            
            array (
                'country_id' => 3,
                'id' => 124,
                'name' => 'Ghardayah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 125,
                'name' => 'Ilizi',
            ),
            
            array (
                'country_id' => 3,
                'id' => 126,
                'name' => 'Jijili',
            ),
            
            array (
                'country_id' => 3,
                'id' => 127,
                'name' => 'Jilfah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 128,
                'name' => 'Khanshalah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 129,
                'name' => 'Masilah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 130,
                'name' => 'Midyah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 131,
                'name' => 'Milah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 132,
                'name' => 'Muaskar',
            ),
            
            array (
                'country_id' => 3,
                'id' => 133,
                'name' => 'Mustaghanam',
            ),
            
            array (
                'country_id' => 3,
                'id' => 134,
                'name' => 'Naama',
            ),
            
            array (
                'country_id' => 3,
                'id' => 135,
                'name' => 'Oran',
            ),
            
            array (
                'country_id' => 3,
                'id' => 136,
                'name' => 'Ouargla',
            ),
            
            array (
                'country_id' => 3,
                'id' => 137,
                'name' => 'Qalmah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 138,
                'name' => 'Qustantinah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 139,
                'name' => 'Sakikdah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 140,
                'name' => 'Satif',
            ),
            
            array (
                'country_id' => 3,
                'id' => 141,
                'name' => 'Sayda\'',
            ),
            
            array (
                'country_id' => 3,
                'id' => 142,
                'name' => 'Sidi ban-al-\'Abbas',
            ),
            
            array (
                'country_id' => 3,
                'id' => 143,
                'name' => 'Suq Ahras',
            ),
            
            array (
                'country_id' => 3,
                'id' => 144,
                'name' => 'Tamanghasat',
            ),
            
            array (
                'country_id' => 3,
                'id' => 145,
                'name' => 'Tibazah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 146,
                'name' => 'Tibissah',
            ),
            
            array (
                'country_id' => 3,
                'id' => 147,
                'name' => 'Tilimsan',
            ),
            
            array (
                'country_id' => 3,
                'id' => 148,
                'name' => 'Tinduf',
            ),
            
            array (
                'country_id' => 3,
                'id' => 149,
                'name' => 'Tisamsilt',
            ),
            
            array (
                'country_id' => 3,
                'id' => 150,
                'name' => 'Tiyarat',
            ),
            
            array (
                'country_id' => 3,
                'id' => 151,
                'name' => 'Tizi Wazu',
            ),
            
            array (
                'country_id' => 3,
                'id' => 152,
                'name' => 'Umm-al-Bawaghi',
            ),
            
            array (
                'country_id' => 3,
                'id' => 153,
                'name' => 'Wahran',
            ),
            
            array (
                'country_id' => 3,
                'id' => 154,
                'name' => 'Warqla',
            ),
            
            array (
                'country_id' => 3,
                'id' => 155,
                'name' => 'Wilaya d Alger',
            ),
            
            array (
                'country_id' => 3,
                'id' => 156,
                'name' => 'Wilaya de Bejaia',
            ),
            
            array (
                'country_id' => 3,
                'id' => 157,
                'name' => 'Wilaya de Constantine',
            ),
            
            array (
                'country_id' => 3,
                'id' => 158,
                'name' => 'al-Aghwat',
            ),
            
            array (
                'country_id' => 3,
                'id' => 159,
                'name' => 'al-Bayadh',
            ),
            
            array (
                'country_id' => 3,
                'id' => 160,
                'name' => 'al-Jaza\'ir',
            ),
            
            array (
                'country_id' => 3,
                'id' => 161,
                'name' => 'al-Wad',
            ),
            
            array (
                'country_id' => 3,
                'id' => 162,
                'name' => 'ash-Shalif',
            ),
            
            array (
                'country_id' => 3,
                'id' => 163,
                'name' => 'at-Tarif',
            ),
            
            array (
                'country_id' => 4,
                'id' => 164,
                'name' => 'Eastern',
            ),
            
            array (
                'country_id' => 4,
                'id' => 165,
                'name' => 'Manu\'a',
            ),
            
            array (
                'country_id' => 4,
                'id' => 166,
                'name' => 'Swains Island',
            ),
            
            array (
                'country_id' => 4,
                'id' => 167,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 5,
                'id' => 168,
                'name' => 'Andorra la Vella',
            ),
            
            array (
                'country_id' => 5,
                'id' => 169,
                'name' => 'Canillo',
            ),
            
            array (
                'country_id' => 5,
                'id' => 170,
                'name' => 'Encamp',
            ),
            
            array (
                'country_id' => 5,
                'id' => 171,
                'name' => 'La Massana',
            ),
            
            array (
                'country_id' => 5,
                'id' => 172,
                'name' => 'Les Escaldes',
            ),
            
            array (
                'country_id' => 5,
                'id' => 173,
                'name' => 'Ordino',
            ),
            
            array (
                'country_id' => 5,
                'id' => 174,
                'name' => 'Sant Julia de Loria',
            ),
            
            array (
                'country_id' => 6,
                'id' => 175,
                'name' => 'Bengo',
            ),
            
            array (
                'country_id' => 6,
                'id' => 176,
                'name' => 'Benguela',
            ),
            
            array (
                'country_id' => 6,
                'id' => 177,
                'name' => 'Bie',
            ),
            
            array (
                'country_id' => 6,
                'id' => 178,
                'name' => 'Cabinda',
            ),
            
            array (
                'country_id' => 6,
                'id' => 179,
                'name' => 'Cunene',
            ),
            
            array (
                'country_id' => 6,
                'id' => 180,
                'name' => 'Huambo',
            ),
            
            array (
                'country_id' => 6,
                'id' => 181,
                'name' => 'Huila',
            ),
            
            array (
                'country_id' => 6,
                'id' => 182,
                'name' => 'Kuando-Kubango',
            ),
            
            array (
                'country_id' => 6,
                'id' => 183,
                'name' => 'Kwanza Norte',
            ),
            
            array (
                'country_id' => 6,
                'id' => 184,
                'name' => 'Kwanza Sul',
            ),
            
            array (
                'country_id' => 6,
                'id' => 185,
                'name' => 'Luanda',
            ),
            
            array (
                'country_id' => 6,
                'id' => 186,
                'name' => 'Lunda Norte',
            ),
            
            array (
                'country_id' => 6,
                'id' => 187,
                'name' => 'Lunda Sul',
            ),
            
            array (
                'country_id' => 6,
                'id' => 188,
                'name' => 'Malanje',
            ),
            
            array (
                'country_id' => 6,
                'id' => 189,
                'name' => 'Moxico',
            ),
            
            array (
                'country_id' => 6,
                'id' => 190,
                'name' => 'Namibe',
            ),
            
            array (
                'country_id' => 6,
                'id' => 191,
                'name' => 'Uige',
            ),
            
            array (
                'country_id' => 6,
                'id' => 192,
                'name' => 'Zaire',
            ),
            
            array (
                'country_id' => 7,
                'id' => 193,
                'name' => 'Other Provinces',
            ),
            
            array (
                'country_id' => 8,
                'id' => 194,
                'name' => 'Sector claimed by Argentina/Ch',
            ),
            
            array (
                'country_id' => 8,
                'id' => 195,
                'name' => 'Sector claimed by Argentina/UK',
            ),
            
            array (
                'country_id' => 8,
                'id' => 196,
                'name' => 'Sector claimed by Australia',
            ),
            
            array (
                'country_id' => 8,
                'id' => 197,
                'name' => 'Sector claimed by France',
            ),
            
            array (
                'country_id' => 8,
                'id' => 198,
                'name' => 'Sector claimed by New Zealand',
            ),
            
            array (
                'country_id' => 8,
                'id' => 199,
                'name' => 'Sector claimed by Norway',
            ),
            
            array (
                'country_id' => 8,
                'id' => 200,
                'name' => 'Unclaimed Sector',
            ),
            
            array (
                'country_id' => 9,
                'id' => 201,
                'name' => 'Barbuda',
            ),
            
            array (
                'country_id' => 9,
                'id' => 202,
                'name' => 'Saint George',
            ),
            
            array (
                'country_id' => 9,
                'id' => 203,
                'name' => 'Saint John',
            ),
            
            array (
                'country_id' => 9,
                'id' => 204,
                'name' => 'Saint Mary',
            ),
            
            array (
                'country_id' => 9,
                'id' => 205,
                'name' => 'Saint Paul',
            ),
            
            array (
                'country_id' => 9,
                'id' => 206,
                'name' => 'Saint Peter',
            ),
            
            array (
                'country_id' => 9,
                'id' => 207,
                'name' => 'Saint Philip',
            ),
            
            array (
                'country_id' => 10,
                'id' => 208,
                'name' => 'Buenos Aires',
            ),
            
            array (
                'country_id' => 10,
                'id' => 209,
                'name' => 'Catamarca',
            ),
            
            array (
                'country_id' => 10,
                'id' => 210,
                'name' => 'Chaco',
            ),
            
            array (
                'country_id' => 10,
                'id' => 211,
                'name' => 'Chubut',
            ),
            
            array (
                'country_id' => 10,
                'id' => 212,
                'name' => 'Cordoba',
            ),
            
            array (
                'country_id' => 10,
                'id' => 213,
                'name' => 'Corrientes',
            ),
            
            array (
                'country_id' => 10,
                'id' => 214,
                'name' => 'Distrito Federal',
            ),
            
            array (
                'country_id' => 10,
                'id' => 215,
                'name' => 'Entre Rios',
            ),
            
            array (
                'country_id' => 10,
                'id' => 216,
                'name' => 'Formosa',
            ),
            
            array (
                'country_id' => 10,
                'id' => 217,
                'name' => 'Jujuy',
            ),
            
            array (
                'country_id' => 10,
                'id' => 218,
                'name' => 'La Pampa',
            ),
            
            array (
                'country_id' => 10,
                'id' => 219,
                'name' => 'La Rioja',
            ),
            
            array (
                'country_id' => 10,
                'id' => 220,
                'name' => 'Mendoza',
            ),
            
            array (
                'country_id' => 10,
                'id' => 221,
                'name' => 'Misiones',
            ),
            
            array (
                'country_id' => 10,
                'id' => 222,
                'name' => 'Neuquen',
            ),
            
            array (
                'country_id' => 10,
                'id' => 223,
                'name' => 'Rio Negro',
            ),
            
            array (
                'country_id' => 10,
                'id' => 224,
                'name' => 'Salta',
            ),
            
            array (
                'country_id' => 10,
                'id' => 225,
                'name' => 'San Juan',
            ),
            
            array (
                'country_id' => 10,
                'id' => 226,
                'name' => 'San Luis',
            ),
            
            array (
                'country_id' => 10,
                'id' => 227,
                'name' => 'Santa Cruz',
            ),
            
            array (
                'country_id' => 10,
                'id' => 228,
                'name' => 'Santa Fe',
            ),
            
            array (
                'country_id' => 10,
                'id' => 229,
                'name' => 'Santiago del Estero',
            ),
            
            array (
                'country_id' => 10,
                'id' => 230,
                'name' => 'Tierra del Fuego',
            ),
            
            array (
                'country_id' => 10,
                'id' => 231,
                'name' => 'Tucuman',
            ),
            
            array (
                'country_id' => 11,
                'id' => 232,
                'name' => 'Aragatsotn',
            ),
            
            array (
                'country_id' => 11,
                'id' => 233,
                'name' => 'Ararat',
            ),
            
            array (
                'country_id' => 11,
                'id' => 234,
                'name' => 'Armavir',
            ),
            
            array (
                'country_id' => 11,
                'id' => 235,
                'name' => 'Gegharkunik',
            ),
            
            array (
                'country_id' => 11,
                'id' => 236,
                'name' => 'Kotaik',
            ),
            
            array (
                'country_id' => 11,
                'id' => 237,
                'name' => 'Lori',
            ),
            
            array (
                'country_id' => 11,
                'id' => 238,
                'name' => 'Shirak',
            ),
            
            array (
                'country_id' => 11,
                'id' => 239,
                'name' => 'Stepanakert',
            ),
            
            array (
                'country_id' => 11,
                'id' => 240,
                'name' => 'Syunik',
            ),
            
            array (
                'country_id' => 11,
                'id' => 241,
                'name' => 'Tavush',
            ),
            
            array (
                'country_id' => 11,
                'id' => 242,
                'name' => 'Vayots Dzor',
            ),
            
            array (
                'country_id' => 11,
                'id' => 243,
                'name' => 'Yerevan',
            ),
            
            array (
                'country_id' => 12,
                'id' => 244,
                'name' => 'Aruba',
            ),
            
            array (
                'country_id' => 13,
                'id' => 245,
                'name' => 'Auckland',
            ),
            
            array (
                'country_id' => 13,
                'id' => 246,
                'name' => 'Australian Capital Territory',
            ),
            
            array (
                'country_id' => 13,
                'id' => 247,
                'name' => 'Balgowlah',
            ),
            
            array (
                'country_id' => 13,
                'id' => 248,
                'name' => 'Balmain',
            ),
            
            array (
                'country_id' => 13,
                'id' => 249,
                'name' => 'Bankstown',
            ),
            
            array (
                'country_id' => 13,
                'id' => 250,
                'name' => 'Baulkham Hills',
            ),
            
            array (
                'country_id' => 13,
                'id' => 251,
                'name' => 'Bonnet Bay',
            ),
            
            array (
                'country_id' => 13,
                'id' => 252,
                'name' => 'Camberwell',
            ),
            
            array (
                'country_id' => 13,
                'id' => 253,
                'name' => 'Carole Park',
            ),
            
            array (
                'country_id' => 13,
                'id' => 254,
                'name' => 'Castle Hill',
            ),
            
            array (
                'country_id' => 13,
                'id' => 255,
                'name' => 'Caulfield',
            ),
            
            array (
                'country_id' => 13,
                'id' => 256,
                'name' => 'Chatswood',
            ),
            
            array (
                'country_id' => 13,
                'id' => 257,
                'name' => 'Cheltenham',
            ),
            
            array (
                'country_id' => 13,
                'id' => 258,
                'name' => 'Cherrybrook',
            ),
            
            array (
                'country_id' => 13,
                'id' => 259,
                'name' => 'Clayton',
            ),
            
            array (
                'country_id' => 13,
                'id' => 260,
                'name' => 'Collingwood',
            ),
            
            array (
                'country_id' => 13,
                'id' => 261,
                'name' => 'Frenchs Forest',
            ),
            
            array (
                'country_id' => 13,
                'id' => 262,
                'name' => 'Hawthorn',
            ),
            
            array (
                'country_id' => 13,
                'id' => 263,
                'name' => 'Jannnali',
            ),
            
            array (
                'country_id' => 13,
                'id' => 264,
                'name' => 'Knoxfield',
            ),
            
            array (
                'country_id' => 13,
                'id' => 265,
                'name' => 'Melbourne',
            ),
            
            array (
                'country_id' => 13,
                'id' => 266,
                'name' => 'New South Wales',
            ),
            
            array (
                'country_id' => 13,
                'id' => 267,
                'name' => 'Northern Territory',
            ),
            
            array (
                'country_id' => 13,
                'id' => 268,
                'name' => 'Perth',
            ),
            
            array (
                'country_id' => 13,
                'id' => 269,
                'name' => 'Queensland',
            ),
            
            array (
                'country_id' => 13,
                'id' => 270,
                'name' => 'South Australia',
            ),
            
            array (
                'country_id' => 13,
                'id' => 271,
                'name' => 'Tasmania',
            ),
            
            array (
                'country_id' => 13,
                'id' => 272,
                'name' => 'Templestowe',
            ),
            
            array (
                'country_id' => 13,
                'id' => 273,
                'name' => 'Victoria',
            ),
            
            array (
                'country_id' => 13,
                'id' => 274,
                'name' => 'Werribee south',
            ),
            
            array (
                'country_id' => 13,
                'id' => 275,
                'name' => 'Western Australia',
            ),
            
            array (
                'country_id' => 13,
                'id' => 276,
                'name' => 'Wheeler',
            ),
            
            array (
                'country_id' => 14,
                'id' => 277,
                'name' => 'Bundesland Salzburg',
            ),
            
            array (
                'country_id' => 14,
                'id' => 278,
                'name' => 'Bundesland Steiermark',
            ),
            
            array (
                'country_id' => 14,
                'id' => 279,
                'name' => 'Bundesland Tirol',
            ),
            
            array (
                'country_id' => 14,
                'id' => 280,
                'name' => 'Burgenland',
            ),
            
            array (
                'country_id' => 14,
                'id' => 281,
                'name' => 'Carinthia',
            ),
            
            array (
                'country_id' => 14,
                'id' => 282,
                'name' => 'Karnten',
            ),
            
            array (
                'country_id' => 14,
                'id' => 283,
                'name' => 'Liezen',
            ),
            
            array (
                'country_id' => 14,
                'id' => 284,
                'name' => 'Lower Austria',
            ),
            
            array (
                'country_id' => 14,
                'id' => 285,
                'name' => 'Niederosterreich',
            ),
            
            array (
                'country_id' => 14,
                'id' => 286,
                'name' => 'Oberosterreich',
            ),
            
            array (
                'country_id' => 14,
                'id' => 287,
                'name' => 'Salzburg',
            ),
            
            array (
                'country_id' => 14,
                'id' => 288,
                'name' => 'Schleswig-Holstein',
            ),
            
            array (
                'country_id' => 14,
                'id' => 289,
                'name' => 'Steiermark',
            ),
            
            array (
                'country_id' => 14,
                'id' => 290,
                'name' => 'Styria',
            ),
            
            array (
                'country_id' => 14,
                'id' => 291,
                'name' => 'Tirol',
            ),
            
            array (
                'country_id' => 14,
                'id' => 292,
                'name' => 'Upper Austria',
            ),
            
            array (
                'country_id' => 14,
                'id' => 293,
                'name' => 'Vorarlberg',
            ),
            
            array (
                'country_id' => 14,
                'id' => 294,
                'name' => 'Wien',
            ),
            
            array (
                'country_id' => 15,
                'id' => 295,
                'name' => 'Abseron',
            ),
            
            array (
                'country_id' => 15,
                'id' => 296,
                'name' => 'Baki Sahari',
            ),
            
            array (
                'country_id' => 15,
                'id' => 297,
                'name' => 'Ganca',
            ),
            
            array (
                'country_id' => 15,
                'id' => 298,
                'name' => 'Ganja',
            ),
            
            array (
                'country_id' => 15,
                'id' => 299,
                'name' => 'Kalbacar',
            ),
            
            array (
                'country_id' => 15,
                'id' => 300,
                'name' => 'Lankaran',
            ),
            
            array (
                'country_id' => 15,
                'id' => 301,
                'name' => 'Mil-Qarabax',
            ),
            
            array (
                'country_id' => 15,
                'id' => 302,
                'name' => 'Mugan-Salyan',
            ),
            
            array (
                'country_id' => 15,
                'id' => 303,
                'name' => 'Nagorni-Qarabax',
            ),
            
            array (
                'country_id' => 15,
                'id' => 304,
                'name' => 'Naxcivan',
            ),
            
            array (
                'country_id' => 15,
                'id' => 305,
                'name' => 'Priaraks',
            ),
            
            array (
                'country_id' => 15,
                'id' => 306,
                'name' => 'Qazax',
            ),
            
            array (
                'country_id' => 15,
                'id' => 307,
                'name' => 'Saki',
            ),
            
            array (
                'country_id' => 15,
                'id' => 308,
                'name' => 'Sirvan',
            ),
            
            array (
                'country_id' => 15,
                'id' => 309,
                'name' => 'Xacmaz',
            ),
            
            array (
                'country_id' => 16,
                'id' => 310,
                'name' => 'Abaco',
            ),
            
            array (
                'country_id' => 16,
                'id' => 311,
                'name' => 'Acklins Island',
            ),
            
            array (
                'country_id' => 16,
                'id' => 312,
                'name' => 'Andros',
            ),
            
            array (
                'country_id' => 16,
                'id' => 313,
                'name' => 'Berry Islands',
            ),
            
            array (
                'country_id' => 16,
                'id' => 314,
                'name' => 'Biminis',
            ),
            
            array (
                'country_id' => 16,
                'id' => 315,
                'name' => 'Cat Island',
            ),
            
            array (
                'country_id' => 16,
                'id' => 316,
                'name' => 'Crooked Island',
            ),
            
            array (
                'country_id' => 16,
                'id' => 317,
                'name' => 'Eleuthera',
            ),
            
            array (
                'country_id' => 16,
                'id' => 318,
                'name' => 'Exuma and Cays',
            ),
            
            array (
                'country_id' => 16,
                'id' => 319,
                'name' => 'Grand Bahama',
            ),
            
            array (
                'country_id' => 16,
                'id' => 320,
                'name' => 'Inagua Islands',
            ),
            
            array (
                'country_id' => 16,
                'id' => 321,
                'name' => 'Long Island',
            ),
            
            array (
                'country_id' => 16,
                'id' => 322,
                'name' => 'Mayaguana',
            ),
            
            array (
                'country_id' => 16,
                'id' => 323,
                'name' => 'New Providence',
            ),
            
            array (
                'country_id' => 16,
                'id' => 324,
                'name' => 'Ragged Island',
            ),
            
            array (
                'country_id' => 16,
                'id' => 325,
                'name' => 'Rum Cay',
            ),
            
            array (
                'country_id' => 16,
                'id' => 326,
                'name' => 'San Salvador',
            ),
            
            array (
                'country_id' => 17,
                'id' => 327,
                'name' => '\'Isa',
            ),
            
            array (
                'country_id' => 17,
                'id' => 328,
                'name' => 'Badiyah',
            ),
            
            array (
                'country_id' => 17,
                'id' => 329,
                'name' => 'Hidd',
            ),
            
            array (
                'country_id' => 17,
                'id' => 330,
                'name' => 'Jidd Hafs',
            ),
            
            array (
                'country_id' => 17,
                'id' => 331,
                'name' => 'Mahama',
            ),
            
            array (
                'country_id' => 17,
                'id' => 332,
                'name' => 'Manama',
            ),
            
            array (
                'country_id' => 17,
                'id' => 333,
                'name' => 'Sitrah',
            ),
            
            array (
                'country_id' => 17,
                'id' => 334,
                'name' => 'al-Manamah',
            ),
            
            array (
                'country_id' => 17,
                'id' => 335,
                'name' => 'al-Muharraq',
            ),
            
            array (
                'country_id' => 17,
                'id' => 336,
                'name' => 'ar-Rifa\'a',
            ),
            
            array (
                'country_id' => 18,
                'id' => 337,
                'name' => 'Bagar Hat',
            ),
            
            array (
                'country_id' => 18,
                'id' => 338,
                'name' => 'Bandarban',
            ),
            
            array (
                'country_id' => 18,
                'id' => 339,
                'name' => 'Barguna',
            ),
            
            array (
                'country_id' => 18,
                'id' => 340,
                'name' => 'Barisal',
            ),
            
            array (
                'country_id' => 18,
                'id' => 341,
                'name' => 'Bhola',
            ),
            
            array (
                'country_id' => 18,
                'id' => 342,
                'name' => 'Bogora',
            ),
            
            array (
                'country_id' => 18,
                'id' => 343,
                'name' => 'Brahman Bariya',
            ),
            
            array (
                'country_id' => 18,
                'id' => 344,
                'name' => 'Chandpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 345,
                'name' => 'Chattagam',
            ),
            
            array (
                'country_id' => 18,
                'id' => 346,
                'name' => 'Chittagong Division',
            ),
            
            array (
                'country_id' => 18,
                'id' => 347,
                'name' => 'Chuadanga',
            ),
            
            array (
                'country_id' => 18,
                'id' => 348,
                'name' => 'Dhaka',
            ),
            
            array (
                'country_id' => 18,
                'id' => 349,
                'name' => 'Dinajpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 350,
                'name' => 'Faridpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 351,
                'name' => 'Feni',
            ),
            
            array (
                'country_id' => 18,
                'id' => 352,
                'name' => 'Gaybanda',
            ),
            
            array (
                'country_id' => 18,
                'id' => 353,
                'name' => 'Gazipur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 354,
                'name' => 'Gopalganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 355,
                'name' => 'Habiganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 356,
                'name' => 'Jaipur Hat',
            ),
            
            array (
                'country_id' => 18,
                'id' => 357,
                'name' => 'Jamalpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 358,
                'name' => 'Jessor',
            ),
            
            array (
                'country_id' => 18,
                'id' => 359,
                'name' => 'Jhalakati',
            ),
            
            array (
                'country_id' => 18,
                'id' => 360,
                'name' => 'Jhanaydah',
            ),
            
            array (
                'country_id' => 18,
                'id' => 361,
                'name' => 'Khagrachhari',
            ),
            
            array (
                'country_id' => 18,
                'id' => 362,
                'name' => 'Khulna',
            ),
            
            array (
                'country_id' => 18,
                'id' => 363,
                'name' => 'Kishorganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 364,
                'name' => 'Koks Bazar',
            ),
            
            array (
                'country_id' => 18,
                'id' => 365,
                'name' => 'Komilla',
            ),
            
            array (
                'country_id' => 18,
                'id' => 366,
                'name' => 'Kurigram',
            ),
            
            array (
                'country_id' => 18,
                'id' => 367,
                'name' => 'Kushtiya',
            ),
            
            array (
                'country_id' => 18,
                'id' => 368,
                'name' => 'Lakshmipur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 369,
                'name' => 'Lalmanir Hat',
            ),
            
            array (
                'country_id' => 18,
                'id' => 370,
                'name' => 'Madaripur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 371,
                'name' => 'Magura',
            ),
            
            array (
                'country_id' => 18,
                'id' => 372,
                'name' => 'Maimansingh',
            ),
            
            array (
                'country_id' => 18,
                'id' => 373,
                'name' => 'Manikganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 374,
                'name' => 'Maulvi Bazar',
            ),
            
            array (
                'country_id' => 18,
                'id' => 375,
                'name' => 'Meherpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 376,
                'name' => 'Munshiganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 377,
                'name' => 'Naral',
            ),
            
            array (
                'country_id' => 18,
                'id' => 378,
                'name' => 'Narayanganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 379,
                'name' => 'Narsingdi',
            ),
            
            array (
                'country_id' => 18,
                'id' => 380,
                'name' => 'Nator',
            ),
            
            array (
                'country_id' => 18,
                'id' => 381,
                'name' => 'Naugaon',
            ),
            
            array (
                'country_id' => 18,
                'id' => 382,
                'name' => 'Nawabganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 383,
                'name' => 'Netrakona',
            ),
            
            array (
                'country_id' => 18,
                'id' => 384,
                'name' => 'Nilphamari',
            ),
            
            array (
                'country_id' => 18,
                'id' => 385,
                'name' => 'Noakhali',
            ),
            
            array (
                'country_id' => 18,
                'id' => 386,
                'name' => 'Pabna',
            ),
            
            array (
                'country_id' => 18,
                'id' => 387,
                'name' => 'Panchagarh',
            ),
            
            array (
                'country_id' => 18,
                'id' => 388,
                'name' => 'Patuakhali',
            ),
            
            array (
                'country_id' => 18,
                'id' => 389,
                'name' => 'Pirojpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 390,
                'name' => 'Rajbari',
            ),
            
            array (
                'country_id' => 18,
                'id' => 391,
                'name' => 'Rajshahi',
            ),
            
            array (
                'country_id' => 18,
                'id' => 392,
                'name' => 'Rangamati',
            ),
            
            array (
                'country_id' => 18,
                'id' => 393,
                'name' => 'Rangpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 394,
                'name' => 'Satkhira',
            ),
            
            array (
                'country_id' => 18,
                'id' => 395,
                'name' => 'Shariatpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 396,
                'name' => 'Sherpur',
            ),
            
            array (
                'country_id' => 18,
                'id' => 397,
                'name' => 'Silhat',
            ),
            
            array (
                'country_id' => 18,
                'id' => 398,
                'name' => 'Sirajganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 399,
                'name' => 'Sunamganj',
            ),
            
            array (
                'country_id' => 18,
                'id' => 400,
                'name' => 'Tangayal',
            ),
            
            array (
                'country_id' => 18,
                'id' => 401,
                'name' => 'Thakurgaon',
            ),
            
            array (
                'country_id' => 19,
                'id' => 402,
                'name' => 'Christ Church',
            ),
            
            array (
                'country_id' => 19,
                'id' => 403,
                'name' => 'Saint Andrew',
            ),
            
            array (
                'country_id' => 19,
                'id' => 404,
                'name' => 'Saint George',
            ),
            
            array (
                'country_id' => 19,
                'id' => 405,
                'name' => 'Saint James',
            ),
            
            array (
                'country_id' => 19,
                'id' => 406,
                'name' => 'Saint John',
            ),
            
            array (
                'country_id' => 19,
                'id' => 407,
                'name' => 'Saint Joseph',
            ),
            
            array (
                'country_id' => 19,
                'id' => 408,
                'name' => 'Saint Lucy',
            ),
            
            array (
                'country_id' => 19,
                'id' => 409,
                'name' => 'Saint Michael',
            ),
            
            array (
                'country_id' => 19,
                'id' => 410,
                'name' => 'Saint Peter',
            ),
            
            array (
                'country_id' => 19,
                'id' => 411,
                'name' => 'Saint Philip',
            ),
            
            array (
                'country_id' => 19,
                'id' => 412,
                'name' => 'Saint Thomas',
            ),
            
            array (
                'country_id' => 20,
                'id' => 413,
                'name' => 'Brest',
            ),
            
            array (
                'country_id' => 20,
                'id' => 414,
                'name' => 'Homjel\'',
            ),
            
            array (
                'country_id' => 20,
                'id' => 415,
                'name' => 'Hrodna',
            ),
            
            array (
                'country_id' => 20,
                'id' => 416,
                'name' => 'Mahiljow',
            ),
            
            array (
                'country_id' => 20,
                'id' => 417,
                'name' => 'Mahilyowskaya Voblasts',
            ),
            
            array (
                'country_id' => 20,
                'id' => 418,
                'name' => 'Minsk',
            ),
            
            array (
                'country_id' => 20,
                'id' => 419,
                'name' => 'Minskaja Voblasts\'',
            ),
            
            array (
                'country_id' => 20,
                'id' => 420,
                'name' => 'Petrik',
            ),
            
            array (
                'country_id' => 20,
                'id' => 421,
                'name' => 'Vicebsk',
            ),
            
            array (
                'country_id' => 21,
                'id' => 422,
                'name' => 'Antwerpen',
            ),
            
            array (
                'country_id' => 21,
                'id' => 423,
                'name' => 'Berchem',
            ),
            
            array (
                'country_id' => 21,
                'id' => 424,
                'name' => 'Brabant',
            ),
            
            array (
                'country_id' => 21,
                'id' => 425,
                'name' => 'Brabant Wallon',
            ),
            
            array (
                'country_id' => 21,
                'id' => 426,
                'name' => 'Brussel',
            ),
            
            array (
                'country_id' => 21,
                'id' => 427,
                'name' => 'East Flanders',
            ),
            
            array (
                'country_id' => 21,
                'id' => 428,
                'name' => 'Hainaut',
            ),
            
            array (
                'country_id' => 21,
                'id' => 429,
                'name' => 'Liege',
            ),
            
            array (
                'country_id' => 21,
                'id' => 430,
                'name' => 'Limburg',
            ),
            
            array (
                'country_id' => 21,
                'id' => 431,
                'name' => 'Luxembourg',
            ),
            
            array (
                'country_id' => 21,
                'id' => 432,
                'name' => 'Namur',
            ),
            
            array (
                'country_id' => 21,
                'id' => 433,
                'name' => 'Ontario',
            ),
            
            array (
                'country_id' => 21,
                'id' => 434,
                'name' => 'Oost-Vlaanderen',
            ),
            
            array (
                'country_id' => 21,
                'id' => 435,
                'name' => 'Provincie Brabant',
            ),
            
            array (
                'country_id' => 21,
                'id' => 436,
                'name' => 'Vlaams-Brabant',
            ),
            
            array (
                'country_id' => 21,
                'id' => 437,
                'name' => 'Wallonne',
            ),
            
            array (
                'country_id' => 21,
                'id' => 438,
                'name' => 'West-Vlaanderen',
            ),
            
            array (
                'country_id' => 22,
                'id' => 439,
                'name' => 'Belize',
            ),
            
            array (
                'country_id' => 22,
                'id' => 440,
                'name' => 'Cayo',
            ),
            
            array (
                'country_id' => 22,
                'id' => 441,
                'name' => 'Corozal',
            ),
            
            array (
                'country_id' => 22,
                'id' => 442,
                'name' => 'Orange Walk',
            ),
            
            array (
                'country_id' => 22,
                'id' => 443,
                'name' => 'Stann Creek',
            ),
            
            array (
                'country_id' => 22,
                'id' => 444,
                'name' => 'Toledo',
            ),
            
            array (
                'country_id' => 23,
                'id' => 445,
                'name' => 'Alibori',
            ),
            
            array (
                'country_id' => 23,
                'id' => 446,
                'name' => 'Atacora',
            ),
            
            array (
                'country_id' => 23,
                'id' => 447,
                'name' => 'Atlantique',
            ),
            
            array (
                'country_id' => 23,
                'id' => 448,
                'name' => 'Borgou',
            ),
            
            array (
                'country_id' => 23,
                'id' => 449,
                'name' => 'Collines',
            ),
            
            array (
                'country_id' => 23,
                'id' => 450,
                'name' => 'Couffo',
            ),
            
            array (
                'country_id' => 23,
                'id' => 451,
                'name' => 'Donga',
            ),
            
            array (
                'country_id' => 23,
                'id' => 452,
                'name' => 'Littoral',
            ),
            
            array (
                'country_id' => 23,
                'id' => 453,
                'name' => 'Mono',
            ),
            
            array (
                'country_id' => 23,
                'id' => 454,
                'name' => 'Oueme',
            ),
            
            array (
                'country_id' => 23,
                'id' => 455,
                'name' => 'Plateau',
            ),
            
            array (
                'country_id' => 23,
                'id' => 456,
                'name' => 'Zou',
            ),
            
            array (
                'country_id' => 24,
                'id' => 457,
                'name' => 'Hamilton',
            ),
            
            array (
                'country_id' => 24,
                'id' => 458,
                'name' => 'Saint George',
            ),
            
            array (
                'country_id' => 25,
                'id' => 459,
                'name' => 'Bumthang',
            ),
            
            array (
                'country_id' => 25,
                'id' => 460,
                'name' => 'Chhukha',
            ),
            
            array (
                'country_id' => 25,
                'id' => 461,
                'name' => 'Chirang',
            ),
            
            array (
                'country_id' => 25,
                'id' => 462,
                'name' => 'Daga',
            ),
            
            array (
                'country_id' => 25,
                'id' => 463,
                'name' => 'Geylegphug',
            ),
            
            array (
                'country_id' => 25,
                'id' => 464,
                'name' => 'Ha',
            ),
            
            array (
                'country_id' => 25,
                'id' => 465,
                'name' => 'Lhuntshi',
            ),
            
            array (
                'country_id' => 25,
                'id' => 466,
                'name' => 'Mongar',
            ),
            
            array (
                'country_id' => 25,
                'id' => 467,
                'name' => 'Pemagatsel',
            ),
            
            array (
                'country_id' => 25,
                'id' => 468,
                'name' => 'Punakha',
            ),
            
            array (
                'country_id' => 25,
                'id' => 469,
                'name' => 'Rinpung',
            ),
            
            array (
                'country_id' => 25,
                'id' => 470,
                'name' => 'Samchi',
            ),
            
            array (
                'country_id' => 25,
                'id' => 471,
                'name' => 'Samdrup Jongkhar',
            ),
            
            array (
                'country_id' => 25,
                'id' => 472,
                'name' => 'Shemgang',
            ),
            
            array (
                'country_id' => 25,
                'id' => 473,
                'name' => 'Tashigang',
            ),
            
            array (
                'country_id' => 25,
                'id' => 474,
                'name' => 'Timphu',
            ),
            
            array (
                'country_id' => 25,
                'id' => 475,
                'name' => 'Tongsa',
            ),
            
            array (
                'country_id' => 25,
                'id' => 476,
                'name' => 'Wangdiphodrang',
            ),
            
            array (
                'country_id' => 26,
                'id' => 477,
                'name' => 'Beni',
            ),
            
            array (
                'country_id' => 26,
                'id' => 478,
                'name' => 'Chuquisaca',
            ),
            
            array (
                'country_id' => 26,
                'id' => 479,
                'name' => 'Cochabamba',
            ),
            
            array (
                'country_id' => 26,
                'id' => 480,
                'name' => 'La Paz',
            ),
            
            array (
                'country_id' => 26,
                'id' => 481,
                'name' => 'Oruro',
            ),
            
            array (
                'country_id' => 26,
                'id' => 482,
                'name' => 'Pando',
            ),
            
            array (
                'country_id' => 26,
                'id' => 483,
                'name' => 'Potosi',
            ),
            
            array (
                'country_id' => 26,
                'id' => 484,
                'name' => 'Santa Cruz',
            ),
            
            array (
                'country_id' => 26,
                'id' => 485,
                'name' => 'Tarija',
            ),
            
            array (
                'country_id' => 27,
                'id' => 486,
                'name' => 'Federacija Bosna i Hercegovina',
            ),
            
            array (
                'country_id' => 27,
                'id' => 487,
                'name' => 'Republika Srpska',
            ),
            
            array (
                'country_id' => 28,
                'id' => 488,
                'name' => 'Central Bobonong',
            ),
            
            array (
                'country_id' => 28,
                'id' => 489,
                'name' => 'Central Boteti',
            ),
            
            array (
                'country_id' => 28,
                'id' => 490,
                'name' => 'Central Mahalapye',
            ),
            
            array (
                'country_id' => 28,
                'id' => 491,
                'name' => 'Central Serowe-Palapye',
            ),
            
            array (
                'country_id' => 28,
                'id' => 492,
                'name' => 'Central Tutume',
            ),
            
            array (
                'country_id' => 28,
                'id' => 493,
                'name' => 'Chobe',
            ),
            
            array (
                'country_id' => 28,
                'id' => 494,
                'name' => 'Francistown',
            ),
            
            array (
                'country_id' => 28,
                'id' => 495,
                'name' => 'Gaborone',
            ),
            
            array (
                'country_id' => 28,
                'id' => 496,
                'name' => 'Ghanzi',
            ),
            
            array (
                'country_id' => 28,
                'id' => 497,
                'name' => 'Jwaneng',
            ),
            
            array (
                'country_id' => 28,
                'id' => 498,
                'name' => 'Kgalagadi North',
            ),
            
            array (
                'country_id' => 28,
                'id' => 499,
                'name' => 'Kgalagadi South',
            ),
            
            array (
                'country_id' => 28,
                'id' => 500,
                'name' => 'Kgatleng',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 28,
                'id' => 501,
                'name' => 'Kweneng',
            ),
            
            array (
                'country_id' => 28,
                'id' => 502,
                'name' => 'Lobatse',
            ),
            
            array (
                'country_id' => 28,
                'id' => 503,
                'name' => 'Ngamiland',
            ),
            
            array (
                'country_id' => 28,
                'id' => 504,
                'name' => 'Ngwaketse',
            ),
            
            array (
                'country_id' => 28,
                'id' => 505,
                'name' => 'North East',
            ),
            
            array (
                'country_id' => 28,
                'id' => 506,
                'name' => 'Okavango',
            ),
            
            array (
                'country_id' => 28,
                'id' => 507,
                'name' => 'Orapa',
            ),
            
            array (
                'country_id' => 28,
                'id' => 508,
                'name' => 'Selibe Phikwe',
            ),
            
            array (
                'country_id' => 28,
                'id' => 509,
                'name' => 'South East',
            ),
            
            array (
                'country_id' => 28,
                'id' => 510,
                'name' => 'Sowa',
            ),
            
            array (
                'country_id' => 29,
                'id' => 511,
                'name' => 'Bouvet Island',
            ),
            
            array (
                'country_id' => 30,
                'id' => 512,
                'name' => 'Acre',
            ),
            
            array (
                'country_id' => 30,
                'id' => 513,
                'name' => 'Alagoas',
            ),
            
            array (
                'country_id' => 30,
                'id' => 514,
                'name' => 'Amapa',
            ),
            
            array (
                'country_id' => 30,
                'id' => 515,
                'name' => 'Amazonas',
            ),
            
            array (
                'country_id' => 30,
                'id' => 516,
                'name' => 'Bahia',
            ),
            
            array (
                'country_id' => 30,
                'id' => 517,
                'name' => 'Ceara',
            ),
            
            array (
                'country_id' => 30,
                'id' => 518,
                'name' => 'Distrito Federal',
            ),
            
            array (
                'country_id' => 30,
                'id' => 519,
                'name' => 'Espirito Santo',
            ),
            
            array (
                'country_id' => 30,
                'id' => 520,
                'name' => 'Estado de Sao Paulo',
            ),
            
            array (
                'country_id' => 30,
                'id' => 521,
                'name' => 'Goias',
            ),
            
            array (
                'country_id' => 30,
                'id' => 522,
                'name' => 'Maranhao',
            ),
            
            array (
                'country_id' => 30,
                'id' => 523,
                'name' => 'Mato Grosso',
            ),
            
            array (
                'country_id' => 30,
                'id' => 524,
                'name' => 'Mato Grosso do Sul',
            ),
            
            array (
                'country_id' => 30,
                'id' => 525,
                'name' => 'Minas Gerais',
            ),
            
            array (
                'country_id' => 30,
                'id' => 526,
                'name' => 'Para',
            ),
            
            array (
                'country_id' => 30,
                'id' => 527,
                'name' => 'Paraiba',
            ),
            
            array (
                'country_id' => 30,
                'id' => 528,
                'name' => 'Parana',
            ),
            
            array (
                'country_id' => 30,
                'id' => 529,
                'name' => 'Pernambuco',
            ),
            
            array (
                'country_id' => 30,
                'id' => 530,
                'name' => 'Piaui',
            ),
            
            array (
                'country_id' => 30,
                'id' => 531,
                'name' => 'Rio Grande do Norte',
            ),
            
            array (
                'country_id' => 30,
                'id' => 532,
                'name' => 'Rio Grande do Sul',
            ),
            
            array (
                'country_id' => 30,
                'id' => 533,
                'name' => 'Rio de Janeiro',
            ),
            
            array (
                'country_id' => 30,
                'id' => 534,
                'name' => 'Rondonia',
            ),
            
            array (
                'country_id' => 30,
                'id' => 535,
                'name' => 'Roraima',
            ),
            
            array (
                'country_id' => 30,
                'id' => 536,
                'name' => 'Santa Catarina',
            ),
            
            array (
                'country_id' => 30,
                'id' => 537,
                'name' => 'Sao Paulo',
            ),
            
            array (
                'country_id' => 30,
                'id' => 538,
                'name' => 'Sergipe',
            ),
            
            array (
                'country_id' => 30,
                'id' => 539,
                'name' => 'Tocantins',
            ),
            
            array (
                'country_id' => 31,
                'id' => 540,
                'name' => 'British Indian Ocean Territory',
            ),
            
            array (
                'country_id' => 32,
                'id' => 541,
                'name' => 'Belait',
            ),
            
            array (
                'country_id' => 32,
                'id' => 542,
                'name' => 'Brunei-Muara',
            ),
            
            array (
                'country_id' => 32,
                'id' => 543,
                'name' => 'Temburong',
            ),
            
            array (
                'country_id' => 32,
                'id' => 544,
                'name' => 'Tutong',
            ),
            
            array (
                'country_id' => 33,
                'id' => 545,
                'name' => 'Blagoevgrad',
            ),
            
            array (
                'country_id' => 33,
                'id' => 546,
                'name' => 'Burgas',
            ),
            
            array (
                'country_id' => 33,
                'id' => 547,
                'name' => 'Dobrich',
            ),
            
            array (
                'country_id' => 33,
                'id' => 548,
                'name' => 'Gabrovo',
            ),
            
            array (
                'country_id' => 33,
                'id' => 549,
                'name' => 'Haskovo',
            ),
            
            array (
                'country_id' => 33,
                'id' => 550,
                'name' => 'Jambol',
            ),
            
            array (
                'country_id' => 33,
                'id' => 551,
                'name' => 'Kardzhali',
            ),
            
            array (
                'country_id' => 33,
                'id' => 552,
                'name' => 'Kjustendil',
            ),
            
            array (
                'country_id' => 33,
                'id' => 553,
                'name' => 'Lovech',
            ),
            
            array (
                'country_id' => 33,
                'id' => 554,
                'name' => 'Montana',
            ),
            
            array (
                'country_id' => 33,
                'id' => 555,
                'name' => 'Oblast Sofiya-Grad',
            ),
            
            array (
                'country_id' => 33,
                'id' => 556,
                'name' => 'Pazardzhik',
            ),
            
            array (
                'country_id' => 33,
                'id' => 557,
                'name' => 'Pernik',
            ),
            
            array (
                'country_id' => 33,
                'id' => 558,
                'name' => 'Pleven',
            ),
            
            array (
                'country_id' => 33,
                'id' => 559,
                'name' => 'Plovdiv',
            ),
            
            array (
                'country_id' => 33,
                'id' => 560,
                'name' => 'Razgrad',
            ),
            
            array (
                'country_id' => 33,
                'id' => 561,
                'name' => 'Ruse',
            ),
            
            array (
                'country_id' => 33,
                'id' => 562,
                'name' => 'Shumen',
            ),
            
            array (
                'country_id' => 33,
                'id' => 563,
                'name' => 'Silistra',
            ),
            
            array (
                'country_id' => 33,
                'id' => 564,
                'name' => 'Sliven',
            ),
            
            array (
                'country_id' => 33,
                'id' => 565,
                'name' => 'Smoljan',
            ),
            
            array (
                'country_id' => 33,
                'id' => 566,
                'name' => 'Sofija grad',
            ),
            
            array (
                'country_id' => 33,
                'id' => 567,
                'name' => 'Sofijska oblast',
            ),
            
            array (
                'country_id' => 33,
                'id' => 568,
                'name' => 'Stara Zagora',
            ),
            
            array (
                'country_id' => 33,
                'id' => 569,
                'name' => 'Targovishte',
            ),
            
            array (
                'country_id' => 33,
                'id' => 570,
                'name' => 'Varna',
            ),
            
            array (
                'country_id' => 33,
                'id' => 571,
                'name' => 'Veliko Tarnovo',
            ),
            
            array (
                'country_id' => 33,
                'id' => 572,
                'name' => 'Vidin',
            ),
            
            array (
                'country_id' => 33,
                'id' => 573,
                'name' => 'Vraca',
            ),
            
            array (
                'country_id' => 33,
                'id' => 574,
                'name' => 'Yablaniza',
            ),
            
            array (
                'country_id' => 34,
                'id' => 575,
                'name' => 'Bale',
            ),
            
            array (
                'country_id' => 34,
                'id' => 576,
                'name' => 'Bam',
            ),
            
            array (
                'country_id' => 34,
                'id' => 577,
                'name' => 'Bazega',
            ),
            
            array (
                'country_id' => 34,
                'id' => 578,
                'name' => 'Bougouriba',
            ),
            
            array (
                'country_id' => 34,
                'id' => 579,
                'name' => 'Boulgou',
            ),
            
            array (
                'country_id' => 34,
                'id' => 580,
                'name' => 'Boulkiemde',
            ),
            
            array (
                'country_id' => 34,
                'id' => 581,
                'name' => 'Comoe',
            ),
            
            array (
                'country_id' => 34,
                'id' => 582,
                'name' => 'Ganzourgou',
            ),
            
            array (
                'country_id' => 34,
                'id' => 583,
                'name' => 'Gnagna',
            ),
            
            array (
                'country_id' => 34,
                'id' => 584,
                'name' => 'Gourma',
            ),
            
            array (
                'country_id' => 34,
                'id' => 585,
                'name' => 'Houet',
            ),
            
            array (
                'country_id' => 34,
                'id' => 586,
                'name' => 'Ioba',
            ),
            
            array (
                'country_id' => 34,
                'id' => 587,
                'name' => 'Kadiogo',
            ),
            
            array (
                'country_id' => 34,
                'id' => 588,
                'name' => 'Kenedougou',
            ),
            
            array (
                'country_id' => 34,
                'id' => 589,
                'name' => 'Komandjari',
            ),
            
            array (
                'country_id' => 34,
                'id' => 590,
                'name' => 'Kompienga',
            ),
            
            array (
                'country_id' => 34,
                'id' => 591,
                'name' => 'Kossi',
            ),
            
            array (
                'country_id' => 34,
                'id' => 592,
                'name' => 'Kouritenga',
            ),
            
            array (
                'country_id' => 34,
                'id' => 593,
                'name' => 'Kourweogo',
            ),
            
            array (
                'country_id' => 34,
                'id' => 594,
                'name' => 'Leraba',
            ),
            
            array (
                'country_id' => 34,
                'id' => 595,
                'name' => 'Mouhoun',
            ),
            
            array (
                'country_id' => 34,
                'id' => 596,
                'name' => 'Nahouri',
            ),
            
            array (
                'country_id' => 34,
                'id' => 597,
                'name' => 'Namentenga',
            ),
            
            array (
                'country_id' => 34,
                'id' => 598,
                'name' => 'Noumbiel',
            ),
            
            array (
                'country_id' => 34,
                'id' => 599,
                'name' => 'Oubritenga',
            ),
            
            array (
                'country_id' => 34,
                'id' => 600,
                'name' => 'Oudalan',
            ),
            
            array (
                'country_id' => 34,
                'id' => 601,
                'name' => 'Passore',
            ),
            
            array (
                'country_id' => 34,
                'id' => 602,
                'name' => 'Poni',
            ),
            
            array (
                'country_id' => 34,
                'id' => 603,
                'name' => 'Sanguie',
            ),
            
            array (
                'country_id' => 34,
                'id' => 604,
                'name' => 'Sanmatenga',
            ),
            
            array (
                'country_id' => 34,
                'id' => 605,
                'name' => 'Seno',
            ),
            
            array (
                'country_id' => 34,
                'id' => 606,
                'name' => 'Sissili',
            ),
            
            array (
                'country_id' => 34,
                'id' => 607,
                'name' => 'Soum',
            ),
            
            array (
                'country_id' => 34,
                'id' => 608,
                'name' => 'Sourou',
            ),
            
            array (
                'country_id' => 34,
                'id' => 609,
                'name' => 'Tapoa',
            ),
            
            array (
                'country_id' => 34,
                'id' => 610,
                'name' => 'Tuy',
            ),
            
            array (
                'country_id' => 34,
                'id' => 611,
                'name' => 'Yatenga',
            ),
            
            array (
                'country_id' => 34,
                'id' => 612,
                'name' => 'Zondoma',
            ),
            
            array (
                'country_id' => 34,
                'id' => 613,
                'name' => 'Zoundweogo',
            ),
            
            array (
                'country_id' => 35,
                'id' => 614,
                'name' => 'Bubanza',
            ),
            
            array (
                'country_id' => 35,
                'id' => 615,
                'name' => 'Bujumbura',
            ),
            
            array (
                'country_id' => 35,
                'id' => 616,
                'name' => 'Bururi',
            ),
            
            array (
                'country_id' => 35,
                'id' => 617,
                'name' => 'Cankuzo',
            ),
            
            array (
                'country_id' => 35,
                'id' => 618,
                'name' => 'Cibitoke',
            ),
            
            array (
                'country_id' => 35,
                'id' => 619,
                'name' => 'Gitega',
            ),
            
            array (
                'country_id' => 35,
                'id' => 620,
                'name' => 'Karuzi',
            ),
            
            array (
                'country_id' => 35,
                'id' => 621,
                'name' => 'Kayanza',
            ),
            
            array (
                'country_id' => 35,
                'id' => 622,
                'name' => 'Kirundo',
            ),
            
            array (
                'country_id' => 35,
                'id' => 623,
                'name' => 'Makamba',
            ),
            
            array (
                'country_id' => 35,
                'id' => 624,
                'name' => 'Muramvya',
            ),
            
            array (
                'country_id' => 35,
                'id' => 625,
                'name' => 'Muyinga',
            ),
            
            array (
                'country_id' => 35,
                'id' => 626,
                'name' => 'Ngozi',
            ),
            
            array (
                'country_id' => 35,
                'id' => 627,
                'name' => 'Rutana',
            ),
            
            array (
                'country_id' => 35,
                'id' => 628,
                'name' => 'Ruyigi',
            ),
            
            array (
                'country_id' => 36,
                'id' => 629,
                'name' => 'Banteay Mean Chey',
            ),
            
            array (
                'country_id' => 36,
                'id' => 630,
                'name' => 'Bat Dambang',
            ),
            
            array (
                'country_id' => 36,
                'id' => 631,
                'name' => 'Kampong Cham',
            ),
            
            array (
                'country_id' => 36,
                'id' => 632,
                'name' => 'Kampong Chhnang',
            ),
            
            array (
                'country_id' => 36,
                'id' => 633,
                'name' => 'Kampong Spoeu',
            ),
            
            array (
                'country_id' => 36,
                'id' => 634,
                'name' => 'Kampong Thum',
            ),
            
            array (
                'country_id' => 36,
                'id' => 635,
                'name' => 'Kampot',
            ),
            
            array (
                'country_id' => 36,
                'id' => 636,
                'name' => 'Kandal',
            ),
            
            array (
                'country_id' => 36,
                'id' => 637,
                'name' => 'Kaoh Kong',
            ),
            
            array (
                'country_id' => 36,
                'id' => 638,
                'name' => 'Kracheh',
            ),
            
            array (
                'country_id' => 36,
                'id' => 639,
                'name' => 'Krong Kaeb',
            ),
            
            array (
                'country_id' => 36,
                'id' => 640,
                'name' => 'Krong Pailin',
            ),
            
            array (
                'country_id' => 36,
                'id' => 641,
                'name' => 'Krong Preah Sihanouk',
            ),
            
            array (
                'country_id' => 36,
                'id' => 642,
                'name' => 'Mondol Kiri',
            ),
            
            array (
                'country_id' => 36,
                'id' => 643,
                'name' => 'Otdar Mean Chey',
            ),
            
            array (
                'country_id' => 36,
                'id' => 644,
                'name' => 'Phnum Penh',
            ),
            
            array (
                'country_id' => 36,
                'id' => 645,
                'name' => 'Pousat',
            ),
            
            array (
                'country_id' => 36,
                'id' => 646,
                'name' => 'Preah Vihear',
            ),
            
            array (
                'country_id' => 36,
                'id' => 647,
                'name' => 'Prey Veaeng',
            ),
            
            array (
                'country_id' => 36,
                'id' => 648,
                'name' => 'Rotanak Kiri',
            ),
            
            array (
                'country_id' => 36,
                'id' => 649,
                'name' => 'Siem Reab',
            ),
            
            array (
                'country_id' => 36,
                'id' => 650,
                'name' => 'Stueng Traeng',
            ),
            
            array (
                'country_id' => 36,
                'id' => 651,
                'name' => 'Svay Rieng',
            ),
            
            array (
                'country_id' => 36,
                'id' => 652,
                'name' => 'Takaev',
            ),
            
            array (
                'country_id' => 37,
                'id' => 653,
                'name' => 'Adamaoua',
            ),
            
            array (
                'country_id' => 37,
                'id' => 654,
                'name' => 'Centre',
            ),
            
            array (
                'country_id' => 37,
                'id' => 655,
                'name' => 'Est',
            ),
            
            array (
                'country_id' => 37,
                'id' => 656,
                'name' => 'Littoral',
            ),
            
            array (
                'country_id' => 37,
                'id' => 657,
                'name' => 'Nord',
            ),
            
            array (
                'country_id' => 37,
                'id' => 658,
                'name' => 'Nord Extreme',
            ),
            
            array (
                'country_id' => 37,
                'id' => 659,
                'name' => 'Nordouest',
            ),
            
            array (
                'country_id' => 37,
                'id' => 660,
                'name' => 'Ouest',
            ),
            
            array (
                'country_id' => 37,
                'id' => 661,
                'name' => 'Sud',
            ),
            
            array (
                'country_id' => 37,
                'id' => 662,
                'name' => 'Sudouest',
            ),
            
            array (
                'country_id' => 38,
                'id' => 663,
                'name' => 'Alberta',
            ),
            
            array (
                'country_id' => 38,
                'id' => 664,
                'name' => 'British Columbia',
            ),
            
            array (
                'country_id' => 38,
                'id' => 665,
                'name' => 'Manitoba',
            ),
            
            array (
                'country_id' => 38,
                'id' => 666,
                'name' => 'New Brunswick',
            ),
            
            array (
                'country_id' => 38,
                'id' => 667,
                'name' => 'Newfoundland and Labrador',
            ),
            
            array (
                'country_id' => 38,
                'id' => 668,
                'name' => 'Northwest Territories',
            ),
            
            array (
                'country_id' => 38,
                'id' => 669,
                'name' => 'Nova Scotia',
            ),
            
            array (
                'country_id' => 38,
                'id' => 670,
                'name' => 'Nunavut',
            ),
            
            array (
                'country_id' => 38,
                'id' => 671,
                'name' => 'Ontario',
            ),
            
            array (
                'country_id' => 38,
                'id' => 672,
                'name' => 'Prince Edward Island',
            ),
            
            array (
                'country_id' => 38,
                'id' => 673,
                'name' => 'Quebec',
            ),
            
            array (
                'country_id' => 38,
                'id' => 674,
                'name' => 'Saskatchewan',
            ),
            
            array (
                'country_id' => 38,
                'id' => 675,
                'name' => 'Yukon',
            ),
            
            array (
                'country_id' => 39,
                'id' => 676,
                'name' => 'Boavista',
            ),
            
            array (
                'country_id' => 39,
                'id' => 677,
                'name' => 'Brava',
            ),
            
            array (
                'country_id' => 39,
                'id' => 678,
                'name' => 'Fogo',
            ),
            
            array (
                'country_id' => 39,
                'id' => 679,
                'name' => 'Maio',
            ),
            
            array (
                'country_id' => 39,
                'id' => 680,
                'name' => 'Sal',
            ),
            
            array (
                'country_id' => 39,
                'id' => 681,
                'name' => 'Santo Antao',
            ),
            
            array (
                'country_id' => 39,
                'id' => 682,
                'name' => 'Sao Nicolau',
            ),
            
            array (
                'country_id' => 39,
                'id' => 683,
                'name' => 'Sao Tiago',
            ),
            
            array (
                'country_id' => 39,
                'id' => 684,
                'name' => 'Sao Vicente',
            ),
            
            array (
                'country_id' => 40,
                'id' => 685,
                'name' => 'Grand Cayman',
            ),
            
            array (
                'country_id' => 41,
                'id' => 686,
                'name' => 'Bamingui-Bangoran',
            ),
            
            array (
                'country_id' => 41,
                'id' => 687,
                'name' => 'Bangui',
            ),
            
            array (
                'country_id' => 41,
                'id' => 688,
                'name' => 'Basse-Kotto',
            ),
            
            array (
                'country_id' => 41,
                'id' => 689,
                'name' => 'Haut-Mbomou',
            ),
            
            array (
                'country_id' => 41,
                'id' => 690,
                'name' => 'Haute-Kotto',
            ),
            
            array (
                'country_id' => 41,
                'id' => 691,
                'name' => 'Kemo',
            ),
            
            array (
                'country_id' => 41,
                'id' => 692,
                'name' => 'Lobaye',
            ),
            
            array (
                'country_id' => 41,
                'id' => 693,
                'name' => 'Mambere-Kadei',
            ),
            
            array (
                'country_id' => 41,
                'id' => 694,
                'name' => 'Mbomou',
            ),
            
            array (
                'country_id' => 41,
                'id' => 695,
                'name' => 'Nana-Gribizi',
            ),
            
            array (
                'country_id' => 41,
                'id' => 696,
                'name' => 'Nana-Mambere',
            ),
            
            array (
                'country_id' => 41,
                'id' => 697,
                'name' => 'Ombella Mpoko',
            ),
            
            array (
                'country_id' => 41,
                'id' => 698,
                'name' => 'Ouaka',
            ),
            
            array (
                'country_id' => 41,
                'id' => 699,
                'name' => 'Ouham',
            ),
            
            array (
                'country_id' => 41,
                'id' => 700,
                'name' => 'Ouham-Pende',
            ),
            
            array (
                'country_id' => 41,
                'id' => 701,
                'name' => 'Sangha-Mbaere',
            ),
            
            array (
                'country_id' => 41,
                'id' => 702,
                'name' => 'Vakaga',
            ),
            
            array (
                'country_id' => 42,
                'id' => 703,
                'name' => 'Batha',
            ),
            
            array (
                'country_id' => 42,
                'id' => 704,
                'name' => 'Biltine',
            ),
            
            array (
                'country_id' => 42,
                'id' => 705,
                'name' => 'Bourkou-Ennedi-Tibesti',
            ),
            
            array (
                'country_id' => 42,
                'id' => 706,
                'name' => 'Chari-Baguirmi',
            ),
            
            array (
                'country_id' => 42,
                'id' => 707,
                'name' => 'Guera',
            ),
            
            array (
                'country_id' => 42,
                'id' => 708,
                'name' => 'Kanem',
            ),
            
            array (
                'country_id' => 42,
                'id' => 709,
                'name' => 'Lac',
            ),
            
            array (
                'country_id' => 42,
                'id' => 710,
                'name' => 'Logone Occidental',
            ),
            
            array (
                'country_id' => 42,
                'id' => 711,
                'name' => 'Logone Oriental',
            ),
            
            array (
                'country_id' => 42,
                'id' => 712,
                'name' => 'Mayo-Kebbi',
            ),
            
            array (
                'country_id' => 42,
                'id' => 713,
                'name' => 'Moyen-Chari',
            ),
            
            array (
                'country_id' => 42,
                'id' => 714,
                'name' => 'Ouaddai',
            ),
            
            array (
                'country_id' => 42,
                'id' => 715,
                'name' => 'Salamat',
            ),
            
            array (
                'country_id' => 42,
                'id' => 716,
                'name' => 'Tandjile',
            ),
            
            array (
                'country_id' => 43,
                'id' => 717,
                'name' => 'Aisen',
            ),
            
            array (
                'country_id' => 43,
                'id' => 718,
                'name' => 'Antofagasta',
            ),
            
            array (
                'country_id' => 43,
                'id' => 719,
                'name' => 'Araucania',
            ),
            
            array (
                'country_id' => 43,
                'id' => 720,
                'name' => 'Atacama',
            ),
            
            array (
                'country_id' => 43,
                'id' => 721,
                'name' => 'Bio Bio',
            ),
            
            array (
                'country_id' => 43,
                'id' => 722,
                'name' => 'Coquimbo',
            ),
            
            array (
                'country_id' => 43,
                'id' => 723,
                'name' => 'Libertador General Bernardo O\'',
            ),
            
            array (
                'country_id' => 43,
                'id' => 724,
                'name' => 'Los Lagos',
            ),
            
            array (
                'country_id' => 43,
                'id' => 725,
                'name' => 'Magellanes',
            ),
            
            array (
                'country_id' => 43,
                'id' => 726,
                'name' => 'Maule',
            ),
            
            array (
                'country_id' => 43,
                'id' => 727,
                'name' => 'Metropolitana',
            ),
            
            array (
                'country_id' => 43,
                'id' => 728,
                'name' => 'Metropolitana de Santiago',
            ),
            
            array (
                'country_id' => 43,
                'id' => 729,
                'name' => 'Tarapaca',
            ),
            
            array (
                'country_id' => 43,
                'id' => 730,
                'name' => 'Valparaiso',
            ),
            
            array (
                'country_id' => 44,
                'id' => 731,
                'name' => 'Anhui',
            ),
            
            array (
                'country_id' => 44,
                'id' => 732,
                'name' => 'Anhui Province',
            ),
            
            array (
                'country_id' => 44,
                'id' => 733,
                'name' => 'Anhui Sheng',
            ),
            
            array (
                'country_id' => 44,
                'id' => 734,
                'name' => 'Aomen',
            ),
            
            array (
                'country_id' => 44,
                'id' => 735,
                'name' => 'Beijing',
            ),
            
            array (
                'country_id' => 44,
                'id' => 736,
                'name' => 'Beijing Shi',
            ),
            
            array (
                'country_id' => 44,
                'id' => 737,
                'name' => 'Chongqing',
            ),
            
            array (
                'country_id' => 44,
                'id' => 738,
                'name' => 'Fujian',
            ),
            
            array (
                'country_id' => 44,
                'id' => 739,
                'name' => 'Fujian Sheng',
            ),
            
            array (
                'country_id' => 44,
                'id' => 740,
                'name' => 'Gansu',
            ),
            
            array (
                'country_id' => 44,
                'id' => 741,
                'name' => 'Guangdong',
            ),
            
            array (
                'country_id' => 44,
                'id' => 742,
                'name' => 'Guangdong Sheng',
            ),
            
            array (
                'country_id' => 44,
                'id' => 743,
                'name' => 'Guangxi',
            ),
            
            array (
                'country_id' => 44,
                'id' => 744,
                'name' => 'Guizhou',
            ),
            
            array (
                'country_id' => 44,
                'id' => 745,
                'name' => 'Hainan',
            ),
            
            array (
                'country_id' => 44,
                'id' => 746,
                'name' => 'Hebei',
            ),
            
            array (
                'country_id' => 44,
                'id' => 747,
                'name' => 'Heilongjiang',
            ),
            
            array (
                'country_id' => 44,
                'id' => 748,
                'name' => 'Henan',
            ),
            
            array (
                'country_id' => 44,
                'id' => 749,
                'name' => 'Hubei',
            ),
            
            array (
                'country_id' => 44,
                'id' => 750,
                'name' => 'Hunan',
            ),
            
            array (
                'country_id' => 44,
                'id' => 751,
                'name' => 'Jiangsu',
            ),
            
            array (
                'country_id' => 44,
                'id' => 752,
                'name' => 'Jiangsu Sheng',
            ),
            
            array (
                'country_id' => 44,
                'id' => 753,
                'name' => 'Jiangxi',
            ),
            
            array (
                'country_id' => 44,
                'id' => 754,
                'name' => 'Jilin',
            ),
            
            array (
                'country_id' => 44,
                'id' => 755,
                'name' => 'Liaoning',
            ),
            
            array (
                'country_id' => 44,
                'id' => 756,
                'name' => 'Liaoning Sheng',
            ),
            
            array (
                'country_id' => 44,
                'id' => 757,
                'name' => 'Nei Monggol',
            ),
            
            array (
                'country_id' => 44,
                'id' => 758,
                'name' => 'Ningxia Hui',
            ),
            
            array (
                'country_id' => 44,
                'id' => 759,
                'name' => 'Qinghai',
            ),
            
            array (
                'country_id' => 44,
                'id' => 760,
                'name' => 'Shaanxi',
            ),
            
            array (
                'country_id' => 44,
                'id' => 761,
                'name' => 'Shandong',
            ),
            
            array (
                'country_id' => 44,
                'id' => 762,
                'name' => 'Shandong Sheng',
            ),
            
            array (
                'country_id' => 44,
                'id' => 763,
                'name' => 'Shanghai',
            ),
            
            array (
                'country_id' => 44,
                'id' => 764,
                'name' => 'Shanxi',
            ),
            
            array (
                'country_id' => 44,
                'id' => 765,
                'name' => 'Sichuan',
            ),
            
            array (
                'country_id' => 44,
                'id' => 766,
                'name' => 'Tianjin',
            ),
            
            array (
                'country_id' => 44,
                'id' => 767,
                'name' => 'Xianggang',
            ),
            
            array (
                'country_id' => 44,
                'id' => 768,
                'name' => 'Xinjiang',
            ),
            
            array (
                'country_id' => 44,
                'id' => 769,
                'name' => 'Xizang',
            ),
            
            array (
                'country_id' => 44,
                'id' => 770,
                'name' => 'Yunnan',
            ),
            
            array (
                'country_id' => 44,
                'id' => 771,
                'name' => 'Zhejiang',
            ),
            
            array (
                'country_id' => 44,
                'id' => 772,
                'name' => 'Zhejiang Sheng',
            ),
            
            array (
                'country_id' => 45,
                'id' => 773,
                'name' => 'Christmas Island',
            ),
            
            array (
                'country_id' => 46,
                'id' => 774,
            'name' => 'Cocos (Keeling) Islands',
            ),
            
            array (
                'country_id' => 47,
                'id' => 775,
                'name' => 'Amazonas',
            ),
            
            array (
                'country_id' => 47,
                'id' => 776,
                'name' => 'Antioquia',
            ),
            
            array (
                'country_id' => 47,
                'id' => 777,
                'name' => 'Arauca',
            ),
            
            array (
                'country_id' => 47,
                'id' => 778,
                'name' => 'Atlantico',
            ),
            
            array (
                'country_id' => 47,
                'id' => 779,
                'name' => 'Bogota',
            ),
            
            array (
                'country_id' => 47,
                'id' => 780,
                'name' => 'Bolivar',
            ),
            
            array (
                'country_id' => 47,
                'id' => 781,
                'name' => 'Boyaca',
            ),
            
            array (
                'country_id' => 47,
                'id' => 782,
                'name' => 'Caldas',
            ),
            
            array (
                'country_id' => 47,
                'id' => 783,
                'name' => 'Caqueta',
            ),
            
            array (
                'country_id' => 47,
                'id' => 784,
                'name' => 'Casanare',
            ),
            
            array (
                'country_id' => 47,
                'id' => 785,
                'name' => 'Cauca',
            ),
            
            array (
                'country_id' => 47,
                'id' => 786,
                'name' => 'Cesar',
            ),
            
            array (
                'country_id' => 47,
                'id' => 787,
                'name' => 'Choco',
            ),
            
            array (
                'country_id' => 47,
                'id' => 788,
                'name' => 'Cordoba',
            ),
            
            array (
                'country_id' => 47,
                'id' => 789,
                'name' => 'Cundinamarca',
            ),
            
            array (
                'country_id' => 47,
                'id' => 790,
                'name' => 'Guainia',
            ),
            
            array (
                'country_id' => 47,
                'id' => 791,
                'name' => 'Guaviare',
            ),
            
            array (
                'country_id' => 47,
                'id' => 792,
                'name' => 'Huila',
            ),
            
            array (
                'country_id' => 47,
                'id' => 793,
                'name' => 'La Guajira',
            ),
            
            array (
                'country_id' => 47,
                'id' => 794,
                'name' => 'Magdalena',
            ),
            
            array (
                'country_id' => 47,
                'id' => 795,
                'name' => 'Meta',
            ),
            
            array (
                'country_id' => 47,
                'id' => 796,
                'name' => 'Narino',
            ),
            
            array (
                'country_id' => 47,
                'id' => 797,
                'name' => 'Norte de Santander',
            ),
            
            array (
                'country_id' => 47,
                'id' => 798,
                'name' => 'Putumayo',
            ),
            
            array (
                'country_id' => 47,
                'id' => 799,
                'name' => 'Quindio',
            ),
            
            array (
                'country_id' => 47,
                'id' => 800,
                'name' => 'Risaralda',
            ),
            
            array (
                'country_id' => 47,
                'id' => 801,
                'name' => 'San Andres y Providencia',
            ),
            
            array (
                'country_id' => 47,
                'id' => 802,
                'name' => 'Santander',
            ),
            
            array (
                'country_id' => 47,
                'id' => 803,
                'name' => 'Sucre',
            ),
            
            array (
                'country_id' => 47,
                'id' => 804,
                'name' => 'Tolima',
            ),
            
            array (
                'country_id' => 47,
                'id' => 805,
                'name' => 'Valle del Cauca',
            ),
            
            array (
                'country_id' => 47,
                'id' => 806,
                'name' => 'Vaupes',
            ),
            
            array (
                'country_id' => 47,
                'id' => 807,
                'name' => 'Vichada',
            ),
            
            array (
                'country_id' => 48,
                'id' => 808,
                'name' => 'Mwali',
            ),
            
            array (
                'country_id' => 48,
                'id' => 809,
                'name' => 'Njazidja',
            ),
            
            array (
                'country_id' => 48,
                'id' => 810,
                'name' => 'Nzwani',
            ),
            
            array (
                'country_id' => 49,
                'id' => 811,
                'name' => 'Bouenza',
            ),
            
            array (
                'country_id' => 49,
                'id' => 812,
                'name' => 'Brazzaville',
            ),
            
            array (
                'country_id' => 49,
                'id' => 813,
                'name' => 'Cuvette',
            ),
            
            array (
                'country_id' => 49,
                'id' => 814,
                'name' => 'Kouilou',
            ),
            
            array (
                'country_id' => 49,
                'id' => 815,
                'name' => 'Lekoumou',
            ),
            
            array (
                'country_id' => 49,
                'id' => 816,
                'name' => 'Likouala',
            ),
            
            array (
                'country_id' => 49,
                'id' => 817,
                'name' => 'Niari',
            ),
            
            array (
                'country_id' => 49,
                'id' => 818,
                'name' => 'Plateaux',
            ),
            
            array (
                'country_id' => 49,
                'id' => 819,
                'name' => 'Pool',
            ),
            
            array (
                'country_id' => 49,
                'id' => 820,
                'name' => 'Sangha',
            ),
            
            array (
                'country_id' => 50,
                'id' => 821,
                'name' => 'Bandundu',
            ),
            
            array (
                'country_id' => 50,
                'id' => 822,
                'name' => 'Bas-Congo',
            ),
            
            array (
                'country_id' => 50,
                'id' => 823,
                'name' => 'Equateur',
            ),
            
            array (
                'country_id' => 50,
                'id' => 824,
                'name' => 'Haut-Congo',
            ),
            
            array (
                'country_id' => 50,
                'id' => 825,
                'name' => 'Kasai-Occidental',
            ),
            
            array (
                'country_id' => 50,
                'id' => 826,
                'name' => 'Kasai-Oriental',
            ),
            
            array (
                'country_id' => 50,
                'id' => 827,
                'name' => 'Katanga',
            ),
            
            array (
                'country_id' => 50,
                'id' => 828,
                'name' => 'Kinshasa',
            ),
            
            array (
                'country_id' => 50,
                'id' => 829,
                'name' => 'Maniema',
            ),
            
            array (
                'country_id' => 50,
                'id' => 830,
                'name' => 'Nord-Kivu',
            ),
            
            array (
                'country_id' => 50,
                'id' => 831,
                'name' => 'Sud-Kivu',
            ),
            
            array (
                'country_id' => 51,
                'id' => 832,
                'name' => 'Aitutaki',
            ),
            
            array (
                'country_id' => 51,
                'id' => 833,
                'name' => 'Atiu',
            ),
            
            array (
                'country_id' => 51,
                'id' => 834,
                'name' => 'Mangaia',
            ),
            
            array (
                'country_id' => 51,
                'id' => 835,
                'name' => 'Manihiki',
            ),
            
            array (
                'country_id' => 51,
                'id' => 836,
                'name' => 'Mauke',
            ),
            
            array (
                'country_id' => 51,
                'id' => 837,
                'name' => 'Mitiaro',
            ),
            
            array (
                'country_id' => 51,
                'id' => 838,
                'name' => 'Nassau',
            ),
            
            array (
                'country_id' => 51,
                'id' => 839,
                'name' => 'Pukapuka',
            ),
            
            array (
                'country_id' => 51,
                'id' => 840,
                'name' => 'Rakahanga',
            ),
            
            array (
                'country_id' => 51,
                'id' => 841,
                'name' => 'Rarotonga',
            ),
            
            array (
                'country_id' => 51,
                'id' => 842,
                'name' => 'Tongareva',
            ),
            
            array (
                'country_id' => 52,
                'id' => 843,
                'name' => 'Alajuela',
            ),
            
            array (
                'country_id' => 52,
                'id' => 844,
                'name' => 'Cartago',
            ),
            
            array (
                'country_id' => 52,
                'id' => 845,
                'name' => 'Guanacaste',
            ),
            
            array (
                'country_id' => 52,
                'id' => 846,
                'name' => 'Heredia',
            ),
            
            array (
                'country_id' => 52,
                'id' => 847,
                'name' => 'Limon',
            ),
            
            array (
                'country_id' => 52,
                'id' => 848,
                'name' => 'Puntarenas',
            ),
            
            array (
                'country_id' => 52,
                'id' => 849,
                'name' => 'San Jose',
            ),
            
            array (
                'country_id' => 53,
                'id' => 850,
                'name' => 'Abidjan',
            ),
            
            array (
                'country_id' => 53,
                'id' => 851,
                'name' => 'Agneby',
            ),
            
            array (
                'country_id' => 53,
                'id' => 852,
                'name' => 'Bafing',
            ),
            
            array (
                'country_id' => 53,
                'id' => 853,
                'name' => 'Denguele',
            ),
            
            array (
                'country_id' => 53,
                'id' => 854,
                'name' => 'Dix-huit Montagnes',
            ),
            
            array (
                'country_id' => 53,
                'id' => 855,
                'name' => 'Fromager',
            ),
            
            array (
                'country_id' => 53,
                'id' => 856,
                'name' => 'Haut-Sassandra',
            ),
            
            array (
                'country_id' => 53,
                'id' => 857,
                'name' => 'Lacs',
            ),
            
            array (
                'country_id' => 53,
                'id' => 858,
                'name' => 'Lagunes',
            ),
            
            array (
                'country_id' => 53,
                'id' => 859,
                'name' => 'Marahoue',
            ),
            
            array (
                'country_id' => 53,
                'id' => 860,
                'name' => 'Moyen-Cavally',
            ),
            
            array (
                'country_id' => 53,
                'id' => 861,
                'name' => 'Moyen-Comoe',
            ),
            
            array (
                'country_id' => 53,
                'id' => 862,
                'name' => 'N\'zi-Comoe',
            ),
            
            array (
                'country_id' => 53,
                'id' => 863,
                'name' => 'Sassandra',
            ),
            
            array (
                'country_id' => 53,
                'id' => 864,
                'name' => 'Savanes',
            ),
            
            array (
                'country_id' => 53,
                'id' => 865,
                'name' => 'Sud-Bandama',
            ),
            
            array (
                'country_id' => 53,
                'id' => 866,
                'name' => 'Sud-Comoe',
            ),
            
            array (
                'country_id' => 53,
                'id' => 867,
                'name' => 'Vallee du Bandama',
            ),
            
            array (
                'country_id' => 53,
                'id' => 868,
                'name' => 'Worodougou',
            ),
            
            array (
                'country_id' => 53,
                'id' => 869,
                'name' => 'Zanzan',
            ),
            
            array (
                'country_id' => 54,
                'id' => 870,
                'name' => 'Bjelovar-Bilogora',
            ),
            
            array (
                'country_id' => 54,
                'id' => 871,
                'name' => 'Dubrovnik-Neretva',
            ),
            
            array (
                'country_id' => 54,
                'id' => 872,
                'name' => 'Grad Zagreb',
            ),
            
            array (
                'country_id' => 54,
                'id' => 873,
                'name' => 'Istra',
            ),
            
            array (
                'country_id' => 54,
                'id' => 874,
                'name' => 'Karlovac',
            ),
            
            array (
                'country_id' => 54,
                'id' => 875,
                'name' => 'Koprivnica-Krizhevci',
            ),
            
            array (
                'country_id' => 54,
                'id' => 876,
                'name' => 'Krapina-Zagorje',
            ),
            
            array (
                'country_id' => 54,
                'id' => 877,
                'name' => 'Lika-Senj',
            ),
            
            array (
                'country_id' => 54,
                'id' => 878,
                'name' => 'Medhimurje',
            ),
            
            array (
                'country_id' => 54,
                'id' => 879,
                'name' => 'Medimurska Zupanija',
            ),
            
            array (
                'country_id' => 54,
                'id' => 880,
                'name' => 'Osijek-Baranja',
            ),
            
            array (
                'country_id' => 54,
                'id' => 881,
                'name' => 'Osjecko-Baranjska Zupanija',
            ),
            
            array (
                'country_id' => 54,
                'id' => 882,
                'name' => 'Pozhega-Slavonija',
            ),
            
            array (
                'country_id' => 54,
                'id' => 883,
                'name' => 'Primorje-Gorski Kotar',
            ),
            
            array (
                'country_id' => 54,
                'id' => 884,
                'name' => 'Shibenik-Knin',
            ),
            
            array (
                'country_id' => 54,
                'id' => 885,
                'name' => 'Sisak-Moslavina',
            ),
            
            array (
                'country_id' => 54,
                'id' => 886,
                'name' => 'Slavonski Brod-Posavina',
            ),
            
            array (
                'country_id' => 54,
                'id' => 887,
                'name' => 'Split-Dalmacija',
            ),
            
            array (
                'country_id' => 54,
                'id' => 888,
                'name' => 'Varazhdin',
            ),
            
            array (
                'country_id' => 54,
                'id' => 889,
                'name' => 'Virovitica-Podravina',
            ),
            
            array (
                'country_id' => 54,
                'id' => 890,
                'name' => 'Vukovar-Srijem',
            ),
            
            array (
                'country_id' => 54,
                'id' => 891,
                'name' => 'Zadar',
            ),
            
            array (
                'country_id' => 54,
                'id' => 892,
                'name' => 'Zagreb',
            ),
            
            array (
                'country_id' => 55,
                'id' => 893,
                'name' => 'Camaguey',
            ),
            
            array (
                'country_id' => 55,
                'id' => 894,
                'name' => 'Ciego de Avila',
            ),
            
            array (
                'country_id' => 55,
                'id' => 895,
                'name' => 'Cienfuegos',
            ),
            
            array (
                'country_id' => 55,
                'id' => 896,
                'name' => 'Ciudad de la Habana',
            ),
            
            array (
                'country_id' => 55,
                'id' => 897,
                'name' => 'Granma',
            ),
            
            array (
                'country_id' => 55,
                'id' => 898,
                'name' => 'Guantanamo',
            ),
            
            array (
                'country_id' => 55,
                'id' => 899,
                'name' => 'Habana',
            ),
            
            array (
                'country_id' => 55,
                'id' => 900,
                'name' => 'Holguin',
            ),
            
            array (
                'country_id' => 55,
                'id' => 901,
                'name' => 'Isla de la Juventud',
            ),
            
            array (
                'country_id' => 55,
                'id' => 902,
                'name' => 'La Habana',
            ),
            
            array (
                'country_id' => 55,
                'id' => 903,
                'name' => 'Las Tunas',
            ),
            
            array (
                'country_id' => 55,
                'id' => 904,
                'name' => 'Matanzas',
            ),
            
            array (
                'country_id' => 55,
                'id' => 905,
                'name' => 'Pinar del Rio',
            ),
            
            array (
                'country_id' => 55,
                'id' => 906,
                'name' => 'Sancti Spiritus',
            ),
            
            array (
                'country_id' => 55,
                'id' => 907,
                'name' => 'Santiago de Cuba',
            ),
            
            array (
                'country_id' => 55,
                'id' => 908,
                'name' => 'Villa Clara',
            ),
            
            array (
                'country_id' => 56,
                'id' => 909,
                'name' => 'Government controlled area',
            ),
            
            array (
                'country_id' => 56,
                'id' => 910,
                'name' => 'Limassol',
            ),
            
            array (
                'country_id' => 56,
                'id' => 911,
                'name' => 'Nicosia District',
            ),
            
            array (
                'country_id' => 56,
                'id' => 912,
                'name' => 'Paphos',
            ),
            
            array (
                'country_id' => 56,
                'id' => 913,
                'name' => 'Turkish controlled area',
            ),
            
            array (
                'country_id' => 57,
                'id' => 914,
                'name' => 'Central Bohemian',
            ),
            
            array (
                'country_id' => 57,
                'id' => 915,
                'name' => 'Frycovice',
            ),
            
            array (
                'country_id' => 57,
                'id' => 916,
                'name' => 'Jihocesky Kraj',
            ),
            
            array (
                'country_id' => 57,
                'id' => 917,
                'name' => 'Jihochesky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 918,
                'name' => 'Jihomoravsky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 919,
                'name' => 'Karlovarsky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 920,
                'name' => 'Klecany',
            ),
            
            array (
                'country_id' => 57,
                'id' => 921,
                'name' => 'Kralovehradecky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 922,
                'name' => 'Liberecky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 923,
                'name' => 'Lipov',
            ),
            
            array (
                'country_id' => 57,
                'id' => 924,
                'name' => 'Moravskoslezsky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 925,
                'name' => 'Olomoucky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 926,
                'name' => 'Olomoucky Kraj',
            ),
            
            array (
                'country_id' => 57,
                'id' => 927,
                'name' => 'Pardubicky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 928,
                'name' => 'Plzensky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 929,
                'name' => 'Praha',
            ),
            
            array (
                'country_id' => 57,
                'id' => 930,
                'name' => 'Rajhrad',
            ),
            
            array (
                'country_id' => 57,
                'id' => 931,
                'name' => 'Smirice',
            ),
            
            array (
                'country_id' => 57,
                'id' => 932,
                'name' => 'South Moravian',
            ),
            
            array (
                'country_id' => 57,
                'id' => 933,
                'name' => 'Straz nad Nisou',
            ),
            
            array (
                'country_id' => 57,
                'id' => 934,
                'name' => 'Stredochesky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 935,
                'name' => 'Unicov',
            ),
            
            array (
                'country_id' => 57,
                'id' => 936,
                'name' => 'Ustecky',
            ),
            
            array (
                'country_id' => 57,
                'id' => 937,
                'name' => 'Valletta',
            ),
            
            array (
                'country_id' => 57,
                'id' => 938,
                'name' => 'Velesin',
            ),
            
            array (
                'country_id' => 57,
                'id' => 939,
                'name' => 'Vysochina',
            ),
            
            array (
                'country_id' => 57,
                'id' => 940,
                'name' => 'Zlinsky',
            ),
            
            array (
                'country_id' => 58,
                'id' => 941,
                'name' => 'Arhus',
            ),
            
            array (
                'country_id' => 58,
                'id' => 942,
                'name' => 'Bornholm',
            ),
            
            array (
                'country_id' => 58,
                'id' => 943,
                'name' => 'Frederiksborg',
            ),
            
            array (
                'country_id' => 58,
                'id' => 944,
                'name' => 'Fyn',
            ),
            
            array (
                'country_id' => 58,
                'id' => 945,
                'name' => 'Hovedstaden',
            ),
            
            array (
                'country_id' => 58,
                'id' => 946,
                'name' => 'Kobenhavn',
            ),
            
            array (
                'country_id' => 58,
                'id' => 947,
                'name' => 'Kobenhavns Amt',
            ),
            
            array (
                'country_id' => 58,
                'id' => 948,
                'name' => 'Kobenhavns Kommune',
            ),
            
            array (
                'country_id' => 58,
                'id' => 949,
                'name' => 'Nordjylland',
            ),
            
            array (
                'country_id' => 58,
                'id' => 950,
                'name' => 'Ribe',
            ),
            
            array (
                'country_id' => 58,
                'id' => 951,
                'name' => 'Ringkobing',
            ),
            
            array (
                'country_id' => 58,
                'id' => 952,
                'name' => 'Roervig',
            ),
            
            array (
                'country_id' => 58,
                'id' => 953,
                'name' => 'Roskilde',
            ),
            
            array (
                'country_id' => 58,
                'id' => 954,
                'name' => 'Roslev',
            ),
            
            array (
                'country_id' => 58,
                'id' => 955,
                'name' => 'Sjaelland',
            ),
            
            array (
                'country_id' => 58,
                'id' => 956,
                'name' => 'Soeborg',
            ),
            
            array (
                'country_id' => 58,
                'id' => 957,
                'name' => 'Sonderjylland',
            ),
            
            array (
                'country_id' => 58,
                'id' => 958,
                'name' => 'Storstrom',
            ),
            
            array (
                'country_id' => 58,
                'id' => 959,
                'name' => 'Syddanmark',
            ),
            
            array (
                'country_id' => 58,
                'id' => 960,
                'name' => 'Toelloese',
            ),
            
            array (
                'country_id' => 58,
                'id' => 961,
                'name' => 'Vejle',
            ),
            
            array (
                'country_id' => 58,
                'id' => 962,
                'name' => 'Vestsjalland',
            ),
            
            array (
                'country_id' => 58,
                'id' => 963,
                'name' => 'Viborg',
            ),
            
            array (
                'country_id' => 59,
                'id' => 964,
                'name' => '\'Ali Sabih',
            ),
            
            array (
                'country_id' => 59,
                'id' => 965,
                'name' => 'Dikhil',
            ),
            
            array (
                'country_id' => 59,
                'id' => 966,
                'name' => 'Jibuti',
            ),
            
            array (
                'country_id' => 59,
                'id' => 967,
                'name' => 'Tajurah',
            ),
            
            array (
                'country_id' => 59,
                'id' => 968,
                'name' => 'Ubuk',
            ),
            
            array (
                'country_id' => 60,
                'id' => 969,
                'name' => 'Saint Andrew',
            ),
            
            array (
                'country_id' => 60,
                'id' => 970,
                'name' => 'Saint David',
            ),
            
            array (
                'country_id' => 60,
                'id' => 971,
                'name' => 'Saint George',
            ),
            
            array (
                'country_id' => 60,
                'id' => 972,
                'name' => 'Saint John',
            ),
            
            array (
                'country_id' => 60,
                'id' => 973,
                'name' => 'Saint Joseph',
            ),
            
            array (
                'country_id' => 60,
                'id' => 974,
                'name' => 'Saint Luke',
            ),
            
            array (
                'country_id' => 60,
                'id' => 975,
                'name' => 'Saint Mark',
            ),
            
            array (
                'country_id' => 60,
                'id' => 976,
                'name' => 'Saint Patrick',
            ),
            
            array (
                'country_id' => 60,
                'id' => 977,
                'name' => 'Saint Paul',
            ),
            
            array (
                'country_id' => 60,
                'id' => 978,
                'name' => 'Saint Peter',
            ),
            
            array (
                'country_id' => 61,
                'id' => 979,
                'name' => 'Azua',
            ),
            
            array (
                'country_id' => 61,
                'id' => 980,
                'name' => 'Bahoruco',
            ),
            
            array (
                'country_id' => 61,
                'id' => 981,
                'name' => 'Barahona',
            ),
            
            array (
                'country_id' => 61,
                'id' => 982,
                'name' => 'Dajabon',
            ),
            
            array (
                'country_id' => 61,
                'id' => 983,
                'name' => 'Distrito Nacional',
            ),
            
            array (
                'country_id' => 61,
                'id' => 984,
                'name' => 'Duarte',
            ),
            
            array (
                'country_id' => 61,
                'id' => 985,
                'name' => 'El Seybo',
            ),
            
            array (
                'country_id' => 61,
                'id' => 986,
                'name' => 'Elias Pina',
            ),
            
            array (
                'country_id' => 61,
                'id' => 987,
                'name' => 'Espaillat',
            ),
            
            array (
                'country_id' => 61,
                'id' => 988,
                'name' => 'Hato Mayor',
            ),
            
            array (
                'country_id' => 61,
                'id' => 989,
                'name' => 'Independencia',
            ),
            
            array (
                'country_id' => 61,
                'id' => 990,
                'name' => 'La Altagracia',
            ),
            
            array (
                'country_id' => 61,
                'id' => 991,
                'name' => 'La Romana',
            ),
            
            array (
                'country_id' => 61,
                'id' => 992,
                'name' => 'La Vega',
            ),
            
            array (
                'country_id' => 61,
                'id' => 993,
                'name' => 'Maria Trinidad Sanchez',
            ),
            
            array (
                'country_id' => 61,
                'id' => 994,
                'name' => 'Monsenor Nouel',
            ),
            
            array (
                'country_id' => 61,
                'id' => 995,
                'name' => 'Monte Cristi',
            ),
            
            array (
                'country_id' => 61,
                'id' => 996,
                'name' => 'Monte Plata',
            ),
            
            array (
                'country_id' => 61,
                'id' => 997,
                'name' => 'Pedernales',
            ),
            
            array (
                'country_id' => 61,
                'id' => 998,
                'name' => 'Peravia',
            ),
            
            array (
                'country_id' => 61,
                'id' => 999,
                'name' => 'Puerto Plata',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1000,
                'name' => 'Salcedo',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 61,
                'id' => 1001,
                'name' => 'Samana',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1002,
                'name' => 'San Cristobal',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1003,
                'name' => 'San Juan',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1004,
                'name' => 'San Pedro de Macoris',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1005,
                'name' => 'Sanchez Ramirez',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1006,
                'name' => 'Santiago',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1007,
                'name' => 'Santiago Rodriguez',
            ),
            
            array (
                'country_id' => 61,
                'id' => 1008,
                'name' => 'Valverde',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1009,
                'name' => 'Aileu',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1010,
                'name' => 'Ainaro',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1011,
                'name' => 'Ambeno',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1012,
                'name' => 'Baucau',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1013,
                'name' => 'Bobonaro',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1014,
                'name' => 'Cova Lima',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1015,
                'name' => 'Dili',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1016,
                'name' => 'Ermera',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1017,
                'name' => 'Lautem',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1018,
                'name' => 'Liquica',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1019,
                'name' => 'Manatuto',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1020,
                'name' => 'Manufahi',
            ),
            
            array (
                'country_id' => 62,
                'id' => 1021,
                'name' => 'Viqueque',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1022,
                'name' => 'Azuay',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1023,
                'name' => 'Bolivar',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1024,
                'name' => 'Canar',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1025,
                'name' => 'Carchi',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1026,
                'name' => 'Chimborazo',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1027,
                'name' => 'Cotopaxi',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1028,
                'name' => 'El Oro',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1029,
                'name' => 'Esmeraldas',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1030,
                'name' => 'Galapagos',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1031,
                'name' => 'Guayas',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1032,
                'name' => 'Imbabura',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1033,
                'name' => 'Loja',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1034,
                'name' => 'Los Rios',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1035,
                'name' => 'Manabi',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1036,
                'name' => 'Morona Santiago',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1037,
                'name' => 'Napo',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1038,
                'name' => 'Orellana',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1039,
                'name' => 'Pastaza',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1040,
                'name' => 'Pichincha',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1041,
                'name' => 'Sucumbios',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1042,
                'name' => 'Tungurahua',
            ),
            
            array (
                'country_id' => 63,
                'id' => 1043,
                'name' => 'Zamora Chinchipe',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1044,
                'name' => 'Aswan',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1045,
                'name' => 'Asyut',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1046,
                'name' => 'Bani Suwayf',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1047,
                'name' => 'Bur Sa\'id',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1048,
                'name' => 'Cairo',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1049,
                'name' => 'Dumyat',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1050,
                'name' => 'Kafr-ash-Shaykh',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1051,
                'name' => 'Matruh',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1052,
                'name' => 'Muhafazat ad Daqahliyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1053,
                'name' => 'Muhafazat al Fayyum',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1054,
                'name' => 'Muhafazat al Gharbiyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1055,
                'name' => 'Muhafazat al Iskandariyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1056,
                'name' => 'Muhafazat al Qahirah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1057,
                'name' => 'Qina',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1058,
                'name' => 'Sawhaj',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1059,
                'name' => 'Sina al-Janubiyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1060,
                'name' => 'Sina ash-Shamaliyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1061,
                'name' => 'ad-Daqahliyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1062,
                'name' => 'al-Bahr-al-Ahmar',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1063,
                'name' => 'al-Buhayrah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1064,
                'name' => 'al-Fayyum',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1065,
                'name' => 'al-Gharbiyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1066,
                'name' => 'al-Iskandariyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1067,
                'name' => 'al-Ismailiyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1068,
                'name' => 'al-Jizah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1069,
                'name' => 'al-Minufiyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1070,
                'name' => 'al-Minya',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1071,
                'name' => 'al-Qahira',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1072,
                'name' => 'al-Qalyubiyah',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1073,
                'name' => 'al-Uqsur',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1074,
                'name' => 'al-Wadi al-Jadid',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1075,
                'name' => 'as-Suways',
            ),
            
            array (
                'country_id' => 64,
                'id' => 1076,
                'name' => 'ash-Sharqiyah',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1077,
                'name' => 'Ahuachapan',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1078,
                'name' => 'Cabanas',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1079,
                'name' => 'Chalatenango',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1080,
                'name' => 'Cuscatlan',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1081,
                'name' => 'La Libertad',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1082,
                'name' => 'La Paz',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1083,
                'name' => 'La Union',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1084,
                'name' => 'Morazan',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1085,
                'name' => 'San Miguel',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1086,
                'name' => 'San Salvador',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1087,
                'name' => 'San Vicente',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1088,
                'name' => 'Santa Ana',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1089,
                'name' => 'Sonsonate',
            ),
            
            array (
                'country_id' => 65,
                'id' => 1090,
                'name' => 'Usulutan',
            ),
            
            array (
                'country_id' => 66,
                'id' => 1091,
                'name' => 'Annobon',
            ),
            
            array (
                'country_id' => 66,
                'id' => 1092,
                'name' => 'Bioko Norte',
            ),
            
            array (
                'country_id' => 66,
                'id' => 1093,
                'name' => 'Bioko Sur',
            ),
            
            array (
                'country_id' => 66,
                'id' => 1094,
                'name' => 'Centro Sur',
            ),
            
            array (
                'country_id' => 66,
                'id' => 1095,
                'name' => 'Kie-Ntem',
            ),
            
            array (
                'country_id' => 66,
                'id' => 1096,
                'name' => 'Litoral',
            ),
            
            array (
                'country_id' => 66,
                'id' => 1097,
                'name' => 'Wele-Nzas',
            ),
            
            array (
                'country_id' => 67,
                'id' => 1098,
                'name' => 'Anseba',
            ),
            
            array (
                'country_id' => 67,
                'id' => 1099,
                'name' => 'Debub',
            ),
            
            array (
                'country_id' => 67,
                'id' => 1100,
                'name' => 'Debub-Keih-Bahri',
            ),
            
            array (
                'country_id' => 67,
                'id' => 1101,
                'name' => 'Gash-Barka',
            ),
            
            array (
                'country_id' => 67,
                'id' => 1102,
                'name' => 'Maekel',
            ),
            
            array (
                'country_id' => 67,
                'id' => 1103,
                'name' => 'Semien-Keih-Bahri',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1104,
                'name' => 'Harju',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1105,
                'name' => 'Hiiu',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1106,
                'name' => 'Ida-Viru',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1107,
                'name' => 'Jarva',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1108,
                'name' => 'Jogeva',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1109,
                'name' => 'Laane',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1110,
                'name' => 'Laane-Viru',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1111,
                'name' => 'Parnu',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1112,
                'name' => 'Polva',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1113,
                'name' => 'Rapla',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1114,
                'name' => 'Saare',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1115,
                'name' => 'Tartu',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1116,
                'name' => 'Valga',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1117,
                'name' => 'Viljandi',
            ),
            
            array (
                'country_id' => 68,
                'id' => 1118,
                'name' => 'Voru',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1119,
                'name' => 'Addis Abeba',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1120,
                'name' => 'Afar',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1121,
                'name' => 'Amhara',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1122,
                'name' => 'Benishangul',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1123,
                'name' => 'Diredawa',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1124,
                'name' => 'Gambella',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1125,
                'name' => 'Harar',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1126,
                'name' => 'Jigjiga',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1127,
                'name' => 'Mekele',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1128,
                'name' => 'Oromia',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1129,
                'name' => 'Somali',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1130,
                'name' => 'Southern',
            ),
            
            array (
                'country_id' => 69,
                'id' => 1131,
                'name' => 'Tigray',
            ),
            
            array (
                'country_id' => 70,
                'id' => 1132,
                'name' => 'Christmas Island',
            ),
            
            array (
                'country_id' => 70,
                'id' => 1133,
                'name' => 'Cocos Islands',
            ),
            
            array (
                'country_id' => 70,
                'id' => 1134,
                'name' => 'Coral Sea Islands',
            ),
            
            array (
                'country_id' => 71,
                'id' => 1135,
                'name' => 'Falkland Islands',
            ),
            
            array (
                'country_id' => 71,
                'id' => 1136,
                'name' => 'South Georgia',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1137,
                'name' => 'Klaksvik',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1138,
                'name' => 'Nor ara Eysturoy',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1139,
                'name' => 'Nor oy',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1140,
                'name' => 'Sandoy',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1141,
                'name' => 'Streymoy',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1142,
                'name' => 'Su uroy',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1143,
                'name' => 'Sy ra Eysturoy',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1144,
                'name' => 'Torshavn',
            ),
            
            array (
                'country_id' => 72,
                'id' => 1145,
                'name' => 'Vaga',
            ),
            
            array (
                'country_id' => 73,
                'id' => 1146,
                'name' => 'Central',
            ),
            
            array (
                'country_id' => 73,
                'id' => 1147,
                'name' => 'Eastern',
            ),
            
            array (
                'country_id' => 73,
                'id' => 1148,
                'name' => 'Northern',
            ),
            
            array (
                'country_id' => 73,
                'id' => 1149,
                'name' => 'South Pacific',
            ),
            
            array (
                'country_id' => 73,
                'id' => 1150,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1151,
                'name' => 'Ahvenanmaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1152,
                'name' => 'Etela-Karjala',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1153,
                'name' => 'Etela-Pohjanmaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1154,
                'name' => 'Etela-Savo',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1155,
                'name' => 'Etela-Suomen Laani',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1156,
                'name' => 'Ita-Suomen Laani',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1157,
                'name' => 'Ita-Uusimaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1158,
                'name' => 'Kainuu',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1159,
                'name' => 'Kanta-Hame',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1160,
                'name' => 'Keski-Pohjanmaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1161,
                'name' => 'Keski-Suomi',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1162,
                'name' => 'Kymenlaakso',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1163,
                'name' => 'Lansi-Suomen Laani',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1164,
                'name' => 'Lappi',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1165,
                'name' => 'Northern Savonia',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1166,
                'name' => 'Ostrobothnia',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1167,
                'name' => 'Oulun Laani',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1168,
                'name' => 'Paijat-Hame',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1169,
                'name' => 'Pirkanmaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1170,
                'name' => 'Pohjanmaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1171,
                'name' => 'Pohjois-Karjala',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1172,
                'name' => 'Pohjois-Pohjanmaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1173,
                'name' => 'Pohjois-Savo',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1174,
                'name' => 'Saarijarvi',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1175,
                'name' => 'Satakunta',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1176,
                'name' => 'Southern Savonia',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1177,
                'name' => 'Tavastia Proper',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1178,
                'name' => 'Uleaborgs Lan',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1179,
                'name' => 'Uusimaa',
            ),
            
            array (
                'country_id' => 74,
                'id' => 1180,
                'name' => 'Varsinais-Suomi',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1181,
                'name' => 'Ain',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1182,
                'name' => 'Aisne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1183,
                'name' => 'Albi Le Sequestre',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1184,
                'name' => 'Allier',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1185,
                'name' => 'Alpes-Cote dAzur',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1186,
                'name' => 'Alpes-Maritimes',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1187,
                'name' => 'Alpes-de-Haute-Provence',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1188,
                'name' => 'Alsace',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1189,
                'name' => 'Aquitaine',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1190,
                'name' => 'Ardeche',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1191,
                'name' => 'Ardennes',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1192,
                'name' => 'Ariege',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1193,
                'name' => 'Aube',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1194,
                'name' => 'Aude',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1195,
                'name' => 'Auvergne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1196,
                'name' => 'Aveyron',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1197,
                'name' => 'Bas-Rhin',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1198,
                'name' => 'Basse-Normandie',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1199,
                'name' => 'Bouches-du-Rhone',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1200,
                'name' => 'Bourgogne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1201,
                'name' => 'Bretagne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1202,
                'name' => 'Brittany',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1203,
                'name' => 'Burgundy',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1204,
                'name' => 'Calvados',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1205,
                'name' => 'Cantal',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1206,
                'name' => 'Cedex',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1207,
                'name' => 'Centre',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1208,
                'name' => 'Charente',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1209,
                'name' => 'Charente-Maritime',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1210,
                'name' => 'Cher',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1211,
                'name' => 'Correze',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1212,
                'name' => 'Corse-du-Sud',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1213,
                'name' => 'Cote-d\'Or',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1214,
                'name' => 'Cotes-d\'Armor',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1215,
                'name' => 'Creuse',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1216,
                'name' => 'Crolles',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1217,
                'name' => 'Deux-Sevres',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1218,
                'name' => 'Dordogne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1219,
                'name' => 'Doubs',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1220,
                'name' => 'Drome',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1221,
                'name' => 'Essonne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1222,
                'name' => 'Eure',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1223,
                'name' => 'Eure-et-Loir',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1224,
                'name' => 'Feucherolles',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1225,
                'name' => 'Finistere',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1226,
                'name' => 'Franche-Comte',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1227,
                'name' => 'Gard',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1228,
                'name' => 'Gers',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1229,
                'name' => 'Gironde',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1230,
                'name' => 'Haut-Rhin',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1231,
                'name' => 'Haute-Corse',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1232,
                'name' => 'Haute-Garonne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1233,
                'name' => 'Haute-Loire',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1234,
                'name' => 'Haute-Marne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1235,
                'name' => 'Haute-Saone',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1236,
                'name' => 'Haute-Savoie',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1237,
                'name' => 'Haute-Vienne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1238,
                'name' => 'Hautes-Alpes',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1239,
                'name' => 'Hautes-Pyrenees',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1240,
                'name' => 'Hauts-de-Seine',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1241,
                'name' => 'Herault',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1242,
                'name' => 'Ile-de-France',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1243,
                'name' => 'Ille-et-Vilaine',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1244,
                'name' => 'Indre',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1245,
                'name' => 'Indre-et-Loire',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1246,
                'name' => 'Isere',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1247,
                'name' => 'Jura',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1248,
                'name' => 'Klagenfurt',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1249,
                'name' => 'Landes',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1250,
                'name' => 'Languedoc-Roussillon',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1251,
                'name' => 'Larcay',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1252,
                'name' => 'Le Castellet',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1253,
                'name' => 'Le Creusot',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1254,
                'name' => 'Limousin',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1255,
                'name' => 'Loir-et-Cher',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1256,
                'name' => 'Loire',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1257,
                'name' => 'Loire-Atlantique',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1258,
                'name' => 'Loiret',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1259,
                'name' => 'Lorraine',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1260,
                'name' => 'Lot',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1261,
                'name' => 'Lot-et-Garonne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1262,
                'name' => 'Lower Normandy',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1263,
                'name' => 'Lozere',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1264,
                'name' => 'Maine-et-Loire',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1265,
                'name' => 'Manche',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1266,
                'name' => 'Marne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1267,
                'name' => 'Mayenne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1268,
                'name' => 'Meurthe-et-Moselle',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1269,
                'name' => 'Meuse',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1270,
                'name' => 'Midi-Pyrenees',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1271,
                'name' => 'Morbihan',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1272,
                'name' => 'Moselle',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1273,
                'name' => 'Nievre',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1274,
                'name' => 'Nord',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1275,
                'name' => 'Nord-Pas-de-Calais',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1276,
                'name' => 'Oise',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1277,
                'name' => 'Orne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1278,
                'name' => 'Paris',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1279,
                'name' => 'Pas-de-Calais',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1280,
                'name' => 'Pays de la Loire',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1281,
                'name' => 'Pays-de-la-Loire',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1282,
                'name' => 'Picardy',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1283,
                'name' => 'Puy-de-Dome',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1284,
                'name' => 'Pyrenees-Atlantiques',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1285,
                'name' => 'Pyrenees-Orientales',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1286,
                'name' => 'Quelmes',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1287,
                'name' => 'Rhone',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1288,
                'name' => 'Rhone-Alpes',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1289,
                'name' => 'Saint Ouen',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1290,
                'name' => 'Saint Viatre',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1291,
                'name' => 'Saone-et-Loire',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1292,
                'name' => 'Sarthe',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1293,
                'name' => 'Savoie',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1294,
                'name' => 'Seine-Maritime',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1295,
                'name' => 'Seine-Saint-Denis',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1296,
                'name' => 'Seine-et-Marne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1297,
                'name' => 'Somme',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1298,
                'name' => 'Sophia Antipolis',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1299,
                'name' => 'Souvans',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1300,
                'name' => 'Tarn',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1301,
                'name' => 'Tarn-et-Garonne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1302,
                'name' => 'Territoire de Belfort',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1303,
                'name' => 'Treignac',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1304,
                'name' => 'Upper Normandy',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1305,
                'name' => 'Val-d\'Oise',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1306,
                'name' => 'Val-de-Marne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1307,
                'name' => 'Var',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1308,
                'name' => 'Vaucluse',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1309,
                'name' => 'Vellise',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1310,
                'name' => 'Vendee',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1311,
                'name' => 'Vienne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1312,
                'name' => 'Vosges',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1313,
                'name' => 'Yonne',
            ),
            
            array (
                'country_id' => 75,
                'id' => 1314,
                'name' => 'Yvelines',
            ),
            
            array (
                'country_id' => 76,
                'id' => 1315,
                'name' => 'Cayenne',
            ),
            
            array (
                'country_id' => 76,
                'id' => 1316,
                'name' => 'Saint-Laurent-du-Maroni',
            ),
            
            array (
                'country_id' => 77,
                'id' => 1317,
                'name' => 'Iles du Vent',
            ),
            
            array (
                'country_id' => 77,
                'id' => 1318,
                'name' => 'Iles sous le Vent',
            ),
            
            array (
                'country_id' => 77,
                'id' => 1319,
                'name' => 'Marquesas',
            ),
            
            array (
                'country_id' => 77,
                'id' => 1320,
                'name' => 'Tuamotu',
            ),
            
            array (
                'country_id' => 77,
                'id' => 1321,
                'name' => 'Tubuai',
            ),
            
            array (
                'country_id' => 78,
                'id' => 1322,
                'name' => 'Amsterdam',
            ),
            
            array (
                'country_id' => 78,
                'id' => 1323,
                'name' => 'Crozet Islands',
            ),
            
            array (
                'country_id' => 78,
                'id' => 1324,
                'name' => 'Kerguelen',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1325,
                'name' => 'Estuaire',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1326,
                'name' => 'Haut-Ogooue',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1327,
                'name' => 'Moyen-Ogooue',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1328,
                'name' => 'Ngounie',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1329,
                'name' => 'Nyanga',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1330,
                'name' => 'Ogooue-Ivindo',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1331,
                'name' => 'Ogooue-Lolo',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1332,
                'name' => 'Ogooue-Maritime',
            ),
            
            array (
                'country_id' => 79,
                'id' => 1333,
                'name' => 'Woleu-Ntem',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1334,
                'name' => 'Banjul',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1335,
                'name' => 'Basse',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1336,
                'name' => 'Brikama',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1337,
                'name' => 'Janjanbureh',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1338,
                'name' => 'Kanifing',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1339,
                'name' => 'Kerewan',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1340,
                'name' => 'Kuntaur',
            ),
            
            array (
                'country_id' => 80,
                'id' => 1341,
                'name' => 'Mansakonko',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1342,
                'name' => 'Abhasia',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1343,
                'name' => 'Ajaria',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1344,
                'name' => 'Guria',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1345,
                'name' => 'Imereti',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1346,
                'name' => 'Kaheti',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1347,
                'name' => 'Kvemo Kartli',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1348,
                'name' => 'Mcheta-Mtianeti',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1349,
                'name' => 'Racha',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1350,
                'name' => 'Samagrelo-Zemo Svaneti',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1351,
                'name' => 'Samche-Zhavaheti',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1352,
                'name' => 'Shida Kartli',
            ),
            
            array (
                'country_id' => 81,
                'id' => 1353,
                'name' => 'Tbilisi',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1354,
                'name' => 'Auvergne',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1355,
                'name' => 'Baden-Wurttemberg',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1356,
                'name' => 'Bavaria',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1357,
                'name' => 'Bayern',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1358,
                'name' => 'Beilstein Wurtt',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1359,
                'name' => 'Berlin',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1360,
                'name' => 'Brandenburg',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1361,
                'name' => 'Bremen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1362,
                'name' => 'Dreisbach',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1363,
                'name' => 'Freistaat Bayern',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1364,
                'name' => 'Hamburg',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1365,
                'name' => 'Hannover',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1366,
                'name' => 'Heroldstatt',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1367,
                'name' => 'Hessen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1368,
                'name' => 'Kortenberg',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1369,
                'name' => 'Laasdorf',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1370,
                'name' => 'Land Baden-Wurttemberg',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1371,
                'name' => 'Land Bayern',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1372,
                'name' => 'Land Brandenburg',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1373,
                'name' => 'Land Hessen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1374,
                'name' => 'Land Mecklenburg-Vorpommern',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1375,
                'name' => 'Land Nordrhein-Westfalen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1376,
                'name' => 'Land Rheinland-Pfalz',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1377,
                'name' => 'Land Sachsen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1378,
                'name' => 'Land Sachsen-Anhalt',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1379,
                'name' => 'Land Thuringen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1380,
                'name' => 'Lower Saxony',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1381,
                'name' => 'Mecklenburg-Vorpommern',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1382,
                'name' => 'Mulfingen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1383,
                'name' => 'Munich',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1384,
                'name' => 'Neubeuern',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1385,
                'name' => 'Niedersachsen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1386,
                'name' => 'Noord-Holland',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1387,
                'name' => 'Nordrhein-Westfalen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1388,
                'name' => 'North Rhine-Westphalia',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1389,
                'name' => 'Osterode',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1390,
                'name' => 'Rheinland-Pfalz',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1391,
                'name' => 'Rhineland-Palatinate',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1392,
                'name' => 'Saarland',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1393,
                'name' => 'Sachsen',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1394,
                'name' => 'Sachsen-Anhalt',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1395,
                'name' => 'Saxony',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1396,
                'name' => 'Schleswig-Holstein',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1397,
                'name' => 'Thuringia',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1398,
                'name' => 'Webling',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1399,
                'name' => 'Weinstrabe',
            ),
            
            array (
                'country_id' => 82,
                'id' => 1400,
                'name' => 'schlobborn',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1401,
                'name' => 'Ashanti',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1402,
                'name' => 'Brong-Ahafo',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1403,
                'name' => 'Central',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1404,
                'name' => 'Eastern',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1405,
                'name' => 'Greater Accra',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1406,
                'name' => 'Northern',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1407,
                'name' => 'Upper East',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1408,
                'name' => 'Upper West',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1409,
                'name' => 'Volta',
            ),
            
            array (
                'country_id' => 83,
                'id' => 1410,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 84,
                'id' => 1411,
                'name' => 'Gibraltar',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1412,
                'name' => 'Acharnes',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1413,
                'name' => 'Ahaia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1414,
                'name' => 'Aitolia kai Akarnania',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1415,
                'name' => 'Argolis',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1416,
                'name' => 'Arkadia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1417,
                'name' => 'Arta',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1418,
                'name' => 'Attica',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1419,
                'name' => 'Attiki',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1420,
                'name' => 'Ayion Oros',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1421,
                'name' => 'Crete',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1422,
                'name' => 'Dodekanisos',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1423,
                'name' => 'Drama',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1424,
                'name' => 'Evia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1425,
                'name' => 'Evritania',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1426,
                'name' => 'Evros',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1427,
                'name' => 'Evvoia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1428,
                'name' => 'Florina',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1429,
                'name' => 'Fokis',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1430,
                'name' => 'Fthiotis',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1431,
                'name' => 'Grevena',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1432,
                'name' => 'Halandri',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1433,
                'name' => 'Halkidiki',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1434,
                'name' => 'Hania',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1435,
                'name' => 'Heraklion',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1436,
                'name' => 'Hios',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1437,
                'name' => 'Ilia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1438,
                'name' => 'Imathia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1439,
                'name' => 'Ioannina',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1440,
                'name' => 'Iraklion',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1441,
                'name' => 'Karditsa',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1442,
                'name' => 'Kastoria',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1443,
                'name' => 'Kavala',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1444,
                'name' => 'Kefallinia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1445,
                'name' => 'Kerkira',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1446,
                'name' => 'Kiklades',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1447,
                'name' => 'Kilkis',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1448,
                'name' => 'Korinthia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1449,
                'name' => 'Kozani',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1450,
                'name' => 'Lakonia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1451,
                'name' => 'Larisa',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1452,
                'name' => 'Lasithi',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1453,
                'name' => 'Lesvos',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1454,
                'name' => 'Levkas',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1455,
                'name' => 'Magnisia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1456,
                'name' => 'Messinia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1457,
                'name' => 'Nomos Attikis',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1458,
                'name' => 'Nomos Zakynthou',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1459,
                'name' => 'Pella',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1460,
                'name' => 'Pieria',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1461,
                'name' => 'Piraios',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1462,
                'name' => 'Preveza',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1463,
                'name' => 'Rethimni',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1464,
                'name' => 'Rodopi',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1465,
                'name' => 'Samos',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1466,
                'name' => 'Serrai',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1467,
                'name' => 'Thesprotia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1468,
                'name' => 'Thessaloniki',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1469,
                'name' => 'Trikala',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1470,
                'name' => 'Voiotia',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1471,
                'name' => 'West Greece',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1472,
                'name' => 'Xanthi',
            ),
            
            array (
                'country_id' => 85,
                'id' => 1473,
                'name' => 'Zakinthos',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1474,
                'name' => 'Aasiaat',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1475,
                'name' => 'Ammassalik',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1476,
                'name' => 'Illoqqortoormiut',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1477,
                'name' => 'Ilulissat',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1478,
                'name' => 'Ivittuut',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1479,
                'name' => 'Kangaatsiaq',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1480,
                'name' => 'Maniitsoq',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1481,
                'name' => 'Nanortalik',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1482,
                'name' => 'Narsaq',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1483,
                'name' => 'Nuuk',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1484,
                'name' => 'Paamiut',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1485,
                'name' => 'Qaanaaq',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1486,
                'name' => 'Qaqortoq',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1487,
                'name' => 'Qasigiannguit',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1488,
                'name' => 'Qeqertarsuaq',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1489,
                'name' => 'Sisimiut',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1490,
                'name' => 'Udenfor kommunal inddeling',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1491,
                'name' => 'Upernavik',
            ),
            
            array (
                'country_id' => 86,
                'id' => 1492,
                'name' => 'Uummannaq',
            ),
            
            array (
                'country_id' => 87,
                'id' => 1493,
                'name' => 'Carriacou-Petite Martinique',
            ),
            
            array (
                'country_id' => 87,
                'id' => 1494,
                'name' => 'Saint Andrew',
            ),
            
            array (
                'country_id' => 87,
                'id' => 1495,
                'name' => 'Saint Davids',
            ),
            
            array (
                'country_id' => 87,
                'id' => 1496,
                'name' => 'Saint George\'s',
            ),
            
            array (
                'country_id' => 87,
                'id' => 1497,
                'name' => 'Saint John',
            ),
            
            array (
                'country_id' => 87,
                'id' => 1498,
                'name' => 'Saint Mark',
            ),
            
            array (
                'country_id' => 87,
                'id' => 1499,
                'name' => 'Saint Patrick',
            ),
            
            array (
                'country_id' => 88,
                'id' => 1500,
                'name' => 'Basse-Terre',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 88,
                'id' => 1501,
                'name' => 'Grande-Terre',
            ),
            
            array (
                'country_id' => 88,
                'id' => 1502,
                'name' => 'Iles des Saintes',
            ),
            
            array (
                'country_id' => 88,
                'id' => 1503,
                'name' => 'La Desirade',
            ),
            
            array (
                'country_id' => 88,
                'id' => 1504,
                'name' => 'Marie-Galante',
            ),
            
            array (
                'country_id' => 88,
                'id' => 1505,
                'name' => 'Saint Barthelemy',
            ),
            
            array (
                'country_id' => 88,
                'id' => 1506,
                'name' => 'Saint Martin',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1507,
                'name' => 'Agana Heights',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1508,
                'name' => 'Agat',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1509,
                'name' => 'Barrigada',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1510,
                'name' => 'Chalan-Pago-Ordot',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1511,
                'name' => 'Dededo',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1512,
                'name' => 'Hagatna',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1513,
                'name' => 'Inarajan',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1514,
                'name' => 'Mangilao',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1515,
                'name' => 'Merizo',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1516,
                'name' => 'Mongmong-Toto-Maite',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1517,
                'name' => 'Santa Rita',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1518,
                'name' => 'Sinajana',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1519,
                'name' => 'Talofofo',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1520,
                'name' => 'Tamuning',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1521,
                'name' => 'Yigo',
            ),
            
            array (
                'country_id' => 89,
                'id' => 1522,
                'name' => 'Yona',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1523,
                'name' => 'Alta Verapaz',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1524,
                'name' => 'Baja Verapaz',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1525,
                'name' => 'Chimaltenango',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1526,
                'name' => 'Chiquimula',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1527,
                'name' => 'El Progreso',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1528,
                'name' => 'Escuintla',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1529,
                'name' => 'Guatemala',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1530,
                'name' => 'Huehuetenango',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1531,
                'name' => 'Izabal',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1532,
                'name' => 'Jalapa',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1533,
                'name' => 'Jutiapa',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1534,
                'name' => 'Peten',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1535,
                'name' => 'Quezaltenango',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1536,
                'name' => 'Quiche',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1537,
                'name' => 'Retalhuleu',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1538,
                'name' => 'Sacatepequez',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1539,
                'name' => 'San Marcos',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1540,
                'name' => 'Santa Rosa',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1541,
                'name' => 'Solola',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1542,
                'name' => 'Suchitepequez',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1543,
                'name' => 'Totonicapan',
            ),
            
            array (
                'country_id' => 90,
                'id' => 1544,
                'name' => 'Zacapa',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1545,
                'name' => 'Alderney',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1546,
                'name' => 'Castel',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1547,
                'name' => 'Forest',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1548,
                'name' => 'Saint Andrew',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1549,
                'name' => 'Saint Martin',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1550,
                'name' => 'Saint Peter Port',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1551,
                'name' => 'Saint Pierre du Bois',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1552,
                'name' => 'Saint Sampson',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1553,
                'name' => 'Saint Saviour',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1554,
                'name' => 'Sark',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1555,
                'name' => 'Torteval',
            ),
            
            array (
                'country_id' => 91,
                'id' => 1556,
                'name' => 'Vale',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1557,
                'name' => 'Beyla',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1558,
                'name' => 'Boffa',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1559,
                'name' => 'Boke',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1560,
                'name' => 'Conakry',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1561,
                'name' => 'Coyah',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1562,
                'name' => 'Dabola',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1563,
                'name' => 'Dalaba',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1564,
                'name' => 'Dinguiraye',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1565,
                'name' => 'Faranah',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1566,
                'name' => 'Forecariah',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1567,
                'name' => 'Fria',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1568,
                'name' => 'Gaoual',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1569,
                'name' => 'Gueckedou',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1570,
                'name' => 'Kankan',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1571,
                'name' => 'Kerouane',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1572,
                'name' => 'Kindia',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1573,
                'name' => 'Kissidougou',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1574,
                'name' => 'Koubia',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1575,
                'name' => 'Koundara',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1576,
                'name' => 'Kouroussa',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1577,
                'name' => 'Labe',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1578,
                'name' => 'Lola',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1579,
                'name' => 'Macenta',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1580,
                'name' => 'Mali',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1581,
                'name' => 'Mamou',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1582,
                'name' => 'Mandiana',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1583,
                'name' => 'Nzerekore',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1584,
                'name' => 'Pita',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1585,
                'name' => 'Siguiri',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1586,
                'name' => 'Telimele',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1587,
                'name' => 'Tougue',
            ),
            
            array (
                'country_id' => 92,
                'id' => 1588,
                'name' => 'Yomou',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1589,
                'name' => 'Bafata',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1590,
                'name' => 'Bissau',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1591,
                'name' => 'Bolama',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1592,
                'name' => 'Cacheu',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1593,
                'name' => 'Gabu',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1594,
                'name' => 'Oio',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1595,
                'name' => 'Quinara',
            ),
            
            array (
                'country_id' => 93,
                'id' => 1596,
                'name' => 'Tombali',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1597,
                'name' => 'Barima-Waini',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1598,
                'name' => 'Cuyuni-Mazaruni',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1599,
                'name' => 'Demerara-Mahaica',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1600,
                'name' => 'East Berbice-Corentyne',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1601,
                'name' => 'Essequibo Islands-West Demerar',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1602,
                'name' => 'Mahaica-Berbice',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1603,
                'name' => 'Pomeroon-Supenaam',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1604,
                'name' => 'Potaro-Siparuni',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1605,
                'name' => 'Upper Demerara-Berbice',
            ),
            
            array (
                'country_id' => 94,
                'id' => 1606,
                'name' => 'Upper Takutu-Upper Essequibo',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1607,
                'name' => 'Artibonite',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1608,
                'name' => 'Centre',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1609,
                'name' => 'Grand\'Anse',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1610,
                'name' => 'Nord',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1611,
                'name' => 'Nord-Est',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1612,
                'name' => 'Nord-Ouest',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1613,
                'name' => 'Ouest',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1614,
                'name' => 'Sud',
            ),
            
            array (
                'country_id' => 95,
                'id' => 1615,
                'name' => 'Sud-Est',
            ),
            
            array (
                'country_id' => 96,
                'id' => 1616,
                'name' => 'Heard and McDonald Islands',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1617,
                'name' => 'Atlantida',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1618,
                'name' => 'Choluteca',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1619,
                'name' => 'Colon',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1620,
                'name' => 'Comayagua',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1621,
                'name' => 'Copan',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1622,
                'name' => 'Cortes',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1623,
                'name' => 'Distrito Central',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1624,
                'name' => 'El Paraiso',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1625,
                'name' => 'Francisco Morazan',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1626,
                'name' => 'Gracias a Dios',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1627,
                'name' => 'Intibuca',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1628,
                'name' => 'Islas de la Bahia',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1629,
                'name' => 'La Paz',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1630,
                'name' => 'Lempira',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1631,
                'name' => 'Ocotepeque',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1632,
                'name' => 'Olancho',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1633,
                'name' => 'Santa Barbara',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1634,
                'name' => 'Valle',
            ),
            
            array (
                'country_id' => 97,
                'id' => 1635,
                'name' => 'Yoro',
            ),
            
            array (
                'country_id' => 98,
                'id' => 1636,
                'name' => 'Hong Kong',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1637,
                'name' => 'Bacs-Kiskun',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1638,
                'name' => 'Baranya',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1639,
                'name' => 'Bekes',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1640,
                'name' => 'Borsod-Abauj-Zemplen',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1641,
                'name' => 'Budapest',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1642,
                'name' => 'Csongrad',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1643,
                'name' => 'Fejer',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1644,
                'name' => 'Gyor-Moson-Sopron',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1645,
                'name' => 'Hajdu-Bihar',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1646,
                'name' => 'Heves',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1647,
                'name' => 'Jasz-Nagykun-Szolnok',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1648,
                'name' => 'Komarom-Esztergom',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1649,
                'name' => 'Nograd',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1650,
                'name' => 'Pest',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1651,
                'name' => 'Somogy',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1652,
                'name' => 'Szabolcs-Szatmar-Bereg',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1653,
                'name' => 'Tolna',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1654,
                'name' => 'Vas',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1655,
                'name' => 'Veszprem',
            ),
            
            array (
                'country_id' => 99,
                'id' => 1656,
                'name' => 'Zala',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1657,
                'name' => 'Austurland',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1658,
                'name' => 'Gullbringusysla',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1659,
                'name' => 'Hofu borgarsva i',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1660,
                'name' => 'Nor urland eystra',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1661,
                'name' => 'Nor urland vestra',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1662,
                'name' => 'Su urland',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1663,
                'name' => 'Su urnes',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1664,
                'name' => 'Vestfir ir',
            ),
            
            array (
                'country_id' => 100,
                'id' => 1665,
                'name' => 'Vesturland',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1666,
                'name' => 'Aceh',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1667,
                'name' => 'Bali',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1668,
                'name' => 'Bangka-Belitung',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1669,
                'name' => 'Banten',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1670,
                'name' => 'Bengkulu',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1671,
                'name' => 'Gandaria',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1672,
                'name' => 'Gorontalo',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1673,
                'name' => 'Jakarta',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1674,
                'name' => 'Jambi',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1675,
                'name' => 'Jawa Barat',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1676,
                'name' => 'Jawa Tengah',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1677,
                'name' => 'Jawa Timur',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1678,
                'name' => 'Kalimantan Barat',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1679,
                'name' => 'Kalimantan Selatan',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1680,
                'name' => 'Kalimantan Tengah',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1681,
                'name' => 'Kalimantan Timur',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1682,
                'name' => 'Kendal',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1683,
                'name' => 'Lampung',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1684,
                'name' => 'Maluku',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1685,
                'name' => 'Maluku Utara',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1686,
                'name' => 'Nusa Tenggara Barat',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1687,
                'name' => 'Nusa Tenggara Timur',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1688,
                'name' => 'Papua',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1689,
                'name' => 'Riau',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1690,
                'name' => 'Riau Kepulauan',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1691,
                'name' => 'Solo',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1692,
                'name' => 'Sulawesi Selatan',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1693,
                'name' => 'Sulawesi Tengah',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1694,
                'name' => 'Sulawesi Tenggara',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1695,
                'name' => 'Sulawesi Utara',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1696,
                'name' => 'Sumatera Barat',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1697,
                'name' => 'Sumatera Selatan',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1698,
                'name' => 'Sumatera Utara',
            ),
            
            array (
                'country_id' => 102,
                'id' => 1699,
                'name' => 'Yogyakarta',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1700,
                'name' => 'Ardabil',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1701,
                'name' => 'Azarbayjan-e Bakhtari',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1702,
                'name' => 'Azarbayjan-e Khavari',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1703,
                'name' => 'Bushehr',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1704,
                'name' => 'Chahar Mahal-e Bakhtiari',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1705,
                'name' => 'Esfahan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1706,
                'name' => 'Fars',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1707,
                'name' => 'Gilan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1708,
                'name' => 'Golestan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1709,
                'name' => 'Hamadan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1710,
                'name' => 'Hormozgan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1711,
                'name' => 'Ilam',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1712,
                'name' => 'Kerman',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1713,
                'name' => 'Kermanshah',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1714,
                'name' => 'Khorasan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1715,
                'name' => 'Khuzestan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1716,
                'name' => 'Kohgiluyeh-e Boyerahmad',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1717,
                'name' => 'Kordestan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1718,
                'name' => 'Lorestan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1719,
                'name' => 'Markazi',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1720,
                'name' => 'Mazandaran',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1721,
                'name' => 'Ostan-e Esfahan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1722,
                'name' => 'Qazvin',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1723,
                'name' => 'Qom',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1724,
                'name' => 'Semnan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1725,
                'name' => 'Sistan-e Baluchestan',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1726,
                'name' => 'Tehran',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1727,
                'name' => 'Yazd',
            ),
            
            array (
                'country_id' => 103,
                'id' => 1728,
                'name' => 'Zanjan',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1729,
                'name' => 'Babil',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1730,
                'name' => 'Baghdad',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1731,
                'name' => 'Dahuk',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1732,
                'name' => 'Dhi Qar',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1733,
                'name' => 'Diyala',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1734,
                'name' => 'Erbil',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1735,
                'name' => 'Irbil',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1736,
                'name' => 'Karbala',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1737,
                'name' => 'Kurdistan',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1738,
                'name' => 'Maysan',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1739,
                'name' => 'Ninawa',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1740,
                'name' => 'Salah-ad-Din',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1741,
                'name' => 'Wasit',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1742,
                'name' => 'al-Anbar',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1743,
                'name' => 'al-Basrah',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1744,
                'name' => 'al-Muthanna',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1745,
                'name' => 'al-Qadisiyah',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1746,
                'name' => 'an-Najaf',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1747,
                'name' => 'as-Sulaymaniyah',
            ),
            
            array (
                'country_id' => 104,
                'id' => 1748,
                'name' => 'at-Ta\'mim',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1749,
                'name' => 'Armagh',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1750,
                'name' => 'Carlow',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1751,
                'name' => 'Cavan',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1752,
                'name' => 'Clare',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1753,
                'name' => 'Cork',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1754,
                'name' => 'Donegal',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1755,
                'name' => 'Dublin',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1756,
                'name' => 'Galway',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1757,
                'name' => 'Kerry',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1758,
                'name' => 'Kildare',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1759,
                'name' => 'Kilkenny',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1760,
                'name' => 'Laois',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1761,
                'name' => 'Leinster',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1762,
                'name' => 'Leitrim',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1763,
                'name' => 'Limerick',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1764,
                'name' => 'Loch Garman',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1765,
                'name' => 'Longford',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1766,
                'name' => 'Louth',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1767,
                'name' => 'Mayo',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1768,
                'name' => 'Meath',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1769,
                'name' => 'Monaghan',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1770,
                'name' => 'Offaly',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1771,
                'name' => 'Roscommon',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1772,
                'name' => 'Sligo',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1773,
                'name' => 'Tipperary North Riding',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1774,
                'name' => 'Tipperary South Riding',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1775,
                'name' => 'Ulster',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1776,
                'name' => 'Waterford',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1777,
                'name' => 'Westmeath',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1778,
                'name' => 'Wexford',
            ),
            
            array (
                'country_id' => 105,
                'id' => 1779,
                'name' => 'Wicklow',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1780,
                'name' => 'Beit Hanania',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1781,
                'name' => 'Ben Gurion Airport',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1782,
                'name' => 'Bethlehem',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1783,
                'name' => 'Caesarea',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1784,
                'name' => 'Centre',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1785,
                'name' => 'Gaza',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1786,
                'name' => 'Hadaron',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1787,
                'name' => 'Haifa District',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1788,
                'name' => 'Hamerkaz',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1789,
                'name' => 'Hazafon',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1790,
                'name' => 'Hebron',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1791,
                'name' => 'Jaffa',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1792,
                'name' => 'Jerusalem',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1793,
                'name' => 'Khefa',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1794,
                'name' => 'Kiryat Yam',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1795,
                'name' => 'Lower Galilee',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1796,
                'name' => 'Qalqilya',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1797,
                'name' => 'Talme Elazar',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1798,
                'name' => 'Tel Aviv',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1799,
                'name' => 'Tsafon',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1800,
                'name' => 'Umm El Fahem',
            ),
            
            array (
                'country_id' => 106,
                'id' => 1801,
                'name' => 'Yerushalayim',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1802,
                'name' => 'Abruzzi',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1803,
                'name' => 'Abruzzo',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1804,
                'name' => 'Agrigento',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1805,
                'name' => 'Alessandria',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1806,
                'name' => 'Ancona',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1807,
                'name' => 'Arezzo',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1808,
                'name' => 'Ascoli Piceno',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1809,
                'name' => 'Asti',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1810,
                'name' => 'Avellino',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1811,
                'name' => 'Bari',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1812,
                'name' => 'Basilicata',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1813,
                'name' => 'Belluno',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1814,
                'name' => 'Benevento',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1815,
                'name' => 'Bergamo',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1816,
                'name' => 'Biella',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1817,
                'name' => 'Bologna',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1818,
                'name' => 'Bolzano',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1819,
                'name' => 'Brescia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1820,
                'name' => 'Brindisi',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1821,
                'name' => 'Calabria',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1822,
                'name' => 'Campania',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1823,
                'name' => 'Cartoceto',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1824,
                'name' => 'Caserta',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1825,
                'name' => 'Catania',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1826,
                'name' => 'Chieti',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1827,
                'name' => 'Como',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1828,
                'name' => 'Cosenza',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1829,
                'name' => 'Cremona',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1830,
                'name' => 'Cuneo',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1831,
                'name' => 'Emilia-Romagna',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1832,
                'name' => 'Ferrara',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1833,
                'name' => 'Firenze',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1834,
                'name' => 'Florence',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1835,
                'name' => 'Forli-Cesena ',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1836,
                'name' => 'Friuli-Venezia Giulia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1837,
                'name' => 'Frosinone',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1838,
                'name' => 'Genoa',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1839,
                'name' => 'Gorizia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1840,
                'name' => 'L\'Aquila',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1841,
                'name' => 'Lazio',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1842,
                'name' => 'Lecce',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1843,
                'name' => 'Lecco',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1844,
                'name' => 'Lecco Province',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1845,
                'name' => 'Liguria',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1846,
                'name' => 'Lodi',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1847,
                'name' => 'Lombardia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1848,
                'name' => 'Lombardy',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1849,
                'name' => 'Macerata',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1850,
                'name' => 'Mantova',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1851,
                'name' => 'Marche',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1852,
                'name' => 'Messina',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1853,
                'name' => 'Milan',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1854,
                'name' => 'Modena',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1855,
                'name' => 'Molise',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1856,
                'name' => 'Molteno',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1857,
                'name' => 'Montenegro',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1858,
                'name' => 'Monza and Brianza',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1859,
                'name' => 'Naples',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1860,
                'name' => 'Novara',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1861,
                'name' => 'Padova',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1862,
                'name' => 'Parma',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1863,
                'name' => 'Pavia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1864,
                'name' => 'Perugia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1865,
                'name' => 'Pesaro-Urbino',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1866,
                'name' => 'Piacenza',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1867,
                'name' => 'Piedmont',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1868,
                'name' => 'Piemonte',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1869,
                'name' => 'Pisa',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1870,
                'name' => 'Pordenone',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1871,
                'name' => 'Potenza',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1872,
                'name' => 'Puglia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1873,
                'name' => 'Reggio Emilia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1874,
                'name' => 'Rimini',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1875,
                'name' => 'Roma',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1876,
                'name' => 'Salerno',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1877,
                'name' => 'Sardegna',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1878,
                'name' => 'Sassari',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1879,
                'name' => 'Savona',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1880,
                'name' => 'Sicilia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1881,
                'name' => 'Siena',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1882,
                'name' => 'Sondrio',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1883,
                'name' => 'South Tyrol',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1884,
                'name' => 'Taranto',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1885,
                'name' => 'Teramo',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1886,
                'name' => 'Torino',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1887,
                'name' => 'Toscana',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1888,
                'name' => 'Trapani',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1889,
                'name' => 'Trentino-Alto Adige',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1890,
                'name' => 'Trento',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1891,
                'name' => 'Treviso',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1892,
                'name' => 'Udine',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1893,
                'name' => 'Umbria',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1894,
                'name' => 'Valle d\'Aosta',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1895,
                'name' => 'Varese',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1896,
                'name' => 'Veneto',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1897,
                'name' => 'Venezia',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1898,
                'name' => 'Verbano-Cusio-Ossola',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1899,
                'name' => 'Vercelli',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1900,
                'name' => 'Verona',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1901,
                'name' => 'Vicenza',
            ),
            
            array (
                'country_id' => 107,
                'id' => 1902,
                'name' => 'Viterbo',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1903,
                'name' => 'Buxoro Viloyati',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1904,
                'name' => 'Clarendon',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1905,
                'name' => 'Hanover',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1906,
                'name' => 'Kingston',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1907,
                'name' => 'Manchester',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1908,
                'name' => 'Portland',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1909,
                'name' => 'Saint Andrews',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1910,
                'name' => 'Saint Ann',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1911,
                'name' => 'Saint Catherine',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1912,
                'name' => 'Saint Elizabeth',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1913,
                'name' => 'Saint James',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1914,
                'name' => 'Saint Mary',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1915,
                'name' => 'Saint Thomas',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1916,
                'name' => 'Trelawney',
            ),
            
            array (
                'country_id' => 108,
                'id' => 1917,
                'name' => 'Westmoreland',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1918,
                'name' => 'Aichi',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1919,
                'name' => 'Akita',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1920,
                'name' => 'Aomori',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1921,
                'name' => 'Chiba',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1922,
                'name' => 'Ehime',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1923,
                'name' => 'Fukui',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1924,
                'name' => 'Fukuoka',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1925,
                'name' => 'Fukushima',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1926,
                'name' => 'Gifu',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1927,
                'name' => 'Gumma',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1928,
                'name' => 'Hiroshima',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1929,
                'name' => 'Hokkaido',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1930,
                'name' => 'Hyogo',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1931,
                'name' => 'Ibaraki',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1932,
                'name' => 'Ishikawa',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1933,
                'name' => 'Iwate',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1934,
                'name' => 'Kagawa',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1935,
                'name' => 'Kagoshima',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1936,
                'name' => 'Kanagawa',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1937,
                'name' => 'Kanto',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1938,
                'name' => 'Kochi',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1939,
                'name' => 'Kumamoto',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1940,
                'name' => 'Kyoto',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1941,
                'name' => 'Mie',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1942,
                'name' => 'Miyagi',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1943,
                'name' => 'Miyazaki',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1944,
                'name' => 'Nagano',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1945,
                'name' => 'Nagasaki',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1946,
                'name' => 'Nara',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1947,
                'name' => 'Niigata',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1948,
                'name' => 'Oita',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1949,
                'name' => 'Okayama',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1950,
                'name' => 'Okinawa',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1951,
                'name' => 'Osaka',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1952,
                'name' => 'Saga',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1953,
                'name' => 'Saitama',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1954,
                'name' => 'Shiga',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1955,
                'name' => 'Shimane',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1956,
                'name' => 'Shizuoka',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1957,
                'name' => 'Tochigi',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1958,
                'name' => 'Tokushima',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1959,
                'name' => 'Tokyo',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1960,
                'name' => 'Tottori',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1961,
                'name' => 'Toyama',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1962,
                'name' => 'Wakayama',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1963,
                'name' => 'Yamagata',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1964,
                'name' => 'Yamaguchi',
            ),
            
            array (
                'country_id' => 109,
                'id' => 1965,
                'name' => 'Yamanashi',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1966,
                'name' => 'Grouville',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1967,
                'name' => 'Saint Brelade',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1968,
                'name' => 'Saint Clement',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1969,
                'name' => 'Saint Helier',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1970,
                'name' => 'Saint John',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1971,
                'name' => 'Saint Lawrence',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1972,
                'name' => 'Saint Martin',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1973,
                'name' => 'Saint Mary',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1974,
                'name' => 'Saint Peter',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1975,
                'name' => 'Saint Saviour',
            ),
            
            array (
                'country_id' => 110,
                'id' => 1976,
                'name' => 'Trinity',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1977,
                'name' => '\'Ajlun',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1978,
                'name' => 'Amman',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1979,
                'name' => 'Irbid',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1980,
                'name' => 'Jarash',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1981,
                'name' => 'Ma\'an',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1982,
                'name' => 'Madaba',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1983,
                'name' => 'al-\'Aqabah',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1984,
                'name' => 'al-Balqa\'',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1985,
                'name' => 'al-Karak',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1986,
                'name' => 'al-Mafraq',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1987,
                'name' => 'at-Tafilah',
            ),
            
            array (
                'country_id' => 111,
                'id' => 1988,
                'name' => 'az-Zarqa\'',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1989,
                'name' => 'Akmecet',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1990,
                'name' => 'Akmola',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1991,
                'name' => 'Aktobe',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1992,
                'name' => 'Almati',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1993,
                'name' => 'Atirau',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1994,
                'name' => 'Batis Kazakstan',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1995,
                'name' => 'Burlinsky Region',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1996,
                'name' => 'Karagandi',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1997,
                'name' => 'Kostanay',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1998,
                'name' => 'Mankistau',
            ),
            
            array (
                'country_id' => 112,
                'id' => 1999,
                'name' => 'Ontustik Kazakstan',
            ),
            
            array (
                'country_id' => 112,
                'id' => 2000,
                'name' => 'Pavlodar',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 112,
                'id' => 2001,
                'name' => 'Sigis Kazakstan',
            ),
            
            array (
                'country_id' => 112,
                'id' => 2002,
                'name' => 'Soltustik Kazakstan',
            ),
            
            array (
                'country_id' => 112,
                'id' => 2003,
                'name' => 'Taraz',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2004,
                'name' => 'Central',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2005,
                'name' => 'Coast',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2006,
                'name' => 'Eastern',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2007,
                'name' => 'Nairobi',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2008,
                'name' => 'North Eastern',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2009,
                'name' => 'Nyanza',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2010,
                'name' => 'Rift Valley',
            ),
            
            array (
                'country_id' => 113,
                'id' => 2011,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2012,
                'name' => 'Abaiang',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2013,
                'name' => 'Abemana',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2014,
                'name' => 'Aranuka',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2015,
                'name' => 'Arorae',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2016,
                'name' => 'Banaba',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2017,
                'name' => 'Beru',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2018,
                'name' => 'Butaritari',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2019,
                'name' => 'Kiritimati',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2020,
                'name' => 'Kuria',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2021,
                'name' => 'Maiana',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2022,
                'name' => 'Makin',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2023,
                'name' => 'Marakei',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2024,
                'name' => 'Nikunau',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2025,
                'name' => 'Nonouti',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2026,
                'name' => 'Onotoa',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2027,
                'name' => 'Phoenix Islands',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2028,
                'name' => 'Tabiteuea North',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2029,
                'name' => 'Tabiteuea South',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2030,
                'name' => 'Tabuaeran',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2031,
                'name' => 'Tamana',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2032,
                'name' => 'Tarawa North',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2033,
                'name' => 'Tarawa South',
            ),
            
            array (
                'country_id' => 114,
                'id' => 2034,
                'name' => 'Teraina',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2035,
                'name' => 'Chagangdo',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2036,
                'name' => 'Hamgyeongbukto',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2037,
                'name' => 'Hamgyeongnamdo',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2038,
                'name' => 'Hwanghaebukto',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2039,
                'name' => 'Hwanghaenamdo',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2040,
                'name' => 'Kaeseong',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2041,
                'name' => 'Kangweon',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2042,
                'name' => 'Nampo',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2043,
                'name' => 'Pyeonganbukto',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2044,
                'name' => 'Pyeongannamdo',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2045,
                'name' => 'Pyeongyang',
            ),
            
            array (
                'country_id' => 115,
                'id' => 2046,
                'name' => 'Yanggang',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2047,
                'name' => 'Busan',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2048,
                'name' => 'Cheju',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2049,
                'name' => 'Chollabuk',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2050,
                'name' => 'Chollanam',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2051,
                'name' => 'Chungbuk',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2052,
                'name' => 'Chungcheongbuk',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2053,
                'name' => 'Chungcheongnam',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2054,
                'name' => 'Chungnam',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2055,
                'name' => 'Daegu',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2056,
                'name' => 'Gangwon-do',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2057,
                'name' => 'Goyang-si',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2058,
                'name' => 'Gyeonggi-do',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2059,
                'name' => 'Gyeongsang ',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2060,
                'name' => 'Gyeongsangnam-do',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2061,
                'name' => 'Incheon',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2062,
                'name' => 'Jeju-Si',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2063,
                'name' => 'Jeonbuk',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2064,
                'name' => 'Kangweon',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2065,
                'name' => 'Kwangju',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2066,
                'name' => 'Kyeonggi',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2067,
                'name' => 'Kyeongsangbuk',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2068,
                'name' => 'Kyeongsangnam',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2069,
                'name' => 'Kyonggi-do',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2070,
                'name' => 'Kyungbuk-Do',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2071,
                'name' => 'Kyunggi-Do',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2072,
                'name' => 'Kyunggi-do',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2073,
                'name' => 'Pusan',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2074,
                'name' => 'Seoul',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2075,
                'name' => 'Sudogwon',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2076,
                'name' => 'Taegu',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2077,
                'name' => 'Taejeon',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2078,
                'name' => 'Taejon-gwangyoksi',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2079,
                'name' => 'Ulsan',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2080,
                'name' => 'Wonju',
            ),
            
            array (
                'country_id' => 116,
                'id' => 2081,
                'name' => 'gwangyoksi',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2082,
                'name' => 'Al Asimah',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2083,
                'name' => 'Hawalli',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2084,
                'name' => 'Mishref',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2085,
                'name' => 'Qadesiya',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2086,
                'name' => 'Safat',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2087,
                'name' => 'Salmiya',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2088,
                'name' => 'al-Ahmadi',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2089,
                'name' => 'al-Farwaniyah',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2090,
                'name' => 'al-Jahra',
            ),
            
            array (
                'country_id' => 117,
                'id' => 2091,
                'name' => 'al-Kuwayt',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2092,
                'name' => 'Batken',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2093,
                'name' => 'Bishkek',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2094,
                'name' => 'Chui',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2095,
                'name' => 'Issyk-Kul',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2096,
                'name' => 'Jalal-Abad',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2097,
                'name' => 'Naryn',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2098,
                'name' => 'Osh',
            ),
            
            array (
                'country_id' => 118,
                'id' => 2099,
                'name' => 'Talas',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2100,
                'name' => 'Attopu',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2101,
                'name' => 'Bokeo',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2102,
                'name' => 'Bolikhamsay',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2103,
                'name' => 'Champasak',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2104,
                'name' => 'Houaphanh',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2105,
                'name' => 'Khammouane',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2106,
                'name' => 'Luang Nam Tha',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2107,
                'name' => 'Luang Prabang',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2108,
                'name' => 'Oudomxay',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2109,
                'name' => 'Phongsaly',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2110,
                'name' => 'Saravan',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2111,
                'name' => 'Savannakhet',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2112,
                'name' => 'Sekong',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2113,
                'name' => 'Viangchan Prefecture',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2114,
                'name' => 'Viangchan Province',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2115,
                'name' => 'Xaignabury',
            ),
            
            array (
                'country_id' => 119,
                'id' => 2116,
                'name' => 'Xiang Khuang',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2117,
                'name' => 'Aizkraukles',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2118,
                'name' => 'Aluksnes',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2119,
                'name' => 'Balvu',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2120,
                'name' => 'Bauskas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2121,
                'name' => 'Cesu',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2122,
                'name' => 'Daugavpils',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2123,
                'name' => 'Daugavpils City',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2124,
                'name' => 'Dobeles',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2125,
                'name' => 'Gulbenes',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2126,
                'name' => 'Jekabspils',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2127,
                'name' => 'Jelgava',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2128,
                'name' => 'Jelgavas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2129,
                'name' => 'Jurmala City',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2130,
                'name' => 'Kraslavas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2131,
                'name' => 'Kuldigas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2132,
                'name' => 'Liepaja',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2133,
                'name' => 'Liepajas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2134,
                'name' => 'Limbazhu',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2135,
                'name' => 'Ludzas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2136,
                'name' => 'Madonas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2137,
                'name' => 'Ogres',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2138,
                'name' => 'Preilu',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2139,
                'name' => 'Rezekne',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2140,
                'name' => 'Rezeknes',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2141,
                'name' => 'Riga',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2142,
                'name' => 'Rigas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2143,
                'name' => 'Saldus',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2144,
                'name' => 'Talsu',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2145,
                'name' => 'Tukuma',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2146,
                'name' => 'Valkas',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2147,
                'name' => 'Valmieras',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2148,
                'name' => 'Ventspils',
            ),
            
            array (
                'country_id' => 120,
                'id' => 2149,
                'name' => 'Ventspils City',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2150,
                'name' => 'Beirut',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2151,
                'name' => 'Jabal Lubnan',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2152,
                'name' => 'Mohafazat Liban-Nord',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2153,
                'name' => 'Mohafazat Mont-Liban',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2154,
                'name' => 'Sidon',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2155,
                'name' => 'al-Biqa',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2156,
                'name' => 'al-Janub',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2157,
                'name' => 'an-Nabatiyah',
            ),
            
            array (
                'country_id' => 121,
                'id' => 2158,
                'name' => 'ash-Shamal',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2159,
                'name' => 'Berea',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2160,
                'name' => 'Butha-Buthe',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2161,
                'name' => 'Leribe',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2162,
                'name' => 'Mafeteng',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2163,
                'name' => 'Maseru',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2164,
                'name' => 'Mohale\'s Hoek',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2165,
                'name' => 'Mokhotlong',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2166,
                'name' => 'Qacha\'s Nek',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2167,
                'name' => 'Quthing',
            ),
            
            array (
                'country_id' => 122,
                'id' => 2168,
                'name' => 'Thaba-Tseka',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2169,
                'name' => 'Bomi',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2170,
                'name' => 'Bong',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2171,
                'name' => 'Grand Bassa',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2172,
                'name' => 'Grand Cape Mount',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2173,
                'name' => 'Grand Gedeh',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2174,
                'name' => 'Loffa',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2175,
                'name' => 'Margibi',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2176,
                'name' => 'Maryland and Grand Kru',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2177,
                'name' => 'Montserrado',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2178,
                'name' => 'Nimba',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2179,
                'name' => 'Rivercess',
            ),
            
            array (
                'country_id' => 123,
                'id' => 2180,
                'name' => 'Sinoe',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2181,
                'name' => 'Ajdabiya',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2182,
                'name' => 'Fezzan',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2183,
                'name' => 'Banghazi',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2184,
                'name' => 'Darnah',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2185,
                'name' => 'Ghadamis',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2186,
                'name' => 'Gharyan',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2187,
                'name' => 'Misratah',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2188,
                'name' => 'Murzuq',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2189,
                'name' => 'Sabha',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2190,
                'name' => 'Sawfajjin',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2191,
                'name' => 'Surt',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2192,
                'name' => 'Tarabulus',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2193,
                'name' => 'Tarhunah',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2194,
                'name' => 'Tripolitania',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2195,
                'name' => 'Tubruq',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2196,
                'name' => 'Yafran',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2197,
                'name' => 'Zlitan',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2198,
                'name' => 'al-\'Aziziyah',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2199,
                'name' => 'al-Fatih',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2200,
                'name' => 'al-Jabal al Akhdar',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2201,
                'name' => 'al-Jufrah',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2202,
                'name' => 'al-Khums',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2203,
                'name' => 'al-Kufrah',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2204,
                'name' => 'an-Nuqat al-Khams',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2205,
                'name' => 'ash-Shati\'',
            ),
            
            array (
                'country_id' => 124,
                'id' => 2206,
                'name' => 'az-Zawiyah',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2207,
                'name' => 'Balzers',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2208,
                'name' => 'Eschen',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2209,
                'name' => 'Gamprin',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2210,
                'name' => 'Mauren',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2211,
                'name' => 'Planken',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2212,
                'name' => 'Ruggell',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2213,
                'name' => 'Schaan',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2214,
                'name' => 'Schellenberg',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2215,
                'name' => 'Triesen',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2216,
                'name' => 'Triesenberg',
            ),
            
            array (
                'country_id' => 125,
                'id' => 2217,
                'name' => 'Vaduz',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2218,
                'name' => 'Alytaus',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2219,
                'name' => 'Anyksciai',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2220,
                'name' => 'Kauno',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2221,
                'name' => 'Klaipedos',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2222,
                'name' => 'Marijampoles',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2223,
                'name' => 'Panevezhio',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2224,
                'name' => 'Panevezys',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2225,
                'name' => 'Shiauliu',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2226,
                'name' => 'Taurages',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2227,
                'name' => 'Telshiu',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2228,
                'name' => 'Telsiai',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2229,
                'name' => 'Utenos',
            ),
            
            array (
                'country_id' => 126,
                'id' => 2230,
                'name' => 'Vilniaus',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2231,
                'name' => 'Capellen',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2232,
                'name' => 'Clervaux',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2233,
                'name' => 'Diekirch',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2234,
                'name' => 'Echternach',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2235,
                'name' => 'Esch-sur-Alzette',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2236,
                'name' => 'Grevenmacher',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2237,
                'name' => 'Luxembourg',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2238,
                'name' => 'Mersch',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2239,
                'name' => 'Redange',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2240,
                'name' => 'Remich',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2241,
                'name' => 'Vianden',
            ),
            
            array (
                'country_id' => 127,
                'id' => 2242,
                'name' => 'Wiltz',
            ),
            
            array (
                'country_id' => 128,
                'id' => 2243,
                'name' => 'Macau',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2244,
                'name' => 'Berovo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2245,
                'name' => 'Bitola',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2246,
                'name' => 'Brod',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2247,
                'name' => 'Debar',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2248,
                'name' => 'Delchevo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2249,
                'name' => 'Demir Hisar',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2250,
                'name' => 'Gevgelija',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2251,
                'name' => 'Gostivar',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2252,
                'name' => 'Kavadarci',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2253,
                'name' => 'Kichevo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2254,
                'name' => 'Kochani',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2255,
                'name' => 'Kratovo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2256,
                'name' => 'Kriva Palanka',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2257,
                'name' => 'Krushevo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2258,
                'name' => 'Kumanovo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2259,
                'name' => 'Negotino',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2260,
                'name' => 'Ohrid',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2261,
                'name' => 'Prilep',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2262,
                'name' => 'Probishtip',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2263,
                'name' => 'Radovish',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2264,
                'name' => 'Resen',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2265,
                'name' => 'Shtip',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2266,
                'name' => 'Skopje',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2267,
                'name' => 'Struga',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2268,
                'name' => 'Strumica',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2269,
                'name' => 'Sveti Nikole',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2270,
                'name' => 'Tetovo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2271,
                'name' => 'Valandovo',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2272,
                'name' => 'Veles',
            ),
            
            array (
                'country_id' => 129,
                'id' => 2273,
                'name' => 'Vinica',
            ),
            
            array (
                'country_id' => 130,
                'id' => 2274,
                'name' => 'Antananarivo',
            ),
            
            array (
                'country_id' => 130,
                'id' => 2275,
                'name' => 'Antsiranana',
            ),
            
            array (
                'country_id' => 130,
                'id' => 2276,
                'name' => 'Fianarantsoa',
            ),
            
            array (
                'country_id' => 130,
                'id' => 2277,
                'name' => 'Mahajanga',
            ),
            
            array (
                'country_id' => 130,
                'id' => 2278,
                'name' => 'Toamasina',
            ),
            
            array (
                'country_id' => 130,
                'id' => 2279,
                'name' => 'Toliary',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2280,
                'name' => 'Balaka',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2281,
                'name' => 'Blantyre City',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2282,
                'name' => 'Chikwawa',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2283,
                'name' => 'Chiradzulu',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2284,
                'name' => 'Chitipa',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2285,
                'name' => 'Dedza',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2286,
                'name' => 'Dowa',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2287,
                'name' => 'Karonga',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2288,
                'name' => 'Kasungu',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2289,
                'name' => 'Lilongwe City',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2290,
                'name' => 'Machinga',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2291,
                'name' => 'Mangochi',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2292,
                'name' => 'Mchinji',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2293,
                'name' => 'Mulanje',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2294,
                'name' => 'Mwanza',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2295,
                'name' => 'Mzimba',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2296,
                'name' => 'Mzuzu City',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2297,
                'name' => 'Nkhata Bay',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2298,
                'name' => 'Nkhotakota',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2299,
                'name' => 'Nsanje',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2300,
                'name' => 'Ntcheu',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2301,
                'name' => 'Ntchisi',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2302,
                'name' => 'Phalombe',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2303,
                'name' => 'Rumphi',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2304,
                'name' => 'Salima',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2305,
                'name' => 'Thyolo',
            ),
            
            array (
                'country_id' => 131,
                'id' => 2306,
                'name' => 'Zomba Municipality',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2307,
                'name' => 'Johor',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2308,
                'name' => 'Kedah',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2309,
                'name' => 'Kelantan',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2310,
                'name' => 'Kuala Lumpur',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2311,
                'name' => 'Labuan',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2312,
                'name' => 'Melaka',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2313,
                'name' => 'Negeri Johor',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2314,
                'name' => 'Negeri Sembilan',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2315,
                'name' => 'Pahang',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2316,
                'name' => 'Penang',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2317,
                'name' => 'Perak',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2318,
                'name' => 'Perlis',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2319,
                'name' => 'Pulau Pinang',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2320,
                'name' => 'Sabah',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2321,
                'name' => 'Sarawak',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2322,
                'name' => 'Selangor',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2323,
                'name' => 'Sembilan',
            ),
            
            array (
                'country_id' => 132,
                'id' => 2324,
                'name' => 'Terengganu',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2325,
                'name' => 'Alif Alif',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2326,
                'name' => 'Alif Dhaal',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2327,
                'name' => 'Baa',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2328,
                'name' => 'Dhaal',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2329,
                'name' => 'Faaf',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2330,
                'name' => 'Gaaf Alif',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2331,
                'name' => 'Gaaf Dhaal',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2332,
                'name' => 'Ghaviyani',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2333,
                'name' => 'Haa Alif',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2334,
                'name' => 'Haa Dhaal',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2335,
                'name' => 'Kaaf',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2336,
                'name' => 'Laam',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2337,
                'name' => 'Lhaviyani',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2338,
                'name' => 'Male',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2339,
                'name' => 'Miim',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2340,
                'name' => 'Nuun',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2341,
                'name' => 'Raa',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2342,
                'name' => 'Shaviyani',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2343,
                'name' => 'Siin',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2344,
                'name' => 'Thaa',
            ),
            
            array (
                'country_id' => 133,
                'id' => 2345,
                'name' => 'Vaav',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2346,
                'name' => 'Bamako',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2347,
                'name' => 'Gao',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2348,
                'name' => 'Kayes',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2349,
                'name' => 'Kidal',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2350,
                'name' => 'Koulikoro',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2351,
                'name' => 'Mopti',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2352,
                'name' => 'Segou',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2353,
                'name' => 'Sikasso',
            ),
            
            array (
                'country_id' => 134,
                'id' => 2354,
                'name' => 'Tombouctou',
            ),
            
            array (
                'country_id' => 135,
                'id' => 2355,
                'name' => 'Gozo and Comino',
            ),
            
            array (
                'country_id' => 135,
                'id' => 2356,
                'name' => 'Inner Harbour',
            ),
            
            array (
                'country_id' => 135,
                'id' => 2357,
                'name' => 'Northern',
            ),
            
            array (
                'country_id' => 135,
                'id' => 2358,
                'name' => 'Outer Harbour',
            ),
            
            array (
                'country_id' => 135,
                'id' => 2359,
                'name' => 'South Eastern',
            ),
            
            array (
                'country_id' => 135,
                'id' => 2360,
                'name' => 'Valletta',
            ),
            
            array (
                'country_id' => 135,
                'id' => 2361,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2362,
                'name' => 'Castletown',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2363,
                'name' => 'Douglas',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2364,
                'name' => 'Laxey',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2365,
                'name' => 'Onchan',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2366,
                'name' => 'Peel',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2367,
                'name' => 'Port Erin',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2368,
                'name' => 'Port Saint Mary',
            ),
            
            array (
                'country_id' => 136,
                'id' => 2369,
                'name' => 'Ramsey',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2370,
                'name' => 'Ailinlaplap',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2371,
                'name' => 'Ailuk',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2372,
                'name' => 'Arno',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2373,
                'name' => 'Aur',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2374,
                'name' => 'Bikini',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2375,
                'name' => 'Ebon',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2376,
                'name' => 'Enewetak',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2377,
                'name' => 'Jabat',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2378,
                'name' => 'Jaluit',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2379,
                'name' => 'Kili',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2380,
                'name' => 'Kwajalein',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2381,
                'name' => 'Lae',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2382,
                'name' => 'Lib',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2383,
                'name' => 'Likiep',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2384,
                'name' => 'Majuro',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2385,
                'name' => 'Maloelap',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2386,
                'name' => 'Mejit',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2387,
                'name' => 'Mili',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2388,
                'name' => 'Namorik',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2389,
                'name' => 'Namu',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2390,
                'name' => 'Rongelap',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2391,
                'name' => 'Ujae',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2392,
                'name' => 'Utrik',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2393,
                'name' => 'Wotho',
            ),
            
            array (
                'country_id' => 137,
                'id' => 2394,
                'name' => 'Wotje',
            ),
            
            array (
                'country_id' => 138,
                'id' => 2395,
                'name' => 'Fort-de-France',
            ),
            
            array (
                'country_id' => 138,
                'id' => 2396,
                'name' => 'La Trinite',
            ),
            
            array (
                'country_id' => 138,
                'id' => 2397,
                'name' => 'Le Marin',
            ),
            
            array (
                'country_id' => 138,
                'id' => 2398,
                'name' => 'Saint-Pierre',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2399,
                'name' => 'Adrar',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2400,
                'name' => 'Assaba',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2401,
                'name' => 'Brakna',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2402,
                'name' => 'Dhakhlat Nawadibu',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2403,
                'name' => 'Hudh-al-Gharbi',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2404,
                'name' => 'Hudh-ash-Sharqi',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2405,
                'name' => 'Inshiri',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2406,
                'name' => 'Nawakshut',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2407,
                'name' => 'Qidimagha',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2408,
                'name' => 'Qurqul',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2409,
                'name' => 'Taqant',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2410,
                'name' => 'Tiris Zammur',
            ),
            
            array (
                'country_id' => 139,
                'id' => 2411,
                'name' => 'Trarza',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2412,
                'name' => 'Black River',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2413,
                'name' => 'Eau Coulee',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2414,
                'name' => 'Flacq',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2415,
                'name' => 'Floreal',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2416,
                'name' => 'Grand Port',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2417,
                'name' => 'Moka',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2418,
                'name' => 'Pamplempousses',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2419,
                'name' => 'Plaines Wilhelm',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2420,
                'name' => 'Port Louis',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2421,
                'name' => 'Riviere du Rempart',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2422,
                'name' => 'Rodrigues',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2423,
                'name' => 'Rose Hill',
            ),
            
            array (
                'country_id' => 140,
                'id' => 2424,
                'name' => 'Savanne',
            ),
            
            array (
                'country_id' => 141,
                'id' => 2425,
                'name' => 'Mayotte',
            ),
            
            array (
                'country_id' => 141,
                'id' => 2426,
                'name' => 'Pamanzi',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2427,
                'name' => 'Aguascalientes',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2428,
                'name' => 'Baja California',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2429,
                'name' => 'Baja California Sur',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2430,
                'name' => 'Campeche',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2431,
                'name' => 'Chiapas',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2432,
                'name' => 'Chihuahua',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2433,
                'name' => 'Coahuila',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2434,
                'name' => 'Colima',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2435,
                'name' => 'Distrito Federal',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2436,
                'name' => 'Durango',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2437,
                'name' => 'Estado de Mexico',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2438,
                'name' => 'Guanajuato',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2439,
                'name' => 'Guerrero',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2440,
                'name' => 'Hidalgo',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2441,
                'name' => 'Jalisco',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2442,
                'name' => 'Mexico',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2443,
                'name' => 'Michoacan',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2444,
                'name' => 'Morelos',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2445,
                'name' => 'Nayarit',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2446,
                'name' => 'Nuevo Leon',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2447,
                'name' => 'Oaxaca',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2448,
                'name' => 'Puebla',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2449,
                'name' => 'Queretaro',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2450,
                'name' => 'Quintana Roo',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2451,
                'name' => 'San Luis Potosi',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2452,
                'name' => 'Sinaloa',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2453,
                'name' => 'Sonora',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2454,
                'name' => 'Tabasco',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2455,
                'name' => 'Tamaulipas',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2456,
                'name' => 'Tlaxcala',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2457,
                'name' => 'Veracruz',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2458,
                'name' => 'Yucatan',
            ),
            
            array (
                'country_id' => 142,
                'id' => 2459,
                'name' => 'Zacatecas',
            ),
            
            array (
                'country_id' => 143,
                'id' => 2460,
                'name' => 'Chuuk',
            ),
            
            array (
                'country_id' => 143,
                'id' => 2461,
                'name' => 'Kusaie',
            ),
            
            array (
                'country_id' => 143,
                'id' => 2462,
                'name' => 'Pohnpei',
            ),
            
            array (
                'country_id' => 143,
                'id' => 2463,
                'name' => 'Yap',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2464,
                'name' => 'Balti',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2465,
                'name' => 'Cahul',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2466,
                'name' => 'Chisinau',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2467,
                'name' => 'Chisinau Oras',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2468,
                'name' => 'Edinet',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2469,
                'name' => 'Gagauzia',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2470,
                'name' => 'Lapusna',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2471,
                'name' => 'Orhei',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2472,
                'name' => 'Soroca',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2473,
                'name' => 'Taraclia',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2474,
                'name' => 'Tighina',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2475,
                'name' => 'Transnistria',
            ),
            
            array (
                'country_id' => 144,
                'id' => 2476,
                'name' => 'Ungheni',
            ),
            
            array (
                'country_id' => 145,
                'id' => 2477,
                'name' => 'Fontvieille',
            ),
            
            array (
                'country_id' => 145,
                'id' => 2478,
                'name' => 'La Condamine',
            ),
            
            array (
                'country_id' => 145,
                'id' => 2479,
                'name' => 'Monaco-Ville',
            ),
            
            array (
                'country_id' => 145,
                'id' => 2480,
                'name' => 'Monte Carlo',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2481,
                'name' => 'Arhangaj',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2482,
                'name' => 'Bajan-Olgij',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2483,
                'name' => 'Bajanhongor',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2484,
                'name' => 'Bulgan',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2485,
                'name' => 'Darhan-Uul',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2486,
                'name' => 'Dornod',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2487,
                'name' => 'Dornogovi',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2488,
                'name' => 'Dundgovi',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2489,
                'name' => 'Govi-Altaj',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2490,
                'name' => 'Govisumber',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2491,
                'name' => 'Hentij',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2492,
                'name' => 'Hovd',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2493,
                'name' => 'Hovsgol',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2494,
                'name' => 'Omnogovi',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2495,
                'name' => 'Orhon',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2496,
                'name' => 'Ovorhangaj',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2497,
                'name' => 'Selenge',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2498,
                'name' => 'Suhbaatar',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2499,
                'name' => 'Tov',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2500,
                'name' => 'Ulaanbaatar',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 146,
                'id' => 2501,
                'name' => 'Uvs',
            ),
            
            array (
                'country_id' => 146,
                'id' => 2502,
                'name' => 'Zavhan',
            ),
            
            array (
                'country_id' => 147,
                'id' => 2503,
                'name' => 'Montserrat',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2504,
                'name' => 'Agadir',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2505,
                'name' => 'Casablanca',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2506,
                'name' => 'Chaouia-Ouardigha',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2507,
                'name' => 'Doukkala-Abda',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2508,
                'name' => 'Fes-Boulemane',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2509,
                'name' => 'Gharb-Chrarda-Beni Hssen',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2510,
                'name' => 'Guelmim',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2511,
                'name' => 'Kenitra',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2512,
                'name' => 'Marrakech-Tensift-Al Haouz',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2513,
                'name' => 'Meknes-Tafilalet',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2514,
                'name' => 'Oriental',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2515,
                'name' => 'Oujda',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2516,
                'name' => 'Province de Tanger',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2517,
                'name' => 'Rabat-Sale-Zammour-Zaer',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2518,
                'name' => 'Sala Al Jadida',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2519,
                'name' => 'Settat',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2520,
                'name' => 'Souss Massa-Draa',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2521,
                'name' => 'Tadla-Azilal',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2522,
                'name' => 'Tangier-Tetouan',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2523,
                'name' => 'Taza-Al Hoceima-Taounate',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2524,
                'name' => 'Wilaya de Casablanca',
            ),
            
            array (
                'country_id' => 148,
                'id' => 2525,
                'name' => 'Wilaya de Rabat-Sale',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2526,
                'name' => 'Cabo Delgado',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2527,
                'name' => 'Gaza',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2528,
                'name' => 'Inhambane',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2529,
                'name' => 'Manica',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2530,
                'name' => 'Maputo',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2531,
                'name' => 'Maputo Provincia',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2532,
                'name' => 'Nampula',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2533,
                'name' => 'Niassa',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2534,
                'name' => 'Sofala',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2535,
                'name' => 'Tete',
            ),
            
            array (
                'country_id' => 149,
                'id' => 2536,
                'name' => 'Zambezia',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2537,
                'name' => 'Ayeyarwady',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2538,
                'name' => 'Bago',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2539,
                'name' => 'Chin',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2540,
                'name' => 'Kachin',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2541,
                'name' => 'Kayah',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2542,
                'name' => 'Kayin',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2543,
                'name' => 'Magway',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2544,
                'name' => 'Mandalay',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2545,
                'name' => 'Mon',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2546,
                'name' => 'Nay Pyi Taw',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2547,
                'name' => 'Rakhine',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2548,
                'name' => 'Sagaing',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2549,
                'name' => 'Shan',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2550,
                'name' => 'Tanintharyi',
            ),
            
            array (
                'country_id' => 150,
                'id' => 2551,
                'name' => 'Yangon',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2552,
                'name' => 'Caprivi',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2553,
                'name' => 'Erongo',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2554,
                'name' => 'Hardap',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2555,
                'name' => 'Karas',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2556,
                'name' => 'Kavango',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2557,
                'name' => 'Khomas',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2558,
                'name' => 'Kunene',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2559,
                'name' => 'Ohangwena',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2560,
                'name' => 'Omaheke',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2561,
                'name' => 'Omusati',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2562,
                'name' => 'Oshana',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2563,
                'name' => 'Oshikoto',
            ),
            
            array (
                'country_id' => 151,
                'id' => 2564,
                'name' => 'Otjozondjupa',
            ),
            
            array (
                'country_id' => 152,
                'id' => 2565,
                'name' => 'Yaren',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2566,
                'name' => 'Bagmati',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2567,
                'name' => 'Bheri',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2568,
                'name' => 'Dhawalagiri',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2569,
                'name' => 'Gandaki',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2570,
                'name' => 'Janakpur',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2571,
                'name' => 'Karnali',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2572,
                'name' => 'Koshi',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2573,
                'name' => 'Lumbini',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2574,
                'name' => 'Mahakali',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2575,
                'name' => 'Mechi',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2576,
                'name' => 'Narayani',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2577,
                'name' => 'Rapti',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2578,
                'name' => 'Sagarmatha',
            ),
            
            array (
                'country_id' => 153,
                'id' => 2579,
                'name' => 'Seti',
            ),
            
            array (
                'country_id' => 154,
                'id' => 2580,
                'name' => 'Bonaire',
            ),
            
            array (
                'country_id' => 154,
                'id' => 2581,
                'name' => 'Curacao',
            ),
            
            array (
                'country_id' => 154,
                'id' => 2582,
                'name' => 'Saba',
            ),
            
            array (
                'country_id' => 154,
                'id' => 2583,
                'name' => 'Sint Eustatius',
            ),
            
            array (
                'country_id' => 154,
                'id' => 2584,
                'name' => 'Sint Maarten',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2585,
                'name' => 'Amsterdam',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2586,
                'name' => 'Benelux',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2587,
                'name' => 'Drenthe',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2588,
                'name' => 'Flevoland',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2589,
                'name' => 'Friesland',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2590,
                'name' => 'Gelderland',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2591,
                'name' => 'Groningen',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2592,
                'name' => 'Limburg',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2593,
                'name' => 'Noord-Brabant',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2594,
                'name' => 'Noord-Holland',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2595,
                'name' => 'Overijssel',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2596,
                'name' => 'South Holland',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2597,
                'name' => 'Utrecht',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2598,
                'name' => 'Zeeland',
            ),
            
            array (
                'country_id' => 155,
                'id' => 2599,
                'name' => 'Zuid-Holland',
            ),
            
            array (
                'country_id' => 156,
                'id' => 2600,
                'name' => 'Iles',
            ),
            
            array (
                'country_id' => 156,
                'id' => 2601,
                'name' => 'Nord',
            ),
            
            array (
                'country_id' => 156,
                'id' => 2602,
                'name' => 'Sud',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2603,
                'name' => 'Area Outside Region',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2604,
                'name' => 'Auckland',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2605,
                'name' => 'Bay of Plenty',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2606,
                'name' => 'Canterbury',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2607,
                'name' => 'Christchurch',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2608,
                'name' => 'Gisborne',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2609,
                'name' => 'Hawke\'s Bay',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2610,
                'name' => 'Manawatu-Wanganui',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2611,
                'name' => 'Marlborough',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2612,
                'name' => 'Nelson',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2613,
                'name' => 'Northland',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2614,
                'name' => 'Otago',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2615,
                'name' => 'Rodney',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2616,
                'name' => 'Southland',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2617,
                'name' => 'Taranaki',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2618,
                'name' => 'Tasman',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2619,
                'name' => 'Waikato',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2620,
                'name' => 'Wellington',
            ),
            
            array (
                'country_id' => 157,
                'id' => 2621,
                'name' => 'West Coast',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2622,
                'name' => 'Atlantico Norte',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2623,
                'name' => 'Atlantico Sur',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2624,
                'name' => 'Boaco',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2625,
                'name' => 'Carazo',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2626,
                'name' => 'Chinandega',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2627,
                'name' => 'Chontales',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2628,
                'name' => 'Esteli',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2629,
                'name' => 'Granada',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2630,
                'name' => 'Jinotega',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2631,
                'name' => 'Leon',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2632,
                'name' => 'Madriz',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2633,
                'name' => 'Managua',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2634,
                'name' => 'Masaya',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2635,
                'name' => 'Matagalpa',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2636,
                'name' => 'Nueva Segovia',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2637,
                'name' => 'Rio San Juan',
            ),
            
            array (
                'country_id' => 158,
                'id' => 2638,
                'name' => 'Rivas',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2639,
                'name' => 'Agadez',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2640,
                'name' => 'Diffa',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2641,
                'name' => 'Dosso',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2642,
                'name' => 'Maradi',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2643,
                'name' => 'Niamey',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2644,
                'name' => 'Tahoua',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2645,
                'name' => 'Tillabery',
            ),
            
            array (
                'country_id' => 159,
                'id' => 2646,
                'name' => 'Zinder',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2647,
                'name' => 'Abia',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2648,
                'name' => 'Abuja Federal Capital Territor',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2649,
                'name' => 'Adamawa',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2650,
                'name' => 'Akwa Ibom',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2651,
                'name' => 'Anambra',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2652,
                'name' => 'Bauchi',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2653,
                'name' => 'Bayelsa',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2654,
                'name' => 'Benue',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2655,
                'name' => 'Borno',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2656,
                'name' => 'Cross River',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2657,
                'name' => 'Delta',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2658,
                'name' => 'Ebonyi',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2659,
                'name' => 'Edo',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2660,
                'name' => 'Ekiti',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2661,
                'name' => 'Enugu',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2662,
                'name' => 'Gombe',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2663,
                'name' => 'Imo',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2664,
                'name' => 'Jigawa',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2665,
                'name' => 'Kaduna',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2666,
                'name' => 'Kano',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2667,
                'name' => 'Katsina',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2668,
                'name' => 'Kebbi',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2669,
                'name' => 'Kogi',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2670,
                'name' => 'Kwara',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2671,
                'name' => 'Lagos',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2672,
                'name' => 'Nassarawa',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2673,
                'name' => 'Niger',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2674,
                'name' => 'Ogun',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2675,
                'name' => 'Ondo',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2676,
                'name' => 'Osun',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2677,
                'name' => 'Oyo',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2678,
                'name' => 'Plateau',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2679,
                'name' => 'Rivers',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2680,
                'name' => 'Sokoto',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2681,
                'name' => 'Taraba',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2682,
                'name' => 'Yobe',
            ),
            
            array (
                'country_id' => 160,
                'id' => 2683,
                'name' => 'Zamfara',
            ),
            
            array (
                'country_id' => 161,
                'id' => 2684,
                'name' => 'Niue',
            ),
            
            array (
                'country_id' => 162,
                'id' => 2685,
                'name' => 'Norfolk Island',
            ),
            
            array (
                'country_id' => 163,
                'id' => 2686,
                'name' => 'Northern Islands',
            ),
            
            array (
                'country_id' => 163,
                'id' => 2687,
                'name' => 'Rota',
            ),
            
            array (
                'country_id' => 163,
                'id' => 2688,
                'name' => 'Saipan',
            ),
            
            array (
                'country_id' => 163,
                'id' => 2689,
                'name' => 'Tinian',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2690,
                'name' => 'Akershus',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2691,
                'name' => 'Aust Agder',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2692,
                'name' => 'Bergen',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2693,
                'name' => 'Buskerud',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2694,
                'name' => 'Finnmark',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2695,
                'name' => 'Hedmark',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2696,
                'name' => 'Hordaland',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2697,
                'name' => 'Moere og Romsdal',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2698,
                'name' => 'Nord Trondelag',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2699,
                'name' => 'Nordland',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2700,
                'name' => 'Oestfold',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2701,
                'name' => 'Oppland',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2702,
                'name' => 'Oslo',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2703,
                'name' => 'Rogaland',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2704,
                'name' => 'Soer Troendelag',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2705,
                'name' => 'Sogn og Fjordane',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2706,
                'name' => 'Stavern',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2707,
                'name' => 'Sykkylven',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2708,
                'name' => 'Telemark',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2709,
                'name' => 'Troms',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2710,
                'name' => 'Vest Agder',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2711,
                'name' => 'Vestfold',
            ),
            
            array (
                'country_id' => 164,
                'id' => 2712,
                'name' => 'ÃƒÂ˜stfold',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2713,
                'name' => 'Al Buraimi',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2714,
                'name' => 'Dhufar',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2715,
                'name' => 'Masqat',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2716,
                'name' => 'Musandam',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2717,
                'name' => 'Rusayl',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2718,
                'name' => 'Wadi Kabir',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2719,
                'name' => 'ad-Dakhiliyah',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2720,
                'name' => 'adh-Dhahirah',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2721,
                'name' => 'al-Batinah',
            ),
            
            array (
                'country_id' => 165,
                'id' => 2722,
                'name' => 'ash-Sharqiyah',
            ),
            
            array (
                'country_id' => 166,
                'id' => 2723,
                'name' => 'Baluchistan',
            ),
            
            array (
                'country_id' => 166,
                'id' => 2724,
                'name' => 'Federal Capital Area',
            ),
            
            array (
                'country_id' => 166,
                'id' => 2725,
                'name' => 'Federally administered Tribal ',
            ),
            
            array (
                'country_id' => 166,
                'id' => 2726,
                'name' => 'North-West Frontier',
            ),
            
            array (
                'country_id' => 166,
                'id' => 2727,
                'name' => 'Northern Areas',
            ),
            
            array (
                'country_id' => 166,
                'id' => 2728,
                'name' => 'Punjab',
            ),
            
            array (
                'country_id' => 166,
                'id' => 2729,
                'name' => 'Sind',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2730,
                'name' => 'Aimeliik',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2731,
                'name' => 'Airai',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2732,
                'name' => 'Angaur',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2733,
                'name' => 'Hatobohei',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2734,
                'name' => 'Kayangel',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2735,
                'name' => 'Koror',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2736,
                'name' => 'Melekeok',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2737,
                'name' => 'Ngaraard',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2738,
                'name' => 'Ngardmau',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2739,
                'name' => 'Ngaremlengui',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2740,
                'name' => 'Ngatpang',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2741,
                'name' => 'Ngchesar',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2742,
                'name' => 'Ngerchelong',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2743,
                'name' => 'Ngiwal',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2744,
                'name' => 'Peleliu',
            ),
            
            array (
                'country_id' => 167,
                'id' => 2745,
                'name' => 'Sonsorol',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2746,
                'name' => 'Ariha',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2747,
                'name' => 'Bayt Lahm',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2748,
                'name' => 'Bethlehem',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2749,
                'name' => 'Dayr-al-Balah',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2750,
                'name' => 'Ghazzah',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2751,
                'name' => 'Ghazzah ash-Shamaliyah',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2752,
                'name' => 'Janin',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2753,
                'name' => 'Khan Yunis',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2754,
                'name' => 'Nabulus',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2755,
                'name' => 'Qalqilyah',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2756,
                'name' => 'Rafah',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2757,
                'name' => 'Ram Allah wal-Birah',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2758,
                'name' => 'Salfit',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2759,
                'name' => 'Tubas',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2760,
                'name' => 'Tulkarm',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2761,
                'name' => 'al-Khalil',
            ),
            
            array (
                'country_id' => 168,
                'id' => 2762,
                'name' => 'al-Quds',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2763,
                'name' => 'Bocas del Toro',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2764,
                'name' => 'Chiriqui',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2765,
                'name' => 'Cocle',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2766,
                'name' => 'Colon',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2767,
                'name' => 'Darien',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2768,
                'name' => 'Embera',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2769,
                'name' => 'Herrera',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2770,
                'name' => 'Kuna Yala',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2771,
                'name' => 'Los Santos',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2772,
                'name' => 'Ngobe Bugle',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2773,
                'name' => 'Panama',
            ),
            
            array (
                'country_id' => 169,
                'id' => 2774,
                'name' => 'Veraguas',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2775,
                'name' => 'East New Britain',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2776,
                'name' => 'East Sepik',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2777,
                'name' => 'Eastern Highlands',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2778,
                'name' => 'Enga',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2779,
                'name' => 'Fly River',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2780,
                'name' => 'Gulf',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2781,
                'name' => 'Madang',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2782,
                'name' => 'Manus',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2783,
                'name' => 'Milne Bay',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2784,
                'name' => 'Morobe',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2785,
                'name' => 'National Capital District',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2786,
                'name' => 'New Ireland',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2787,
                'name' => 'North Solomons',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2788,
                'name' => 'Oro',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2789,
                'name' => 'Sandaun',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2790,
                'name' => 'Simbu',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2791,
                'name' => 'Southern Highlands',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2792,
                'name' => 'West New Britain',
            ),
            
            array (
                'country_id' => 170,
                'id' => 2793,
                'name' => 'Western Highlands',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2794,
                'name' => 'Alto Paraguay',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2795,
                'name' => 'Alto Parana',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2796,
                'name' => 'Amambay',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2797,
                'name' => 'Asuncion',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2798,
                'name' => 'Boqueron',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2799,
                'name' => 'Caaguazu',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2800,
                'name' => 'Caazapa',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2801,
                'name' => 'Canendiyu',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2802,
                'name' => 'Central',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2803,
                'name' => 'Concepcion',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2804,
                'name' => 'Cordillera',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2805,
                'name' => 'Guaira',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2806,
                'name' => 'Itapua',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2807,
                'name' => 'Misiones',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2808,
                'name' => 'Neembucu',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2809,
                'name' => 'Paraguari',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2810,
                'name' => 'Presidente Hayes',
            ),
            
            array (
                'country_id' => 171,
                'id' => 2811,
                'name' => 'San Pedro',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2812,
                'name' => 'Amazonas',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2813,
                'name' => 'Ancash',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2814,
                'name' => 'Apurimac',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2815,
                'name' => 'Arequipa',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2816,
                'name' => 'Ayacucho',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2817,
                'name' => 'Cajamarca',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2818,
                'name' => 'Cusco',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2819,
                'name' => 'Huancavelica',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2820,
                'name' => 'Huanuco',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2821,
                'name' => 'Ica',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2822,
                'name' => 'Junin',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2823,
                'name' => 'La Libertad',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2824,
                'name' => 'Lambayeque',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2825,
                'name' => 'Lima y Callao',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2826,
                'name' => 'Loreto',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2827,
                'name' => 'Madre de Dios',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2828,
                'name' => 'Moquegua',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2829,
                'name' => 'Pasco',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2830,
                'name' => 'Piura',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2831,
                'name' => 'Puno',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2832,
                'name' => 'San Martin',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2833,
                'name' => 'Tacna',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2834,
                'name' => 'Tumbes',
            ),
            
            array (
                'country_id' => 172,
                'id' => 2835,
                'name' => 'Ucayali',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2836,
                'name' => 'Batangas',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2837,
                'name' => 'Bicol',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2838,
                'name' => 'Bulacan',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2839,
                'name' => 'Cagayan',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2840,
                'name' => 'Caraga',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2841,
                'name' => 'Central Luzon',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2842,
                'name' => 'Central Mindanao',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2843,
                'name' => 'Central Visayas',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2844,
                'name' => 'Cordillera',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2845,
                'name' => 'Davao',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2846,
                'name' => 'Eastern Visayas',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2847,
                'name' => 'Greater Metropolitan Area',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2848,
                'name' => 'Ilocos',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2849,
                'name' => 'Laguna',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2850,
                'name' => 'Luzon',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2851,
                'name' => 'Mactan',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2852,
                'name' => 'Metropolitan Manila Area',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2853,
                'name' => 'Muslim Mindanao',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2854,
                'name' => 'Northern Mindanao',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2855,
                'name' => 'Southern Mindanao',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2856,
                'name' => 'Southern Tagalog',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2857,
                'name' => 'Western Mindanao',
            ),
            
            array (
                'country_id' => 173,
                'id' => 2858,
                'name' => 'Western Visayas',
            ),
            
            array (
                'country_id' => 174,
                'id' => 2859,
                'name' => 'Pitcairn Island',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2860,
                'name' => 'Biale Blota',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2861,
                'name' => 'Dobroszyce',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2862,
                'name' => 'Dolnoslaskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2863,
                'name' => 'Dziekanow Lesny',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2864,
                'name' => 'Hopowo',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2865,
                'name' => 'Kartuzy',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2866,
                'name' => 'Koscian',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2867,
                'name' => 'Krakow',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2868,
                'name' => 'Kujawsko-Pomorskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2869,
                'name' => 'Lodzkie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2870,
                'name' => 'Lubelskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2871,
                'name' => 'Lubuskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2872,
                'name' => 'Malomice',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2873,
                'name' => 'Malopolskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2874,
                'name' => 'Mazowieckie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2875,
                'name' => 'Mirkow',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2876,
                'name' => 'Opolskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2877,
                'name' => 'Ostrowiec',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2878,
                'name' => 'Podkarpackie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2879,
                'name' => 'Podlaskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2880,
                'name' => 'Polska',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2881,
                'name' => 'Pomorskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2882,
                'name' => 'Poznan',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2883,
                'name' => 'Pruszkow',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2884,
                'name' => 'Rymanowska',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2885,
                'name' => 'Rzeszow',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2886,
                'name' => 'Slaskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2887,
                'name' => 'Stare Pole',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2888,
                'name' => 'Swietokrzyskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2889,
                'name' => 'Warminsko-Mazurskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2890,
                'name' => 'Warsaw',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2891,
                'name' => 'Wejherowo',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2892,
                'name' => 'Wielkopolskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2893,
                'name' => 'Wroclaw',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2894,
                'name' => 'Zachodnio-Pomorskie',
            ),
            
            array (
                'country_id' => 175,
                'id' => 2895,
                'name' => 'Zukowo',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2896,
                'name' => 'Abrantes',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2897,
                'name' => 'Acores',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2898,
                'name' => 'Alentejo',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2899,
                'name' => 'Algarve',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2900,
                'name' => 'Braga',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2901,
                'name' => 'Centro',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2902,
                'name' => 'Distrito de Leiria',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2903,
                'name' => 'Distrito de Viana do Castelo',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2904,
                'name' => 'Distrito de Vila Real',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2905,
                'name' => 'Distrito do Porto',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2906,
                'name' => 'Lisboa e Vale do Tejo',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2907,
                'name' => 'Madeira',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2908,
                'name' => 'Norte',
            ),
            
            array (
                'country_id' => 176,
                'id' => 2909,
                'name' => 'Paivas',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2910,
                'name' => 'Arecibo',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2911,
                'name' => 'Bayamon',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2912,
                'name' => 'Carolina',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2913,
                'name' => 'Florida',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2914,
                'name' => 'Guayama',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2915,
                'name' => 'Humacao',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2916,
                'name' => 'Mayaguez-Aguadilla',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2917,
                'name' => 'Ponce',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2918,
                'name' => 'Salinas',
            ),
            
            array (
                'country_id' => 177,
                'id' => 2919,
                'name' => 'San Juan',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2920,
                'name' => 'Doha',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2921,
                'name' => 'Jarian-al-Batnah',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2922,
                'name' => 'Umm Salal',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2923,
                'name' => 'ad-Dawhah',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2924,
                'name' => 'al-Ghuwayriyah',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2925,
                'name' => 'al-Jumayliyah',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2926,
                'name' => 'al-Khawr',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2927,
                'name' => 'al-Wakrah',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2928,
                'name' => 'ar-Rayyan',
            ),
            
            array (
                'country_id' => 178,
                'id' => 2929,
                'name' => 'ash-Shamal',
            ),
            
            array (
                'country_id' => 179,
                'id' => 2930,
                'name' => 'Saint-Benoit',
            ),
            
            array (
                'country_id' => 179,
                'id' => 2931,
                'name' => 'Saint-Denis',
            ),
            
            array (
                'country_id' => 179,
                'id' => 2932,
                'name' => 'Saint-Paul',
            ),
            
            array (
                'country_id' => 179,
                'id' => 2933,
                'name' => 'Saint-Pierre',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2934,
                'name' => 'Alba',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2935,
                'name' => 'Arad',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2936,
                'name' => 'Arges',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2937,
                'name' => 'Bacau',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2938,
                'name' => 'Bihor',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2939,
                'name' => 'Bistrita-Nasaud',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2940,
                'name' => 'Botosani',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2941,
                'name' => 'Braila',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2942,
                'name' => 'Brasov',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2943,
                'name' => 'Bucuresti',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2944,
                'name' => 'Buzau',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2945,
                'name' => 'Calarasi',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2946,
                'name' => 'Caras-Severin',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2947,
                'name' => 'Cluj',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2948,
                'name' => 'Constanta',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2949,
                'name' => 'Covasna',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2950,
                'name' => 'Dambovita',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2951,
                'name' => 'Dolj',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2952,
                'name' => 'Galati',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2953,
                'name' => 'Giurgiu',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2954,
                'name' => 'Gorj',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2955,
                'name' => 'Harghita',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2956,
                'name' => 'Hunedoara',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2957,
                'name' => 'Ialomita',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2958,
                'name' => 'Iasi',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2959,
                'name' => 'Ilfov',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2960,
                'name' => 'Maramures',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2961,
                'name' => 'Mehedinti',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2962,
                'name' => 'Mures',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2963,
                'name' => 'Neamt',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2964,
                'name' => 'Olt',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2965,
                'name' => 'Prahova',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2966,
                'name' => 'Salaj',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2967,
                'name' => 'Satu Mare',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2968,
                'name' => 'Sibiu',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2969,
                'name' => 'Sondelor',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2970,
                'name' => 'Suceava',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2971,
                'name' => 'Teleorman',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2972,
                'name' => 'Timis',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2973,
                'name' => 'Tulcea',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2974,
                'name' => 'Valcea',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2975,
                'name' => 'Vaslui',
            ),
            
            array (
                'country_id' => 180,
                'id' => 2976,
                'name' => 'Vrancea',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2977,
                'name' => 'Adygeja',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2978,
                'name' => 'Aga',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2979,
                'name' => 'Alanija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2980,
                'name' => 'Altaj',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2981,
                'name' => 'Amur',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2982,
                'name' => 'Arhangelsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2983,
                'name' => 'Astrahan',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2984,
                'name' => 'Bashkortostan',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2985,
                'name' => 'Belgorod',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2986,
                'name' => 'Brjansk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2987,
                'name' => 'Burjatija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2988,
                'name' => 'Chechenija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2989,
                'name' => 'Cheljabinsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2990,
                'name' => 'Chita',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2991,
                'name' => 'Chukotka',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2992,
                'name' => 'Chuvashija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2993,
                'name' => 'Dagestan',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2994,
                'name' => 'Evenkija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2995,
                'name' => 'Gorno-Altaj',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2996,
                'name' => 'Habarovsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2997,
                'name' => 'Hakasija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2998,
                'name' => 'Hanty-Mansija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 2999,
                'name' => 'Ingusetija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3000,
                'name' => 'Irkutsk',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 181,
                'id' => 3001,
                'name' => 'Ivanovo',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3002,
                'name' => 'Jamalo-Nenets',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3003,
                'name' => 'Jaroslavl',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3004,
                'name' => 'Jevrej',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3005,
                'name' => 'Kabardino-Balkarija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3006,
                'name' => 'Kaliningrad',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3007,
                'name' => 'Kalmykija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3008,
                'name' => 'Kaluga',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3009,
                'name' => 'Kamchatka',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3010,
                'name' => 'Karachaj-Cherkessija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3011,
                'name' => 'Karelija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3012,
                'name' => 'Kemerovo',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3013,
                'name' => 'Khabarovskiy Kray',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3014,
                'name' => 'Kirov',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3015,
                'name' => 'Komi',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3016,
                'name' => 'Komi-Permjakija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3017,
                'name' => 'Korjakija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3018,
                'name' => 'Kostroma',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3019,
                'name' => 'Krasnodar',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3020,
                'name' => 'Krasnojarsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3021,
                'name' => 'Krasnoyarskiy Kray',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3022,
                'name' => 'Kurgan',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3023,
                'name' => 'Kursk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3024,
                'name' => 'Leningrad',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3025,
                'name' => 'Lipeck',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3026,
                'name' => 'Magadan',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3027,
                'name' => 'Marij El',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3028,
                'name' => 'Mordovija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3029,
                'name' => 'Moscow',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3030,
                'name' => 'Moskovskaja Oblast',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3031,
                'name' => 'Moskovskaya Oblast',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3032,
                'name' => 'Moskva',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3033,
                'name' => 'Murmansk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3034,
                'name' => 'Nenets',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3035,
                'name' => 'Nizhnij Novgorod',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3036,
                'name' => 'Novgorod',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3037,
                'name' => 'Novokusnezk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3038,
                'name' => 'Novosibirsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3039,
                'name' => 'Omsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3040,
                'name' => 'Orenburg',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3041,
                'name' => 'Orjol',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3042,
                'name' => 'Penza',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3043,
                'name' => 'Perm',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3044,
                'name' => 'Primorje',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3045,
                'name' => 'Pskov',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3046,
                'name' => 'Pskovskaya Oblast',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3047,
                'name' => 'Rjazan',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3048,
                'name' => 'Rostov',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3049,
                'name' => 'Saha',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3050,
                'name' => 'Sahalin',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3051,
                'name' => 'Samara',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3052,
                'name' => 'Samarskaya',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3053,
                'name' => 'Sankt-Peterburg',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3054,
                'name' => 'Saratov',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3055,
                'name' => 'Smolensk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3056,
                'name' => 'Stavropol',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3057,
                'name' => 'Sverdlovsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3058,
                'name' => 'Tajmyrija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3059,
                'name' => 'Tambov',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3060,
                'name' => 'Tatarstan',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3061,
                'name' => 'Tjumen',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3062,
                'name' => 'Tomsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3063,
                'name' => 'Tula',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3064,
                'name' => 'Tver',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3065,
                'name' => 'Tyva',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3066,
                'name' => 'Udmurtija',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3067,
                'name' => 'Uljanovsk',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3068,
                'name' => 'Ulyanovskaya Oblast',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3069,
                'name' => 'Ust-Orda',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3070,
                'name' => 'Vladimir',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3071,
                'name' => 'Volgograd',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3072,
                'name' => 'Vologda',
            ),
            
            array (
                'country_id' => 181,
                'id' => 3073,
                'name' => 'Voronezh',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3074,
                'name' => 'Butare',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3075,
                'name' => 'Byumba',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3076,
                'name' => 'Cyangugu',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3077,
                'name' => 'Gikongoro',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3078,
                'name' => 'Gisenyi',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3079,
                'name' => 'Gitarama',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3080,
                'name' => 'Kibungo',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3081,
                'name' => 'Kibuye',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3082,
                'name' => 'Kigali-ngali',
            ),
            
            array (
                'country_id' => 182,
                'id' => 3083,
                'name' => 'Ruhengeri',
            ),
            
            array (
                'country_id' => 183,
                'id' => 3084,
                'name' => 'Ascension',
            ),
            
            array (
                'country_id' => 183,
                'id' => 3085,
                'name' => 'Gough Island',
            ),
            
            array (
                'country_id' => 183,
                'id' => 3086,
                'name' => 'Saint Helena',
            ),
            
            array (
                'country_id' => 183,
                'id' => 3087,
                'name' => 'Tristan da Cunha',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3088,
                'name' => 'Christ Church Nichola Town',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3089,
                'name' => 'Saint Anne Sandy Point',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3090,
                'name' => 'Saint George Basseterre',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3091,
                'name' => 'Saint George Gingerland',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3092,
                'name' => 'Saint James Windward',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3093,
                'name' => 'Saint John Capesterre',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3094,
                'name' => 'Saint John Figtree',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3095,
                'name' => 'Saint Mary Cayon',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3096,
                'name' => 'Saint Paul Capesterre',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3097,
                'name' => 'Saint Paul Charlestown',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3098,
                'name' => 'Saint Peter Basseterre',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3099,
                'name' => 'Saint Thomas Lowland',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3100,
                'name' => 'Saint Thomas Middle Island',
            ),
            
            array (
                'country_id' => 184,
                'id' => 3101,
                'name' => 'Trinity Palmetto Point',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3102,
                'name' => 'Anse-la-Raye',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3103,
                'name' => 'Canaries',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3104,
                'name' => 'Castries',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3105,
                'name' => 'Choiseul',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3106,
                'name' => 'Dennery',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3107,
                'name' => 'Gros Inlet',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3108,
                'name' => 'Laborie',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3109,
                'name' => 'Micoud',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3110,
                'name' => 'Soufriere',
            ),
            
            array (
                'country_id' => 185,
                'id' => 3111,
                'name' => 'Vieux Fort',
            ),
            
            array (
                'country_id' => 186,
                'id' => 3112,
                'name' => 'Miquelon-Langlade',
            ),
            
            array (
                'country_id' => 186,
                'id' => 3113,
                'name' => 'Saint-Pierre',
            ),
            
            array (
                'country_id' => 187,
                'id' => 3114,
                'name' => 'Charlotte',
            ),
            
            array (
                'country_id' => 187,
                'id' => 3115,
                'name' => 'Grenadines',
            ),
            
            array (
                'country_id' => 187,
                'id' => 3116,
                'name' => 'Saint Andrew',
            ),
            
            array (
                'country_id' => 187,
                'id' => 3117,
                'name' => 'Saint David',
            ),
            
            array (
                'country_id' => 187,
                'id' => 3118,
                'name' => 'Saint George',
            ),
            
            array (
                'country_id' => 187,
                'id' => 3119,
                'name' => 'Saint Patrick',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3120,
                'name' => 'A\'ana',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3121,
                'name' => 'Aiga-i-le-Tai',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3122,
                'name' => 'Atua',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3123,
                'name' => 'Fa\'asaleleaga',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3124,
                'name' => 'Gaga\'emauga',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3125,
                'name' => 'Gagaifomauga',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3126,
                'name' => 'Palauli',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3127,
                'name' => 'Satupa\'itea',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3128,
                'name' => 'Tuamasaga',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3129,
                'name' => 'Va\'a-o-Fonoti',
            ),
            
            array (
                'country_id' => 188,
                'id' => 3130,
                'name' => 'Vaisigano',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3131,
                'name' => 'Acquaviva',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3132,
                'name' => 'Borgo Maggiore',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3133,
                'name' => 'Chiesanuova',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3134,
                'name' => 'Domagnano',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3135,
                'name' => 'Faetano',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3136,
                'name' => 'Fiorentino',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3137,
                'name' => 'Montegiardino',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3138,
                'name' => 'San Marino',
            ),
            
            array (
                'country_id' => 189,
                'id' => 3139,
                'name' => 'Serravalle',
            ),
            
            array (
                'country_id' => 190,
                'id' => 3140,
                'name' => 'Agua Grande',
            ),
            
            array (
                'country_id' => 190,
                'id' => 3141,
                'name' => 'Cantagalo',
            ),
            
            array (
                'country_id' => 190,
                'id' => 3142,
                'name' => 'Lemba',
            ),
            
            array (
                'country_id' => 190,
                'id' => 3143,
                'name' => 'Lobata',
            ),
            
            array (
                'country_id' => 190,
                'id' => 3144,
                'name' => 'Me-Zochi',
            ),
            
            array (
                'country_id' => 190,
                'id' => 3145,
                'name' => 'Pague',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3146,
                'name' => 'Al Khobar',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3147,
                'name' => 'Aseer',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3148,
                'name' => 'Ash Sharqiyah',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3149,
                'name' => 'Asir',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3150,
                'name' => 'Central Province',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3151,
                'name' => 'Eastern Province',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3152,
                'name' => 'Ha\'il',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3153,
                'name' => 'Jawf',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3154,
                'name' => 'Jizan',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3155,
                'name' => 'Makkah',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3156,
                'name' => 'Najran',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3157,
                'name' => 'Qasim',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3158,
                'name' => 'Tabuk',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3159,
                'name' => 'Western Province',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3160,
                'name' => 'al-Bahah',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3161,
                'name' => 'al-Hudud-ash-Shamaliyah',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3162,
                'name' => 'al-Madinah',
            ),
            
            array (
                'country_id' => 191,
                'id' => 3163,
                'name' => 'ar-Riyad',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3164,
                'name' => 'Dakar',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3165,
                'name' => 'Diourbel',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3166,
                'name' => 'Fatick',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3167,
                'name' => 'Kaolack',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3168,
                'name' => 'Kolda',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3169,
                'name' => 'Louga',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3170,
                'name' => 'Saint-Louis',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3171,
                'name' => 'Tambacounda',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3172,
                'name' => 'Thies',
            ),
            
            array (
                'country_id' => 192,
                'id' => 3173,
                'name' => 'Ziguinchor',
            ),
            
            array (
                'country_id' => 193,
                'id' => 3174,
                'name' => 'Central Serbia',
            ),
            
            array (
                'country_id' => 193,
                'id' => 3175,
                'name' => 'Kosovo and Metohija',
            ),
            
            array (
                'country_id' => 193,
                'id' => 3176,
                'name' => 'Vojvodina',
            ),
            
            array (
                'country_id' => 194,
                'id' => 3177,
                'name' => 'Anse Boileau',
            ),
            
            array (
                'country_id' => 194,
                'id' => 3178,
                'name' => 'Anse Royale',
            ),
            
            array (
                'country_id' => 194,
                'id' => 3179,
                'name' => 'Cascade',
            ),
            
            array (
                'country_id' => 194,
                'id' => 3180,
                'name' => 'Takamaka',
            ),
            
            array (
                'country_id' => 194,
                'id' => 3181,
                'name' => 'Victoria',
            ),
            
            array (
                'country_id' => 195,
                'id' => 3182,
                'name' => 'Eastern',
            ),
            
            array (
                'country_id' => 195,
                'id' => 3183,
                'name' => 'Northern',
            ),
            
            array (
                'country_id' => 195,
                'id' => 3184,
                'name' => 'Southern',
            ),
            
            array (
                'country_id' => 195,
                'id' => 3185,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 196,
                'id' => 3186,
                'name' => 'Singapore',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3187,
                'name' => 'Banskobystricky',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3188,
                'name' => 'Bratislavsky',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3189,
                'name' => 'Kosicky',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3190,
                'name' => 'Nitriansky',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3191,
                'name' => 'Presovsky',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3192,
                'name' => 'Trenciansky',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3193,
                'name' => 'Trnavsky',
            ),
            
            array (
                'country_id' => 197,
                'id' => 3194,
                'name' => 'Zilinsky',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3195,
                'name' => 'Benedikt',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3196,
                'name' => 'Gorenjska',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3197,
                'name' => 'Gorishka',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3198,
                'name' => 'Jugovzhodna Slovenija',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3199,
                'name' => 'Koroshka',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3200,
                'name' => 'Notranjsko-krashka',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3201,
                'name' => 'Obalno-krashka',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3202,
                'name' => 'Obcina Domzale',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3203,
                'name' => 'Obcina Vitanje',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3204,
                'name' => 'Osrednjeslovenska',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3205,
                'name' => 'Podravska',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3206,
                'name' => 'Pomurska',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3207,
                'name' => 'Savinjska',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3208,
                'name' => 'Slovenian Littoral',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3209,
                'name' => 'Spodnjeposavska',
            ),
            
            array (
                'country_id' => 198,
                'id' => 3210,
                'name' => 'Zasavska',
            ),
            
            array (
                'country_id' => 199,
                'id' => 3211,
                'name' => 'Pitcairn',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3212,
                'name' => 'Central',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3213,
                'name' => 'Choiseul',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3214,
                'name' => 'Guadalcanal',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3215,
                'name' => 'Isabel',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3216,
                'name' => 'Makira and Ulawa',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3217,
                'name' => 'Malaita',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3218,
                'name' => 'Rennell and Bellona',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3219,
                'name' => 'Temotu',
            ),
            
            array (
                'country_id' => 200,
                'id' => 3220,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3221,
                'name' => 'Awdal',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3222,
                'name' => 'Bakol',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3223,
                'name' => 'Banadir',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3224,
                'name' => 'Bari',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3225,
                'name' => 'Bay',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3226,
                'name' => 'Galgudug',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3227,
                'name' => 'Gedo',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3228,
                'name' => 'Hiran',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3229,
                'name' => 'Jubbada Hose',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3230,
                'name' => 'Jubbadha Dexe',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3231,
                'name' => 'Mudug',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3232,
                'name' => 'Nugal',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3233,
                'name' => 'Sanag',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3234,
                'name' => 'Shabellaha Dhexe',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3235,
                'name' => 'Shabellaha Hose',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3236,
                'name' => 'Togdher',
            ),
            
            array (
                'country_id' => 201,
                'id' => 3237,
                'name' => 'Woqoyi Galbed',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3238,
                'name' => 'Eastern Cape',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3239,
                'name' => 'Free State',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3240,
                'name' => 'Gauteng',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3241,
                'name' => 'Kempton Park',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3242,
                'name' => 'Kramerville',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3243,
                'name' => 'KwaZulu Natal',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3244,
                'name' => 'Limpopo',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3245,
                'name' => 'Mpumalanga',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3246,
                'name' => 'North West',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3247,
                'name' => 'Northern Cape',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3248,
                'name' => 'Parow',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3249,
                'name' => 'Table View',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3250,
                'name' => 'Umtentweni',
            ),
            
            array (
                'country_id' => 202,
                'id' => 3251,
                'name' => 'Western Cape',
            ),
            
            array (
                'country_id' => 203,
                'id' => 3252,
                'name' => 'South Georgia',
            ),
            
            array (
                'country_id' => 204,
                'id' => 3253,
                'name' => 'Central Equatoria',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3254,
                'name' => 'A Coruna',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3255,
                'name' => 'Alacant',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3256,
                'name' => 'Alava',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3257,
                'name' => 'Albacete',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3258,
                'name' => 'Almeria',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3259,
                'name' => 'Andalucia',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3260,
                'name' => 'Asturias',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3261,
                'name' => 'Avila',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3262,
                'name' => 'Badajoz',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3263,
                'name' => 'Balears',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3264,
                'name' => 'Barcelona',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3265,
                'name' => 'Bertamirans',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3266,
                'name' => 'Biscay',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3267,
                'name' => 'Burgos',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3268,
                'name' => 'Caceres',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3269,
                'name' => 'Cadiz',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3270,
                'name' => 'Cantabria',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3271,
                'name' => 'Castello',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3272,
                'name' => 'Catalunya',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3273,
                'name' => 'Ceuta',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3274,
                'name' => 'Ciudad Real',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3275,
                'name' => 'Comunidad Autonoma de Canarias',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3276,
                'name' => 'Comunidad Autonoma de Cataluna',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3277,
                'name' => 'Comunidad Autonoma de Galicia',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3278,
                'name' => 'Comunidad Autonoma de las Isla',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3279,
                'name' => 'Comunidad Autonoma del Princip',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3280,
                'name' => 'Comunidad Valenciana',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3281,
                'name' => 'Cordoba',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3282,
                'name' => 'Cuenca',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3283,
                'name' => 'Gipuzkoa',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3284,
                'name' => 'Girona',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3285,
                'name' => 'Granada',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3286,
                'name' => 'Guadalajara',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3287,
                'name' => 'Guipuzcoa',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3288,
                'name' => 'Huelva',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3289,
                'name' => 'Huesca',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3290,
                'name' => 'Jaen',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3291,
                'name' => 'La Rioja',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3292,
                'name' => 'Las Palmas',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3293,
                'name' => 'Leon',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3294,
                'name' => 'Lerida',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3295,
                'name' => 'Lleida',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3296,
                'name' => 'Lugo',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3297,
                'name' => 'Madrid',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3298,
                'name' => 'Malaga',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3299,
                'name' => 'Melilla',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3300,
                'name' => 'Murcia',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3301,
                'name' => 'Navarra',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3302,
                'name' => 'Ourense',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3303,
                'name' => 'Pais Vasco',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3304,
                'name' => 'Palencia',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3305,
                'name' => 'Pontevedra',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3306,
                'name' => 'Salamanca',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3307,
                'name' => 'Santa Cruz de Tenerife',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3308,
                'name' => 'Segovia',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3309,
                'name' => 'Sevilla',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3310,
                'name' => 'Soria',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3311,
                'name' => 'Tarragona',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3312,
                'name' => 'Tenerife',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3313,
                'name' => 'Teruel',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3314,
                'name' => 'Toledo',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3315,
                'name' => 'Valencia',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3316,
                'name' => 'Valladolid',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3317,
                'name' => 'Vizcaya',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3318,
                'name' => 'Zamora',
            ),
            
            array (
                'country_id' => 205,
                'id' => 3319,
                'name' => 'Zaragoza',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3320,
                'name' => 'Amparai',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3321,
                'name' => 'Anuradhapuraya',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3322,
                'name' => 'Badulla',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3323,
                'name' => 'Boralesgamuwa',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3324,
                'name' => 'Colombo',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3325,
                'name' => 'Galla',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3326,
                'name' => 'Gampaha',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3327,
                'name' => 'Hambantota',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3328,
                'name' => 'Kalatura',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3329,
                'name' => 'Kegalla',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3330,
                'name' => 'Kilinochchi',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3331,
                'name' => 'Kurunegala',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3332,
                'name' => 'Madakalpuwa',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3333,
                'name' => 'Maha Nuwara',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3334,
                'name' => 'Malwana',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3335,
                'name' => 'Mannarama',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3336,
                'name' => 'Matale',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3337,
                'name' => 'Matara',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3338,
                'name' => 'Monaragala',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3339,
                'name' => 'Mullaitivu',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3340,
                'name' => 'North Eastern Province',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3341,
                'name' => 'North Western Province',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3342,
                'name' => 'Nuwara Eliya',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3343,
                'name' => 'Polonnaruwa',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3344,
                'name' => 'Puttalama',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3345,
                'name' => 'Ratnapuraya',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3346,
                'name' => 'Southern Province',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3347,
                'name' => 'Tirikunamalaya',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3348,
                'name' => 'Tuscany',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3349,
                'name' => 'Vavuniyawa',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3350,
                'name' => 'Western Province',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3351,
                'name' => 'Yapanaya',
            ),
            
            array (
                'country_id' => 206,
                'id' => 3352,
                'name' => 'kadawatha',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3353,
                'name' => 'A\'ali-an-Nil',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3354,
                'name' => 'Bahr-al-Jabal',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3355,
                'name' => 'Central Equatoria',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3356,
                'name' => 'Gharb Bahr-al-Ghazal',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3357,
                'name' => 'Gharb Darfur',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3358,
                'name' => 'Gharb Kurdufan',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3359,
                'name' => 'Gharb-al-Istiwa\'iyah',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3360,
                'name' => 'Janub Darfur',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3361,
                'name' => 'Janub Kurdufan',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3362,
                'name' => 'Junqali',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3363,
                'name' => 'Kassala',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3364,
                'name' => 'Nahr-an-Nil',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3365,
                'name' => 'Shamal Bahr-al-Ghazal',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3366,
                'name' => 'Shamal Darfur',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3367,
                'name' => 'Shamal Kurdufan',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3368,
                'name' => 'Sharq-al-Istiwa\'iyah',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3369,
                'name' => 'Sinnar',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3370,
                'name' => 'Warab',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3371,
                'name' => 'Wilayat al Khartum',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3372,
                'name' => 'al-Bahr-al-Ahmar',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3373,
                'name' => 'al-Buhayrat',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3374,
                'name' => 'al-Jazirah',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3375,
                'name' => 'al-Khartum',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3376,
                'name' => 'al-Qadarif',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3377,
                'name' => 'al-Wahdah',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3378,
                'name' => 'an-Nil-al-Abyad',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3379,
                'name' => 'an-Nil-al-Azraq',
            ),
            
            array (
                'country_id' => 207,
                'id' => 3380,
                'name' => 'ash-Shamaliyah',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3381,
                'name' => 'Brokopondo',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3382,
                'name' => 'Commewijne',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3383,
                'name' => 'Coronie',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3384,
                'name' => 'Marowijne',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3385,
                'name' => 'Nickerie',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3386,
                'name' => 'Para',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3387,
                'name' => 'Paramaribo',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3388,
                'name' => 'Saramacca',
            ),
            
            array (
                'country_id' => 208,
                'id' => 3389,
                'name' => 'Wanica',
            ),
            
            array (
                'country_id' => 209,
                'id' => 3390,
                'name' => 'Svalbard',
            ),
            
            array (
                'country_id' => 210,
                'id' => 3391,
                'name' => 'Hhohho',
            ),
            
            array (
                'country_id' => 210,
                'id' => 3392,
                'name' => 'Lubombo',
            ),
            
            array (
                'country_id' => 210,
                'id' => 3393,
                'name' => 'Manzini',
            ),
            
            array (
                'country_id' => 210,
                'id' => 3394,
                'name' => 'Shiselweni',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3395,
                'name' => 'Alvsborgs Lan',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3396,
                'name' => 'Angermanland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3397,
                'name' => 'Blekinge',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3398,
                'name' => 'Bohuslan',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3399,
                'name' => 'Dalarna',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3400,
                'name' => 'Gavleborg',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3401,
                'name' => 'Gaza',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3402,
                'name' => 'Gotland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3403,
                'name' => 'Halland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3404,
                'name' => 'Jamtland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3405,
                'name' => 'Jonkoping',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3406,
                'name' => 'Kalmar',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3407,
                'name' => 'Kristianstads',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3408,
                'name' => 'Kronoberg',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3409,
                'name' => 'Norrbotten',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3410,
                'name' => 'Orebro',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3411,
                'name' => 'Ostergotland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3412,
                'name' => 'Saltsjo-Boo',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3413,
                'name' => 'Skane',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3414,
                'name' => 'Smaland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3415,
                'name' => 'Sodermanland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3416,
                'name' => 'Stockholm',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3417,
                'name' => 'Uppsala',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3418,
                'name' => 'Varmland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3419,
                'name' => 'Vasterbotten',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3420,
                'name' => 'Vastergotland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3421,
                'name' => 'Vasternorrland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3422,
                'name' => 'Vastmanland',
            ),
            
            array (
                'country_id' => 211,
                'id' => 3423,
                'name' => 'Vastra Gotaland',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3424,
                'name' => 'Aargau',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3425,
                'name' => 'Appenzell Inner-Rhoden',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3426,
                'name' => 'Appenzell-Ausser Rhoden',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3427,
                'name' => 'Basel-Landschaft',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3428,
                'name' => 'Basel-Stadt',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3429,
                'name' => 'Bern',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3430,
                'name' => 'Canton Ticino',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3431,
                'name' => 'Fribourg',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3432,
                'name' => 'Geneve',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3433,
                'name' => 'Glarus',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3434,
                'name' => 'Graubunden',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3435,
                'name' => 'Heerbrugg',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3436,
                'name' => 'Jura',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3437,
                'name' => 'Kanton Aargau',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3438,
                'name' => 'Luzern',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3439,
                'name' => 'Morbio Inferiore',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3440,
                'name' => 'Muhen',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3441,
                'name' => 'Neuchatel',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3442,
                'name' => 'Nidwalden',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3443,
                'name' => 'Obwalden',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3444,
                'name' => 'Sankt Gallen',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3445,
                'name' => 'Schaffhausen',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3446,
                'name' => 'Schwyz',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3447,
                'name' => 'Solothurn',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3448,
                'name' => 'Thurgau',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3449,
                'name' => 'Ticino',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3450,
                'name' => 'Uri',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3451,
                'name' => 'Valais',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3452,
                'name' => 'Vaud',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3453,
                'name' => 'Vauffelin',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3454,
                'name' => 'Zug',
            ),
            
            array (
                'country_id' => 212,
                'id' => 3455,
                'name' => 'Zurich',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3456,
                'name' => 'Aleppo',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3457,
                'name' => 'Dar\'a',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3458,
                'name' => 'Dayr-az-Zawr',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3459,
                'name' => 'Dimashq',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3460,
                'name' => 'Halab',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3461,
                'name' => 'Hamah',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3462,
                'name' => 'Hims',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3463,
                'name' => 'Idlib',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3464,
                'name' => 'Madinat Dimashq',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3465,
                'name' => 'Tartus',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3466,
                'name' => 'al-Hasakah',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3467,
                'name' => 'al-Ladhiqiyah',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3468,
                'name' => 'al-Qunaytirah',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3469,
                'name' => 'ar-Raqqah',
            ),
            
            array (
                'country_id' => 213,
                'id' => 3470,
                'name' => 'as-Suwayda',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3471,
                'name' => 'Changhwa',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3472,
                'name' => 'Chiayi Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3473,
                'name' => 'Chiayi Shih',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3474,
                'name' => 'Eastern Taipei',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3475,
                'name' => 'Hsinchu Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3476,
                'name' => 'Hsinchu Shih',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3477,
                'name' => 'Hualien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3478,
                'name' => 'Ilan',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3479,
                'name' => 'Kaohsiung Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3480,
                'name' => 'Kaohsiung Shih',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3481,
                'name' => 'Keelung Shih',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3482,
                'name' => 'Kinmen',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3483,
                'name' => 'Miaoli',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3484,
                'name' => 'Nantou',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3485,
                'name' => 'Northern Taiwan',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3486,
                'name' => 'Penghu',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3487,
                'name' => 'Pingtung',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3488,
                'name' => 'Taichung',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3489,
                'name' => 'Taichung Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3490,
                'name' => 'Taichung Shih',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3491,
                'name' => 'Tainan Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3492,
                'name' => 'Tainan Shih',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3493,
                'name' => 'Taipei Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3494,
                'name' => 'Taipei Shih / Taipei Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3495,
                'name' => 'Taitung',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3496,
                'name' => 'Taoyuan',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3497,
                'name' => 'Yilan',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3498,
                'name' => 'Yun-Lin Hsien',
            ),
            
            array (
                'country_id' => 214,
                'id' => 3499,
                'name' => 'Yunlin',
            ),
            
            array (
                'country_id' => 215,
                'id' => 3500,
                'name' => 'Dushanbe',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 215,
                'id' => 3501,
                'name' => 'Gorno-Badakhshan',
            ),
            
            array (
                'country_id' => 215,
                'id' => 3502,
                'name' => 'Karotegin',
            ),
            
            array (
                'country_id' => 215,
                'id' => 3503,
                'name' => 'Khatlon',
            ),
            
            array (
                'country_id' => 215,
                'id' => 3504,
                'name' => 'Sughd',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3505,
                'name' => 'Arusha',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3506,
                'name' => 'Dar es Salaam',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3507,
                'name' => 'Dodoma',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3508,
                'name' => 'Iringa',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3509,
                'name' => 'Kagera',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3510,
                'name' => 'Kigoma',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3511,
                'name' => 'Kilimanjaro',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3512,
                'name' => 'Lindi',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3513,
                'name' => 'Mara',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3514,
                'name' => 'Mbeya',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3515,
                'name' => 'Morogoro',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3516,
                'name' => 'Mtwara',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3517,
                'name' => 'Mwanza',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3518,
                'name' => 'Pwani',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3519,
                'name' => 'Rukwa',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3520,
                'name' => 'Ruvuma',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3521,
                'name' => 'Shinyanga',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3522,
                'name' => 'Singida',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3523,
                'name' => 'Tabora',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3524,
                'name' => 'Tanga',
            ),
            
            array (
                'country_id' => 216,
                'id' => 3525,
                'name' => 'Zanzibar and Pemba',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3526,
                'name' => 'Amnat Charoen',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3527,
                'name' => 'Ang Thong',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3528,
                'name' => 'Bangkok',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3529,
                'name' => 'Buri Ram',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3530,
                'name' => 'Chachoengsao',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3531,
                'name' => 'Chai Nat',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3532,
                'name' => 'Chaiyaphum',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3533,
                'name' => 'Changwat Chaiyaphum',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3534,
                'name' => 'Chanthaburi',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3535,
                'name' => 'Chiang Mai',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3536,
                'name' => 'Chiang Rai',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3537,
                'name' => 'Chon Buri',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3538,
                'name' => 'Chumphon',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3539,
                'name' => 'Kalasin',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3540,
                'name' => 'Kamphaeng Phet',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3541,
                'name' => 'Kanchanaburi',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3542,
                'name' => 'Khon Kaen',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3543,
                'name' => 'Krabi',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3544,
                'name' => 'Krung Thep',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3545,
                'name' => 'Lampang',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3546,
                'name' => 'Lamphun',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3547,
                'name' => 'Loei',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3548,
                'name' => 'Lop Buri',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3549,
                'name' => 'Mae Hong Son',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3550,
                'name' => 'Maha Sarakham',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3551,
                'name' => 'Mukdahan',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3552,
                'name' => 'Nakhon Nayok',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3553,
                'name' => 'Nakhon Pathom',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3554,
                'name' => 'Nakhon Phanom',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3555,
                'name' => 'Nakhon Ratchasima',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3556,
                'name' => 'Nakhon Sawan',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3557,
                'name' => 'Nakhon Si Thammarat',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3558,
                'name' => 'Nan',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3559,
                'name' => 'Narathiwat',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3560,
                'name' => 'Nong Bua Lam Phu',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3561,
                'name' => 'Nong Khai',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3562,
                'name' => 'Nonthaburi',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3563,
                'name' => 'Pathum Thani',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3564,
                'name' => 'Pattani',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3565,
                'name' => 'Phangnga',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3566,
                'name' => 'Phatthalung',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3567,
                'name' => 'Phayao',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3568,
                'name' => 'Phetchabun',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3569,
                'name' => 'Phetchaburi',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3570,
                'name' => 'Phichit',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3571,
                'name' => 'Phitsanulok',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3572,
                'name' => 'Phra Nakhon Si Ayutthaya',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3573,
                'name' => 'Phrae',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3574,
                'name' => 'Phuket',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3575,
                'name' => 'Prachin Buri',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3576,
                'name' => 'Prachuap Khiri Khan',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3577,
                'name' => 'Ranong',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3578,
                'name' => 'Ratchaburi',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3579,
                'name' => 'Rayong',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3580,
                'name' => 'Roi Et',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3581,
                'name' => 'Sa Kaeo',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3582,
                'name' => 'Sakon Nakhon',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3583,
                'name' => 'Samut Prakan',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3584,
                'name' => 'Samut Sakhon',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3585,
                'name' => 'Samut Songkhran',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3586,
                'name' => 'Saraburi',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3587,
                'name' => 'Satun',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3588,
                'name' => 'Si Sa Ket',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3589,
                'name' => 'Sing Buri',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3590,
                'name' => 'Songkhla',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3591,
                'name' => 'Sukhothai',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3592,
                'name' => 'Suphan Buri',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3593,
                'name' => 'Surat Thani',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3594,
                'name' => 'Surin',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3595,
                'name' => 'Tak',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3596,
                'name' => 'Trang',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3597,
                'name' => 'Trat',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3598,
                'name' => 'Ubon Ratchathani',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3599,
                'name' => 'Udon Thani',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3600,
                'name' => 'Uthai Thani',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3601,
                'name' => 'Uttaradit',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3602,
                'name' => 'Yala',
            ),
            
            array (
                'country_id' => 217,
                'id' => 3603,
                'name' => 'Yasothon',
            ),
            
            array (
                'country_id' => 218,
                'id' => 3604,
                'name' => 'Centre',
            ),
            
            array (
                'country_id' => 218,
                'id' => 3605,
                'name' => 'Kara',
            ),
            
            array (
                'country_id' => 218,
                'id' => 3606,
                'name' => 'Maritime',
            ),
            
            array (
                'country_id' => 218,
                'id' => 3607,
                'name' => 'Plateaux',
            ),
            
            array (
                'country_id' => 218,
                'id' => 3608,
                'name' => 'Savanes',
            ),
            
            array (
                'country_id' => 219,
                'id' => 3609,
                'name' => 'Atafu',
            ),
            
            array (
                'country_id' => 219,
                'id' => 3610,
                'name' => 'Fakaofo',
            ),
            
            array (
                'country_id' => 219,
                'id' => 3611,
                'name' => 'Nukunonu',
            ),
            
            array (
                'country_id' => 220,
                'id' => 3612,
                'name' => 'Eua',
            ),
            
            array (
                'country_id' => 220,
                'id' => 3613,
                'name' => 'Ha\'apai',
            ),
            
            array (
                'country_id' => 220,
                'id' => 3614,
                'name' => 'Niuas',
            ),
            
            array (
                'country_id' => 220,
                'id' => 3615,
                'name' => 'Tongatapu',
            ),
            
            array (
                'country_id' => 220,
                'id' => 3616,
                'name' => 'Vava\'u',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3617,
                'name' => 'Arima-Tunapuna-Piarco',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3618,
                'name' => 'Caroni',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3619,
                'name' => 'Chaguanas',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3620,
                'name' => 'Couva-Tabaquite-Talparo',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3621,
                'name' => 'Diego Martin',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3622,
                'name' => 'Glencoe',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3623,
                'name' => 'Penal Debe',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3624,
                'name' => 'Point Fortin',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3625,
                'name' => 'Port of Spain',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3626,
                'name' => 'Princes Town',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3627,
                'name' => 'Saint George',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3628,
                'name' => 'San Fernando',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3629,
                'name' => 'San Juan',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3630,
                'name' => 'Sangre Grande',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3631,
                'name' => 'Siparia',
            ),
            
            array (
                'country_id' => 221,
                'id' => 3632,
                'name' => 'Tobago',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3633,
                'name' => 'Aryanah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3634,
                'name' => 'Bajah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3635,
                'name' => 'Bin \'Arus',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3636,
                'name' => 'Binzart',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3637,
                'name' => 'Gouvernorat de Ariana',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3638,
                'name' => 'Gouvernorat de Nabeul',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3639,
                'name' => 'Gouvernorat de Sousse',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3640,
                'name' => 'Hammamet Yasmine',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3641,
                'name' => 'Jundubah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3642,
                'name' => 'Madaniyin',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3643,
                'name' => 'Manubah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3644,
                'name' => 'Monastir',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3645,
                'name' => 'Nabul',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3646,
                'name' => 'Qabis',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3647,
                'name' => 'Qafsah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3648,
                'name' => 'Qibili',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3649,
                'name' => 'Safaqis',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3650,
                'name' => 'Sfax',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3651,
                'name' => 'Sidi Bu Zayd',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3652,
                'name' => 'Silyanah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3653,
                'name' => 'Susah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3654,
                'name' => 'Tatawin',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3655,
                'name' => 'Tawzar',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3656,
                'name' => 'Tunis',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3657,
                'name' => 'Zaghwan',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3658,
                'name' => 'al-Kaf',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3659,
                'name' => 'al-Mahdiyah',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3660,
                'name' => 'al-Munastir',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3661,
                'name' => 'al-Qasrayn',
            ),
            
            array (
                'country_id' => 222,
                'id' => 3662,
                'name' => 'al-Qayrawan',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3663,
                'name' => 'Adana',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3664,
                'name' => 'Adiyaman',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3665,
                'name' => 'Afyon',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3666,
                'name' => 'Agri',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3667,
                'name' => 'Aksaray',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3668,
                'name' => 'Amasya',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3669,
                'name' => 'Ankara',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3670,
                'name' => 'Antalya',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3671,
                'name' => 'Ardahan',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3672,
                'name' => 'Artvin',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3673,
                'name' => 'Aydin',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3674,
                'name' => 'Balikesir',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3675,
                'name' => 'Bartin',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3676,
                'name' => 'Batman',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3677,
                'name' => 'Bayburt',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3678,
                'name' => 'Bilecik',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3679,
                'name' => 'Bingol',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3680,
                'name' => 'Bitlis',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3681,
                'name' => 'Bolu',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3682,
                'name' => 'Burdur',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3683,
                'name' => 'Bursa',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3684,
                'name' => 'Canakkale',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3685,
                'name' => 'Cankiri',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3686,
                'name' => 'Corum',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3687,
                'name' => 'Denizli',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3688,
                'name' => 'Diyarbakir',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3689,
                'name' => 'Duzce',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3690,
                'name' => 'Edirne',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3691,
                'name' => 'Elazig',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3692,
                'name' => 'Erzincan',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3693,
                'name' => 'Erzurum',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3694,
                'name' => 'Eskisehir',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3695,
                'name' => 'Gaziantep',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3696,
                'name' => 'Giresun',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3697,
                'name' => 'Gumushane',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3698,
                'name' => 'Hakkari',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3699,
                'name' => 'Hatay',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3700,
                'name' => 'Icel',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3701,
                'name' => 'Igdir',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3702,
                'name' => 'Isparta',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3703,
                'name' => 'Istanbul',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3704,
                'name' => 'Izmir',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3705,
                'name' => 'Kahramanmaras',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3706,
                'name' => 'Karabuk',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3707,
                'name' => 'Karaman',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3708,
                'name' => 'Kars',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3709,
                'name' => 'Karsiyaka',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3710,
                'name' => 'Kastamonu',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3711,
                'name' => 'Kayseri',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3712,
                'name' => 'Kilis',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3713,
                'name' => 'Kirikkale',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3714,
                'name' => 'Kirklareli',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3715,
                'name' => 'Kirsehir',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3716,
                'name' => 'Kocaeli',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3717,
                'name' => 'Konya',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3718,
                'name' => 'Kutahya',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3719,
                'name' => 'Lefkosa',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3720,
                'name' => 'Malatya',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3721,
                'name' => 'Manisa',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3722,
                'name' => 'Mardin',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3723,
                'name' => 'Mugla',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3724,
                'name' => 'Mus',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3725,
                'name' => 'Nevsehir',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3726,
                'name' => 'Nigde',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3727,
                'name' => 'Ordu',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3728,
                'name' => 'Osmaniye',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3729,
                'name' => 'Rize',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3730,
                'name' => 'Sakarya',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3731,
                'name' => 'Samsun',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3732,
                'name' => 'Sanliurfa',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3733,
                'name' => 'Siirt',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3734,
                'name' => 'Sinop',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3735,
                'name' => 'Sirnak',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3736,
                'name' => 'Sivas',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3737,
                'name' => 'Tekirdag',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3738,
                'name' => 'Tokat',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3739,
                'name' => 'Trabzon',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3740,
                'name' => 'Tunceli',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3741,
                'name' => 'Usak',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3742,
                'name' => 'Van',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3743,
                'name' => 'Yalova',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3744,
                'name' => 'Yozgat',
            ),
            
            array (
                'country_id' => 223,
                'id' => 3745,
                'name' => 'Zonguldak',
            ),
            
            array (
                'country_id' => 224,
                'id' => 3746,
                'name' => 'Ahal',
            ),
            
            array (
                'country_id' => 224,
                'id' => 3747,
                'name' => 'Asgabat',
            ),
            
            array (
                'country_id' => 224,
                'id' => 3748,
                'name' => 'Balkan',
            ),
            
            array (
                'country_id' => 224,
                'id' => 3749,
                'name' => 'Dasoguz',
            ),
            
            array (
                'country_id' => 224,
                'id' => 3750,
                'name' => 'Lebap',
            ),
            
            array (
                'country_id' => 224,
                'id' => 3751,
                'name' => 'Mari',
            ),
            
            array (
                'country_id' => 225,
                'id' => 3752,
                'name' => 'Grand Turk',
            ),
            
            array (
                'country_id' => 225,
                'id' => 3753,
                'name' => 'South Caicos and East Caicos',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3754,
                'name' => 'Funafuti',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3755,
                'name' => 'Nanumanga',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3756,
                'name' => 'Nanumea',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3757,
                'name' => 'Niutao',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3758,
                'name' => 'Nui',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3759,
                'name' => 'Nukufetau',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3760,
                'name' => 'Nukulaelae',
            ),
            
            array (
                'country_id' => 226,
                'id' => 3761,
                'name' => 'Vaitupu',
            ),
            
            array (
                'country_id' => 227,
                'id' => 3762,
                'name' => 'Central',
            ),
            
            array (
                'country_id' => 227,
                'id' => 3763,
                'name' => 'Eastern',
            ),
            
            array (
                'country_id' => 227,
                'id' => 3764,
                'name' => 'Northern',
            ),
            
            array (
                'country_id' => 227,
                'id' => 3765,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3766,
                'name' => 'Cherkas\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3767,
                'name' => 'Chernihivs\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3768,
                'name' => 'Chernivets\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3769,
                'name' => 'Crimea',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3770,
                'name' => 'Dnipropetrovska',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3771,
                'name' => 'Donets\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3772,
                'name' => 'Ivano-Frankivs\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3773,
                'name' => 'Kharkiv',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3774,
                'name' => 'Kharkov',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3775,
                'name' => 'Khersonska',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3776,
                'name' => 'Khmel\'nyts\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3777,
                'name' => 'Kirovohrad',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3778,
                'name' => 'Krym',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3779,
                'name' => 'Kyyiv',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3780,
                'name' => 'Kyyivs\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3781,
                'name' => 'L\'vivs\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3782,
                'name' => 'Luhans\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3783,
                'name' => 'Mykolayivs\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3784,
                'name' => 'Odes\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3785,
                'name' => 'Odessa',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3786,
                'name' => 'Poltavs\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3787,
                'name' => 'Rivnens\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3788,
                'name' => 'Sevastopol\'',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3789,
                'name' => 'Sums\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3790,
                'name' => 'Ternopil\'s\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3791,
                'name' => 'Volyns\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3792,
                'name' => 'Vynnyts\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3793,
                'name' => 'Zakarpats\'ka',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3794,
                'name' => 'Zaporizhia',
            ),
            
            array (
                'country_id' => 228,
                'id' => 3795,
                'name' => 'Zhytomyrs\'ka',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3796,
                'name' => 'Abu Zabi',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3797,
                'name' => 'Ajman',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3798,
                'name' => 'Dubai',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3799,
                'name' => 'Ras al-Khaymah',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3800,
                'name' => 'Sharjah',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3801,
                'name' => 'Sharjha',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3802,
                'name' => 'Umm al Qaywayn',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3803,
                'name' => 'al-Fujayrah',
            ),
            
            array (
                'country_id' => 229,
                'id' => 3804,
                'name' => 'ash-Shariqah',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3805,
                'name' => 'Aberdeen',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3806,
                'name' => 'Aberdeenshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3807,
                'name' => 'Argyll',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3808,
                'name' => 'Armagh',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3809,
                'name' => 'Bedfordshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3810,
                'name' => 'Belfast',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3811,
                'name' => 'Berkshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3812,
                'name' => 'Birmingham',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3813,
                'name' => 'Brechin',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3814,
                'name' => 'Bridgnorth',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3815,
                'name' => 'Bristol',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3816,
                'name' => 'Buckinghamshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3817,
                'name' => 'Cambridge',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3818,
                'name' => 'Cambridgeshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3819,
                'name' => 'Channel Islands',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3820,
                'name' => 'Cheshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3821,
                'name' => 'Cleveland',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3822,
                'name' => 'Co Fermanagh',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3823,
                'name' => 'Conwy',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3824,
                'name' => 'Cornwall',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3825,
                'name' => 'Coventry',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3826,
                'name' => 'Craven Arms',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3827,
                'name' => 'Cumbria',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3828,
                'name' => 'Denbighshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3829,
                'name' => 'Derby',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3830,
                'name' => 'Derbyshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3831,
                'name' => 'Devon',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3832,
                'name' => 'Dial Code Dungannon',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3833,
                'name' => 'Didcot',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3834,
                'name' => 'Dorset',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3835,
                'name' => 'Dunbartonshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3836,
                'name' => 'Durham',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3837,
                'name' => 'East Dunbartonshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3838,
                'name' => 'East Lothian',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3839,
                'name' => 'East Midlands',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3840,
                'name' => 'East Sussex',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3841,
                'name' => 'East Yorkshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3842,
                'name' => 'England',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3843,
                'name' => 'Essex',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3844,
                'name' => 'Fermanagh',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3845,
                'name' => 'Fife',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3846,
                'name' => 'Flintshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3847,
                'name' => 'Fulham',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3848,
                'name' => 'Gainsborough',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3849,
                'name' => 'Glocestershire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3850,
                'name' => 'Gwent',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3851,
                'name' => 'Hampshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3852,
                'name' => 'Hants',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3853,
                'name' => 'Herefordshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3854,
                'name' => 'Hertfordshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3855,
                'name' => 'Ireland',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3856,
                'name' => 'Isle Of Man',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3857,
                'name' => 'Isle of Wight',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3858,
                'name' => 'Kenford',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3859,
                'name' => 'Kent',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3860,
                'name' => 'Kilmarnock',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3861,
                'name' => 'Lanarkshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3862,
                'name' => 'Lancashire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3863,
                'name' => 'Leicestershire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3864,
                'name' => 'Lincolnshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3865,
                'name' => 'Llanymynech',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3866,
                'name' => 'London',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3867,
                'name' => 'Ludlow',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3868,
                'name' => 'Manchester',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3869,
                'name' => 'Mayfair',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3870,
                'name' => 'Merseyside',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3871,
                'name' => 'Mid Glamorgan',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3872,
                'name' => 'Middlesex',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3873,
                'name' => 'Mildenhall',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3874,
                'name' => 'Monmouthshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3875,
                'name' => 'Newton Stewart',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3876,
                'name' => 'Norfolk',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3877,
                'name' => 'North Humberside',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3878,
                'name' => 'North Yorkshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3879,
                'name' => 'Northamptonshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3880,
                'name' => 'Northants',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3881,
                'name' => 'Northern Ireland',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3882,
                'name' => 'Northumberland',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3883,
                'name' => 'Nottinghamshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3884,
                'name' => 'Oxford',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3885,
                'name' => 'Powys',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3886,
                'name' => 'Roos-shire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3887,
                'name' => 'SUSSEX',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3888,
                'name' => 'Sark',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3889,
                'name' => 'Scotland',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3890,
                'name' => 'Scottish Borders',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3891,
                'name' => 'Shropshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3892,
                'name' => 'Somerset',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3893,
                'name' => 'South Glamorgan',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3894,
                'name' => 'South Wales',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3895,
                'name' => 'South Yorkshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3896,
                'name' => 'Southwell',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3897,
                'name' => 'Staffordshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3898,
                'name' => 'Strabane',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3899,
                'name' => 'Suffolk',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3900,
                'name' => 'Surrey',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3901,
                'name' => 'Sussex',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3902,
                'name' => 'Twickenham',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3903,
                'name' => 'Tyne and Wear',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3904,
                'name' => 'Tyrone',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3905,
                'name' => 'Utah',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3906,
                'name' => 'Wales',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3907,
                'name' => 'Warwickshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3908,
                'name' => 'West Lothian',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3909,
                'name' => 'West Midlands',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3910,
                'name' => 'West Sussex',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3911,
                'name' => 'West Yorkshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3912,
                'name' => 'Whissendine',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3913,
                'name' => 'Wiltshire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3914,
                'name' => 'Wokingham',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3915,
                'name' => 'Worcestershire',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3916,
                'name' => 'Wrexham',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3917,
                'name' => 'Wurttemberg',
            ),
            
            array (
                'country_id' => 230,
                'id' => 3918,
                'name' => 'Yorkshire',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3919,
                'name' => 'Alabama',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3920,
                'name' => 'Alaska',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3921,
                'name' => 'Arizona',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3922,
                'name' => 'Arkansas',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3923,
                'name' => 'Byram',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3924,
                'name' => 'California',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3925,
                'name' => 'Cokato',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3926,
                'name' => 'Colorado',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3927,
                'name' => 'Connecticut',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3928,
                'name' => 'Delaware',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3929,
                'name' => 'District of Columbia',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3930,
                'name' => 'Florida',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3931,
                'name' => 'Georgia',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3932,
                'name' => 'Hawaii',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3933,
                'name' => 'Idaho',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3934,
                'name' => 'Illinois',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3935,
                'name' => 'Indiana',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3936,
                'name' => 'Iowa',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3937,
                'name' => 'Kansas',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3938,
                'name' => 'Kentucky',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3939,
                'name' => 'Louisiana',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3940,
                'name' => 'Lowa',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3941,
                'name' => 'Maine',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3942,
                'name' => 'Maryland',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3943,
                'name' => 'Massachusetts',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3944,
                'name' => 'Medfield',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3945,
                'name' => 'Michigan',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3946,
                'name' => 'Minnesota',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3947,
                'name' => 'Mississippi',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3948,
                'name' => 'Missouri',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3949,
                'name' => 'Montana',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3950,
                'name' => 'Nebraska',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3951,
                'name' => 'Nevada',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3952,
                'name' => 'New Hampshire',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3953,
                'name' => 'New Jersey',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3954,
                'name' => 'New Jersy',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3955,
                'name' => 'New Mexico',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3956,
                'name' => 'New York',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3957,
                'name' => 'North Carolina',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3958,
                'name' => 'North Dakota',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3959,
                'name' => 'Ohio',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3960,
                'name' => 'Oklahoma',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3961,
                'name' => 'Ontario',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3962,
                'name' => 'Oregon',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3963,
                'name' => 'Pennsylvania',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3964,
                'name' => 'Ramey',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3965,
                'name' => 'Rhode Island',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3966,
                'name' => 'South Carolina',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3967,
                'name' => 'South Dakota',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3968,
                'name' => 'Sublimity',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3969,
                'name' => 'Tennessee',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3970,
                'name' => 'Texas',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3971,
                'name' => 'Trimble',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3972,
                'name' => 'Utah',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3973,
                'name' => 'Vermont',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3974,
                'name' => 'Virginia',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3975,
                'name' => 'Washington',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3976,
                'name' => 'West Virginia',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3977,
                'name' => 'Wisconsin',
            ),
            
            array (
                'country_id' => 231,
                'id' => 3978,
                'name' => 'Wyoming',
            ),
            
            array (
                'country_id' => 232,
                'id' => 3979,
                'name' => 'United States Minor Outlying I',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3980,
                'name' => 'Artigas',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3981,
                'name' => 'Canelones',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3982,
                'name' => 'Cerro Largo',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3983,
                'name' => 'Colonia',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3984,
                'name' => 'Durazno',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3985,
                'name' => 'FLorida',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3986,
                'name' => 'Flores',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3987,
                'name' => 'Lavalleja',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3988,
                'name' => 'Maldonado',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3989,
                'name' => 'Montevideo',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3990,
                'name' => 'Paysandu',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3991,
                'name' => 'Rio Negro',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3992,
                'name' => 'Rivera',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3993,
                'name' => 'Rocha',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3994,
                'name' => 'Salto',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3995,
                'name' => 'San Jose',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3996,
                'name' => 'Soriano',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3997,
                'name' => 'Tacuarembo',
            ),
            
            array (
                'country_id' => 233,
                'id' => 3998,
                'name' => 'Treinta y Tres',
            ),
            
            array (
                'country_id' => 234,
                'id' => 3999,
                'name' => 'Andijon',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4000,
                'name' => 'Buhoro',
            ),
        ));
        State::insertOnDuplicateKey(array (
            
            array (
                'country_id' => 234,
                'id' => 4001,
                'name' => 'Buxoro Viloyati',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4002,
                'name' => 'Cizah',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4003,
                'name' => 'Fargona',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4004,
                'name' => 'Horazm',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4005,
                'name' => 'Kaskadar',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4006,
                'name' => 'Korakalpogiston',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4007,
                'name' => 'Namangan',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4008,
                'name' => 'Navoi',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4009,
                'name' => 'Samarkand',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4010,
                'name' => 'Sirdare',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4011,
                'name' => 'Surhondar',
            ),
            
            array (
                'country_id' => 234,
                'id' => 4012,
                'name' => 'Toskent',
            ),
            
            array (
                'country_id' => 235,
                'id' => 4013,
                'name' => 'Malampa',
            ),
            
            array (
                'country_id' => 235,
                'id' => 4014,
                'name' => 'Penama',
            ),
            
            array (
                'country_id' => 235,
                'id' => 4015,
                'name' => 'Sanma',
            ),
            
            array (
                'country_id' => 235,
                'id' => 4016,
                'name' => 'Shefa',
            ),
            
            array (
                'country_id' => 235,
                'id' => 4017,
                'name' => 'Tafea',
            ),
            
            array (
                'country_id' => 235,
                'id' => 4018,
                'name' => 'Torba',
            ),
            
            array (
                'country_id' => 236,
                'id' => 4019,
            'name' => 'Vatican City State (Holy See)',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4020,
                'name' => 'Amazonas',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4021,
                'name' => 'Anzoategui',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4022,
                'name' => 'Apure',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4023,
                'name' => 'Aragua',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4024,
                'name' => 'Barinas',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4025,
                'name' => 'Bolivar',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4026,
                'name' => 'Carabobo',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4027,
                'name' => 'Cojedes',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4028,
                'name' => 'Delta Amacuro',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4029,
                'name' => 'Distrito Federal',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4030,
                'name' => 'Falcon',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4031,
                'name' => 'Guarico',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4032,
                'name' => 'Lara',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4033,
                'name' => 'Merida',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4034,
                'name' => 'Miranda',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4035,
                'name' => 'Monagas',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4036,
                'name' => 'Nueva Esparta',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4037,
                'name' => 'Portuguesa',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4038,
                'name' => 'Sucre',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4039,
                'name' => 'Tachira',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4040,
                'name' => 'Trujillo',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4041,
                'name' => 'Vargas',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4042,
                'name' => 'Yaracuy',
            ),
            
            array (
                'country_id' => 237,
                'id' => 4043,
                'name' => 'Zulia',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4044,
                'name' => 'Bac Giang',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4045,
                'name' => 'Binh Dinh',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4046,
                'name' => 'Binh Duong',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4047,
                'name' => 'Da Nang',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4048,
                'name' => 'Dong Bang Song Cuu Long',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4049,
                'name' => 'Dong Bang Song Hong',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4050,
                'name' => 'Dong Nai',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4051,
                'name' => 'Dong Nam Bo',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4052,
                'name' => 'Duyen Hai Mien Trung',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4053,
                'name' => 'Hanoi',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4054,
                'name' => 'Hung Yen',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4055,
                'name' => 'Khu Bon Cu',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4056,
                'name' => 'Long An',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4057,
                'name' => 'Mien Nui Va Trung Du',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4058,
                'name' => 'Thai Nguyen',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4059,
                'name' => 'Thanh Pho Ho Chi Minh',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4060,
                'name' => 'Thu Do Ha Noi',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4061,
                'name' => 'Tinh Can Tho',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4062,
                'name' => 'Tinh Da Nang',
            ),
            
            array (
                'country_id' => 238,
                'id' => 4063,
                'name' => 'Tinh Gia Lai',
            ),
            
            array (
                'country_id' => 239,
                'id' => 4064,
                'name' => 'Anegada',
            ),
            
            array (
                'country_id' => 239,
                'id' => 4065,
                'name' => 'Jost van Dyke',
            ),
            
            array (
                'country_id' => 239,
                'id' => 4066,
                'name' => 'Tortola',
            ),
            
            array (
                'country_id' => 240,
                'id' => 4067,
                'name' => 'Saint Croix',
            ),
            
            array (
                'country_id' => 240,
                'id' => 4068,
                'name' => 'Saint John',
            ),
            
            array (
                'country_id' => 240,
                'id' => 4069,
                'name' => 'Saint Thomas',
            ),
            
            array (
                'country_id' => 241,
                'id' => 4070,
                'name' => 'Alo',
            ),
            
            array (
                'country_id' => 241,
                'id' => 4071,
                'name' => 'Singave',
            ),
            
            array (
                'country_id' => 241,
                'id' => 4072,
                'name' => 'Wallis',
            ),
            
            array (
                'country_id' => 242,
                'id' => 4073,
                'name' => 'Bu Jaydur',
            ),
            
            array (
                'country_id' => 242,
                'id' => 4074,
                'name' => 'Wad-adh-Dhahab',
            ),
            
            array (
                'country_id' => 242,
                'id' => 4075,
                'name' => 'al-\'Ayun',
            ),
            
            array (
                'country_id' => 242,
                'id' => 4076,
                'name' => 'as-Samarah',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4077,
                'name' => '\'Adan',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4078,
                'name' => 'Abyan',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4079,
                'name' => 'Dhamar',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4080,
                'name' => 'Hadramaut',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4081,
                'name' => 'Hajjah',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4082,
                'name' => 'Hudaydah',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4083,
                'name' => 'Ibb',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4084,
                'name' => 'Lahij',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4085,
                'name' => 'Ma\'rib',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4086,
                'name' => 'Madinat San\'a',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4087,
                'name' => 'Sa\'dah',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4088,
                'name' => 'Sana',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4089,
                'name' => 'Shabwah',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4090,
                'name' => 'Ta\'izz',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4091,
                'name' => 'al-Bayda',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4092,
                'name' => 'al-Hudaydah',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4093,
                'name' => 'al-Jawf',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4094,
                'name' => 'al-Mahrah',
            ),
            
            array (
                'country_id' => 243,
                'id' => 4095,
                'name' => 'al-Mahwit',
            ),
            
            array (
                'country_id' => 244,
                'id' => 4096,
                'name' => 'Central Serbia',
            ),
            
            array (
                'country_id' => 244,
                'id' => 4097,
                'name' => 'Kosovo and Metohija',
            ),
            
            array (
                'country_id' => 244,
                'id' => 4098,
                'name' => 'Montenegro',
            ),
            
            array (
                'country_id' => 244,
                'id' => 4099,
                'name' => 'Republic of Serbia',
            ),
            
            array (
                'country_id' => 244,
                'id' => 4100,
                'name' => 'Serbia',
            ),
            
            array (
                'country_id' => 244,
                'id' => 4101,
                'name' => 'Vojvodina',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4102,
                'name' => 'Central',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4103,
                'name' => 'Copperbelt',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4104,
                'name' => 'Eastern',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4105,
                'name' => 'Luapala',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4106,
                'name' => 'Lusaka',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4107,
                'name' => 'North-Western',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4108,
                'name' => 'Northern',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4109,
                'name' => 'Southern',
            ),
            
            array (
                'country_id' => 245,
                'id' => 4110,
                'name' => 'Western',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4111,
                'name' => 'Bulawayo',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4112,
                'name' => 'Harare',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4113,
                'name' => 'Manicaland',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4114,
                'name' => 'Mashonaland Central',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4115,
                'name' => 'Mashonaland East',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4116,
                'name' => 'Mashonaland West',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4117,
                'name' => 'Masvingo',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4118,
                'name' => 'Matabeleland North',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4119,
                'name' => 'Matabeleland South',
            ),
            
            array (
                'country_id' => 246,
                'id' => 4120,
                'name' => 'Midlands',
            ),
        ));
    }
}
