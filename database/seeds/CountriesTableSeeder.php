<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::insertOnDuplicateKey(array (
            
            array (
                'id' => 1,
                'name' => 'Afghanistan',
                'phonecode' => '93',
                'sortname' => 'AF',
            ),
            
            array (
                'id' => 2,
                'name' => 'Albania',
                'phonecode' => '355',
                'sortname' => 'AL',
            ),
            
            array (
                'id' => 3,
                'name' => 'Algeria',
                'phonecode' => '213',
                'sortname' => 'DZ',
            ),
            
            array (
                'id' => 4,
                'name' => 'American Samoa',
                'phonecode' => '1684',
                'sortname' => 'AS',
            ),
            
            array (
                'id' => 5,
                'name' => 'Andorra',
                'phonecode' => '376',
                'sortname' => 'AD',
            ),
            
            array (
                'id' => 6,
                'name' => 'Angola',
                'phonecode' => '244',
                'sortname' => 'AO',
            ),
            
            array (
                'id' => 7,
                'name' => 'Anguilla',
                'phonecode' => '1264',
                'sortname' => 'AI',
            ),
            
            array (
                'id' => 8,
                'name' => 'Antarctica',
                'phonecode' => '0',
                'sortname' => 'AQ',
            ),
            
            array (
                'id' => 9,
                'name' => 'Antigua And Barbuda',
                'phonecode' => '1268',
                'sortname' => 'AG',
            ),
            
            array (
                'id' => 10,
                'name' => 'Argentina',
                'phonecode' => '54',
                'sortname' => 'AR',
            ),
            
            array (
                'id' => 11,
                'name' => 'Armenia',
                'phonecode' => '374',
                'sortname' => 'AM',
            ),
            
            array (
                'id' => 12,
                'name' => 'Aruba',
                'phonecode' => '297',
                'sortname' => 'AW',
            ),
            
            array (
                'id' => 13,
                'name' => 'Australia',
                'phonecode' => '61',
                'sortname' => 'AU',
            ),
            
            array (
                'id' => 14,
                'name' => 'Austria',
                'phonecode' => '43',
                'sortname' => 'AT',
            ),
            
            array (
                'id' => 15,
                'name' => 'Azerbaijan',
                'phonecode' => '994',
                'sortname' => 'AZ',
            ),
            
            array (
                'id' => 16,
                'name' => 'Bahamas The',
                'phonecode' => '1242',
                'sortname' => 'BS',
            ),
            
            array (
                'id' => 17,
                'name' => 'Bahrain',
                'phonecode' => '973',
                'sortname' => 'BH',
            ),
            
            array (
                'id' => 18,
                'name' => 'Bangladesh',
                'phonecode' => '880',
                'sortname' => 'BD',
            ),
            
            array (
                'id' => 19,
                'name' => 'Barbados',
                'phonecode' => '1246',
                'sortname' => 'BB',
            ),
            
            array (
                'id' => 20,
                'name' => 'Belarus',
                'phonecode' => '375',
                'sortname' => 'BY',
            ),
            
            array (
                'id' => 21,
                'name' => 'Belgium',
                'phonecode' => '32',
                'sortname' => 'BE',
            ),
            
            array (
                'id' => 22,
                'name' => 'Belize',
                'phonecode' => '501',
                'sortname' => 'BZ',
            ),
            
            array (
                'id' => 23,
                'name' => 'Benin',
                'phonecode' => '229',
                'sortname' => 'BJ',
            ),
            
            array (
                'id' => 24,
                'name' => 'Bermuda',
                'phonecode' => '1441',
                'sortname' => 'BM',
            ),
            
            array (
                'id' => 25,
                'name' => 'Bhutan',
                'phonecode' => '975',
                'sortname' => 'BT',
            ),
            
            array (
                'id' => 26,
                'name' => 'Bolivia',
                'phonecode' => '591',
                'sortname' => 'BO',
            ),
            
            array (
                'id' => 27,
                'name' => 'Bosnia and Herzegovina',
                'phonecode' => '387',
                'sortname' => 'BA',
            ),
            
            array (
                'id' => 28,
                'name' => 'Botswana',
                'phonecode' => '267',
                'sortname' => 'BW',
            ),
            
            array (
                'id' => 29,
                'name' => 'Bouvet Island',
                'phonecode' => '0',
                'sortname' => 'BV',
            ),
            
            array (
                'id' => 30,
                'name' => 'Brazil',
                'phonecode' => '55',
                'sortname' => 'BR',
            ),
            
            array (
                'id' => 31,
                'name' => 'British Indian Ocean Territory',
                'phonecode' => '246',
                'sortname' => 'IO',
            ),
            
            array (
                'id' => 32,
                'name' => 'Brunei',
                'phonecode' => '673',
                'sortname' => 'BN',
            ),
            
            array (
                'id' => 33,
                'name' => 'Bulgaria',
                'phonecode' => '359',
                'sortname' => 'BG',
            ),
            
            array (
                'id' => 34,
                'name' => 'Burkina Faso',
                'phonecode' => '226',
                'sortname' => 'BF',
            ),
            
            array (
                'id' => 35,
                'name' => 'Burundi',
                'phonecode' => '257',
                'sortname' => 'BI',
            ),
            
            array (
                'id' => 36,
                'name' => 'Cambodia',
                'phonecode' => '855',
                'sortname' => 'KH',
            ),
            
            array (
                'id' => 37,
                'name' => 'Cameroon',
                'phonecode' => '237',
                'sortname' => 'CM',
            ),
            
            array (
                'id' => 38,
                'name' => 'Canada',
                'phonecode' => '1',
                'sortname' => 'CA',
            ),
            
            array (
                'id' => 39,
                'name' => 'Cape Verde',
                'phonecode' => '238',
                'sortname' => 'CV',
            ),
            
            array (
                'id' => 40,
                'name' => 'Cayman Islands',
                'phonecode' => '1345',
                'sortname' => 'KY',
            ),
            
            array (
                'id' => 41,
                'name' => 'Central African Republic',
                'phonecode' => '236',
                'sortname' => 'CF',
            ),
            
            array (
                'id' => 42,
                'name' => 'Chad',
                'phonecode' => '235',
                'sortname' => 'TD',
            ),
            
            array (
                'id' => 43,
                'name' => 'Chile',
                'phonecode' => '56',
                'sortname' => 'CL',
            ),
            
            array (
                'id' => 44,
                'name' => 'China',
                'phonecode' => '86',
                'sortname' => 'CN',
            ),
            
            array (
                'id' => 45,
                'name' => 'Christmas Island',
                'phonecode' => '61',
                'sortname' => 'CX',
            ),
            
            array (
                'id' => 46,
            'name' => 'Cocos (Keeling) Islands',
                'phonecode' => '672',
                'sortname' => 'CC',
            ),
            
            array (
                'id' => 47,
                'name' => 'Colombia',
                'phonecode' => '57',
                'sortname' => 'CO',
            ),
            
            array (
                'id' => 48,
                'name' => 'Comoros',
                'phonecode' => '269',
                'sortname' => 'KM',
            ),
            
            array (
                'id' => 49,
                'name' => 'Republic Of The Congo',
                'phonecode' => '242',
                'sortname' => 'CG',
            ),
            
            array (
                'id' => 50,
                'name' => 'Democratic Republic Of The Congo',
                'phonecode' => '242',
                'sortname' => 'CD',
            ),
            
            array (
                'id' => 51,
                'name' => 'Cook Islands',
                'phonecode' => '682',
                'sortname' => 'CK',
            ),
            
            array (
                'id' => 52,
                'name' => 'Costa Rica',
                'phonecode' => '506',
                'sortname' => 'CR',
            ),
            
            array (
                'id' => 53,
            'name' => 'Cote D\'Ivoire (Ivory Coast)',
                'phonecode' => '225',
                'sortname' => 'CI',
            ),
            
            array (
                'id' => 54,
            'name' => 'Croatia (Hrvatska)',
                'phonecode' => '385',
                'sortname' => 'HR',
            ),
            
            array (
                'id' => 55,
                'name' => 'Cuba',
                'phonecode' => '53',
                'sortname' => 'CU',
            ),
            
            array (
                'id' => 56,
                'name' => 'Cyprus',
                'phonecode' => '357',
                'sortname' => 'CY',
            ),
            
            array (
                'id' => 57,
                'name' => 'Czech Republic',
                'phonecode' => '420',
                'sortname' => 'CZ',
            ),
            
            array (
                'id' => 58,
                'name' => 'Denmark',
                'phonecode' => '45',
                'sortname' => 'DK',
            ),
            
            array (
                'id' => 59,
                'name' => 'Djibouti',
                'phonecode' => '253',
                'sortname' => 'DJ',
            ),
            
            array (
                'id' => 60,
                'name' => 'Dominica',
                'phonecode' => '1767',
                'sortname' => 'DM',
            ),
            
            array (
                'id' => 61,
                'name' => 'Dominican Republic',
                'phonecode' => '1809',
                'sortname' => 'DO',
            ),
            
            array (
                'id' => 62,
                'name' => 'East Timor',
                'phonecode' => '670',
                'sortname' => 'TP',
            ),
            
            array (
                'id' => 63,
                'name' => 'Ecuador',
                'phonecode' => '593',
                'sortname' => 'EC',
            ),
            
            array (
                'id' => 64,
                'name' => 'Egypt',
                'phonecode' => '20',
                'sortname' => 'EG',
            ),
            
            array (
                'id' => 65,
                'name' => 'El Salvador',
                'phonecode' => '503',
                'sortname' => 'SV',
            ),
            
            array (
                'id' => 66,
                'name' => 'Equatorial Guinea',
                'phonecode' => '240',
                'sortname' => 'GQ',
            ),
            
            array (
                'id' => 67,
                'name' => 'Eritrea',
                'phonecode' => '291',
                'sortname' => 'ER',
            ),
            
            array (
                'id' => 68,
                'name' => 'Estonia',
                'phonecode' => '372',
                'sortname' => 'EE',
            ),
            
            array (
                'id' => 69,
                'name' => 'Ethiopia',
                'phonecode' => '251',
                'sortname' => 'ET',
            ),
            
            array (
                'id' => 70,
                'name' => 'External Territories of Australia',
                'phonecode' => '61',
                'sortname' => 'XA',
            ),
            
            array (
                'id' => 71,
                'name' => 'Falkland Islands',
                'phonecode' => '500',
                'sortname' => 'FK',
            ),
            
            array (
                'id' => 72,
                'name' => 'Faroe Islands',
                'phonecode' => '298',
                'sortname' => 'FO',
            ),
            
            array (
                'id' => 73,
                'name' => 'Fiji Islands',
                'phonecode' => '679',
                'sortname' => 'FJ',
            ),
            
            array (
                'id' => 74,
                'name' => 'Finland',
                'phonecode' => '358',
                'sortname' => 'FI',
            ),
            
            array (
                'id' => 75,
                'name' => 'France',
                'phonecode' => '33',
                'sortname' => 'FR',
            ),
            
            array (
                'id' => 76,
                'name' => 'French Guiana',
                'phonecode' => '594',
                'sortname' => 'GF',
            ),
            
            array (
                'id' => 77,
                'name' => 'French Polynesia',
                'phonecode' => '689',
                'sortname' => 'PF',
            ),
            
            array (
                'id' => 78,
                'name' => 'French Southern Territories',
                'phonecode' => '0',
                'sortname' => 'TF',
            ),
            
            array (
                'id' => 79,
                'name' => 'Gabon',
                'phonecode' => '241',
                'sortname' => 'GA',
            ),
            
            array (
                'id' => 80,
                'name' => 'Gambia The',
                'phonecode' => '220',
                'sortname' => 'GM',
            ),
            
            array (
                'id' => 81,
                'name' => 'Georgia',
                'phonecode' => '995',
                'sortname' => 'GE',
            ),
            
            array (
                'id' => 82,
                'name' => 'Germany',
                'phonecode' => '49',
                'sortname' => 'DE',
            ),
            
            array (
                'id' => 83,
                'name' => 'Ghana',
                'phonecode' => '233',
                'sortname' => 'GH',
            ),
            
            array (
                'id' => 84,
                'name' => 'Gibraltar',
                'phonecode' => '350',
                'sortname' => 'GI',
            ),
            
            array (
                'id' => 85,
                'name' => 'Greece',
                'phonecode' => '30',
                'sortname' => 'GR',
            ),
            
            array (
                'id' => 86,
                'name' => 'Greenland',
                'phonecode' => '299',
                'sortname' => 'GL',
            ),
            
            array (
                'id' => 87,
                'name' => 'Grenada',
                'phonecode' => '1473',
                'sortname' => 'GD',
            ),
            
            array (
                'id' => 88,
                'name' => 'Guadeloupe',
                'phonecode' => '590',
                'sortname' => 'GP',
            ),
            
            array (
                'id' => 89,
                'name' => 'Guam',
                'phonecode' => '1671',
                'sortname' => 'GU',
            ),
            
            array (
                'id' => 90,
                'name' => 'Guatemala',
                'phonecode' => '502',
                'sortname' => 'GT',
            ),
            
            array (
                'id' => 91,
                'name' => 'Guernsey and Alderney',
                'phonecode' => '44',
                'sortname' => 'XU',
            ),
            
            array (
                'id' => 92,
                'name' => 'Guinea',
                'phonecode' => '224',
                'sortname' => 'GN',
            ),
            
            array (
                'id' => 93,
                'name' => 'Guinea-Bissau',
                'phonecode' => '245',
                'sortname' => 'GW',
            ),
            
            array (
                'id' => 94,
                'name' => 'Guyana',
                'phonecode' => '592',
                'sortname' => 'GY',
            ),
            
            array (
                'id' => 95,
                'name' => 'Haiti',
                'phonecode' => '509',
                'sortname' => 'HT',
            ),
            
            array (
                'id' => 96,
                'name' => 'Heard and McDonald Islands',
                'phonecode' => '0',
                'sortname' => 'HM',
            ),
            
            array (
                'id' => 97,
                'name' => 'Honduras',
                'phonecode' => '504',
                'sortname' => 'HN',
            ),
            
            array (
                'id' => 98,
                'name' => 'Hong Kong S.A.R.',
                'phonecode' => '852',
                'sortname' => 'HK',
            ),
            
            array (
                'id' => 99,
                'name' => 'Hungary',
                'phonecode' => '36',
                'sortname' => 'HU',
            ),
            
            array (
                'id' => 100,
                'name' => 'Iceland',
                'phonecode' => '354',
                'sortname' => 'IS',
            ),
            
            array (
                'id' => 101,
                'name' => 'India',
                'phonecode' => '91',
                'sortname' => 'IN',
            ),
            
            array (
                'id' => 102,
                'name' => 'Indonesia',
                'phonecode' => '62',
                'sortname' => 'ID',
            ),
            
            array (
                'id' => 103,
                'name' => 'Iran',
                'phonecode' => '98',
                'sortname' => 'IR',
            ),
            
            array (
                'id' => 104,
                'name' => 'Iraq',
                'phonecode' => '964',
                'sortname' => 'IQ',
            ),
            
            array (
                'id' => 105,
                'name' => 'Ireland',
                'phonecode' => '353',
                'sortname' => 'IE',
            ),
            
            array (
                'id' => 106,
                'name' => 'Israel',
                'phonecode' => '972',
                'sortname' => 'IL',
            ),
            
            array (
                'id' => 107,
                'name' => 'Italy',
                'phonecode' => '39',
                'sortname' => 'IT',
            ),
            
            array (
                'id' => 108,
                'name' => 'Jamaica',
                'phonecode' => '1876',
                'sortname' => 'JM',
            ),
            
            array (
                'id' => 109,
                'name' => 'Japan',
                'phonecode' => '81',
                'sortname' => 'JP',
            ),
            
            array (
                'id' => 110,
                'name' => 'Jersey',
                'phonecode' => '44',
                'sortname' => 'XJ',
            ),
            
            array (
                'id' => 111,
                'name' => 'Jordan',
                'phonecode' => '962',
                'sortname' => 'JO',
            ),
            
            array (
                'id' => 112,
                'name' => 'Kazakhstan',
                'phonecode' => '7',
                'sortname' => 'KZ',
            ),
            
            array (
                'id' => 113,
                'name' => 'Kenya',
                'phonecode' => '254',
                'sortname' => 'KE',
            ),
            
            array (
                'id' => 114,
                'name' => 'Kiribati',
                'phonecode' => '686',
                'sortname' => 'KI',
            ),
            
            array (
                'id' => 115,
                'name' => 'Korea North',
                'phonecode' => '850',
                'sortname' => 'KP',
            ),
            
            array (
                'id' => 116,
                'name' => 'Korea South',
                'phonecode' => '82',
                'sortname' => 'KR',
            ),
            
            array (
                'id' => 117,
                'name' => 'Kuwait',
                'phonecode' => '965',
                'sortname' => 'KW',
            ),
            
            array (
                'id' => 118,
                'name' => 'Kyrgyzstan',
                'phonecode' => '996',
                'sortname' => 'KG',
            ),
            
            array (
                'id' => 119,
                'name' => 'Laos',
                'phonecode' => '856',
                'sortname' => 'LA',
            ),
            
            array (
                'id' => 120,
                'name' => 'Latvia',
                'phonecode' => '371',
                'sortname' => 'LV',
            ),
            
            array (
                'id' => 121,
                'name' => 'Lebanon',
                'phonecode' => '961',
                'sortname' => 'LB',
            ),
            
            array (
                'id' => 122,
                'name' => 'Lesotho',
                'phonecode' => '266',
                'sortname' => 'LS',
            ),
            
            array (
                'id' => 123,
                'name' => 'Liberia',
                'phonecode' => '231',
                'sortname' => 'LR',
            ),
            
            array (
                'id' => 124,
                'name' => 'Libya',
                'phonecode' => '218',
                'sortname' => 'LY',
            ),
            
            array (
                'id' => 125,
                'name' => 'Liechtenstein',
                'phonecode' => '423',
                'sortname' => 'LI',
            ),
            
            array (
                'id' => 126,
                'name' => 'Lithuania',
                'phonecode' => '370',
                'sortname' => 'LT',
            ),
            
            array (
                'id' => 127,
                'name' => 'Luxembourg',
                'phonecode' => '352',
                'sortname' => 'LU',
            ),
            
            array (
                'id' => 128,
                'name' => 'Macau S.A.R.',
                'phonecode' => '853',
                'sortname' => 'MO',
            ),
            
            array (
                'id' => 129,
                'name' => 'Macedonia',
                'phonecode' => '389',
                'sortname' => 'MK',
            ),
            
            array (
                'id' => 130,
                'name' => 'Madagascar',
                'phonecode' => '261',
                'sortname' => 'MG',
            ),
            
            array (
                'id' => 131,
                'name' => 'Malawi',
                'phonecode' => '265',
                'sortname' => 'MW',
            ),
            
            array (
                'id' => 132,
                'name' => 'Malaysia',
                'phonecode' => '60',
                'sortname' => 'MY',
            ),
            
            array (
                'id' => 133,
                'name' => 'Maldives',
                'phonecode' => '960',
                'sortname' => 'MV',
            ),
            
            array (
                'id' => 134,
                'name' => 'Mali',
                'phonecode' => '223',
                'sortname' => 'ML',
            ),
            
            array (
                'id' => 135,
                'name' => 'Malta',
                'phonecode' => '356',
                'sortname' => 'MT',
            ),
            
            array (
                'id' => 136,
            'name' => 'Man (Isle of)',
                'phonecode' => '44',
                'sortname' => 'XM',
            ),
            
            array (
                'id' => 137,
                'name' => 'Marshall Islands',
                'phonecode' => '692',
                'sortname' => 'MH',
            ),
            
            array (
                'id' => 138,
                'name' => 'Martinique',
                'phonecode' => '596',
                'sortname' => 'MQ',
            ),
            
            array (
                'id' => 139,
                'name' => 'Mauritania',
                'phonecode' => '222',
                'sortname' => 'MR',
            ),
            
            array (
                'id' => 140,
                'name' => 'Mauritius',
                'phonecode' => '230',
                'sortname' => 'MU',
            ),
            
            array (
                'id' => 141,
                'name' => 'Mayotte',
                'phonecode' => '269',
                'sortname' => 'YT',
            ),
            
            array (
                'id' => 142,
                'name' => 'Mexico',
                'phonecode' => '52',
                'sortname' => 'MX',
            ),
            
            array (
                'id' => 143,
                'name' => 'Micronesia',
                'phonecode' => '691',
                'sortname' => 'FM',
            ),
            
            array (
                'id' => 144,
                'name' => 'Moldova',
                'phonecode' => '373',
                'sortname' => 'MD',
            ),
            
            array (
                'id' => 145,
                'name' => 'Monaco',
                'phonecode' => '377',
                'sortname' => 'MC',
            ),
            
            array (
                'id' => 146,
                'name' => 'Mongolia',
                'phonecode' => '976',
                'sortname' => 'MN',
            ),
            
            array (
                'id' => 147,
                'name' => 'Montserrat',
                'phonecode' => '1664',
                'sortname' => 'MS',
            ),
            
            array (
                'id' => 148,
                'name' => 'Morocco',
                'phonecode' => '212',
                'sortname' => 'MA',
            ),
            
            array (
                'id' => 149,
                'name' => 'Mozambique',
                'phonecode' => '258',
                'sortname' => 'MZ',
            ),
            
            array (
                'id' => 150,
                'name' => 'Myanmar',
                'phonecode' => '95',
                'sortname' => 'MM',
            ),
            
            array (
                'id' => 151,
                'name' => 'Namibia',
                'phonecode' => '264',
                'sortname' => 'NA',
            ),
            
            array (
                'id' => 152,
                'name' => 'Nauru',
                'phonecode' => '674',
                'sortname' => 'NR',
            ),
            
            array (
                'id' => 153,
                'name' => 'Nepal',
                'phonecode' => '977',
                'sortname' => 'NP',
            ),
            
            array (
                'id' => 154,
                'name' => 'Netherlands Antilles',
                'phonecode' => '599',
                'sortname' => 'AN',
            ),
            
            array (
                'id' => 155,
                'name' => 'Netherlands The',
                'phonecode' => '31',
                'sortname' => 'NL',
            ),
            
            array (
                'id' => 156,
                'name' => 'New Caledonia',
                'phonecode' => '687',
                'sortname' => 'NC',
            ),
            
            array (
                'id' => 157,
                'name' => 'New Zealand',
                'phonecode' => '64',
                'sortname' => 'NZ',
            ),
            
            array (
                'id' => 158,
                'name' => 'Nicaragua',
                'phonecode' => '505',
                'sortname' => 'NI',
            ),
            
            array (
                'id' => 159,
                'name' => 'Niger',
                'phonecode' => '227',
                'sortname' => 'NE',
            ),
            
            array (
                'id' => 160,
                'name' => 'Nigeria',
                'phonecode' => '234',
                'sortname' => 'NG',
            ),
            
            array (
                'id' => 161,
                'name' => 'Niue',
                'phonecode' => '683',
                'sortname' => 'NU',
            ),
            
            array (
                'id' => 162,
                'name' => 'Norfolk Island',
                'phonecode' => '672',
                'sortname' => 'NF',
            ),
            
            array (
                'id' => 163,
                'name' => 'Northern Mariana Islands',
                'phonecode' => '1670',
                'sortname' => 'MP',
            ),
            
            array (
                'id' => 164,
                'name' => 'Norway',
                'phonecode' => '47',
                'sortname' => 'NO',
            ),
            
            array (
                'id' => 165,
                'name' => 'Oman',
                'phonecode' => '968',
                'sortname' => 'OM',
            ),
            
            array (
                'id' => 166,
                'name' => 'Pakistan',
                'phonecode' => '92',
                'sortname' => 'PK',
            ),
            
            array (
                'id' => 167,
                'name' => 'Palau',
                'phonecode' => '680',
                'sortname' => 'PW',
            ),
            
            array (
                'id' => 168,
                'name' => 'Palestinian Territory Occupied',
                'phonecode' => '970',
                'sortname' => 'PS',
            ),
            
            array (
                'id' => 169,
                'name' => 'Panama',
                'phonecode' => '507',
                'sortname' => 'PA',
            ),
            
            array (
                'id' => 170,
                'name' => 'Papua new Guinea',
                'phonecode' => '675',
                'sortname' => 'PG',
            ),
            
            array (
                'id' => 171,
                'name' => 'Paraguay',
                'phonecode' => '595',
                'sortname' => 'PY',
            ),
            
            array (
                'id' => 172,
                'name' => 'Peru',
                'phonecode' => '51',
                'sortname' => 'PE',
            ),
            
            array (
                'id' => 173,
                'name' => 'Philippines',
                'phonecode' => '63',
                'sortname' => 'PH',
            ),
            
            array (
                'id' => 174,
                'name' => 'Pitcairn Island',
                'phonecode' => '0',
                'sortname' => 'PN',
            ),
            
            array (
                'id' => 175,
                'name' => 'Poland',
                'phonecode' => '48',
                'sortname' => 'PL',
            ),
            
            array (
                'id' => 176,
                'name' => 'Portugal',
                'phonecode' => '351',
                'sortname' => 'PT',
            ),
            
            array (
                'id' => 177,
                'name' => 'Puerto Rico',
                'phonecode' => '1787',
                'sortname' => 'PR',
            ),
            
            array (
                'id' => 178,
                'name' => 'Qatar',
                'phonecode' => '974',
                'sortname' => 'QA',
            ),
            
            array (
                'id' => 179,
                'name' => 'Reunion',
                'phonecode' => '262',
                'sortname' => 'RE',
            ),
            
            array (
                'id' => 180,
                'name' => 'Romania',
                'phonecode' => '40',
                'sortname' => 'RO',
            ),
            
            array (
                'id' => 181,
                'name' => 'Russia',
                'phonecode' => '70',
                'sortname' => 'RU',
            ),
            
            array (
                'id' => 182,
                'name' => 'Rwanda',
                'phonecode' => '250',
                'sortname' => 'RW',
            ),
            
            array (
                'id' => 183,
                'name' => 'Saint Helena',
                'phonecode' => '290',
                'sortname' => 'SH',
            ),
            
            array (
                'id' => 184,
                'name' => 'Saint Kitts And Nevis',
                'phonecode' => '1869',
                'sortname' => 'KN',
            ),
            
            array (
                'id' => 185,
                'name' => 'Saint Lucia',
                'phonecode' => '1758',
                'sortname' => 'LC',
            ),
            
            array (
                'id' => 186,
                'name' => 'Saint Pierre and Miquelon',
                'phonecode' => '508',
                'sortname' => 'PM',
            ),
            
            array (
                'id' => 187,
                'name' => 'Saint Vincent And The Grenadines',
                'phonecode' => '1784',
                'sortname' => 'VC',
            ),
            
            array (
                'id' => 188,
                'name' => 'Samoa',
                'phonecode' => '684',
                'sortname' => 'WS',
            ),
            
            array (
                'id' => 189,
                'name' => 'San Marino',
                'phonecode' => '378',
                'sortname' => 'SM',
            ),
            
            array (
                'id' => 190,
                'name' => 'Sao Tome and Principe',
                'phonecode' => '239',
                'sortname' => 'ST',
            ),
            
            array (
                'id' => 191,
                'name' => 'Saudi Arabia',
                'phonecode' => '966',
                'sortname' => 'SA',
            ),
            
            array (
                'id' => 192,
                'name' => 'Senegal',
                'phonecode' => '221',
                'sortname' => 'SN',
            ),
            
            array (
                'id' => 193,
                'name' => 'Serbia',
                'phonecode' => '381',
                'sortname' => 'RS',
            ),
            
            array (
                'id' => 194,
                'name' => 'Seychelles',
                'phonecode' => '248',
                'sortname' => 'SC',
            ),
            
            array (
                'id' => 195,
                'name' => 'Sierra Leone',
                'phonecode' => '232',
                'sortname' => 'SL',
            ),
            
            array (
                'id' => 196,
                'name' => 'Singapore',
                'phonecode' => '65',
                'sortname' => 'SG',
            ),
            
            array (
                'id' => 197,
                'name' => 'Slovakia',
                'phonecode' => '421',
                'sortname' => 'SK',
            ),
            
            array (
                'id' => 198,
                'name' => 'Slovenia',
                'phonecode' => '386',
                'sortname' => 'SI',
            ),
            
            array (
                'id' => 199,
                'name' => 'Smaller Territories of the UK',
                'phonecode' => '44',
                'sortname' => 'XG',
            ),
            
            array (
                'id' => 200,
                'name' => 'Solomon Islands',
                'phonecode' => '677',
                'sortname' => 'SB',
            ),
            
            array (
                'id' => 201,
                'name' => 'Somalia',
                'phonecode' => '252',
                'sortname' => 'SO',
            ),
            
            array (
                'id' => 202,
                'name' => 'South Africa',
                'phonecode' => '27',
                'sortname' => 'ZA',
            ),
            
            array (
                'id' => 203,
                'name' => 'South Georgia',
                'phonecode' => '0',
                'sortname' => 'GS',
            ),
            
            array (
                'id' => 204,
                'name' => 'South Sudan',
                'phonecode' => '211',
                'sortname' => 'SS',
            ),
            
            array (
                'id' => 205,
                'name' => 'Spain',
                'phonecode' => '34',
                'sortname' => 'ES',
            ),
            
            array (
                'id' => 206,
                'name' => 'Sri Lanka',
                'phonecode' => '94',
                'sortname' => 'LK',
            ),
            
            array (
                'id' => 207,
                'name' => 'Sudan',
                'phonecode' => '249',
                'sortname' => 'SD',
            ),
            
            array (
                'id' => 208,
                'name' => 'Suriname',
                'phonecode' => '597',
                'sortname' => 'SR',
            ),
            
            array (
                'id' => 209,
                'name' => 'Svalbard And Jan Mayen Islands',
                'phonecode' => '47',
                'sortname' => 'SJ',
            ),
            
            array (
                'id' => 210,
                'name' => 'Swaziland',
                'phonecode' => '268',
                'sortname' => 'SZ',
            ),
            
            array (
                'id' => 211,
                'name' => 'Sweden',
                'phonecode' => '46',
                'sortname' => 'SE',
            ),
            
            array (
                'id' => 212,
                'name' => 'Switzerland',
                'phonecode' => '41',
                'sortname' => 'CH',
            ),
            
            array (
                'id' => 213,
                'name' => 'Syria',
                'phonecode' => '963',
                'sortname' => 'SY',
            ),
            
            array (
                'id' => 214,
                'name' => 'Taiwan',
                'phonecode' => '886',
                'sortname' => 'TW',
            ),
            
            array (
                'id' => 215,
                'name' => 'Tajikistan',
                'phonecode' => '992',
                'sortname' => 'TJ',
            ),
            
            array (
                'id' => 216,
                'name' => 'Tanzania',
                'phonecode' => '255',
                'sortname' => 'TZ',
            ),
            
            array (
                'id' => 217,
                'name' => 'Thailand',
                'phonecode' => '66',
                'sortname' => 'TH',
            ),
            
            array (
                'id' => 218,
                'name' => 'Togo',
                'phonecode' => '228',
                'sortname' => 'TG',
            ),
            
            array (
                'id' => 219,
                'name' => 'Tokelau',
                'phonecode' => '690',
                'sortname' => 'TK',
            ),
            
            array (
                'id' => 220,
                'name' => 'Tonga',
                'phonecode' => '676',
                'sortname' => 'TO',
            ),
            
            array (
                'id' => 221,
                'name' => 'Trinidad And Tobago',
                'phonecode' => '1868',
                'sortname' => 'TT',
            ),
            
            array (
                'id' => 222,
                'name' => 'Tunisia',
                'phonecode' => '216',
                'sortname' => 'TN',
            ),
            
            array (
                'id' => 223,
                'name' => 'Turkey',
                'phonecode' => '90',
                'sortname' => 'TR',
            ),
            
            array (
                'id' => 224,
                'name' => 'Turkmenistan',
                'phonecode' => '7370',
                'sortname' => 'TM',
            ),
            
            array (
                'id' => 225,
                'name' => 'Turks And Caicos Islands',
                'phonecode' => '1649',
                'sortname' => 'TC',
            ),
            
            array (
                'id' => 226,
                'name' => 'Tuvalu',
                'phonecode' => '688',
                'sortname' => 'TV',
            ),
            
            array (
                'id' => 227,
                'name' => 'Uganda',
                'phonecode' => '256',
                'sortname' => 'UG',
            ),
            
            array (
                'id' => 228,
                'name' => 'Ukraine',
                'phonecode' => '380',
                'sortname' => 'UA',
            ),
            
            array (
                'id' => 229,
                'name' => 'United Arab Emirates',
                'phonecode' => '971',
                'sortname' => 'AE',
            ),
            
            array (
                'id' => 230,
                'name' => 'United Kingdom',
                'phonecode' => '44',
                'sortname' => 'GB',
            ),
            
            array (
                'id' => 231,
                'name' => 'United States',
                'phonecode' => '1',
                'sortname' => 'US',
            ),
            
            array (
                'id' => 232,
                'name' => 'United States Minor Outlying Islands',
                'phonecode' => '1',
                'sortname' => 'UM',
            ),
            
            array (
                'id' => 233,
                'name' => 'Uruguay',
                'phonecode' => '598',
                'sortname' => 'UY',
            ),
            
            array (
                'id' => 234,
                'name' => 'Uzbekistan',
                'phonecode' => '998',
                'sortname' => 'UZ',
            ),
            
            array (
                'id' => 235,
                'name' => 'Vanuatu',
                'phonecode' => '678',
                'sortname' => 'VU',
            ),
            
            array (
                'id' => 236,
            'name' => 'Vatican City State (Holy See)',
                'phonecode' => '39',
                'sortname' => 'VA',
            ),
            
            array (
                'id' => 237,
                'name' => 'Venezuela',
                'phonecode' => '58',
                'sortname' => 'VE',
            ),
            
            array (
                'id' => 238,
                'name' => 'Vietnam',
                'phonecode' => '84',
                'sortname' => 'VN',
            ),
            
            array (
                'id' => 239,
            'name' => 'Virgin Islands (British)',
                'phonecode' => '1284',
                'sortname' => 'VG',
            ),
            
            array (
                'id' => 240,
            'name' => 'Virgin Islands (US)',
                'phonecode' => '1340',
                'sortname' => 'VI',
            ),
            
            array (
                'id' => 241,
                'name' => 'Wallis And Futuna Islands',
                'phonecode' => '681',
                'sortname' => 'WF',
            ),
            
            array (
                'id' => 242,
                'name' => 'Western Sahara',
                'phonecode' => '212',
                'sortname' => 'EH',
            ),
            
            array (
                'id' => 243,
                'name' => 'Yemen',
                'phonecode' => '967',
                'sortname' => 'YE',
            ),
            
            array (
                'id' => 244,
                'name' => 'Yugoslavia',
                'phonecode' => '38',
                'sortname' => 'YU',
            ),
            
            array (
                'id' => 245,
                'name' => 'Zambia',
                'phonecode' => '260',
                'sortname' => 'ZM',
            ),
            
            array (
                'id' => 246,
                'name' => 'Zimbabwe',
                'phonecode' => '263',
                'sortname' => 'ZW',
            ),
        ));
    }
}
