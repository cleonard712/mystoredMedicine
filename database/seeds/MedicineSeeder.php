<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            //  1.1 ANALGESIK NARKOTIK 
            [
                'generic_name' => 'fentanil',
                'form' => 'inj 0,05 mg/mL (i.m./i.v.)',
                'restriction_formula' => '5 amp/kasus.',
                'description' => 'inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 1
            ],
            [
                'generic_name' => 'fentanil',
                'form' => 'patch 12,5 mcg/jam',
                'restriction_formula' => '10 patch/bulan.',
                'description' => 'patch: - Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 1
            ],
            [
                'generic_name' => 'fentanil',
                'form' => 'patch 25 mcg/jam',
                'restriction_formula' => '10 patch/bulan.',
                'description' => 'patch: - Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 1
            ],
            //1.2 ANALGESIK NON NARKOTIK 
            [
                'generic_name' => 'asam mefenamat',
                'form' => 'kaps 250 mg',
                'restriction_formula' => '30 kaps/bulan.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 2
            ],
            [
                'generic_name' => 'asam mefenamat',
                'form' => 'tab 500 mg',
                'restriction_formula' => '30 tab/bulan.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 2
            ],
            [
                'generic_name' => 'ibuprofen*',
                'form' => 'tab 200 mg',
                'restriction_formula' => '30 tab/bulan.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 2
            ],
            //1.3 ANTIPIRAI
            [
                'generic_name' => 'alopurinol',
                'form' => 'tab 100 mg*',
                'restriction_formula' => '30 tab/bulan.',
                'description' => 'Tidak diberikan pada saat nyeri akut.',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 3
            ],
            [
                'generic_name' => 'kolkisin',
                'form' => 'tab 500 mcg',
                'restriction_formula' => '30 tab/bulan.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 3
            ],
            [
                'generic_name' => 'probenesid',
                'form' => 'tab 500 mg',
                'restriction_formula' => '30 tab/bulan.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 3
            ],
            //1.4 NYERI NEUROPATIK
            [
                'generic_name' => 'amitriptilin',
                'form' => 'tab 25 mg',
                'restriction_formula' => '30 tab/bulan.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 4
            ],
            [
                'generic_name' => 'gabapentin',
                'form' => 'kaps 100 mg',
                'restriction_formula' => '60 kaps/bulan.',
                'description' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 4
            ],
            [
                'generic_name' => 'karbamazepin',
                'form' => 'tab 100 mg',
                'restriction_formula' => '60 tab/bulan.',
                'description' => 'Hanya untuk neuralgia trigeminal.',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 4
            ],
            //2.1 ANESTETIK LOKAL
            [
                'generic_name' => 'bupivakain',
                'form' => 'inj 0,5%',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 5
            ],
            [
                'generic_name' => 'bupivakain heavy',
                'form' => 'inj 0,5% + glukosa 8%',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 5
            ],
            [
                'generic_name' => 'etil klorida',
                'form' => 'spray 100 mL',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 5
            ],
            //2.2 ANESTETIK UMUM dan OKSIGEN
            [
                'generic_name' => 'deksmedetomidin',
                'form' => 'inj 100 mcg/mL',
                'restriction_formula' => '',
                'description' => 'Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 6
            ],
            [
                'generic_name' => 'desfluran',
                'form' => 'ih',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 6
            ],
            [
                'generic_name' => 'ketamin',
                'form' => 'inj 50 mg/mL (i.v.)',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 6
            ],
            //2.3 OBAT untuk PROSEDUR PRE OPERATIF
            [
                'generic_name' => 'atropin',
                'form' => 'inj 0,25 mg/mL (i.v./s.k.)',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 7
            ],
            [
                'generic_name' => 'diazepam',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 7
            ],
            [
                'generic_name' => 'midazolam',
                'form' => 'inj 1 mg/mL (i.v.)',
                'restriction_formula' => '- Dosis rumatan: 1 mg/jam (24mg/hari). - Dosis premedikasi: 8 vial/kasus.',
                'description' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 7
            ],
            //3 ANTIALERGI dan OBAT untuk ANAFILAKSIS
            [
                'generic_name' => 'deksametason',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '20 mg/hari.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 8
            ],
            [
                'generic_name' => 'difenhidramin',
                'form' => 'inj 10 mg/mL (i.v./i.m.)',
                'restriction_formula' => '30 mg/hari.',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 8
            ],
            [
                'generic_name' => 'epinefrin (adrenalin)',
                'form' => 'inj 1 mg/mL',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 8
            ],
            // 4.1 KHUSUS
            [
                'generic_name' => 'atropin',
                'form' => 'tab 0,5 mg',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 9
            ],
            [
                'generic_name' => 'kalsium glukonat',
                'form' => 'inj 10%',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 9
            ],
            [
                'generic_name' => 'efedrin',
                'form' => 'inj 50 mg/mL',
                'restriction_formula' => '',
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 9
            ],
            // 5. ANTIEPILEPSI - ANTIKONVULSI
            [
                'generic_name' => 'diazepam',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '10 amp/kasus, kecuali untuk kasus di ICU.',
                'description' => 'Tidak untuk i.m.',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 10
            ],
            [
                'generic_name' => 'fenitoin',
                'form' => 'kaps 30 mg*',
                'restriction_formula' => '90 kaps/bulan.',
                'description' => 'Dapat digunakan untuk status 
                konvulsivus',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 10
            ],
            [
                'generic_name' => 'fenobarbital',
                'form' => 'tab 30 mg*',
                'restriction_formula' => '120 tab/bulan.',
                'description' => 'Dapat digunakan untuk status 
                konvulsivus',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'category_id' => 10
            ]
        ]);
    }
}
