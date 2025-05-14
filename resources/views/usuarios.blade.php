<x-nav />

@auth
    @if(auth()->user()->fk_tipo_usuario == '1')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Usuarios</h1>

        <!-- Buscador -->
        <input type="text" id="buscador" class="form-control mb-3" placeholder="Buscar usuario, correo o teléfono...">

        <div class="panel shadow p-4 bg-white rounded">
            <div class="table-responsive">
                <table class="table table-hover styled-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Tipo de usuario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-buscar">
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nom_usuario }}</td>
                                <td>{{ $usuario->correo }}</td>
                                <td>{{ $usuario->tel }}</td>
                                <td>
                                    <select class="form-select actualizar-rol" data-user-id="{{ $usuario->pk_usuario }}">
                                        <option value="1" {{ $usuario->fk_tipo_usuario == 1 ? 'selected' : '' }}>Administrador</option>
                                        <option value="2" {{ $usuario->fk_tipo_usuario == 2 ? 'selected' : '' }}>Normal</option>
                                    </select>
                                </td>
                                <td>
                                    <span class="badge {{ $usuario->estatus ? 'bg-success' : 'bg-danger' }}">
                                        {{ $usuario->estatus ? 'Activo' : 'Deshabilitado' }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning deshabilitar-usuario" data-user-id="{{ $usuario->pk_usuario }}">
                                        {{ $usuario->estatus ? 'Deshabilitar' : 'Habilitar' }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buscador = document.getElementById("buscador");
            const filas = document.querySelectorAll("#tabla-buscar tr");

            // Filtrar usuarios en tiempo real
            buscador.addEventListener("keyup", function () {
                let filtro = buscador.value.toLowerCase();

                filas.forEach(fila => {
                    let usuario = fila.cells[0].textContent.toLowerCase();
                    let correo = fila.cells[1].textContent.toLowerCase();
                    let telefono = fila.cells[2].textContent.toLowerCase();

                    if (usuario.includes(filtro) || correo.includes(filtro) || telefono.includes(filtro)) {
                        fila.style.display = "";
                    } else {
                        fila.style.display = "none";
                    }
                });
            });

            // Actualizar rol
            document.querySelectorAll('.actualizar-rol').forEach(select => {
                select.addEventListener('change', function () {
                    let userId = this.dataset.userId;
                    let nuevoRol = this.value;

                    fetch(`/usuarios/${userId}/actualizar-rol`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ fk_tipo_usuario: nuevoRol })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                    })
                    .catch(error => console.error('Error:', error));
                });
            });

            // Deshabilitar usuario
            document.querySelectorAll('.deshabilitar-usuario').forEach(button => {
                button.addEventListener('click', function () {
                    let userId = this.dataset.userId;

                    fetch(`/usuarios/${userId}/deshabilitar`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        location.reload(); // Recargar para reflejar cambios
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
    @endif
@endauth
