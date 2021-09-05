<?php

namespace Modules\BaseCore\Contracts\Services;

use Illuminate\Http\Response;

interface PdfContract
{
    public function setUrl(string $url):void;
    public function setContentHtml(string $contentHtml):void;
    public function setParams(array $params = []):void;

    public function getContentPdf():string;
    public function downloadPdf(string $filename):Response;
}
