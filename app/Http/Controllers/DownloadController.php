<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{

    public function index()
    {
               return view('admin/download/index');
    }
    public function windowsDownload($teste)
    {
       
        $caminhoArquivo = public_path('arquivos/' . $teste);
       /*  dd($caminhoArquivo); */
        // Verifica se o arquivo existe
        if (File::exists($caminhoArquivo)) {
            // Define o tipo MIME do arquivo
            $tipoMime = File::mimeType($caminhoArquivo);

            // Define os cabeçalhos para a resposta
            $cabeçalhos = [
                'Content-Type' => $tipoMime,
            ];

            // Gera uma resposta de download com o arquivo
            return response()->download($caminhoArquivo, $teste, $cabeçalhos);
        } else {
            // Se o arquivo não existe, retorna uma resposta 404
            abort(404);
        }
    }
}
