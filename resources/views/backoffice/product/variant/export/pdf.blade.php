{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Berkas pdf</title>
  </head>
  <body>

    <div class="">
        <div class="card m-2">
            <div class="card-body">
              <div class="header text-center">
                <h4>
                    <b>{{ $productVariant->name }}</b>
                </h4>
                <h4> Rp. {{ number_format($productVariant->price, 2, ",", ".") }} </h4>
              </div>
              <hr>
              <div class="body">
                <div class="row">
                    @foreach ($productVariant->spec as $spec)
                        <div class="col-md-6">
                            <p><b>{{ $spec->specification->name }} :</b> {{ $spec->value }}</p>
                            <hr>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berkas pdf</title>
</head>
<body>

    <div class="">
        <div class="card m-2">
            <div class="card-body" style="padding: 10px">
              <div class="header text-center" style="text-align: center">
                <h2>
                    <b>{{ $productVariant->name }}</b>
                </h2>
                <h3> Rp. {{ number_format($productVariant->price, 2, ",", ".") }} </h3>
              </div>
              <hr>
              <div class="body">
                <div class="row" style="padding: 10px; border">
                  @if ($productVariant->long != null)
                    <div class="col-md-6" style="">
                        <div style="margin-left: 30px; margin-right: 30px">
                            <b>Long :</b> {{ $productVariant->long }}
                            <hr>
                        </div>
                    </div>
                  @endif
                  @if ($productVariant->weight != null)
                    <div class="col-md-6" style="">
                        <div style="margin-left: 30px; margin-right: 30px">
                            <b>Weight :</b> {{ $productVariant->weight }}
                            <hr>
                        </div>
                    </div>
                  @endif
                  @if ($productVariant->width != null)
                    <div class="col-md-6" style="">
                        <div style="margin-left: 30px; margin-right: 30px">
                            <b>Width :</b> {{ $productVariant->width }}
                            <hr>
                        </div>
                    </div>
                  @endif
                  @if ($productVariant->height != null)
                    <div class="col-md-6" style="">
                        <div style="margin-left: 30px; margin-right: 30px">
                            <b>Height :</b> {{ $productVariant->height }}
                            <hr>
                        </div>
                    </div>
                  @endif
                  @foreach ($productVariant->spec as $spec)
                      <div class="col-md-6" style="">
                          <div style="margin-left: 30px; margin-right: 30px">
                              <b>{{ $spec->specification->name }} :</b> {{ $spec->value }}
                              <hr>
                          </div>
                      </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
    </div>

</body>
</html>