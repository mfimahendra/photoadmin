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

    public function indexEditLandingPage()
    {
        // Get universities for dropdown
        $universities = DB::table('m_universities')
            ->orderBy('university', 'asc')
            ->get();

        // List all portfolio images from storage
        $portfolioImages = [];
        if (\Storage::disk('public')->exists('portfolio')) {
            $files = \Storage::disk('public')->files('portfolio');
            foreach ($files as $file) {
                $filename = basename($file);
                
                // Parse university prefix from filename
                $parts = explode('_', $filename, 2);
                $universityCode = count($parts) > 1 ? $parts[0] : 'Unknown';
                
                $portfolioImages[] = [
                    'name' => $filename,
                    'url' => \Storage::url($file),
                    'size' => \Storage::disk('public')->size($file),
                    'path' => $file,
                    'university_code' => $universityCode
                ];
            }
        }

        // Get hero image from storage
        $heroImage = null;
        if (\Storage::disk('public')->exists('landing/hero.jpg')) {
            $heroImage = \Storage::url('landing/hero.jpg');
        } elseif (\Storage::disk('public')->exists('landing/hero.png')) {
            $heroImage = \Storage::url('landing/hero.png');
        }

        $heroImage = asset($heroImage);

        return view('master.landing_page_edit', compact('portfolioImages', 'heroImage', 'universities'));
    }

    public function updateLandingImages(Request $request)
    {
        try {
            $request->validate([
                'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'brief_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'brief_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'brief_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'couple_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'couple_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'couple_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'group_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'group_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            $uploadedCount = 0;

            // Define image mappings
            $imageMap = [
                'hero_image' => 'images/landing_page/bw-1.jpg',
                'brief_1' => 'images/landing_page/brief-1.png',
                'brief_2' => 'images/landing_page/brief-2.png',
                'brief_3' => 'images/landing_page/brief-3.png',
                'couple_1' => 'images/landing_page/couple-1.png',
                'couple_2' => 'images/landing_page/couple-2.png',
                'couple_3' => 'images/landing_page/couple-3.png',
                'group_1' => 'images/landing_page/group-1.png',
                'group_2' => 'images/landing_page/group-2.png',
            ];

            foreach ($imageMap as $inputName => $targetPath) {
                if ($request->hasFile($inputName)) {
                    $file = $request->file($inputName);
                    $fullPath = public_path($targetPath);
                    
                    // Create directory if it doesn't exist
                    $directory = dirname($fullPath);
                    if (!file_exists($directory)) {
                        mkdir($directory, 0755, true);
                    }

                    // Backup old file
                    if (file_exists($fullPath)) {
                        $backupPath = $fullPath . '.backup.' . time();
                        copy($fullPath, $backupPath);
                    }

                    // Move uploaded file to target location
                    $extension = $file->getClientOriginalExtension();
                    $fileName = pathinfo($targetPath, PATHINFO_FILENAME) . '.' . $extension;
                    $destinationDir = dirname($fullPath);
                    
                    // If the extension is different, we need to rename
                    if ($extension !== pathinfo($targetPath, PATHINFO_EXTENSION)) {
                        // Delete old file
                        if (file_exists($fullPath)) {
                            unlink($fullPath);
                        }
                        $targetPath = dirname($targetPath) . '/' . $fileName;
                        $fullPath = public_path($targetPath);
                    }

                    $file->move($destinationDir, basename($fullPath));
                    $uploadedCount++;
                }
            }

            if ($uploadedCount > 0) {
                return redirect()->back()->with('success', "Successfully updated {$uploadedCount} image(s)!");
            } else {
                return redirect()->back()->with('error', 'No images were selected for upload.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating images: ' . $e->getMessage());
        }
    }

    public function uploadPortfolioImage(Request $request)
    {
        try {
            $request->validate([
                'university_id' => 'required|exists:m_universities,id',
                'portfolio_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            if ($request->hasFile('portfolio_image')) {
                // Get university data
                $university = DB::table('m_universities')
                    ->where('id', $request->university_id)
                    ->first();

                if (!$university) {
                    return redirect()->back()->with('error', 'University not found.');
                }

                // Extract university code
                $universityCode = $this->extractUniversityCode($university->university);

                $file = $request->file('portfolio_image');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                
                // Create filename with university prefix: [CODE]_[timestamp]_[original].[ext]
                $fileName = $universityCode . '_' . time() . '_' . $originalName . '.' . $extension;
                
                // Store in storage/app/public/portfolio
                $path = $file->storeAs('portfolio', $fileName, 'public');

                return redirect()->back()->with('success', 'Portfolio image uploaded successfully with prefix: ' . $universityCode);
            }

            return redirect()->back()->with('error', 'No image selected.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error uploading image: ' . $e->getMessage());
        }
    }

    public function uploadHeroImage(Request $request)
    {
        try {
            $request->validate([
                'hero_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            if ($request->hasFile('hero_image')) {
                $file = $request->file('hero_image');
                $extension = $file->getClientOriginalExtension();
                
                // Delete old hero images
                if (\Storage::disk('public')->exists('landing')) {
                    $oldFiles = \Storage::disk('public')->files('landing');
                    foreach ($oldFiles as $oldFile) {
                        if (preg_match('/hero\.(jpg|jpeg|png|gif)$/i', $oldFile)) {
                            \Storage::disk('public')->delete($oldFile);
                        }
                    }
                }
                
                // Store new hero image
                $fileName = 'hero.' . $extension;
                $path = $file->storeAs('landing', $fileName, 'public');

                return redirect()->back()->with('success', 'Hero image uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No image selected.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error uploading hero image: ' . $e->getMessage());
        }
    }

    public function deletePortfolioImage(Request $request)
    {
        try {
            $imagePath = $request->input('image_path');
            
            if (\Storage::disk('public')->exists($imagePath)) {
                \Storage::disk('public')->delete($imagePath);
                return response()->json(['success' => true, 'message' => 'Image deleted successfully!']);
            }

            return response()->json(['success' => false, 'message' => 'Image not found.'], 404);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting image: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Extract university code from university name
     * If it's already a short code (2-8 chars, all caps), use it
     * Otherwise, extract first letters of words
     */
    private function extractUniversityCode($universityName)
    {
        $name = trim($universityName);
        
        // If already short and uppercase (like ITB, UI, UGM), use as is
        if (strlen($name) <= 8 && strtoupper($name) === $name && !str_contains($name, ' ')) {
            return $name;
        }

        // Otherwise, extract initials from each word
        $words = explode(' ', $name);
        $code = '';
        
        foreach ($words as $word) {
            // Skip common words
            $word = trim($word);
            if (in_array(strtolower($word), ['universitas', 'institut', 'politeknik', 'sekolah', 'tinggi', 'dr', 'prof'])) {
                continue;
            }
            
            if (!empty($word)) {
                $code .= strtoupper(substr($word, 0, 1));
            }
        }

        // If no code extracted, use first 3 chars
        if (empty($code)) {
            $code = strtoupper(substr($name, 0, 3));
        }

        return $code;
    }
}
