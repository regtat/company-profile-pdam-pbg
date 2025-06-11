<x-layout>
  <div class="flex flex-col font-poppins">
    <div class="h-[315px] relative">
      <img src="{{ asset('storage/background/bg-baru.jpg') }}" class="object-cover w-full">
      <div class="absolute top-10 left-10 text-white">
        <p class="font-extrabold leading-none text-left font-poppins profil">Profil</p>
        <div class="block bg-white w-40 h-1 my-5"></div>
        <p>Sejarah Perusahaan</p>
      </div>
    </div>
    <div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-10 mt-10 mb-10">
        <div class="flex flex-col">
          <div>
            <ul>
              <li class="font-bold text-2xl text-black mb-4">PROFIL</li>
              <a href="{{route('profil.visi-misi')}}"><li class="list-profil flex flex-row items-center mb-2">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z" fill="#6E6A6A"/>
                </svg>
                <span class="pl-2">Visi Misi</span>
              </li></a>
              <li class="list-profil flex flex-row items-center mb-2">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z" fill="#6E6A6A"/>
                </svg>
                <span class="pl-2">Sejarah</span>
              </li>
              <a href="{{route('profil.struktur-organisasi')}}"><li class="list-profil flex flex-row items-center mb-2">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z" fill="#6E6A6A"/>
                </svg>
                <span class="pl-2">Struktur Organisasi</span>
              </li></a>
              <a href="{{route('profil.profil-cabang-dan-unit-ikk')}}"><li class="list-profil flex flex-row items-center mb-2">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.157 7.71114L1.5 13.3681L0.0859985 11.9541L5.036 7.00414L0.0859985 2.05414L1.5 0.640137L7.157 6.29714C7.34447 6.48466 7.44978 6.73897 7.44978 7.00414C7.44978 7.2693 7.34447 7.52361 7.157 7.71114Z" fill="#6E6A6A"/>
                </svg>
                <span class="pl-2">Profil Cabang & Unit IKK</span>
              </li></a>
            </ul>
          <div><p class="font-poppins mt-10 flex items-start uppercase text-2xl">Artikel Lainnya</p>
          <hr class="my-4">
          @foreach ($posts as $post)
              <a href="/post/{{$post->id}}">
                  <div class="flex flex-row gap-x-5 mb-16">
                      <div class="w-1/2">
                          <img class="h-32 w-full object-cover rounded-md" src="{{asset('storage/'.$post->image)}}" alt="Post image">
                      </div>
                      <div class="w-1/2 flex flex-col">
                        <div class="short-title">{{ $post->shortTitle() }}</div>
                        <div class="date mt-3">{{\Carbon\Carbon::parse($post->published_at)->format('d F Y')}}</div>
                      </div>
                  </div>
              </a>
          @endforeach
          </div>
        </div>
      </div>
      <div class="col-span-2 ml-4">
        <div class="flex flex-col">
          <div class="title-visi mb-4">Sejarah Perusahan</div>
          <div class="flex flex-row items-center">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 1.49844L10.9965 1.49845V0.501953C10.9965 0.225703 10.7727 0.00195312 10.4965 0.00195312C10.2203 0.00195312 9.9965 0.225703 9.9965 0.501953V1.4982H5.9965V0.501953C5.9965 0.225703 5.77275 0.00195312 5.4965 0.00195312C5.22025 0.00195312 4.9965 0.225703 4.9965 0.501953V1.4982H1C0.44775 1.4982 0 1.94595 0 2.4982V14.9982C0 15.5504 0.44775 15.9982 1 15.9982H15C15.5522 15.9982 16 15.5504 16 14.9982V2.4982C16 1.94619 15.5522 1.49844 15 1.49844ZM15 14.9982H1V2.4982H4.9965V3.00195C4.9965 3.27819 5.22025 3.50195 5.4965 3.50195C5.77275 3.50195 5.9965 3.27819 5.9965 3.00195V2.49845H9.9965V3.0022C9.9965 3.27845 10.2203 3.5022 10.4965 3.5022C10.7727 3.5022 10.9965 3.27845 10.9965 3.0022V2.49845H15V14.9982ZM11.5 7.99844H12.5C12.776 7.99844 13 7.77444 13 7.49844V6.49844C13 6.22244 12.776 5.99844 12.5 5.99844H11.5C11.224 5.99844 11 6.22244 11 6.49844V7.49844C11 7.77444 11.224 7.99844 11.5 7.99844ZM11.5 11.9982H12.5C12.776 11.9982 13 11.7744 13 11.4982V10.4982C13 10.2222 12.776 9.99819 12.5 9.99819H11.5C11.224 9.99819 11 10.2222 11 10.4982V11.4982C11 11.7747 11.224 11.9982 11.5 11.9982ZM8.5 9.99819H7.5C7.224 9.99819 7 10.2222 7 10.4982V11.4982C7 11.7744 7.224 11.9982 7.5 11.9982H8.5C8.776 11.9982 9 11.7744 9 11.4982V10.4982C9 10.2224 8.776 9.99819 8.5 9.99819ZM8.5 5.99844H7.5C7.224 5.99844 7 6.22244 7 6.49844V7.49844C7 7.77444 7.224 7.99844 7.5 7.99844H8.5C8.776 7.99844 9 7.77444 9 7.49844V6.49844C9 6.22219 8.776 5.99844 8.5 5.99844ZM4.5 5.99844H3.5C3.224 5.99844 3 6.22244 3 6.49844V7.49844C3 7.77444 3.224 7.99844 3.5 7.99844H4.5C4.776 7.99844 5 7.77444 5 7.49844V6.49844C5 6.22219 4.776 5.99844 4.5 5.99844ZM4.5 9.99819H3.5C3.224 9.99819 3 10.2222 3 10.4982V11.4982C3 11.7744 3.224 11.9982 3.5 11.9982H4.5C4.776 11.9982 5 11.7744 5 11.4982V10.4982C5 10.2224 4.776 9.99819 4.5 9.99819Z" fill="black"/>
              </svg>
              <p class="ml-3 detail-date">{{\Carbon\Carbon::parse($post->published_at)->format('d F Y')}}</p>
              <p class="ml-3 detail-date">|</p>
              <svg class="ml-3" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 0C5.8 0 4 2.24 4 5C4 7.76 5.8 10 8 10C10.2 10 12 7.76 12 5C12 2.24 10.2 0 8 0ZM3.82 10C1.7 10.1 0 11.84 0 14V16H16V14C16 11.84 14.32 10.1 12.18 10C11.1 11.22 9.62 12 8 12C6.38 12 4.9 11.22 3.82 10Z" fill="black"/>
              </svg>
              <p class="ml-3 detail-date">pdam_purbalingga@outlook.com</p>
          </div>
          <img class="my-4" src={{ asset('storage/background/bg-depan.jpg') }}>
          <div style="font-size: 14px;">
          <p>Penyediaan air minum bagi Kabupaten Purbalingga dimulai sejak tahun 1927 dan pada mulanya hanya untuk melayani kebutuhan air minum Pabrik Gula dan rumah/kantor Asisten Residen.</p><br/>
          <p>Sumber penyediaan air minum berasal dari sumber mata air di Kawung Carang yang terletak di daerah Kabupaten Banyumas dengan debit hanya 3 liter/detik.</p><br/>
          <p>Dalam perkembangan selanjutanya, setelah Pabrik Gula tutup pada tahun sebelum 1940, maka air minum yang ada dimanfaatkan untuk memenuhi keperluan kantor-kantor/instansi pemerintah dan masyarakat. Adapun jumlah pelanggannya sampai dengan tahunn 1970 hanya sebanyak 80 Sambungan Rumah (SR).</p><br/>
          <p class="mb-2">Pada tahun 1968/1969. PDAM Purbalingga mendapat bantuan dari Direktorat Jendral Cipta Karya berupa fasilitas sarana dan prasarana air bersih sebagai berikut :</p>
          <ul class="ml-5" style="list-style-type: disc;">
            <li>Pembuatan bangunan penangkap air di sumber mata air di Desa Walik yang terletak 8 km ke utara kota Purbalingga.</li>
            <li>Pembuatan Reservoir di Desa Karanglewas yang terletak 4 km ke arah selatan dari bangunan penangkap air di Desa Walik.</li>
            <li>Pemindahan pipa distribusi yang berasal dari perbatasan Kabupaten Banyumas dan dipasang di bangunan Penangkap air ke Reservoir serta sampai di kota Purbalingga.</li>
          </ul>
          <br/>
          <p>Sejak tahun 1969 PDAM Purbalingga dapat melayani kebutuhan air minum bagi masyarakat kota Purbalingga secara mandiri. Tetapi karena terbatasnya sarana dan prasarana penyediaan air minum yang ada, maka sampai dengan akhir tahun 1988 jumlah pelanggan hanya 1.231 Sambungan Rumah (SR).</p>
          <p>Selanjutnya pada tahun Anggaran 1985/1986, 1986/1987 dan 1967/1988, PDAM Purbalingga memperoleh bantuan dari Direktorat Air Bersih berupa sarana dan prasarana air bersih dan pembangunan gedung untuk kantor yang terinci sebagai berikut :</p>
          <ul class="ml-5" style="list-style-type: disc;">
          <li>Tahun 1985/1986</li><span>Pembuatan bangunan Aerasi yang terletak dan berdampingan dengan bagunan Reservoirr di desa Karanglewas.<br/>
          Permasangan pipa transmisi dari bangunan penangkap air di Desa Walik ke Karanglewas.</span>
          <li>Tahun 1986/1987</li><span>Pemasangan pipa distribusi dan Sambungan Rumah (SR) sebanyak 550 SL.
            <li>Tahun 1987/1988</li><span>Pembangunan gedung kantor dan penambahan Sambungan Rumah sebanyak 500 SL.</span>
            <li>Tahun 1988/1989
</li><span>Pemasangan Sambungan Rumah (SR) Sebanyak 500 SL.</span>
          </ul>
          <br/>
          <p>Pengelolaan penyediaan air bersih dalam bentuk Perusahaan Daerah Air Minum Kabupaten Daerah Tingkat II Purbalingga dimulai sejak didirikan berdasarakan Peraturan Daerah Kabupaten Purbalingga Nomor 1 Tahun 1968 tentang Pendirian Perusahaan Daerah Air Minum Kabupaten Purbalingga tanggal 27 Agustus 1968.</p>
          <br/>
          <p>Sejak didirikan system air bersih pada tahun 1927 sampai dengan 26 Agustus 1968 masih Saluran Air Minum (SAM) yang merupakan bagian dari pada Dinas Pekerjaan Umum Kabupaten Purbalingga.</p><br/>
          <p>Fungsi PDAM Kabupaten Purbalingga adalah mengusahakan penyedian air bersih untuk kebutuhan masyarakat di Kabupaten Purbalingga dan sekitarnya. Dalam rangka menjalankan fungsi tersebut kegiatan perusahaan meliputi :</p>
          <ul class="ml-5" style="list-style-type: disc;">
          <li>Mengolah sumber air untuk memperoleh air bersih dan menyalurkan kepada pelanggan.</li>
          <li>Membangun jaringan distribusi dan transmisi dalam rangka untuk mengoptimalkan penyaluran air bersih kepada masyarakat di wilayah kerjanya, dan</li>
            <li>Melakukan pemeliharaan jaringan distribusi dan transmisi untuk menekan kebocoran/kehilangan air.</li>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</x-layout>


