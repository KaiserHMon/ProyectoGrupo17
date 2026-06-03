<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Compra #{{ $venta->id }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333333;
            margin: 0;
            padding: 20px;
            background-color: #ffffff;
            line-height: 1.5;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .header-logo {
            font-size: 28px;
            font-weight: bold;
            color: #622b16;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .header-logo-sub {
            font-size: 12px;
            color: #9A4600;
            font-weight: normal;
            margin-top: 5px;
        }
        .header-title {
            text-align: right;
            font-size: 20px;
            color: #622b16;
            font-weight: bold;
        }
        .header-details {
            text-align: right;
            font-size: 12px;
            color: #666666;
            margin-top: 5px;
        }
        .section-title {
            font-size: 16px;
            color: #622b16;
            border-bottom: 2px solid #622b16;
            padding-bottom: 5px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .info-table td {
            padding: 6px 0;
            font-size: 13px;
        }
        .info-label {
            font-weight: bold;
            color: #555555;
            width: 150px;
        }
        .info-value {
            color: #333333;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .items-table th {
            background-color: #622b16;
            color: #ffffff;
            font-size: 13px;
            font-weight: bold;
            text-align: left;
            padding: 10px;
            border: 1px solid #622b16;
        }
        .items-table td {
            padding: 10px;
            font-size: 13px;
            border-bottom: 1px solid #e2e8f0;
        }
        .items-table tr:nth-child(even) {
            background-color: #fcfbfa;
        }
        .text-right {
            text-align: right !important;
        }
        .text-center {
            text-align: center !important;
        }
        .total-box {
            float: right;
            width: 250px;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .total-box td {
            padding: 8px 10px;
            font-size: 14px;
        }
        .total-label {
            font-weight: bold;
            color: #555555;
        }
        .total-amount {
            font-size: 18px;
            font-weight: bold;
            color: #9A4600;
            text-align: right;
        }
        .footer-note {
            margin-top: 150px;
            text-align: center;
            font-size: 14px;
            color: #622b16;
            font-weight: bold;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
        }
        .footer-subnote {
            text-align: center;
            font-size: 11px;
            color: #888888;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <table class="header-table">
        <tr>
            <td style="vertical-align: top;">
                <div class="header-logo">Maie</div>
                <div class="header-logo-sub">Dulces Artesanales</div>
            </td>
            <td style="vertical-align: top;" class="text-right">
                <div class="header-title">COMPROBANTE DE COMPRA</div>
                <div class="header-details">
                    <strong>Nro. Comprobante:</strong> #{{ str_pad($venta->id, 8, '0', STR_PAD_LEFT) }}<br>
                    <strong>Fecha:</strong> {{ $venta->created_at->format('d/m/Y H:i') }} hs<br>
                    <strong>Estado:</strong> {{ ucfirst($venta->estado) }}
                </div>
            </td>
        </tr>
    </table>

    <!-- Datos de Usuario -->
    <div class="section-title">Datos del Comprador</div>
    <table class="info-table">
        <tr>
            <td class="info-label">Nombre completo:</td>
            <td class="info-value">{{ $venta->usuario->nombre ?? $venta->usuario->name }}</td>
        </tr>
        <tr>
            <td class="info-label">Email:</td>
            <td class="info-value">{{ $venta->usuario->email }}</td>
        </tr>
        <tr>
            <td class="info-label">Fecha de Emisión:</td>
            <td class="info-value">{{ now()->format('d/m/Y H:i:s') }}</td>
        </tr>
    </table>

    <!-- Detalle de Productos -->
    <div class="section-title">Detalle de la Compra</div>
    <table class="items-table">
        <thead>
            <tr>
                <th>Producto</th>
                <th class="text-center" style="width: 80px;">Cantidad</th>
                <th class="text-right" style="width: 120px;">Precio Unitario</th>
                <th class="text-right" style="width: 120px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalles as $detalle)
                @php
                    $subtotal = $detalle->cantidad * $detalle->precio_unitario;
                @endphp
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td class="text-center">{{ $detalle->cantidad }}</td>
                    <td class="text-right">${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                    <td class="text-right">${{ number_format($subtotal, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Totales -->
    <div style="width: 100%; overflow: hidden;">
        <table class="total-box">
            <tr>
                <td class="total-label">Total de la compra:</td>
                <td class="total-amount">${{ number_format($venta->total, 2, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <!-- Pie de página -->
    <div class="footer-note">
        ¡Muchas gracias por elegir Maie!
    </div>
    <div class="footer-subnote">
        Este documento sirve como comprobante de su orden confirmada. Ante cualquier duda, contáctenos.
    </div>

</body>
</html>
