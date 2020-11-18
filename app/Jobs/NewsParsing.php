<?php

namespace App\Jobs;

use App\Models\Source;
use App\Service\XmlParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Source
     */
    private Source $source;

    /**
     * Create a new job instance.
     *
     * @param Source $source
     */
    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @param XmlParserService $service
     * @return void
     */
    public function handle(XmlParserService $service)
    {
        $count = $service->parse($this->source);
        echo sprintf("Job for %s execited.%s%s news was added.%s", $this->source->title, PHP_EOL, $count, PHP_EOL);
    }
}
