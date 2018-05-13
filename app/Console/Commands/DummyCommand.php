<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DummyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:loader {count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some description of the command';


    /**
     * Execute the console command
     */
    public function handle()
    {
        $count = $this->argument('count');

        $bar = $this->output->createProgressBar($count);
        $bar->display();

        for ($i = 0; $i < $count; $i++) {
            sleep(1);
            $bar->advance();
        }

        $bar->finish();

        $this->info("\nA progress bar has just finished progressing.\n");
    }
}
