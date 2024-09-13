<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
    <nav
        class="navbar navbar-expand-sm fixed-top bg-body-tertiary navbar-light bg-light"
    >
        <div class="container">
            <a class="navbar-brand" href="#">AppStoreWeb</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page"
                            >Inicio
                            <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Productos</a
                        >
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId"
                        >
                            <a class="dropdown-item" href="secciones/proveedores/"
                                >Proveedores</a
                            >
                            <a class="dropdown-item" href="secciones/unidades/"
                                >Unidades</a
                            >
                            <a class="dropdown-item" href="#"
                                >Categorías</a
                            >
                            <a class="dropdown-item" href="secciones/productos/"
                                >Productos</a
                            >
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Empresa</a
                        >
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId"
                        >
                            <a class="dropdown-item" href="#"
                                >Departamentos</a
                            >
                            <a class="dropdown-item" href="#"
                                >Cargos</a
                            >
                            <a class="dropdown-item" href="secciones/empleados/"
                                >Empleados</a
                            >
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Tienda</a
                        >
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId"
                        >
                            <a class="dropdown-item" href="#"
                                >Clientes</a
                            >
                            <a class="dropdown-item" href="secciones/ventas/"
                                >Ventas</a
                            >
                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page"
                            >Cerrar Sesión
                            <span class="visually-hidden">(current)</span></a
                        >
                    </li>

                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input
                        class="form-control me-sm-2"
                        type="text"
                        placeholder="Buscar"
                    />
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        Buscar
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <br> <br>
    </header>
    <main>