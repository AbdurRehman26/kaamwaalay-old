<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = Carbon::now();        
        Role::insertOnDuplicateKey(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Admin',
                'can_register' => 0,
                'scope' => json_encode(array("user.index",
                                "service.index",
                                "change.status",
                                "user.store",
                                "change.access_level",
                                "job.index",
                                "service.store",
                                "service.show",
                                "service-provider-profile.index",
                                "service-provider-profile-request.index",
                                "campaign.index",
                                "campaign.store",
                                "campaign.show",
                                "job-bid.index",
                                "dashboard",
                                "file.upload",
                                "file.remove",
                                "plan.index",
                                "plan.show",
                                "plan.update",
                                "role.index",
                                "role.show",
                                "state.index",
                                "state.show",
                                "city.index",
                                "city.show",
                                "country.index",
                                "country.show",
                                "user-rating.index",
                                "user-rating.show",
                                "user-rating.store",
                                "job-bid.update",
                                "job-bid.store")),
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Service Provdier',
                'can_register' => 1,
                'scope' =>json_encode(array()), 
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Customer',
                'can_register' => 1,
                'scope' => json_encode(array()), 
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
        ));
    }
}
