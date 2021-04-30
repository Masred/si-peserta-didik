<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class BackupRestoreController extends Controller
{
    public function index()
    {
        return view('backup-restore.index');
    }

    public function backup()
    {
        $tables = ['jurusan', 'users', 'tenaga_kependidikan', 'guru', 'rombel', 'peserta_didik', 'surat'];

        $structure = '';
        $data = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";

            $show_table_result = DB::select(DB::raw($show_table_query));

            foreach ($show_table_result as $show_table_row) {
                $show_table_row = (array)$show_table_row;
                $structure .= "\n\n" . str_replace('CREATE TABLE', 'CREATE TABLE IF NOT EXISTS', $show_table_row["Create Table"]) . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table;
            $records = DB::select(DB::raw($select_query));

            foreach ($records as $record) {
                $record = (array)$record;
                $table_column_array = array_keys($record);
                foreach ($table_column_array as $key => $name) {
                    $table_column_array[$key] = '`' . $name . '`';
                }

                $table_value_array = array_values($record);
                $data .= "\nINSERT INTO $table (";

                $data .= "" . implode(", ", $table_column_array) . ") VALUES \n";

                foreach ($table_value_array as $key => $record_column)
                    $table_value_array[$key] = addslashes($record_column);

                $data .= "('" . implode("','", $table_value_array) . "');\n";
            }
        }
        $file_name = storage_path('app/Laravel/data-backup-') . date('d-m-Y') . '.sql';
        $file_handle = fopen($file_name, 'w + ');

        $output = $structure . $data;
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);

        return redirect('backup-restore')->with('backup_restore', 'database berhasil dibackup!');
    }

    public function restore(Request $request)
    {
        Artisan::call('migrate:fresh');
        $set_null = str_replace("''", "null", file_get_contents($request->restore->path()));
        DB::unprepared($set_null);
        return redirect('backup-restore')->with('backup_restore', 'database berhasil direstore!');
    }
}
