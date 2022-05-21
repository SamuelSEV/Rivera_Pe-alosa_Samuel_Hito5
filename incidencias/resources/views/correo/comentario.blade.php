<!DOCTYPE html>
<html>

<head>
    <title>Nuevo comentario</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 ">
                <h2>Nuevo Comentario</h2>
                <div class="card mt-1 mb-1 rounded-3" style="background-color: rgb(132,206,157); color:black">
                    <div class="card-header text-center d-flex justify-content-between"
                        style="background-color: #62B56F; color:black">

                        
                        <h5> Autor: {{ $creador }}</h5>

                        

                    </div>
                    <hr />
                    <br>
                    <div class="card-body">
                        <p class="mb-0">{{ $descripcion }}</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
