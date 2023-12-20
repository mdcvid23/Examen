<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Producto</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="/resources/css/app.css" type="text/css" />
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        function buscador() {
            var input, filter, table, tr, td, td2, i, txtValue;
            input = document.getElementById("buscador");
            filter = input.value.toUpperCase();
            table = document.getElementById("productos");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else if (td2) {
                        txtValue = td2.textContent || td2.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="row">
        <!-- Formulario para agregar -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Agregar Nuevo Producto
                </div>
                <div class="card-body">
                    <form action="{{ url('/productos/store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre" required minlength="4" maxlength="10">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="precio" id="precio" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="cantidad" id="cantidad" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar Producto</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Busqueda por cantidad max y min
                </div>
                <div class="card-body">
                    <form action="{{ url('/productos/filter') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="premin">Precio desde:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="premin" id="premin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="premax">Precio hasta:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="premax" id="premax">
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Productos</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input id="buscador" onkeyup="buscador()" type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
                <table id="productos" class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre <i class="fa fa-sort"></i></th>
                            <th>Descripcion</th>
                            <th>SKU <i class="fa fa-sort"></i></th>
                            <th>Precio</th>
                            <th>Cantidad <i class="fa fa-sort"></i></th>
                            <th>IMG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $productos)
                        <tr>
                            <form action="{{ route('productos.update', $productos->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td>{{ $productos->id }}</td>
                                <td style="color: transparent;"><input type="text" name="nombre" id="nombre" value="{{ $productos->nombre }}">{{ $productos->nombre }}</td>
                                <td><input type="text" name="descripcion" id="descripcion" value="{{ $productos->descripcion }}"></td>
                                <td>{{ $productos->sku }}</td>
                                <td><input type="text" name="precio" id="precio" value="{{ $productos->precio }}"></td>
                                <td><input type="text" name="cantidad" id="cantidad" value="{{ $productos->cantidad }}"></td>
                                <td><input type="text" name="imagen" id="imagen" value="{{ $productos->imagen }}"></td>
                                <td>

                                    <input type="submit" class="btn btn-danger mt-3" value="Edit" />
                            </form>

                            <form action="{{ route('productos.destroy', $productos->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger mt-3" value="Delete" />
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>