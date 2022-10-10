<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('scan/css/style.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Abstract</title>

    <style>
        /* Motif */
        .bg-motif-landing {
            background-image: url('{{asset('scan//img/motif.png')}}');
            background-repeat: no-repeat;
            background-position: right top;
        }

        .bg-motif-kanan {
            background-image: url('{{asset('scan//img/motif_kanan.png')}}');
            background-repeat: no-repeat;
            background-position: right;
        }

        .bg-motif-kiri {
            background-image: url('{{asset('scan//img/motif_kiri.png')}}');
            background-repeat: no-repeat;
            background-position: left;
        }

        .bg-the-venue {
            background-image: url('{{asset('scan//img/facade_night.webp')}}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* End Motif */

        /* Text Colors */
        .text-dark {
            color: #1C1C1E;
        }

        .text-primary {
            color: #051367;
        }

        .text-secondary {
            color: #4578D2;
        }

        /* End Text Colors */

        /* BG Colors */
        .bg-bgcolor {
            background-color: #F7F9FE;
        }

        .bg-primary {
            background-color: #051367;
        }

        .bg-secondary {
            background-color: #4578D2;
        }

        /* End BG Colors */

        input[type="radio"]:checked {
            background-color: #4578D2;
        }
    </style>
</head>

<body>
    <div class="flex md:h-screen">
        <div class="hidden sidekonas w-3/12 bg-bgcolor h-screen lg:flex flex-row items-center justify-center relative">
            <img src="{{asset('scan//img/logo_konas.png')}}" class="w-2/3" alt="">
            <div class="logos absolute top-10 flex">
                <img src="{{asset('scan//img/logo_idi.png')}}" class="mr-4 w-1/3 2xl:w-full" alt="">
                <img src="{{asset('scan//img/paboi_logo_sm.png')}}" class="w-1/3 2xl:w-full" alt="">
            </div>
        </div>
        <div class="kolregis w-full lg:w-9/12 md:pr-0 overflow-auto relative">
            <!-- motif -->
            <div class="fixed right-0 z-50">
                <img src="{{asset('scan//img/motif_fiks_crop.png')}}" alt="">
            </div>
            <!-- end motif -->

            <div class="flex min-h-screen items-center">
                <div class="flex flex-col w-11/12 lg:w-1/2 mx-auto border py-4 2xl:py-8">
                    <div class="sticky top-0 bg-white">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                                </path>
                            </svg>
                            <h1 class="mt-4 text-2xl 2xl:text-4xl text-primary font-rw-bold">Scan Registration QR Code</h1>
                            <hr class="my-8">
                        </div>
                    </div>
                    <div class="text-center">

                        <div class="aspect-square bg-gray-200 w-96 mx-auto">
                            <!-- <img src="assets/img/facade_night.webp" class="object-cover object-center w-full h-full" alt=""> -->
                            <div id="qr-reader" class="object-cover object-center w-full h-full"></div>
                        </div>

                        
                        <div class="initiate-scan">
                            <p class="mt-8">
                                <!-- <i class="uil uil-qrcode-scan mr-2 text-lg"></i> “Scan your QR Code before continue” -->
                                <div id="qr-reader-results"></div>
                            </p>
                        </div>

                        <div class="scan-valid">
                            <p class="mt-8 text-green-500 font-rw-semibold">
                                <i class="uil uil-check-circle mr-2 text-base 2xl:text-lg text-green-500"></i>
                                QR Code valid. Click button below for continue
                            </p>
    
                            <div class="submit text-center mt-4 2xl:mt-8">
                                <button class="w-auto font-rw-bold rounded-lg text-white bg-secondary py-2 2xl:py-3 px-8 2xl:px-16 text-lg" type="button" data-modal-toggle="defaultModal">
                                    <i class="uil uil-check-circle mr-2 text-lg"></i> Continue
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script type="text/javascript">
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    </script>
    <script>
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;

                $.ajax({
                  type: "POST",
                  cache: false,
                  url : "/create_category_jika_dia_sudah_login",
                  data: {data:decodedText},
                      success: function(data) {
                        console.log(data);
                        if (data==1) {
                          //location.reload()
                          $(location).attr('href', '{{url('/')}}');
                        }else{
                         return confirm('There is no user with this qr code'); 
                        }
                        // 
                      }
                  })
                // Handle on success condition with the decoded message.
                // console.log(`Scan result ${decodedText}`, decodedResult);
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>

</html>