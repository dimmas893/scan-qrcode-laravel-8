<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/scan/css/style.css">
	  <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Abstract</title>

    <style>
        /* Motif */
        .bg-motif-landing {
            background-image: url('/scan/img/motif.png');
            background-repeat: no-repeat;
            background-position: right top;
        }

        .bg-motif-kanan {
            background-image: url('/scan/img/motif_kanan.png');
            background-repeat: no-repeat;
            background-position: right;
        }

        .bg-motif-kiri {
            background-image: url('/scan/img/motif_kiri.png');
            background-repeat: no-repeat;
            background-position: left;
        }

        .bg-the-venue {
            background-image: url('/scan/img/facade_night.webp');
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
            <img src="/scan/img/logo_konas.png" class="w-2/3" alt="">
            <div class="logos absolute top-10 flex">
                <img src="/scan/img/logo_idi.png" class="mr-4 w-1/3 2xl:w-full" alt="">
                <img src="/scan/img/paboi_logo_sm.png" class="w-1/3 2xl:w-full" alt="">
            </div>
        </div>
        <div class="kolregis w-full lg:w-9/12 md:pr-0 overflow-auto relative">
            <!-- motif -->
            <div class="fixed right-0 z-50">
                <img src="/scan/img/motif_fiks_crop.png" alt="">
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

                        <div class="">
                            {{-- <img src="/scan/img/facade_night.webp" class="object-cover object-center w-full h-full" alt=""> --}}
                            <div class="aspect-square bg-gray-200 w-96 mx-auto" id="QR-Code">
                              @if(!\Illuminate\Support\Facades\Auth::user())
                              {{-- <div class="well">
                                <canvas id="webcodecam-canvas" class="object-cover object-center w-full h-full"></canvas>
                              </div> --}}
                                
                                <div class="col-md-6">
                                    <div class="well">
                                        <canvas id="webcodecam-canvas"></canvas>
                                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                                    </div>
                                    <div class="well" style="display: none  ;">
                                        <label id="zoom-value" width="100">Zoom: 2</label>
                                        <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                                        <label id="brightness-value" width="100">Brightness: 0</label>
                                        <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                                        <label id="contrast-value" width="100">Contrast: 0</label>
                                        <input id="contrast" onchange="Page.changeContrast();" type="range" min="-128" max="128" value="0">
                                        <label id="threshold-value" width="100">Threshold: 0</label>
                                        <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                                        <label id="sharpness-value" width="100">Sharpness: off</label>
                                        <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                                        <label id="grayscale-value" width="100">grayscale: off</label>
                                        <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                                        <br>
                                        <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                                        <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                                        <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                                        <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                                    </div>
                                </div>
                                <div class="col-md-6"  style="display: none  ;">
                                    <select class="form-control" id="camera-select"></select>
                                    <div class="form-group">
                                       
                                        <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                                        <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                                        <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                                        <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                                        <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                                     </div>
                    
                                    <div class="thumbnail" id="result">
                                        <div class="well">
                                            <img width="320" height="240" id="scanned-img" src="">
                                        </div>
                                        <div class="caption">
                                            <h3>Scanned result</h3>
                                            <p id="scanned-QR"></p>
                                        </div>
                                    </div>
                                </div>
                             @else
                                <h1>Hallo! {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
                              @endif
                        </div>
                        </div>

                        <!-- <div class="initiate-scan">
                            <p class="mt-8">
                                <i class="uil uil-qrcode-scan mr-2 text-lg"></i> “Scan your QR Code before continue”
                            </p>
                        </div> -->

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript">
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
      </script>
      <script type="text/javascript" src=" {{ URL::asset('/qr_login/option2/js/filereader.js') }}"></script>
      <script type="text/javascript" src=" {{ URL::asset('/qr_login/option2/js/qrcodelib.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('/qr_login/option2/js/webcodecamjs.js ') }}"></script>
      
      <script>
       function CallAjaxLoginQr(code) {
            $.ajax({
                  type: "POST",
                  cache: false,
                  url : "/create_category_jika_dia_sudah_login",
                  data: {data:code},
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
       }
      
      (function(undefined) {
          "use strict";
      
          function Q(el) {
              if (typeof el === "string") {
                  var els = document.querySelectorAll(el);
                  return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
              }
              return el;
          }
          var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
          var scannerLaser = Q(".scanner-laser"),
              imageUrl = new Q("#image-url"),
              play = Q("#play"),
              scannedImg = Q("#scanned-img"),
              scannedQR = Q("#scanned-QR"),
              grabImg = Q("#grab-img"),
              decodeLocal = Q("#decode-img"),
              pause = Q("#pause"),
              stop = Q("#stop"),
              contrast = Q("#contrast"),
              contrastValue = Q("#contrast-value"),
              zoom = Q("#zoom"),
              zoomValue = Q("#zoom-value"),
              brightness = Q("#brightness"),
              brightnessValue = Q("#brightness-value"),
              threshold = Q("#threshold"),
              thresholdValue = Q("#threshold-value"),
              sharpness = Q("#sharpness"),
              sharpnessValue = Q("#sharpness-value"),
              grayscale = Q("#grayscale"),
              grayscaleValue = Q("#grayscale-value"),
              flipVertical = Q("#flipVertical"),
              flipVerticalValue = Q("#flipVertical-value"),
              flipHorizontal = Q("#flipHorizontal"),
              flipHorizontalValue = Q("#flipHorizontal-value");
          var args = {
              autoBrightnessValue: 100,
              resultFunction: function(res) {
                  [].forEach.call(scannerLaser, function(el) {
                      fadeOut(el, 0.5);
                      setTimeout(function() {
                          fadeIn(el, 0.5);
                      }, 300);
                  });
                  scannedImg.src = res.imgData;
                  CallAjaxLoginQr(res.code);
                  scannedQR[txt] = res.format + ": " + res.code;
              },
              getDevicesError: function(error) {
                  var p, message = "Error detected with the following parameters:\n";
                  for (p in error) {
                      message += p + ": " + error[p] + "\n";
                  }
                  alert(message);
              },
              getUserMediaError: function(error) {
                  var p, message = "Error detected with the following parameters:\n";
                  for (p in error) {
                      message += p + ": " + error[p] + "\n";
                  }
                  alert(message);
              },
              cameraError: function(error) {
                  var p, message = "Error detected with the following parameters:\n";
                  if (error.name == "NotSupportedError") {
                      var ans = confirm("Your browser does not support getUserMedia via HTTP!\n(see: https:goo.gl/Y0ZkNV).\n You want to see github demo page in a new window?");
                      if (ans) {
                          window.open("http://rolandalla.com");
                      }
                  } else {
                      for (p in error) {
                          message += p + ": " + error[p] + "\n";
                      }
                      alert(message);
                  }
              },
              cameraSuccess: function() {
                  grabImg.classList.remove("disabled");
              }
          };
          var decoder = new WebCodeCamJS("#webcodecam-canvas").buildSelectMenu("#camera-select", "environment|back").init(args);
          decodeLocal.addEventListener("click", function() {
              Page.decodeLocalImage();
          }, false);
          play.addEventListener("click", function() {
              if (!decoder.isInitialized()) {
                  scannedQR[txt] = "Scanning ...";
              } else {
                  scannedQR[txt] = "Scanning ...";
                  decoder.play();
              }
          }, false);
          grabImg.addEventListener("click", function() {
              if (!decoder.isInitialized()) {
                  return;
              }
              var src = decoder.getLastImageSrc();
              scannedImg.setAttribute("src", src);
          }, false);
          pause.addEventListener("click", function(event) {
              scannedQR[txt] = "Paused";
              decoder.pause();
          }, false);
          stop.addEventListener("click", function(event) {
              grabImg.classList.add("disabled");
              scannedQR[txt] = "Stopped";
              decoder.stop();
          }, false);
          Page.changeZoom = function(a) {
              if (decoder.isInitialized()) {
                  var value = typeof a !== "undefined" ? parseFloat(a.toPrecision(2)) : zoom.value / 10;
                  zoomValue[txt] = zoomValue[txt].split(":")[0] + ": " + value.toString();
                  decoder.options.zoom = value;
                  if (typeof a != "undefined") {
                      zoom.value = a * 10;
                  }
              }
          };
          Page.changeContrast = function() {
              if (decoder.isInitialized()) {
                  var value = contrast.value;
                  contrastValue[txt] = contrastValue[txt].split(":")[0] + ": " + value.toString();
                  decoder.options.contrast = parseFloat(value);
              }
          };
          Page.changeBrightness = function() {
              if (decoder.isInitialized()) {
                  var value = brightness.value;
                  brightnessValue[txt] = brightnessValue[txt].split(":")[0] + ": " + value.toString();
                  decoder.options.brightness = parseFloat(value);
              }
          };
          Page.changeThreshold = function() {
              if (decoder.isInitialized()) {
                  var value = threshold.value;
                  thresholdValue[txt] = thresholdValue[txt].split(":")[0] + ": " + value.toString();
                  decoder.options.threshold = parseFloat(value);
              }
          };
          Page.changeSharpness = function() {
              if (decoder.isInitialized()) {
                  var value = sharpness.checked;
                  if (value) {
                      sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": on";
                      decoder.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];
                  } else {
                      sharpnessValue[txt] = sharpnessValue[txt].split(":")[0] + ": off";
                      decoder.options.sharpness = [];
                  }
              }
          };
          Page.changeVertical = function() {
              if (decoder.isInitialized()) {
                  var value = flipVertical.checked;
                  if (value) {
                      flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": on";
                      decoder.options.flipVertical = value;
                  } else {
                      flipVerticalValue[txt] = flipVerticalValue[txt].split(":")[0] + ": off";
                      decoder.options.flipVertical = value;
                  }
              }
          };
          Page.changeHorizontal = function() {
              if (decoder.isInitialized()) {
                  var value = flipHorizontal.checked;
                  if (value) {
                      flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": on";
                      decoder.options.flipHorizontal = value;
                  } else {
                      flipHorizontalValue[txt] = flipHorizontalValue[txt].split(":")[0] + ": off";
                      decoder.options.flipHorizontal = value;
                  }
              }
          };
          Page.changeGrayscale = function() {
              if (decoder.isInitialized()) {
                  var value = grayscale.checked;
                  if (value) {
                      grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": on";
                      decoder.options.grayScale = true;
                  } else {
                      grayscaleValue[txt] = grayscaleValue[txt].split(":")[0] + ": off";
                      decoder.options.grayScale = false;
                  }
              }
          };
          Page.decodeLocalImage = function() {
              if (decoder.isInitialized()) {
                  decoder.decodeLocalImage(imageUrl.value);
              }
              imageUrl.value = null;
          };
          var getZomm = setInterval(function() {
              var a;
              try {
                  a = decoder.getOptimalZoom();
              } catch (e) {
                  a = 0;
              }
              if (!!a && a !== 0) {
                  Page.changeZoom(a);
                  clearInterval(getZomm);
              }
          }, 500);
      
          function fadeOut(el, v) {
              el.style.opacity = 1;
              (function fade() {
                  if ((el.style.opacity -= 0.1) < v) {
                      el.style.display = "none";
                      el.classList.add("is-hidden");
                  } else {
                      requestAnimationFrame(fade);
                  }
              })();
          }
      
          function fadeIn(el, v, display) {
              if (el.classList.contains("is-hidden")) {
                  el.classList.remove("is-hidden");
              }
              el.style.opacity = 0;
              el.style.display = display || "block";
              (function fade() {
                  var val = parseFloat(el.style.opacity);
                  if (!((val += 0.1) > v)) {
                      el.style.opacity = val;
                      requestAnimationFrame(fade);
                  }
              })();
          }
          document.querySelector("#camera-select").addEventListener("change", function() {
              if (decoder.isInitialized()) {
                  decoder.stop().play();
              }
          });
      }).call(window.Page = window.Page || {});
      
      //Trigger Click 
      $("document").ready(function() {
          setTimeout(function() {
              $("#play").trigger('click');
          },10);
      });
      
      </script>
</body>

</html>