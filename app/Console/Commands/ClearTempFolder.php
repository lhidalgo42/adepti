<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearTempFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Temp Folder';

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
     * @return mixed
     */
    public function handle()
    {
        //Get a list of all of the file names in the folder.
        $files = glob(base_path() . '/temp/*');

//Loop through the file list.
        foreach($files as $file){
            //Make sure that this is a file and not a directory.
            if(is_file($file)){
                //Use the unlink function to delete the file.
                unlink($file);
            }
        }
    }
}
