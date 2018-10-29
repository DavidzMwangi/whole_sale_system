<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $profile=new \App\Models\Profile();
        $profile->company_name='Company Name';
        $profile->company_initials='C';
        $profile->company_phone_no='0700000000';
        $profile->company_address='address';
        $profile->company_location='location';
        $profile->company_website='website';
        $profile->company_email='email';
        $profile->company_pic='profile.png';
        $profile->save();

    }
}
