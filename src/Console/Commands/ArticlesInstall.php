<?php

namespace Agpretto\Articles\Console\Commands;

use Illuminate\Console\Command;

class ArticlesInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:install
                            {--T|template : include publishing the template}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Agpretto Articles Package';

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
        if (app()->environment('production')) {
            $this->alert('Running in production mode.');
            if ($this->confirm('Proceed installing Agpretto Articles?')) {
                return;
            }
        }

        $this->comment('Publishing Articles configuration files...');
        $this->callSilent('vendor:publish', ['--tag' => 'articles-configs']);

        $this->comment('Publishing Articles migrations...');
        $this->callSilent('vendor:publish', [ '--tag' => 'articles-migrations' ]);

        if ($this->option('template')) {
            $this->callSilent('vendor:publish', [ '--tag' => 'articles-views' ]);
        } else {
            $this->info('You can publish the Articles template so you can modify it.');

            if ($this->confirm('Publish Articles template?')) {
                $this->comment('Publishing Articles template..');
                $this->callSilent('vendor:publish', [ '--tag' => 'articles-views' ]);
            }
        }

        $this->info('Articles installed successfully.');
        $this->comment('Visit /admin/articles to see the admin section for your articles..');
    }
}
