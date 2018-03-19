<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Console\Scheduling\Schedule;
use Alert;
use Artisan;
use Log;
use Storage;
use File;
use App\Comensal;
use App\Tarjeta;
use App\Permiso;
use App\Eventual;
use App\Suspender;
use Carbon\Carbon;


class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
        ini_set('max_execution_time',900);
      $directory = storage_path('app/backups');
       $files = File::allFiles($directory);
       $backups = [];
         foreach ($files as $file)
             { 
             $backups[] = [
               'nombre' => $file->getFilename(),
             ];


            }

        return view("backup.indexbackup",compact('backups'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ini_set('max_execution_time',900);
            $now = Carbon::now();
            $fecha = $now->toDateString();
     
            // start the backup process
          //  Artisan::call('backup:mysql-dump', array('theara.sql'));
            Artisan::call('backup:mysql-dump',['filename' => 'bienestar_'.$fecha]);
            //Artisan::call('backup:mysql-dump/'+"ssdf");
            
        
    }


    public function download($nombre)
    {
        ini_set('max_execution_time',900);
       Artisan::call('backup:mysql-restore',['--filename' => $nombre,'--yes' => '--yes']);

      return redirect()->back();
    }









    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
