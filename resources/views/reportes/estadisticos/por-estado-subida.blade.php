<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte por Estado de Subida</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.6; }
        .header { background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); color: white; padding: 30px; text-align: center; }
        .header h1 { font-size: 24px; margin-bottom: 5px; }
        .header .subtitle { font-size: 12px; opacity: 0.9; }
        .container { padding: 20px; }
        .stats { display: flex; justify-content: space-around; margin: 20px 0; }
        .stat-box { text-align: center; padding: 15px; background: #f8f9fa; border-radius: 8px; flex: 1; margin: 0 10px; }
        .stat-number { font-size: 32px; font-weight: bold; color: #17a2b8; }
        .stat-label { font-size: 12px; color: #666; text-transform: uppercase; }
        .section-title { font-size: 18px; color: #17a2b8; border-bottom: 2px solid #17a2b8; padding-bottom: 8px; margin: 20px 0 15px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th { background: #17a2b8; color: white; padding: 10px; text-align: left; font-size: 12px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; font-size: 11px; }
        tr:hover { background: #f8f9fa; }
        .footer { text-align: center; padding: 15px; color: #999; font-size: 10px; border-top: 1px solid #eee; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE POR ESTADO DE SUBIDA</h1>
        <div class="subtitle">Generado el {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <div class="container">
        <div class="stats">
            @foreach($estados as $estado)
            <div class="stat-box">
                <div class="stat-number">{{ $estado->total }}</div>
                <div class="stat-label">{{ ucfirst($estado->estado) }}</div>
            </div>
            @endforeach
        </div>

        @foreach($imagenesPorEstado as $estado => $imagenes)
        <div class="section-title">{{ ucfirst($estado) }} ({{ $imagenes->count() }} imágenes)</div>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Formato</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imagenes as $imagen)
                <tr>
                    <td><strong>{{ $imagen->cod_imagen }}</strong></td>
                    <td>{{ Str::limit($imagen->nombre_original, 25) }}</td>
                    <td>{{ strtoupper($imagen->formato) }}</td>
                    <td>{{ $imagen->usuario->nombre ?? 'N/A' }}</td>
                    <td>{{ $imagen->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
    </div>

    <div class="footer">
        Sistema de Verificación de Imágenes | Reporte generado automáticamente
    </div>
</body>
</html>
