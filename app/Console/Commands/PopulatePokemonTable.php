<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Pokemon;


class PopulatePokemonTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:pokemon_table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = File::get(storage_path('app/pokedex.json'));
        collect(json_decode($file, true))->each(function ($pokemon) {
            Pokemon::create([
                'name' => $pokemon['name'],
                'stats' => $pokemon['stats'],
                'desc1' => $pokemon['desc1'],
                'species' => $pokemon['species'],
                'img' => $pokemon['img']
            ]);
        });
    }
}
