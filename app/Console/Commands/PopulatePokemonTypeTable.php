<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\PokemonType;

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
            $pokemon = DB::table('pokemon')->where('name', $item['name'])->get();
            $pokemon['type']->each(function ($type) {
                $typeId = DB::table('types')->where('name', $type)->value('id');
                PokemonType::create([
                    'pokemon_id' => $this['id'],
                    'type_id' => $typeId['id'],
                ]);
            });
        });
    }
}
