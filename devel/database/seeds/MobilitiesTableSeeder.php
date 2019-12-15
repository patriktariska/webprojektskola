<?php

use Illuminate\Database\Seeder;
use App\Mobility;

class MobilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobilities')->delete();
        Mobility::create([
            'type' => 'Erasmus+',
            'desc' => 'Erasmus+ je program EÚ na podporu vzdelávania, odbornej prípravy, mládeže a športu v Európe. Jeho rozpočet vo výške 14,7 mld. EUR umožňuje poskytnúť viac ako 4 miliónom Európanov príležitosť študovať, absolvovať odbornú prípravu a získavať skúsenosti v zahraničí.']);
        Mobility::create([
            'type' => 'CEEPUS',
            'desc' => 'Stredoeurópsky výmenný program pre univerzitné štúdiá (CEEPUS) podporuje akademické mobility v strednej, východnej a juhovýchodnej Európe, prispieva k európskej integrácii a zdôrazňuje regionálne špecifiká. Program umožňuje rozvíjať spoluprácu slovenských a zahraničných vysokých škôl pomocou vytvárania akademických sietí, v rámci ktorých sa uskutočňuje vedecko-výskumná spolupráca a realizujú sa mobility študentov, doktorandov a vysokoškolských učiteľov. Prioritou je rozvoj spoločných študijných programov vedúcich k dvojitým alebo spoločným diplomom a k spoločnému vedeniu diplomových a dizertačných prác. V rámci programu CEEPUS je takisto možné realizovať exkurzie a letné školy, koordinačné stretnutia a jazykové kurzy, ktoré dopĺňajú odbornú a vedeckú spoluprácu medzi partnerskými univerzitami.']);

    }
}
