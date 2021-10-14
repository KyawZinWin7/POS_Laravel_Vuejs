<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\MimeTypeDetection\FinfoMimeTypeDetector;

class ApplicationController extends Controller {
  public function index() {
    $mixPath  = public_path('/build/mix-manifest.json');
    $contents = json_decode(file_get_contents($mixPath), true);

    $cssFiles = [];
    $jsFiles  = [];
    foreach ($contents as $key => $content) {
      if (pathinfo($key, PATHINFO_EXTENSION) == 'js') {
        $jsFiles[] = $content;
      }
      if (pathinfo($key, PATHINFO_EXTENSION) == 'css') {
        $cssFiles[] = $content;
      }
    }
    return view('app', ['cssFiles' => $cssFiles, 'jsFiles' => $jsFiles]);
  }

  public function image($filename) {
    $contents  = Storage::get('pos-system/' . $filename);
    $fileSize  = Storage::size('pos-system/' . $filename);
    $detector  = new FinfoMimeTypeDetector();
    $mimeType  = $detector->detectMimeType($filename, $contents);
    return response()->make(
      $contents,
      200,
      [
        'Content-Type'         => $mimeType,
        'Pragma'               => 'public',
        'Expires'              => '-1',
        'Cache-Control'        => 'max-age=604800',
        'Content-Length'       => $fileSize,
      ]
    );
  }
}
