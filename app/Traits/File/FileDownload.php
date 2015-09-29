<?php

namespace App\Traits\File;


use App\File;

trait FileDownload {

    /**
     * Force download the file to the browser.
     *
     * @param File $file
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadFile(File $file)
    {
        //Download header
        $headers = [
            'Content-Type' => $file->type(),
            'Content-Disposition' => 'attachment',
            'filename'=>$file->name()
        ];

        //Force download response to the browser.
        return response()->download($file->path(), $file->name(), $headers);
    }

    /**
     * Stop the browser from downloading the file
     * instead make the user view the file
     * in the browser.
     *
     * @param File $file
     * @return \Illuminate\Http\Response
     */
    public function viewFile(File $file)
    {
        return response()->make(file_get_contents($$file->path()), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; '.$file->name(),
        ]);
    }
} 