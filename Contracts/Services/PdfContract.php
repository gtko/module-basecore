<?php

namespace Modules\BaseCore\Contracts\Services;

use Illuminate\Http\Response;

interface PdfContract
{
    public function setUrl(string $url):PdfContract;
    public function setContentHtml(string $contentHtml):PdfContract;
    public function setParams(array $params = []):PdfContract;
    public function setParamsBrowser(array $paramsBrowser = []):PdfContract;

    public function getContentPdf():string;
    public function downloadPdf(string $filename):Response;
}
