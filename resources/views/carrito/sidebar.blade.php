<div id="sidebar-cart" class="sidebar-cart bg-white shadow position-fixed end-0 top-0 p-3" style="width: 300px; height: 100vh; z-index: 1050; overflow-y: auto; display: none;">
    <h5 class="mb-3">🛒 Mi Carrito</h5>
    @if(count($carrito))
    <ul class="list-group mb-3">
        @foreach($carrito as $id => $item)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{ $item['nombre'] }}</div>
                <small>Cantidad: {{ $item['cantidad'] }}</small><br>
                <small>Precio: S/. {{ number_format($item['precio'], 2) }}</small>
            </div>
            <form action="{{ route('carrito.eliminar', $id) }}" method="POST" class="eliminar-form">
                @csrf
                <input type="hidden" name="redirect_back" value="{{ url()->current() }}">
                <button class="btn btn-sm btn-danger ms-2">✕</button>
            </form>

        </li>
        @endforeach
    </ul>
    <div class="fw-bold text-end">
        Subtotal: S/. {{ number_format(array_sum(array_map(fn($i) => $i['cantidad'] * $i['precio'], $carrito)), 2) }}
    </div>
    @else
    <p class="text-muted">Tu carrito está vacío.</p>
    @endif
</div>