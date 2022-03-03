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
                'price'=>155000,
                'description' => 'inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'fentanil_05mg.jpg',
                'category_id' => 1
            ],
            [
                'generic_name' => 'fentanil',
                'form' => 'patch 12,5 mcg/jam',
                'restriction_formula' => '10 patch/bulan.',
                'price'=>250000,
                'description' => 'patch: - Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'fentanil_patch.jpg',
                'category_id' => 1
            ],
            [
                'generic_name' => 'fentanil',
                'form' => 'patch 25 mcg/jam',
                'restriction_formula' => '10 patch/bulan.',
                'price'=>450000,
                'description' => 'patch: - Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'fentanil_patch25.jpg',
                'category_id' => 1
            ],
            //1.2 ANALGESIK NON NARKOTIK 
            [
                'generic_name' => 'asam mefenamat',
                'form' => 'kaps 250 mg',
                'restriction_formula' => '30 kaps/bulan.',
                'price'=>7500,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'asammefenamat250.jpg',
                'category_id' => 2
            ],
            [
                'generic_name' => 'asam mefenamat',
                'form' => 'tab 500 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price'=>4000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'asammefenamat500.jpg',
                'category_id' => 2
            ],
            [
                'generic_name' => 'ibuprofen*',
                'form' => 'tab 200 mg',
                'restriction_formula' => '30 tab/bulan.',
                'description' => '',
                'price'=>28000,
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'ibuprofen200.jpg',
                'category_id' => 2
            ],
            //1.3 ANTIPIRAI
            [
                'generic_name' => 'alopurinol',
                'form' => 'tab 100 mg*',
                'restriction_formula' => '30 tab/bulan.',
                'description' => 'Tidak diberikan pada saat nyeri akut.',
                'price'=>2700,
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'allopurinol100.jpg',
                'category_id' => 3
            ],
            [
                'generic_name' => 'kolkisin',
                'form' => 'tab 500 mcg',
                'restriction_formula' => '30 tab/bulan.',
                'price'=>7200,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'kolkisin500.jpg',
                'category_id' => 3
            ],
            [
                'generic_name' => 'probenesid',
                'form' => 'tab 500 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price'=>5000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'probenid.jpg',
                'category_id' => 3
            ],
            //1.4 NYERI NEUROPATIK
            [
                'generic_name' => 'amitriptilin',
                'form' => 'tab 25 mg',
                'restriction_formula' => '30 tab/bulan.',
                'price'=>75000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'amitriptyline.jpg',
                'category_id' => 4
            ],
            [
                'generic_name' => 'gabapentin',
                'form' => 'kaps 100 mg',
                'restriction_formula' => '60 kaps/bulan.',
                'price'=>8600,
                'description' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'gabapentin.jpg',
                'category_id' => 4
            ],
            [
                'generic_name' => 'karbamazepin',
                'form' => 'tab 100 mg',
                'restriction_formula' => '60 tab/bulan.',
                'price'=>3000,
                'description' => 'Hanya untuk neuralgia trigeminal.',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'carbamazepine.jpg',
                'category_id' => 4
            ],
            //2.1 ANESTETIK LOKAL
            [
                'generic_name' => 'bupivakain',
                'form' => 'inj 0,5%',
                'restriction_formula' => '',
                'price'=>50000,
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'bupivacaine.jpg',
                'category_id' => 5
            ],
            [
                'generic_name' => 'bupivakain heavy',
                'form' => 'inj 0,5% + glukosa 8%',
                'restriction_formula' => '',
                'price'=>350000,
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'bupivacaineheavy.jpg',
                'category_id' => 5
            ],
            [
                'generic_name' => 'etil klorida',
                'form' => 'spray 100 mL',
                'restriction_formula' => '',
                'price'=>159500,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'etil_klorida.jpg',
                'category_id' => 5
            ],
            //2.2 ANESTETIK UMUM dan OKSIGEN
            [
                'generic_name' => 'deksmedetomidin',
                'form' => 'inj 100 mcg/mL',
                'restriction_formula' => '',
                'price'=>350000,
                'description' => 'Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'deksmedetomidin.jpg',
                'category_id' => 6
            ],
            [
                'generic_name' => 'desfluran',
                'form' => 'ih',
                'restriction_formula' => '',
                'price'=>3750000,
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'desflurane.jpg',
                'category_id' => 6
            ],
            [
                'generic_name' => 'ketamin',
                'form' => 'inj 50 mg/mL (i.v.)',
                'restriction_formula' => '',
                'price'=>1300000,
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'ketamin.jpg',
                'category_id' => 6
            ],
            //2.3 OBAT untuk PROSEDUR PRE OPERATIF
            [
                'generic_name' => 'atropin',
                'form' => 'inj 0,25 mg/mL (i.v./s.k.)',
                'restriction_formula' => '',
                'price'=>55000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'atropine.jpg',
                'category_id' => 7
            ],
            [
                'generic_name' => 'diazepam',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '',
                'price'=>120000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'diazepam.jpg',
                'category_id' => 7
            ],
            [
                'generic_name' => 'midazolam',
                'form' => 'inj 1 mg/mL (i.v.)',
                'restriction_formula' => '- Dosis rumatan: 1 mg/jam (24mg/hari). - Dosis premedikasi: 8 vial/kasus.',
                'price'=>35000,
                'description' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum.',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'midazolam.jpg',
                'category_id' => 7
            ],
            //3 ANTIALERGI dan OBAT untuk ANAFILAKSIS
            [
                'generic_name' => 'deksametason',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '20 mg/hari.',
                'price'=>1400,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'dexamethasone.jpg',
                'category_id' => 8
            ],
            [
                'generic_name' => 'difenhidramin',
                'form' => 'inj 10 mg/mL (i.v./i.m.)',
                'restriction_formula' => '30 mg/hari.',
                'price'=>22000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'difenhidramin.jpg',
                'category_id' => 8
            ],
            [
                'generic_name' => 'epinefrin (adrenalin)',
                'form' => 'inj 1 mg/mL',
                'restriction_formula' => '',
                'price'=>25000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'epinefrin.jpg',
                'category_id' => 8
            ],
            // 4.1 KHUSUS
            [
                'generic_name' => 'atropin',
                'form' => 'tab 0,5 mg',
                'restriction_formula' => '',
                'price'=>55000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'atropin.jpg',
                'category_id' => 9
            ],
            [
                'generic_name' => 'kalsium glukonat',
                'form' => 'inj 10%',
                'restriction_formula' => '',
                'price'=>50000,
                'description' => '',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'kalsium.jpg',
                'category_id' => 9
            ],
            [
                'generic_name' => 'efedrin',
                'form' => 'inj 50 mg/mL',
                'restriction_formula' => '',
                'price'=>80000,
                'description' => '',
                'faskes_TK1' => 0,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'efedrin.jpg',
                'category_id' => 9
            ],
            // 5. ANTIEPILEPSI - ANTIKONVULSI
            [
                'generic_name' => 'diazepam',
                'form' => 'inj 5 mg/mL',
                'restriction_formula' => '10 amp/kasus, kecuali untuk kasus di ICU.',
                'price'=>120000,
                'description' => 'Tidak untuk i.m.',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'diazepam.jpg',
                'category_id' => 10
            ],
            [
                'generic_name' => 'fenitoin',
                'form' => 'kaps 30 mg*',
                'restriction_formula' => '90 kaps/bulan.',
                'price'=>1000,
                'description' => 'Dapat digunakan untuk status 
                konvulsivus',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'phenitoin.jpg',
                'category_id' => 10
            ],
            [
                'generic_name' => 'fenobarbital',
                'form' => 'tab 30 mg*',
                'restriction_formula' => '120 tab/bulan.',
                'price'=>585000,
                'description' => 'Dapat digunakan untuk status 
                konvulsivus',
                'faskes_TK1' => 1,
                'faskes_TK2' => 1,
                'faskes_TK3' => 1,
                'url'=>'phenobarbital.jpg',
                'category_id' => 10
            ]
        ]);
    }
}
