<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\School;
use App\Models\User;

class RunFactory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'runFactory {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RunFactory allows executing a factory of a model that is passed as a parameter, it is possible to pass All to execute all the factories';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("START RUN Factory: ".$this->argument('model'));
        
        /**
         * checks if the model argument is correct to run the factory
         */
        switch($this->argument('model')){
            case 'All':
                $this->line("running factory of all models");
                Country::factory(10)->create();
                Region::factory(10)->create();
                City::factory(10)->create();
                User::factory(10)->create();
                School::factory(100)->create();
                break;
            
            case 'City': 
                $this->line("running factory of ".$this->argument('model'));
                City::factory(10)->create();
                break;
            
            case 'Country': 
                $this->line("running factory of ".$this->argument('model'));
                Country::factory(10)->create();
                break;
            
            case 'Region': 
                $this->line("running factory of ".$this->argument('model'));
                Region::factory(10)->create();
                break;
            
            case 'School': 
                $this->line("running factory of ".$this->argument('model'));
                School::factory(100)->create();
                break;
            
            case 'User': 
                $this->line("running factory of ".$this->argument('model'));
                User::factory(10)->create();
                break;
            
            default: 
                /**
                 * Model option is not valid
                 * Show valid options
                 */
                $this->error("Not exist model ".$this->argument('model'));
                $this->line("Available options:");
                $this->table(
                    ['Model'],
                    [
                        ['All'],
                        ['City'],
                        ['Country'],
                        ['Region'],
                        ['School'],
                        ['User']
                    ]
                );
                $this->line("Try again");
                break;
        }

        $this->info("END RUN Factory: ".$this->argument('model'));
        return Command::SUCCESS;
    }
}
