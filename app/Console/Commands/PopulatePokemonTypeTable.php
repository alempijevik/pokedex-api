<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\PokemonType;
use App\Models\Type;
use App\Models\Pokemon;

class PopulatePokemonTypeTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:pokemon_type';

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
        collect(json_decode($file, true))->each(function ($item) {
            $pokemon = Pokemon::where('name', $item['name'])->first();
            foreach($item['type'] as $type) {
                $typeId = Type::where('name', $type)->first();
                PokemonType::create([
                    'pokemon_id' => $pokemon['id'],
                    'type_id' => $typeId['id'],
                ]);
            };
        });
    }
}
