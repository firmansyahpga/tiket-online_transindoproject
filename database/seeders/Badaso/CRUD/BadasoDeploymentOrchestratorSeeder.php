<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Traits\Seedable;

class BadasoDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = 'database/seeders/Badaso/CRUD/';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        
        
        
        
        $this->seed(KonserCRUDDataTypeAdded::class);
        $this->seed(KonserCRUDDataRowAdded::class);
        $this->seed(CheckStatusCRUDDataDeleted::class);
        $this->seed(CustomerCRUDDataDeleted::class);
        
        
        $this->seed(CustomerCRUDDataTypeAdded::class);
        $this->seed(CustomerCRUDDataRowAdded::class);
        $this->seed(StatusCustomerCRUDDataTypeAdded::class);
        $this->seed(StatusCustomerCRUDDataRowAdded::class);
    }
}
