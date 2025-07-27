<section class="news-edit min-h-screen bg-gray-300 w-full">
<form action="<?= base_url("admin/news_update") ;?>" id="edit-berita" method="POST" class="h-full p-5 fixed top-10 bg-white shadow-lg rounded-lg w-full top-0 overflow-y-scroll pb-10" enctype="multipart/form-data">
           
           <div
               class="close-btn absolute right-2 top- text-red-500 w-6 rounded-full aspect-square flex justify-center items-center hover:cursor-pointer scale-125">
               x</div>
           <h2 class="font-bold mb-5 text-center">Edit Berita</h2>
           <img src="" alt="" class="preview">
           <div class="mb-4">
               <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
               <input type="text" required id="judul" value="<?= $berita['title'] ;?>" name="judul"
                   class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
           </div>
           <div class="mb-4">
               <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
               <textarea id="isi" required name="isi"
                   class="mt-1 p-2 block min-h-40 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"><?= $berita['isi'] ;?></textarea>
           </div>
           <img src="<?= base_url() ;?>public/assets/images/<?= $berita['hd'] ;?>" class="w-full max-w-80 block mx-auto" alt="">
           <div class="mb-4">
               <label for="file" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
               <input type="file" id="file" name="userfile"
                   class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
           </div>
           <div>
            <input type="hidden" name="id" value="<?= $berita['id'] ;?>">
               <button type="submit"
                   class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
           </div>
       </form>
</section>