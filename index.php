<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>API CLIENTE</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8000/cursos',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJ5YTEwYXp6SC8uTXBleU5XNndqZklaMDJ0YnVPckgxY0ZWUDBwdTRrS2tVRW1IOUw1dlRpUFdjMjlXOm8yeW8xMm9Sd292cWVpRTFqaDlLOXJvS3VJVHRPemVkLngzOXVMR3QvckZLNUIydkUyZ1oxbXBaQk01eQ==',
      'Cookie: XSRF-TOKEN=eyJpdiI6IkdzMS9rbzZmT0JJbUQxWmxrUVN1Q1E9PSIsInZhbHVlIjoiWFZPUkNTQjFkYWpUN0JxUStmTUhjZ3lCYjBNYWFkZkNxb3gwWk5IeFFPU3ZtM3M2SjYzZTJsaWZFZHp0MENKN2dWTkE1OTlCcDY1b1F2UG42Y1hOQzI1L1JKbTVqOERMTXdCUWlNODVkaWdaQjVVc3RJMEpGS1dWclVzU0craEIiLCJtYWMiOiI0NGQ3YThjYjM0NjIyZDAwZDgzNGM4ZWI1N2UxZjFiNGJhMjFiNGFlYzdjYTNiMDAyZjI3NGRlNmNiOGIxZTc3IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlcwdVNSUXF1REljNHNHMUIxY1VqSlE9PSIsInZhbHVlIjoiSVY1a0FWbGl0Vmc3bW5lR2wrZGxURDNiSjFndjZzaTVoc0I4UGRXdVdVMUx0eldvcFFsdnlMSkt6NTRaRGlnV0tocVFGc3h1bFhLeUVTUWpnQkdTNFoxRkxwcm5lS3FIcnNxRTgxak9vM2sxdUMvVGpualloUGJLaEdKaVMrUXkiLCJtYWMiOiIzYTE4Y2JlODIwOThjNjE1ZTQ0MzNjYmJmMzcxNzcxOWQwZWU2M2M2MzUxMGFlOGJjOTFiOTUyNDYxODI4MGEwIiwidGFnIjoiIn0%3D'
    ),
  ));
  // http://localhost:8080/apirest-cliente/
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "curl Errror #:" . $err;
  } else {
    $json = json_decode($response, true);
   // echo '<pre>'; print_r($json); echo '</pre>';
  }
 
  ?>
  <?php foreach ($json["detalles"] as $key => $value) : ?>

    <div class="cointainer-fluid">

      <div class="container">

        <div class="row">

          <div class="col-3">

            <div class="card">

              <div class="card-header">

                <img src="<?php echo $value["imagen"]; ?>" class="img-fluid">

              </div>

              <div class="card_body">
                <h4><?php echo $value["titulo"] ?></h4>
                <p><?php echo $value["descripcion"] ?></p>
                <span class="badge badfe-secondary"><?php echo $value["instructor"] ?></span>

              </div>

              <div class="card-footer">

                <span class="badge badge-danger"><?php echo $value["precio"] ?></span>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>

  <?php endforeach ?>

</body>

</html>