<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{

    public function indexMaster($masters)
    {
        $tableName = 'm_' . $masters;
        
        // Check if table exists
        if (!DB::getSchemaBuilder()->hasTable($tableName)) {
            abort(404, 'Table not found');
        }

        $title = 'Master - ' . ucfirst($masters);

        $data = DB::table($tableName)->get();

        $table_columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        
        // Remove id, created_at, updated_at from columns if they exist
        $table_columns = array_diff($table_columns, ['id', 'created_at', 'updated_at']);
        $table_columns = array_values($table_columns); // Re-index array

        return view('master.index_masters', [
            'title' => $title,
            'masters' => $data,
            'master_columns' => $table_columns,
            'table_name' => $masters
        ]);
    }

    public function updateMaster(Request $request, $masters)
    {
        $data = $request->all();
        $tableName = 'm_' . $masters;
        
        // Check if table exists
        if (!DB::getSchemaBuilder()->hasTable($tableName)) {
            return response()->json(['status' => 'error', 'message' => 'Table not found'], 404);
        }
        
        // Get column names (excluding id, created_at, updated_at)
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        $columns = array_diff($columns, ['id', 'created_at', 'updated_at']);
        $columns = array_values($columns);

        try {
            DB::beginTransaction();
            
            // Clear existing data (use delete instead of truncate to avoid auto-commit)
            DB::table($tableName)->delete();

            foreach ($data['data'] as $row) {
                $rowData = [];
                
                // Map row data to column names
                foreach ($columns as $index => $column) {
                    $rowData[$column] = $row[$index] ?? null;
                }
                
                // Add timestamps if columns exist
                if (in_array('created_at', DB::getSchemaBuilder()->getColumnListing($tableName))) {
                    $rowData['created_at'] = now();
                    $rowData['updated_at'] = now();
                }
                
                DB::table($tableName)->insert($rowData);
            }

            DB::commit();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }    
}
