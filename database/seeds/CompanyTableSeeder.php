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
            'city' => 'Belém',
            'industry' => 'Transportes',
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
            'city' => 'Rio',
            'industry' => 'Serralheria',
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
            'city' => 'São Paulo',
            'industry' => 'Automóveis',
            'email' => 'raul.vignoli@bradescoseguros.com.br',
            'linkedin' => 'https://linkedin.com/raul',
            'nome_planilha' => 'Brazil - Capital',
            'hardbounce' => '0',
        ]);
    }
}
