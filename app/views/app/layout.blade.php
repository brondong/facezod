<!DOCTYPE html>
<html>
  <head>
    <title>Pengamat Zodiak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="zodiak, bintang, ramalan, primbon, ramalan zodiak, ramalan bintang, primbon">
    <meta name="description" content="Ketahui ramalan bintang anda setiap hari secara up to date dengan bantuan Pengamat Zodiak">
    <meta name="author" content="Heru Rusdianto">
    <meta name="robots" content="index,follow">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">

    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">

          @include('app.zodiak')

        </div>

        <div class="panel-body">
          <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              <img src="{{ $foto }}" alt="{{ $nama }}" class="img-responsive img-thumbnail">
            </div>
            
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              @include('app.konten')
            </div>

          </div> <!-- row -->

        </div> <!-- panel body -->

      </div> <!-- panel -->

      {{ $ramal->links() }}

      @include('app.links')

    </div> <!-- container -->

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
      var custom = "{{ route('custom') }}";
    </script>
  </body>
</html>

<?php

  /**
   * rubah format tanggal & bulan menjadi indonesia
   * 
   * @param  date $tanggal
   * @return string
   */
  function format($tanggal)
  {
    // array inggris => indonesia 
    $format = array(
      'Sun' => 'Minggu',
      'Mon' => 'Senin',
      'Tue' => 'Selasa',
      'Wed' => 'Rabu',
      'Thu' => 'Kamis',
      'Fri' => 'Jumat',
      'Sat' => 'Sabtu',
      'Jan' => 'Januari',
      'Feb' => 'Februari',
      'Mar' => 'Maret',
      'Apr' => 'April',
      'May' => 'Mei',
      'Jun' => 'Juni',
      'Jul' => 'Juli',
      'Aug' => 'Agustus',
      'Sep' => 'September',
      'Oct' => 'Oktober',
      'Nov' => 'November',
      'Dec' => 'Desember'
    );

    return strtr($tanggal, $format);
  }

?>