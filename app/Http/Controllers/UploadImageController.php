<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image_uploaded;
use App\Models\User;
use Carbon\Carbon;
use Image;
use File;
use Illuminate\Support\Facades\Auth;

class UploadImageController extends Controller
{
    public $path;
    public $dimensions;
    public $imageCodes = [
        '1' => 'PhotoProfile'
    ];

    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = storage_path('app/public/images');
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['245', '300', '500'];
    }

    public function createFolder($path)
    {
        //JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($path)) {
            //MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($path);
        }
    }

    public function upload(Request $request, $codeImage)
    {
        $path = $this->path . '/' . $this->imageCodes[$codeImage];

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:10240'
        ]);

        $this->createFolder($path);

        //MENGAMBIL FILE IMAGE DARI FORM
        $file = $request->file('image');
        //MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
        $fileName = $this->imageCodes[$codeImage] . '_' .
            Carbon::now()->timestamp . '_' .
            uniqid() .
            '.' . $file->getClientOriginalExtension();
        //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
        Image::make($file)->save($path . '/' . $fileName);

        //LOOPING ARRAY DIMENSI YANG DI-INGINKAN
        //YANG TELAH DIDEFINISIKAN PADA CONSTRUCTOR
        foreach ($this->dimensions as $row) {
            //MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
            $canvas = Image::canvas($row, $row);
            //RESIZE IMAGE SESUAI DIMENSI YANG ADA DIDALAM ARRAY 
            //DENGAN MEMPERTAHANKAN RATIO
            $resizeImage  = Image::make($file)->resize($row, $row, function ($constraint) {
                $constraint->aspectRatio();
            });

            $this->createFolder($path . '/' . $row);

            //MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
            $canvas->insert($resizeImage, 'center');
            //SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
            $canvas->save($path . '/' . $row . '/' . $fileName);
        }

        //SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
        $imageId = Image_uploaded::create([
            'name' => $fileName,
            'dimensions' => implode('|', $this->dimensions),
            'path' => $path
        ])->id;

        return $imageId;
    }

    public function uploadPhotoProfile(Request $request)
    {
        $codeImage = $request->codeImage;
        $imageId = $this->upload($request, $codeImage);

        $authId = Auth::id();
        $user = User::find($authId);
        $user->update(['photo_profile_id' => $imageId]);

        return redirect()->back()->with(['success' => 'Foto profile berhasil diupdate!']);
    }
}
