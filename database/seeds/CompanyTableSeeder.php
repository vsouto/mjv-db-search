<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $company = \App\Company::create([
            'title' => 'TZ Seguros',
            'firstname' => 'Rafael',
            'lastname' => 'Turra',
            'job_title' => 'Socio Gerente',
            'city_id' => '1',
            'industry_id' => '1',
            'email' => 'rafael@tzseguros.com.br',
            'linkedin' => 'https://linkedin.com/rafael',
            'nome_planilha' => 'Brazil - Capital',
            'hardbounce' => '0',
        ]);

        $company = \App\Company::create([
            'title' => 'TZ Seguros',
            'firstname' => 'Thais',
            'lastname' => 'Christina Mattos',
            'job_title' => 'Supervisora',
            'city_id' => '1',
            'industry_id' => '1',
            'email' => 'thais@tzseguros',
            'linkedin' => 'https://linkedin.com/rafael',
            'nome_planilha' => 'Brazil - Capital',
            'hardbounce' => '0',
        ]);

        $company = \App\Company::create([
            'title' => 'Bradesco Seguros',
            'firstname' => 'Raul',
            'lastname' => 'Vignoli',
            'job_title' => 'Superintendente',
            'city_id' => '1',
            'industry_id' => '1',
            'email' => 'raul.vignoli@bradescoseguros.com.br',
            'linkedin' => 'https://linkedin.com/raul',
            'nome_planilha' => 'Brazil - Capital',
            'hardbounce' => '0',
        ]);
    }
}
